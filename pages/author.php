<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Author</title>
	<link rel="stylesheet" href="../css/style.css">

</head>
<body>
	<?php 
		$name = $_GET['name'];
		//echo $name;

		require_once '../db/db.php';
		$result = mysqli_query($link, "SELECT * FROM `posts` WHERE author='{$name}'");

	?>	
	<div class="container">
		<h1>All posts of publisher: <u><?php echo $name ?></u></h1>
		<hr>
		<div class="posts">
		<?php 
			while($row = $result->fetch_assoc()) {

				echo '<div class="article">';
		        echo "<a href='article.php?id=".$row['id']."'>".$row['title']."</a>";
		        echo "<p>".$row['date_published']."</p>";
		        echo "<p>".$row['main_content']."</p>";
		        echo "</div>";
			}
		?>
		</div>
		<hr>
		<a href="../index.php">All posts</a>
	</div>
	
</body>
</html>