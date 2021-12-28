<?php
	session_start();
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
		<p style="text-align:center;"><img src="data-mining.png" width="250px"></p>
		<h3>Usage of this System:</h3>
		<p style="text-align:center;text-align:justify">
		RECENTLY, the cloud computing paradigm [1] is revolutionizing the organizations’ way of operating their data particularly in the way they store, access and process data. As an emerging computing paradigm, cloud computing attracts many organizations to consider seriously regarding cloud potential in terms of its cost-efﬁciency, ﬂexibility, and ofﬂoad of administrative overhead. Most often, organizations delegate their computational operations in addition to their data to the cloud. Despite tremendous advantages that the cloud offers, privacy and security issues in the cloud are preventing companies to utilize those advantages. When data are highly sensitive, the data need to be encrypted before outsourcing to the cloud. However, when data are encrypted,irrespectiveoftheunderlyingencryptionscheme, performing any data mining tasks becomes very challenging without ever decrypting the data. There are other privacy concerns,demonstratedbythefollowing example.
		</p>
	</body>
</html>