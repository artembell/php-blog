<?php 
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbname = "blog";

	$link = mysqli_connect($host, $user, $password, $dbname) or die("Ошибка " . mysqli_error($link));

	// function getAllPosts($){
	// 	$query = "SELECT * FROM `posts`";
	// 	$result = mysqli_query($link, $query) or die("Error ".mysqli_error($link)); 
	// }
?>