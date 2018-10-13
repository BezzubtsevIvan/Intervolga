<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once('app/header.php');

// Получаем id страны, запись которой хотим вывести, из массива GET
$countryId = htmlspecialchars($_GET['countryId']);
if (!is_numeric($countryId)) {
	echo "<script>alert('Такой записи в таблице не существует. Вернитесь на главную страницу и попробуйте выбрать другую');</script>";
	exit();
}
// Получаем из таблицы Country запись по id страны
$country = getCountryById($countryId);
?>

<!-- Выводим данные о записи Country, взятой по id -->
<div class="card" style="background-color: #f8f9fa">
	<div class="container">
		<img align="left" src="/public/images/<?=$country['CountryName']?>.png">
		<br>
		<h1 class="text-left"><?=$country['CountryName']?></h1>
		<hr>
		<h2><?=$country['CountryCapital']?> is the capital of <?=$country['CountryName']?></h2>
	</div>
</div> 
