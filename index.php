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
		<p style="text-align:center;"><img src="1.png"></p>
		<h3>Proposed System:</h3>
		<p style="text-align:center;text-align:justify">
Data Mining has wide applications in many areas such as banking, medicine, scientific research and among government agencies. Classification is one of the commonly used tasks in data mining applications. For the past decade, due to the rise of various privacy issues, many theoretical and practical solutions to the classification problem have been proposed under different security models. However, with the recent popularity of cloud computing, users now have the opportunity to outsource their data, in encrypted form, as well as the data mining tasks to the cloud. Since the data on the cloud is in encrypted form, existing privacy preserving classification techniques are not applicable. In this paper, we focus on solving the classification problem over encrypted data. In particular, we propose a secure k-NN classifier over encrypted data in the cloud. The proposed k-NN protocol protects the confidentiality of the data, user’s input query, and data access patterns. To the best of our knowledge, our work is the first to develop a secure k-NN classifier over encrypted data under the standard semi-honest model. Also, we empirically analyze the efficiency of our solution through various experiments.
</p>
	</body>
</html>