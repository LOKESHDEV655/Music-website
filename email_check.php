<?php	
	include("db.php");
	if(empty($_POST["username"])){
		echo "empty";
	}
	else{
		$username = $_REQUEST["username"];		
		
		$rs = mysqli_query($conn,"select * from user where email='$username'");
		if($r=mysqli_fetch_array($rs)){
			echo "match";
		}
		else{
			echo "invalid email";
		}
	}
?>