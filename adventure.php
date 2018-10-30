<?php 
	require('dbConnect.php');	
	$default = true; // to detect the sorting criteria
	$tmp[0] = rand(0,70); 
	$tmp[1] = rand(0, 70);
	$tmp[2] = rand(0, 70);
	$tmp[3] = rand(0, 70);

	function sortBy($sampleString){
		$sql="SELECT * FROM movie ORDER BY imdb_rating WHERE genre LIKE '%$sampleString%' DESC LIMIT 10";
		$sortResult = $db->query($sql);
		return $sortResult;
	}
	
	if(isset($_GET['Action'])){
		$result = sortBy("Action");
		$default = false;
		echo '<h1>action clicked</h1>';
	}
?>

<!DOCTYPE html>
<html>
<title>Movie Spot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/style.css?version=2">
<link rel="stylesheet" href="CSS/main.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
		$(document).ready(function() {
			
			var clickedOnRow = false;
			var rm = $("#recommended_movies");
						
			if(clickedOnRow){
				
			}
			var isHidden = true; //hidden state of all custom-p
			$(".custom-p").hide();
			
			$("#show").click(function(){
					if(isHidden == false){
						isHidden = true;
						$(".custom-p").fadeOut();
						//$(".custom-p").hide();
						$("#show").text("Read More");
					}
					else if(isHidden == true){
						$("#show").text("Hide");
						$(".custom-p").fadeIn();
						$(".custom-p").show();
						isHidden = false;
					}
				});
			
			$(".clickable-row").click(function(){
				var str = $(this).find('p').eq(1).text();
				
				rm.find("#pm_title").text(str);
				str = "Description   :   " + $(this).find('p').eq(3).text();
				rm.find("#plot").text(str);
				str = "Director   :   " + $(this).find('p').eq(4).text();
				rm.find("#director").text(str);
				str = "Stars   :   " + $(this).find('p').eq(5).text();
				rm.find("#stars").text(str);
				str = "Genre   :   " + $(this).find('p').eq(6).text();
				rm.find("#genre").text(str);
				str = "Release Year   :   " + $(this).find('p').eq(7).text();
				rm.find("#release_year").text(str);
				str = "IMDB Rating   :   " + $(this).find('p').eq(8).text();
				rm.find("#imdb_rating").text(str);
			});
		});
</script>


<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="main.php" class="w3-margin-left">Find Your Perfect <b>Movie</b></a>
    </li>
    <!-- Float links to the right. Hide them on small screens -->
    <li class="w3-right w3-hide-small">
      <a href="top10.php" class="w3-left">Top 10</a>
      <a href="#about" class="w3-left">Popular</a>
     <!-- <a href="#contact" class="w3-left w3-margin-right">Search</a>  -->
    </li>
  </ul>
</div>

<!-- Header -->
<div class="parallax">
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
	
  <!-- <img class="w3-image" src="Images/movieSpotBG.png" alt="Architecture" width="1500" height="800"> -->

  <!-- <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>BR</b></span> <span class="w3-hide-small w3-text-light-grey">Architects</span></h1>
  </div> -->
</header>
  </div>

