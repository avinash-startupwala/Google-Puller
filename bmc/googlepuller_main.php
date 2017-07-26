<?php 

 if($_SERVER['REQUEST_METHOD']=='POST'){
$user_search = $_POST['query'];



//echo $user_search;


		


require_once("database_config.php");

require_once("database.php");

require_once("json_data.php");

	

	 $showjsondata = new ShowJsonData();
	 

	//check if info is available in databse with given search query
	$return_value =$showjsondata->check_database($user_search);
	

if($return_value==1)
{
	echo "available in database <br>";
//information is available 
	
	$showjsondata->display_results();

}

else 
	
	{
		//information is not available


ini_set('max_execution_time', 180);
 


define("TITLE", "h3 class=\".r\"");


require_once("simple_html_dom.php");


$titlesarray = array();

$descriptionarray = array();

$linksarray = array();

$count = 0;

$sorted_links_array = array();

$title_description_array = array();

$total_titles;

$page_number = 0;


$count_tracker=0;





//Main class GoogleInfoManager



class GooglePuller
{
	public $user_search_query;
	
		public $html ;
	public function __construct($user_search_new)
	
	{
		
		$this->user_search_query = "$user_search_new";
		
		
		
		
	}
		

		
	function curl_to_php($page_no)
	
	{
		global $user_search;
		
		global $bug;

		
		global $titlesarray ;
		$titlesarray= array();
		
		
		global $linksarray;
		$linksarray = array();
		
		global $descriptionarray;
		$descriptionarray = array();
		
		global $sorted_links_array;
		$sorted_links_array = array();
		
		global $title_description_array;
		$title_description_array = array();
		
		//global $user_search_query;
		
		
		$temp = str_replace(" ","+",$user_search);
		
		
		//$this->user_search_query = 

		
		//$this->user_search_query = str_replace(" ","+",$this->user_search_query);
			
		global $linksarray;
		
		global $titlesarray;
			//echo $temp;
		
			
			
		
	 $url = "https://www.google.co.in/search?q={$temp}&start={$page_no}";

	
	
		
		
		
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL,"$url");
			curl_setopt($ch, CURLOPT_HEADER, false);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
		
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			
			
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");
			$query = curl_exec($ch);
			curl_close($ch);


			$this->html = str_get_html($query);
		
		
	
			//get all available descriptions from page
			$this->fetch_all_descriptions(".st");
			
			

			//get number of total link (anchor tags) 
			$total_links = count($linksarray);

			//count total titles
			$total_titles = count($titlesarray);
			
			//call this function to sort and save only those links(from $linksarray) which are related to tiltles
			$this->save_useful_links($total_titles ,$total_links);

			$this->save_all_info();
	
	}//end of curl to php() 
			
			
			
			// get description
			
			public function fetch_all_descriptions($temp)
			
			{
				
			global $descriptionarray;
			
				foreach($this->html->find($temp) as $tag) {

				 $descriptionarray[] = array($tag->innertext);
				}
			//print_r($descriptionarray);
			
			//get all available titles from page
				$this->fetch_all_titles(TITLE);
				
				
			}//end of fetch_all_descriptions();
			

			
//get titles
	public function fetch_all_titles($temp)
	{
				global $total_titles;
				global $titlesarray ;
			
				global $count_tracker;
				foreach($this->html->find($temp) as $tag) 
			{
		

// to print titles with link attached on them use :$titlesarray[] = array($tag->innertext);
		

//if title is about word or dictionary meaning then continue..
		$title_text = explode('/',$tag->plaintext);
		 	 if(isset($title_text[1]) && $count_tracker == 0 )
			 {
							 
						 continue;
			 }
	
	                  	$count_tracker++;
			 
					 $titlesarray[] = array($tag->plaintext);
					 
			 
					 $total_titles = count($titlesarray);
					


			}//for each ends
				
			
				 ////get all available links from page
				 $this->get_all_links("a");
				 
				 //to escape forword slash in pronounciation result of google:
				 $count_tracker++;
				
	}//fetch all titles ends



// get all links from google page 
			public function get_all_links($temp)
			
			{
				
				global $linksarray;
				
				foreach($this->html->find($temp) as $tag)
				{

				 $linksarray[] = array($tag->href,$tag->plaintext);
				}//for each loop ends
				
			}//get_all_links() complete


// save useful links functin

	public function save_useful_links($totaltitles,$totallinks)
	{

				global $titlesarray;

				global $linksarray;
				
				

				for($title_at = 0; $title_at<$totaltitles; $title_at++)
		{
				 	global $count;

				 	global $sorted_links_array;
				 	for($link_at = 0; $link_at<$totallinks; $link_at++)
			{

				 		$title_to_match = $titlesarray[$title_at][0];

				 		$link_title_to_match = $linksarray[$link_at][1];

				 		if($title_to_match==$link_title_to_match)
				{
 
							$formated_link = $linksarray[$link_at][0];


							$new_url = str_replace("/url?q=h","h",$formated_link);
			
							$temp_url_2 = explode('sa',$new_url);
					
						  
							if(isset($temp_url_2[0]))
			
					{
			
							unset($temp_url_2[1]);
							$t = $temp_url_2[0];
				
							$fully_formed_url = str_replace("&","",$t);
							$fully_formed_url_2 = str_replace("amp;"," ",$fully_formed_url);
				 
				
							$sorted_links_array[] =  $fully_formed_url_2;
				
					}
				}
			}
		}		
	}

//save all info (title+descriptipn+URL) i.e title,URLs and description together in array

	public function save_all_info()
			
		{

			global $title_description_array;

			global $descriptionarray;

			global $titlesarray;

			global $sorted_links_array;

			$i = 0;

			foreach ($descriptionarray as $temp[$i]) 
			{

				    $title_description_array[] =array($titlesarray[$i]
				   	,
				   	$sorted_links_array[$i]
				   	,
				   	$descriptionarray[$i]);
			
				    $i = $i+1;
			}
			
		


		}//end save all info();
			
			
			//insert data to database
		public function save_to_database()
		{
				global $user_search;
				$mysqldatabase = new MySQLDatabase();
				$mysqldatabase->open_connection();
				
				global $total_titles;

				global $title_description_array;
				
				//global $user_search_query;
				 
				 for($i = 0,$j =1; $i < $total_titles; $i++,$j++)
				{

							//for titles
							 $temp_title = $title_description_array[$i][0][0];
							 
							$save_title_db= $mysqldatabase->escape_value($temp_title);
				
							//for links:
							  $save_link_db =  $title_description_array[$i][1];

				             //for descriptions
							$temp_description = $title_description_array[$i][2][0];


							 $save_descriptions =  $mysqldatabase->escape_value($temp_description);
							
							
							 $insertdata = "INSERT INTO googleresults (search_query,title,url,description) 
							 values
							 
							  ('$user_search','$save_title_db','$save_link_db','$save_descriptions')";
			

					//////////////////// insert query  ////////////////////////
								
							$insertintodatabase = $mysqldatabase->query($insertdata);

					//////////////////// insert query  ////////////////////////


				}//for loop end
			
				
		}//save to databse() end
			
			
			
			//starting point of the program
			public function start()
			
			{
				global $page_number;
				
				//global $user_search_query;
					for($x = 0; $x<=0; $x++)
					{ 
							$this->curl_to_php($page_number);
																		
							$this->save_to_database();
																		
						//sleep(0.5);
																			
						$page_number = $page_number+10;	
					}//end of for loop
		
			}//start() ends
		
		} // class GoogleInfoManage end

	
		
		
		$GooglePuller = new GooglePuller($user_search);
		
		$GooglePuller->start();
		
	
			sleep(0.5);
			
			$showjsondata->check_database($user_search);
			
		
	 
			$showjsondata->display_results();
			
		$mysqldatabase->close_connection();
		

 }//end else;
 
// $mysqldatabase->close_connection();
  }//end main if started at first line of code


?>