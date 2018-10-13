<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once('app/header.php');
//Получение данных из таблицы Country
$countries = getCountries($link);
?>

<body>
	<? if ($countries): ?>
	<div class="content">
		<table class="table table-sm">
			<tr class="tr-info">
				<th class="table-first">
					<p>#</pth>
				</th>
				<th>
					<p>Country</p>
				</th>
				<th>
					<p>Capital</p>
				</th>
			</tr>
  		<? foreach ($countries as $country): ?>
  			<tr>
  				<td>
  					<p><a href="/country.php?countryId=<?=$country['CountryId']?>"><?=$country['CountryId']?></a></p>
  				</td>
  				<td>
					<p><a href="/country.php?countryId=<?=$country['CountryId']?>"><?=$country['CountryName']?></a></p>
				</td>
				<td>
  					<p><a href="/country.php?countryId=<?=$country['CountryId']?>"><?=$country['CountryCapital']?></a></p>
  				</td>
			</tr>
		<? endforeach ?>
		</table>
		<form action="/newCountry.php" class="addcountryform">
			<div class="form">
				<button class="btn btn-primary" type="submit">Добавить страну</button>
			</div>
		</form>
	</div>
	<? endif ?>
</body>