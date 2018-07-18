<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Post</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 	
		//inject here a handler for self-sending a POST request to avoid XSS attack!
		require_once '../db/db.php';

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//new data, except id, we dont change it
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];

			$query = "UPDATE `posts` SET `title` = '$title', `content` = '$content' WHERE `posts`.`id` = $id";
			//echo $query;
			$result = mysqli_query($link, $query);

			if ($result) {
				echo "Successfully updated";
				header('Location: ../index.php');
			}else{
				echo mysqli_error($link);
			}
		}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
			//first - fetch old data

			$id = $_GET['id'];

			$result = mysqli_query($link, "SELECT * FROM `posts` WHERE id={$id}");
			$row = $result->fetch_assoc();
		}
		//add handler for case when content was changed -> change main_content

	?>
	<div class="container">
		<div class="title">
			<h1>Here You can update post!</h1>
		</div>
		<hr>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">			
			<p>
				<label for="title">Title: </label>
				<input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">
			</p>

			<p class="id-input-hidden">
				<label for="id">Id: </label>
				<input type="text" name="id" id="id" value="<?php echo $row['id'] ?>">
			</p>

			<p>
				<label for="content">Content: </label>
				<textarea id="content" name="content"><?php echo $row['content'] ?></textarea>
			</p>
			<input type="submit" value="Update">			
		</form>

		<hr>
		<a href="../index.php">All posts</a>

	</div>
	
</body>
</html>