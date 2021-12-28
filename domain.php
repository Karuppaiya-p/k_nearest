<?php
	session_start();
	if(!isset($_SESSION["username"]) && !isset($_SESSION["username"]))
	{
		$_SESSION["resturi"]=$_SERVER["REQUEST_URI"];
		die(header('Location: signin.php'));
	}
	else
	{
		$_SESSION["resturi"]="";
	}
	require("database.php");
	$out="";
	if(isset($_POST["send"]))
	{
		if(is_uploaded_file($_FILES['Filedata']['tmp_name']))
		{
			$username=$_SESSION["username"];
			$title=$_POST["title"];
			$domain=$_SESSION["domain"];
			$key_words=$_POST["key_words"].",".$domain;
			$uploadDir ="upload/";
			$file_ext=pathinfo($_FILES['Filedata']['name'], PATHINFO_EXTENSION);
				$filename=md5(uniqid()).".".$file_ext;
				$tempFile   = $_FILES['Filedata']['tmp_name'];
				$targetFile = $uploadDir.$filename;
				move_uploaded_file($tempFile, $targetFile);
				if($conn->query("insert into datas (`f_username`,`domain`,`file`,`title`,`key_words`)VALUES('$username','$domain','$filename','$title','$key_words')"))
				{
					echo "<script>location.replace('search.php');</script>";
				}
				else
				{
					echo $conn->error;
				}
		}
		else
		{
			$out="*Please give all inputs";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>K-Nearest</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<ul>
		  <li><a href="index.php" class="button">Proposal</a></li>
		  <li><a href="about.php">Content</a></li>
		  <li><a href="domain.php">Public</a></li>
		  <li><a href="search.php">Nearest Search</a></li>
		   <?php if(!isset($_SESSION["username"]))
		  {
			  echo '<li style="float:right"><a href="signin.php">Sign In / Sign Up</a></li>';
		  }
		  else
		  {
			  echo '<li style="float:right"><a href="signout.php">Sign Out</a></li>';
		  }
		  ?>
		</ul>
		<h1 style="text-align:center;color:">K-NEAREST NEIGHBOR CLASSIFICATION OVER SEMENTICALLY SECURE ENCRYPTED RELATIONAL DATA</h1>
		<div style='margin-top:2%'>
			<?=$out?>
			 <form action = "<?php echo $_SERVER["REQUEST_URI"]; ?>" method="POST" enctype="multipart/form-data">
			 <h3 style="text-align:center;color:red">Upload your file on cloud. And you can search the file at nearest location. </h3>
				<h4 style="text-align:center;">You are logined as <?=$_SESSION["domain"]?></h4>
				<label for="title"><h5>Title</h5></label>
				<input type="text" name="title" id="title" placeholder="Enter your title" required>
				<label for="key_words"><h5>Key words</h5></label>
				<input type="text" name="key_words" id="key_words" placeholder="Enter your key_words comma seperate" required>
				Browse File<input type="file" name="Filedata" accept="image/*"/>
				<input type="submit" name="send" value="upload">
			</form>
		</div>
	</body>
</html>