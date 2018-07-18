<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="title">
			<h1>Welcome all to my PHP blog!</h1>
			<h4><a href="pages/create.php">Make new post!</a></h4>	
		</div>
		
		<hr>
		<div class="posts">

			<?php
				require_once 'db/db.php';

				$query = "SELECT * FROM posts";
			 
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

				if($result)
				{
				    $rows = mysqli_num_rows($result);

				    for ($i = 0 ; $i < $rows ; ++$i)
				    {
				        $row = $result->fetch_assoc();//mysqli_fetch_row($result);
			
				        echo '<div class="article">';
				        echo "<a href='pages/article.php?id=".$row['id']."'>".$row['title']."</a>&nbsp;&nbsp;<a href='pages/update.php?id=".$row['id']."'>update</a>";
				        echo "<p>".$row['date_published']."</p>";
				        echo "<p>".$row['main_content']."</p>";
				        echo "</div>";
					}
				    
				     
				    mysqli_free_result($result);
				}

				mysqli_close($link);
			?>

		</div>
	</div>
	
</body>
</html>