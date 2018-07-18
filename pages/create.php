<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Post</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<?php 	
		//inject here a handler for self-sending a POST request to avoid XSS attack!
		require_once '../db/db.php';

		function trimMainContent($content){
			return substr($content, 0, 100);
		}


		$author = $content = "";

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$author = $_POST['author'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$main_content = trimMainContent($content);

			$query = "INSERT INTO `posts` (`id`, `title`, `date_published`, `date_last_changed`, `content`, `author`, `main_content`) VALUES (NULL, '$title', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$content', '$author', '$main_content')";

			echo $query;

			$result = mysqli_query($link, $query);

			if ($result) {
				echo "Successfully added to DB";
				header('Location: ../index.php');
			}else{
				echo "Error ";
			}

		}

	?>
	<div class="container">
		<div class="title">
			<h1>Here You can create a new post!</h1>
		</div>
		<hr>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<p>
				<label for="author">Your name: </label>
				<input type="text" name="author" id="author">
			</p>
			
			<p>
				<label for="title">Title: </label>
				<input type="text" name="title" id="title">
			</p>

			<p>
				<label for="content">Content: </label>
				<textarea id="content" name="content"></textarea>
			</p>

			<input type="submit" value="Create">

			
		</form>

	</div>
	
</body>
</html>