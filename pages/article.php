<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Article</title>
	<link rel="stylesheet" href="../css/style.css">

</head>
<body>
	<?php 
		$id = $_GET['id'];

		require_once '../db/db.php';
		$result = mysqli_query($link, "SELECT * FROM `posts` WHERE id={$id}");
		$row = $result->fetch_assoc();

	?>	
	<div class="container">
		<div class="article-full">
			<h1><?php echo $row['title']?></h1>
			<span class="time"><?php echo $row['date_published']?></span>, <span><a href="author.php?name=<?php echo $row['author']?>"><?php echo $row['author']?></a></span>
			<p><?php echo $row['content']?></p>
			<p>Last changed: <span class="time"><?php echo $row['date_last_changed']?></span></p>

		</div>
		<hr>
		<a href="../index.php">All posts</a>
	</div>
	
</body>
</html>