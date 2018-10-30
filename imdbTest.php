<?php
	$db = new mysqli('localhost', 'root', '', 'app');
	
	if($db->connect_error){
		die('Sorry, Site under Maintenance <br/>');
	}else{
		if($result = $db->query("SELECT * FROM movie2 LIMIT 176,190")){
			while($record = $result->fetch_object()){
				$json=file_get_contents ($record->link);
				$info=json_decode($json, true);
				$title = "Title";
				$ratings = "Ratings";
				$imdb_rating = $info['Ratings'][0]['Value'];
				$release = $info['Year'];
				$genre = $info['Genre'];
				$description = $info['Plot'];
				$director = $info['Director'];
				$stars = $info['Actors'];
				$img = $info['Poster'];
				     
				echo "the title is = ".$title;

				$sql = "UPDATE movie2 SET name = '$info[$title]', imdb_rating =  '$imdb_rating', release_year = '$release',  genre = '$genre', description = '$description', director = '$director', stars = '$stars', img = '$img' WHERE id = $record->id";
				$db->query($sql);	
			}
		
		}
		
	}
	
	
?>