<?php
// Подключение к базе данных
$link = mysqli_connect('127.0.0.1', 'debian-sys-maint', 'OgTf1ubApmrB9YvM', 'Countries');
if(mysqli_connect_errno()) {
	echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
	exit();

}
?>