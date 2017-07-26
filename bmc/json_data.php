
<?php 
require_once("database_config.php");

require_once("database.php");

$mysqldatabase = new MySQLDatabase();
$mysqldatabase->open_connection();

		  $json_data;
		 


class ShowJsonData

{

		public function check_database($search_query)

	{

						global $mysqldatabase;

						

					$mysqldatabase->open_connection();

					

			
				$show_data_query = "SELECT title,url,description FROM googleresults WHERE search_query ='$search_query'";
				
				$show_data = $mysqldatabase->query($show_data_query);

				$rowcount = $mysqldatabase->fetch_array($show_data);

				

				 $ret_value=0;
				 if($rowcount>0)
				 {

				global $json_data;
					$result = array();	

				  while($res = mysqli_fetch_array($show_data)){
				  
				 
				 array_push($result,array
				 (

				 "title"=>$res['title'],
				 "url"=>$res['url'], 
				 "description"=>$res['description']

				 )
				 );
				 }//close while

				 $json_data =json_encode(array("result"=>$result));
				

				   $ret_value=1;
				 }//close if

					return $ret_value;
						
		}//close function check_database()



		public function display_results()

		{



					global $json_data;
					
				
					
					//exit;



					 $temp = explode('result',$json_data);
					$title_array = explode('title',$temp[1]);

					 $description_array = explode('description', $temp[1]);

					$new_arry = explode('{',$temp[1]);


					 for($i=1; $i<count($title_array);$i++)

			{
					  echo "<br><br> <br>";

					$title_array_1 = explode(',',$title_array[$i]);

					 
					//working for title:
					$title = $title_array_1[0];

					$title = str_replace(":","", $title);
					$title = str_replace('"',"", $title);
					echo "<br><h2> {$title} </h2><br>";

					//working for url:
					$url = $title_array_1[1];

					$url = str_replace('"',"", $url);

					$url = str_replace("\\","", $url);

					$url = str_replace("url:","", $url);


					echo "<br> <a href = {$url}>URL: </a> {$url}<br> ";
					//working for description
					$new_desc = explode('description',$new_arry[$i]);


					$description =  $new_desc[1];


					$description = str_replace('"',"", $description);

					$description = str_replace(':',"", $description);

					$description = str_replace('},',"", $description);


					echo "<br> <h4>{$description} </h4><br>";
			}//close for loop





		}//close display_results()



}//close class



$mysqldatabase->close_connection();
?>