<!-- Page content -->
	<?php
		if($default){
			?>
				<div class="w3-content w3-padding" style="max-width:1564px" id="sorted">

				  <!-- sorted section -->
				  <?php
				  $result = $db->query("SELECT * FROM movie2 ORDER BY imdb_rating DESC");
				  while($row2 = $result->fetch_object()){
								$record[] = $row2;
							}
				  $result2 = $db->query("SELECT * FROM movie2 WHERE genre LIKE '%Adventure%' ORDER BY imdb_rating DESC");
				 /* echo $result->num_rows ; */
					if($result2->num_rows){	
							while($row = $result2->fetch_object()){
								$record2[] = $row;
							}
						}
						$count = 0;?>
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<table class="table table-striped table-hover">
									<thead>
									<tr class="active">
										
											<th><b>No.<b></th>
											
									
											<th><b>Name<b></th>
									
											<th><b>IMDB Rating<b></th>
									
											<th><b>Genre<b></th>
											<th><b>Image<b></th>
										
									</tr>
									</thead>	<?php
									foreach($record2 as $mov){
										$count++;
									?>
									<tbody class="clickable-row">
										<tr  id = "uniqueRow" onclick="window.document.location = '#recommended_movies';">
											
											<td><b><?php
												echo $count;?><b></td>
											<td>
												<div id="hiddenDiv" style="display:none">
													<p><?php echo $count; ?> </p>
													<p><?php echo $mov->name; ?> </p>
													<p><?php echo $mov->img; ?> </p>
													<p><?php echo $mov->description; ?> </p>
													<p><?php echo $mov->director; ?> </p>
													<p><?php echo $mov->stars; ?> </p>
													<p><?php echo $mov->genre; ?> </p>
													<p><?php echo $mov->release_year; ?> </p>
													<p><?php echo $mov->imdb_rating; ?> </p>
												</div>
											</td>
											<td><?php
												echo $mov->name?></td>
									
											<td><b><?php
												echo $mov->imdb_rating?><b></td>
											<td>
												<?php echo $mov->genre.'<br/>'?>
											</td>
											<td>
												<img src="<?php echo $mov->img; ?>" width="50px" height="70px">
											</td>
										</tr>
									</tbody>
									<?php
									}?>
								</table>
							</div>					
						</div>
					</div>
				</div>
			<?php
		}
	else{
			?>
			<div class="w3-content w3-padding" style="max-width:1564px" id="sorted">

				  <!-- sorted section -->
				  <?php
					if($result->num_rows){	
							while($row = $result->fetch_object()){
								$record[] = $row;
							}
						}
						$count = 0;?>
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<table class="table table-striped">
									<thead>
									<tr class="active">
										
											<th><b>No.<b></th>
											
									
											<th><b>Name<b></th>
									
											<th><b>IMDB Rating<b></th>
									
											<th><b>Genre<b></th>
											
											<th><b>Image<b></th>
										
									</tr>
									</thead>	<?php
									foreach($record as $mov){
										$count++;
									?>
									<tr>
									
									<tbody>
										<td><b><?php
										echo $count;?><b></td>
									
										<td><?php

										echo $mov->name?></td>
								
										<td><b><?php
										echo $mov->imdb_rating?><b></td>
										<td>
										
										<td><img src="<?php
										echo $mov->img; ?>" width=10% height=10%></td>
										<td>
									<?php echo $mov->genre.'<br/>'?>
							</div>
												
						</div>
					</div>
										</td>
									</tr>
									</tbody>
					<?php

					}?>
					</table>

				</div>
			
			<?php
		
	}
			?>
	
	
  <div class="w3-container w3-padding-32" id="projects">
  </div>

  <!-- particular Movies Section -->
  <div id="recommended_movies" class="custom-font-class parallax" style="background-color:#313a3a;color:white;padding:20px;">
				<?php
					$t1[0] = $record[array_rand($record)];
					$t1[1] = $record[array_rand($record)];
					$t1[2] = $record[array_rand($record)];
					$t1[3] = $record[array_rand($record)];
					$t1[4] = $record[array_rand($record)];
					$t1[5] = $record[array_rand($record)];
				?>
				<br>
 			    <br>
 			    <h2 id="pm_title">Movie Name</h2>
				<br>
				<br>
				<div class="custom-font-class" style="background-color:#000000;color:white; width:344px;padding:20px;">
					<img id="pm_image" src="Images/mov.jpg" alt="Mountain View" style="width:304px;height:228px;">
				</div>
				<br>
 			    <br>
 			    <br>
 			    <br>
  				<p id="plot">Plot : While not intelligent, Forrest Gump has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him.</p>
  				<p id="director"> Director: Robert Zemeckis</p>
  				<p id="stars"> Stars: Tom Hanks, Robin Wright, Gary Sinise </p>
  				<p id="genre"> Genre: Comedy, Drama, Romance </p>
  				<p id="release_year"> Release Year: 1994 </p>
  				<p id="imdb_rating"> IMDB Rating: 8.8 </p>
  				<br>
 			    <br>
 			     <h2>Recommended Movies</h2>
 			    <div style="width: 50%;">
 					<div style="background-color:#000000;color:white;">
 						
 						<table>
 						<tbody>
						    <tr>
						        <td>
						  <div class="imgContainer">
						            <div>
										<img src="<?php echo $t1[0]->img; ?>"  style="float: left;  margin-left: 1%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px; width=100%" />
						            </div>
						            <div class="imgButton">
										<button value="test" style="background-color: #0e1726;color:white;"><?php echo $t1[0]->name; ?></button>
						            </div>
						     </div>
						        </td>
						        <td>
						  <div class="imgContainer">
						            <div>
										<img src="<?php echo $t1[1]->img; ?> "  style="float: left;  margin-left: .5%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px; width=100%"/>
						            </div>
						            <div class="imgButton">
						                <button value="test" style="background-color: #0e1726;color:white;"><?php echo $t1[1]->name; ?></button>
						            </div>
						     </div>
						        </td>
						  <td>
						  <div class="imgContainer">
						            <div>
						                <img src="<?php echo $t1[2]->img; ?>"  style="float: left; margin-left: .5%; margin-right: 1%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px; width=100%"/>
						            </div>
						            <div class="imgButton">
						                <button value="test" style="background-color: #0e1726;color:white;"><?php echo $t1[2]->name; ?></button>
						            </div>
						     </div>
						        </td>
						    </tr>
						    <tr>
						        <td>
						  <div class="imgContainer">
						            <div>
						                <img src="<?php echo $t1[3]->img; ?>"   style="float: left;  margin-left: 1%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px; width=100%"/>
						            </div>
						            <div class="imgButton">
						                <button value="test" style="background-color: #0e1726;color:white;"><?php echo $t1[3]->name; ?></button>
						            </div>
						     </div>
						        </td>
						        <td>
						  <div class="imgContainer">
						            <div>
						                <img src="<?php echo $t1[4]->img; ?>"   style="float: left;  margin-left: .5%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px; width=100%"/>
						            </div>
						            <div class="imgButton">
						                <button value="test" style="background-color: #0e1726;color:white;"><?php echo $t1[4]->name; ?></button>
						            </div>
						     </div>
						        </td>
						  <td>
						  <div class="imgContainer">
						            <div>
										<img src="<?php echo $t1[5]->img; ?>"   style="float: left; margin-left: .5%; margin-right: 1%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px; width=100% "/>
						            </div>
						            <div class="imgButton">
						                <button value="test" style="background-color: #0e1726;color:white;"><?php echo $t1[5]->name; ?></button>
						            </div>
						     </div>
						        </td>
						    </tr>
						</tbody>    
						</table>

		 
						    
					</div>
						    
		 		</div>

		</div>
  
  
  <br>
  <br>
  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
			<a href="action.php">Action</a>
		</div>
        <img src="/w3images/house5.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="sci_fi.php">Sci-Fi</a>
		</div>
        <img src="/w3images/house2.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="adventure.php">Adventure</a>
		</div>
        <img src="/w3images/house3.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="comedy.php">Comedy</a>
		</div>
        <img src="/w3images/house4.jpg" alt="House" style="width:100%">
      </div>
    </div>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="drama.php">Drama</a>
		</div>
        <img src="/w3images/house2.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="biography.php">Biography</a>
		</div>
        <img src="/w3images/house5.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="crime.php">Crime</a>
		</div>
        <img src="/w3images/house4.jpg" alt="House" style="width:99%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">
		<a href="western.php">Western</a>
		</div>
        <img src="/w3images/house3.jpg" alt="House" style="width:99%">
      </div>
    </div>
  </div>

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Popular</h3>
  </div>
	
  <div class="w3-row-padding w3-grayscale">
   <?php
	$count = 0;
	$c2 = -1;
   $record = [];
   
   //take the whole table . . .
	if($result = $db->query("SELECT * FROM movie2 ORDER BY imdb_rating DESC")){
		if($result->num_rows){
			while($row = $result->fetch_object()){
				$record[] = $row;
			}
		}
	}
	
	//Movie Preview
	foreach($record as $movie)
	{	
		$c2++;
		$count++;
		if($count > 4)
			break;
		$movie = $record[$tmp[$c2]];
		?>
		<div class="w3-col l3 m6 w3-margin-bottom" id="popularMovieParentDiv" style="margin-left:auto; margin-right:0">
			<div class="container-custom">
				<img src="<?php echo $movie->img; ?>"  width="100%" height="480">
				<div class="overlay-custom">
	  			</div>
			</div>
			<h3><b><?php echo $movie->name; ?></b></h3>
			  <p class="w3-opacity"> <?php echo "".$movie->genre; ?></p>
			  <p class="w3-border-bottom w3-border-dark-grey"></p>
			  <p>
				<?php
					$description = substr($movie->description, 0, 100). "<b>    . . .   </b>";
					echo $description;
				?>
			  </p>
			  <p class="custom-p">
				<?php
					$description = $movie->director;
					echo "<b>Director  :  </b>".$description;
				?>
			  <p>
			  <p class="custom-p">
				<?php
					$description = $movie->stars;
					echo "<b>Cast & Crew  :  </b>".$description;
				?>
			  </p>
			  <p class="custom-p">
				<?php
					$description = $movie->release_year;
					echo "<b>Release Year  :  </b>".$description;
				?>
			  </p>
			  <p class="specialP"><button class="w3-btn-block " style="background-color:#313a3a" id="show"><b>Read More</b> </button></p>
			</div>
	<?php
	}
   ?>
	
  </div>



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: http://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

