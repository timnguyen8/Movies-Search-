<!DOCTYPE html>
<html>
  <head >  
  <link href = "myCSS.css" rel = "stylesheet" type="text/css"/>
  </head>
  
  <body >
	<div id="wrapper">
		<!-- This is header field -->
		<div id = "header">
		<h1>Search For Movies</h1>
		</div>
		<!-- This is menu field -->
		<div id = "menu">
		<a href="index.php">Home</a><a href="">Register</a><a href="">Reviews</a><a href="">Search</a> 
		</div>
		<!--Left Sidebar field -->
		<div id = "leftSidebar"></div>
			<!--Right Sidebar field -->
		<div id = "rightSidebar"></div>
		<!--Content field-->
		<div id = "content">
			<?php 
			$q = ""; 
			$token = '6qvrmbehyspcu57hma2q222z'; 

			$keywords = array("red","green","blue", 'yellow');
								
			$arrlength=count($keywords);

			for($x=0;$x<$arrlength;$x++)
			{
				$q = $keywords[$x]; 
				//passing $q and $token to API
				$movies_url = 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=' . $token . '&q='. urlencode($q);
				
				//Retrieve datat from API in JSON format 
				$movies_json = file_get_contents($movies_url);
				//decode JSON to array of movies
				$movies_array = json_decode($movies_json, true);
				
				//print_r($movies);
				if($movies_array===NULL)die('ERROR PASSING JSON');
				$movies = $movies_array['movies'];
					foreach($movies as $movie)
					{
						echo '<p>'.'<b>Movie Detail</b>'.'<br>';
						echo 'Movie Title: '.$movie['title'].'<br>';
						echo 'Year: '.$movie['year'].'<br>';
						echo 'Runtime: '.$movie['runtime'].'<br>';
						echo '<i>'.'Keywords: '.$q.'</i>'.'</p>';
					} 
			}
			

			?>
		</div>
		<!-- Footer field -->
		<div id = "footer">
		<h3>By Thanh Dung Nguyen </h3>
		</div>
	</div>
  </body>
</html>
