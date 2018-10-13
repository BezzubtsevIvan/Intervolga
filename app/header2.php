<?php  
	require_once 'include/database.php';
	require_once 'include/functions.php'
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The List of Countries</title>
  </head>
  <body>
  	
  	<h1>Задание №4</h1>
  	<h2>You can add some countries in this list</h2>
  	<input type="text" placeholder="Write the name of country here..." name ="CountryValue">
  	<input type="submit" name="submitName" value="Add Country">

  	<ul class="listOfCountries">
  		<?php 
  			$countries = get_countries($link);
  			#$countries = array('Russia','Germany','USA');
  			if(count($countries)) {
  				foreach ($countries as $countryNames) {
  					echo '<li><a href="#">', $countryNames['CountryName'], '</a></li>';
  				}
  			};
  	 	?>
  	</ul>
  	<pre>
	<?php
		print_r($countries)
	?>
	</pre>
  </body>
</html>