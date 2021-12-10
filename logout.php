<?php
    include("db.php");
    if(!isset($_COOKIE["login"])){
		header("location:index.php");
	}
	else{
	    $email=$_COOKIE["login"];		
	    $rs=mysqli_query($conn,"select * from user where email='$email'");
		
		if($r=mysqli_fetch_array($rs)){
							
			setcookie("login","$email",1);
			header("location:index.php");
		}
		else{
			header("location:profile.php?again=1");
		}
	}
?>