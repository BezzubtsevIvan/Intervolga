<?php 

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include_once('app/header.php');
?>

<form method="post">
	<div class="country-form">
		<div class="form-group">
			<h3>Добавьте новую страну</h3>	
			<input type="text" name="countryName" class="form-control" placeholder="Введите название страны..." required>
			<input type="text" name="countryCapital" class="form-control" placeholder="Введите название столицы...">
			<button type="submit" class="btn btn-success">Добавить</button>
		</div>
	</div>
</form>

<!-- Если в массиве POST есть данные, полученные из формы, выполеняем функцию добавления записи -->
<? if (isset($_POST['countryName']) && isset($_POST['countryCapital'])): ?>
	<? $insertResult = addNewCountry(htmlspecialchars($_POST['countryName']),htmlspecialchars($_POST['countryCapital'])); ?>
	<? $header = 'Location: /newCountry.php?itemCountry='.$insertResult; ?>
	<?header($header);?>
<? endif; ?>
	
<!-- В зависимости от полученного статуса добавления записи, выводим сообщение о результате -->
<!-- 1.Запись уже существует 2.Данные добавлены в таблицу 3.Ошибка при добавлении -->
<div class="status">
	<? if (isset($_GET['itemCountry'])): ?>
		<? $status = htmlspecialchars($_GET['itemCountry'])?>
		<? if ($status == 'Exist'): ?>
			<script>alert("Такая страна уже существует в таблице");</script>
			<div class="country-form">
				<div class="form-group">
					<p align="center">Такая запись уже существует, попробуйте добавить другую страну</p>
				</div>
			</div>
		<? elseif ($status == "Created"): ?>
			<script>alert("Данные добавлены в таблицу");</script>
			<div class="country-form">
				<div class="form-group">
					<p align="center">Данные добавлены в таблицу</p>
				</div>
			</div>
		<? elseif ($status == "Failed"): ?>
			<script>alert("Произошла ошибка, запись не создана");</script>
			<div class="country-form">
				<div class="form-group">
					<p align="center">При добавлении записи произошла ошибка</p>
				</div>
			</div>
		<? endif;?>
	<? endif;?>
</div>

