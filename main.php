<?php 
	require('dbConnect.php');
?>

<!DOCTYPE html>
<html>
<title>Movie Spot</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/style.css?version=1">
<link rel="stylesheet" href="CSS/main.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 

<!--nadir-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--nadir-->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="/jQuery/sample1.js"> </script> 
 
<script>
			$(document).ready(function(){
				
				var isHidden = true; //hidden state of all custom-p
				var rm_var = $("#recommended_movies"); //recommended movies div
				var title, image, plot, director, stars,genre, release_year, imdb_rating;
				
				$(".custom-p").hide();
				rm_var.hide();
				$("#show").click(function(){
					if(isHidden == false){
						isHidden = true;
						$(".custom-p").fadeOut();
					}
					else if(isHidden == true){
						$("#show").html = "Hide";
						$(".custom-p").fadeIn();
						$(".custom-p").show();
						isHidden = false;
					}
				});
				function callToHide(){
					rm_var.show();
				}
				
				//set the values of the vars when a particular movie is clicked
				function setValues(){
					title = "";
				}
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
      <!--<a href="#contact" class="w3-left ">Search</a>-->

			<form class="navbar-form navbar-left" role="search" action="main.php" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="any" size="15" placeholder="Search . . .">
		<input type="submit" name="f_sub" value="Go">
    </div>
    <!--<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>-->
</form>

	</li>
  </ul>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide " style="max-width:1500px;" id="home">
  <!--<img class="w3-image" src="Images/movieSpotBG.png" alt="Architecture" width="1500" height="800"> -->
  <!-- <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>BR</b></span> <span class="w3-hide-small w3-text-light-grey">Architects</span></h1>
  </div> -->
</header>




<!--nadir-->
<div class="parallax-top">
<div class="container ">
  <h2>Moives You Like</h2>  
  <div id="myCarousel" class="carousel slide " data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="Images/7SAM.jpg" alt="Los Angeles" style="width:1900px;height:500px">
      </div>

      <div class="item">
        <img src="Images/deadpool.jpg" alt="Chicago" style="width:1900px;height:500px">
      </div>

       <div class="item">
        <img src="Images/avataar-759.jpg" alt="Chicago" style="width:1900px;height:500px">
      </div>

    
      <div class="item">
        <img src="Images/the-good-the-bad-and-the-ugly.jpg" alt="New york" style="width:1900px;height:500px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>

 <!--nadir-->










<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
	<?php 
		if (isset($_POST['f_sub'])) { //to check if the form was submitted
			$search = $_POST['any'];
			?><h1><?php echo $search;?></h1><?php
		} 
	?>
  </div>
 
 
 
 <?php
	if (isset($_POST['f_sub'])){ 
		$search_name = $db->query("SELECT * FROM movie2 WHERE name LIKE '%$search%' OR genre LIKE '%$search%'
							  ORDER BY imdb_rating   DESC  
							  LIMIT 10");
		if($search_name->num_rows){
				while($row2 = $search_name->fetch_object()){
					$record2[] = $row2;
				}
		}?>
		<div class="w3-content w3-padding" style="max-width:1564px">
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
							
						</tr>
						</thead><?php
	}?>
		
							
							
			<?php $ct = 0;
		if (isset($_POST['f_sub'])){ 
			foreach($record2 as $mov2){
				$ct++;
				?>
							<tbody>
								<tr>
									<td><b><?php
									echo $ct;?><b></td>
								
									<td><?php
									echo $mov2->name?></td>
							
									<td><b><?php
									echo $mov2->imdb_rating?><b></td>
									<td>
									<?php echo $mov2->genre.'<br/>'?></div>
											
										</div>
									</div>
									</td>
								</tr>
							</tbody><?php
			}
		}
			
			?>
					</table>
					
				</div>
			</div>
		</div>
		
		<h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Genres</h3>
	
	</div>
		
		
  <div class="w3-row-padding ">
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
		$count++;
		if($count > 4)
			break;
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
			  <p class="specialP"><button class="w3-btn-block" style="background-color:#313a3a" id="show"><b>Read More</b> </button></p>
			</div>
	<?php
	}
   ?>
	
  </div>

<!--Recommended section  -->
 <div id="recommended_movies" class="custom-font-class" style="background-color:#313a3a;color:white;padding:20px;">
 			    <br>
 			    <br>
 			    <h2 id="pm_title">Movie Name</h2>
				<br>
				<br>
				<div class="custom-font-class" style="background-color:#657272;color:white;padding:20px;">
					<img id="pm_image" src="Images/mov.jpg" alt="Mountain View" style="width:304px;height:228px;">
				</div>
				<br>
 			    <br>
 			    <br>
 			    <br>
  				<p id="plot">Plot : London is the capital city of England. It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.</p>
  				<p id="director"> Director: xyz </p>
  				<p id="stars"> Stars: xyz </p>
  				<p id="genre"> Genre: xyz </p>
  				<p id="release_year"> Release Year: xyz </p>
  				<p id="imdb_rating"> IMDB Rating: xyz </p>
  				<br>
 			    <br>
 			     <h2>Recommended Movies</h2>
 			    <div style="width: 50%;">
 					<div style="background-color:#657272;color:white;">
 						
 						<table>
 						<tbody>
						    <tr>
						        <td>
						  <div class="imgContainer">
						            <div>
						                <img src="Images/gum.jpg"  style="float: left;  margin-left: 1%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px;"/>
						            </div>
						            <div class="imgButton">
						                <button value="test">test</button>
						            </div>
						     </div>
						        </td>
						        <td>
						  <div class="imgContainer">
						            <div>
						                <img src="Images/gum.jpg"  style="float: left;  margin-left: .5%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px;"/>
						            </div>
						            <div class="imgButton">
						                <button value="test">test</button>
						            </div>
						     </div>
						        </td>
						  <td>
						  <div class="imgContainer">
						            <div>
						                <img src="Images/gum.jpg"  style="float: left; margin-left: .5%; margin-right: 1%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px;"/>
						            </div>
						            <div class="imgButton">
						                <button value="test">test</button>
						            </div>
						     </div>
						        </td>
						    </tr>
						    <tr>
						        <td>
						  <div class="imgContainer">
						            <div>
						                <img src="Images/gum.jpg"  style="float: left;  margin-left: 1%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px;"/>
						            </div>
						            <div class="imgButton">
						                <button value="test">test</button>
						            </div>
						     </div>
						        </td>
						        <td>
						  <div class="imgContainer">
						            <div>
						                <img src="Images/gum.jpg"  style="float: left;  margin-left: .5%; margin-right: .5%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px;"/>
						            </div>
						            <div class="imgButton">
						                <button value="test">test</button>
						            </div>
						     </div>
						        </td>
						  <td>
						  <div class="imgContainer">
						            <div>
						                <img src="Images/gum.jpg"  style="float: left; margin-left: .5%; margin-right: 1%; margin-bottom: 0.5em;margin-top: 1.0em; padding: 3px;"/>
						            </div>
						            <div class="imgButton">
						                <button value="test" >test</button>
						            </div>
						     </div>
						        </td>
						    </tr>
						</tbody>    
						</table>

		 
						    
					</div>
						    
		 		</div>

		</div>


  <!-- Contact Section -->
 <div class="w3-container w3-padding-32 parallax-we" id="contact">
	<!--<h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Contact</h3>-->
	 <br>
 			    <br> <br>
 			    <br>
     <div style="opacity: 0.5;"><pre> <h2>People Behind This Project... </h2></pre></div>
              <br> 
              <br>
     <h3><font color="white">Jamil Ahmed</font></h3>  
      <br>  
      <h3><font color="white">Ragib Ishraq</font></h3>  
       <br>
       <h3><font color="white">Ashraf Uddin Tafadar</font></h3>  

   <!-- <form action="form.asp" target="_blank">
      <input class="w3-input" type="text" placeholder="Name" required name="Name">
      <input class="w3-input w3-section" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section" type="text" placeholder="Subject" required name="Subject">
      <input class="w3-input w3-section" type="text" placeholder="Comment" required name="Comment">
      <button class="w3-btn w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>-->
 </div>
<!-- End page content -->
</div>

<!-- Google Map -->
<div id="googleMap" class="w3-grayscale" style="width:100%;"></div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
<!--
To use this code on your website, get a free API key from Google.
Read more at: http://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

