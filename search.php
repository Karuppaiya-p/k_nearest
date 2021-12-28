<?php
	session_start();
	require("database.php");
	$output="";
	if(isset($_GET["search"]))
	{
		$search=$_GET["search"];
		$sql=$conn->query("SELECT * from datas where title like '%".$search."%' OR key_words LIKE '".$search."' OR domain LIKE '%".$search."%'");
		if($sql->num_rows>0)
		{
			while($row=$sql->fetch_assoc())
			{
				
				$output.='<div class="col-4" >
							<div class="">
							<img src="upload/'.$row["file"].'" alt="" style="width:100%">
							<div class="container">
								<h4><b>'.$row["title"].'</b></h4> 
								<p><a href="search.php?search='.$row["domain"].'">'.$row["domain"].'</a></p> 
							</div>
						</div></div>';
			}
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
		<form action = "<?php echo $_SERVER["REQUEST_URI"]; ?>" method="GET" enctype="multipart/form-data">
			<p style="text-align:center"><img src="spider.jpg" width="250px"></p>
			<input type="search" name="search" id="search" placeholder="search..." required>
			<input type="submit" name="submit" value="search" width="25px">
			<div class="row">
			<?=$output;?>
			</div>
			</div>
		</form>	
	</body>
</html>