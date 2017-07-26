# Google-Puller

Here I have included all the files of project

Flow of code/project:

1. Index.html file is providing user interface (like google) to enter search queries

2. It then sends that search query (by POST) to file: googlepuller_main.php

3. googlepuller_main.php file first checks with database if that query is already
    available or not. 
    
    - If yes then it will fetch that data (in JSON form) and dislpay
      to user in html structure.
      
    -If not available in database then it will fire that query to google
     for first 40 results (4 pages). and save those results in database.
     and display those results back to user.
     
4. json_data.php file is handling all the task related to fetching data and showing it
    in json format.
    
5. simlpe_html_dom.php file: I have used this file for the purpose of html parsing.


REMAINING Things:

        parsing html with REGULAR EXPRESSIONS.
