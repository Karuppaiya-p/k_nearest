<?php
	session_start();
	if(isset($_SESSION["username"]) && !empty($_SESSION["username"]))
	{
		header("Location: index.php");
	}
	require("database.php"); 
	$error="";
	if(isset($_POST["login"]))
	{
		$username=test_data($_POST["username"]);
		$password=$_POST["password"];
		if(!empty($username) && !empty($password))
		{
			$sql="SELECT * from user where binary username='".$username."' and password='".$password."'";
			$result=$conn->query($sql);
			if(mysqli_num_rows($result)==1)
			{
				while($row = $result->fetch_assoc()) 
				{
					$id=$row["id"];
					$username=$row["username"];
					$domain=$row["domain"];
					$password=$row["password"];
					$_SESSION["username"]=$username;
					$_SESSION["domain"]=$domain;
					if(isset($_SESSION["resturi"]) && !empty($_SESSION["resturi"]))
					{
						$resturi=$_SESSION["resturi"];
						$_SESSION["resturi"]="";
						echo "<script>location.replace('".$resturi."');</script>";
					}
					else
					{
						echo "<script>location.replace('index.php');</script>";
					}
				}
			}
			else
			{
				$error="<br><p class='bold text-danger'>Username or Password mismatch</p>";
			}
		}
		else
		{
			$error="<br><p class='bold text-danger'>Please fill empty fields</p>";
		}		
	}
	function test_data($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
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
		  <li style="float:right"><a href="signin.php">Sign In / Sign Up</a></li>
		</ul>
	<div style="margin-top:2%">
		<?=$error;?>
		<form name="addform" action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post" enctype="multipart/form-data" novalidate>
			<label for="username"><h5>Username</h5></label>
			<input type="text" name="username" id="username" placeholder="Enter your username" required>
			<label for="password" ><h5>Password</h5></label>
			<input type="password" name="password" id="password" placeholder="Enter your password" required>
			<input type="submit" name="login" value="Submit">
			<a href="signup.php">Create Account</a>
		</form>
	</div>
	</body>
</html>