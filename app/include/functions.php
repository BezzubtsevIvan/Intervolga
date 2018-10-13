<?php

// Получение всех записей из таблицы Country
function getCountries($db) {
	$sql  = 'SELECT * FROM Country';

	$result = mysqli_query($db, $sql);

	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $data;
}
// Получение записи о стране по конкретному id
function getCountryById($countryId) {
	
	global $link;

	$sql = 'SELECT * FROM Country WHERE CountryId = '.$countryId;

	$result = mysqli_query($link, $sql);

	$country = mysqli_fetch_assoc($result);

	return $country;

}

// Добавление новой записи "страны" в таблицу Country
function addNewCountry($countryName, $countryCapital) {
	global $link;

	// 1.Проверить есть ли аналогичная запись в таблице Country
	$countryQuery = "SELECT * FROM Country WHERE CountryName = '$countryName'";

	$result = mysqli_query($link, $countryQuery);

	if (!mysqli_num_rows($result)) {

		// 2.Добавить запись в таблицу Country, если страны с таким названием еще нет в таблице
		$sql = "INSERT INTO Country (CountryName,CountryCapital) VALUES ('$countryName','$countryCapital')";

		$result = mysqli_query($link,$sql);

		// 3. В зависимости от результата добавления записи вернуть статус
		if($result) {
			return 'Created';
		}

		else {
			return 'Failed';
		}

	}
	else {
		return 'Exist';
	}	
}
?>


