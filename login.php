<?php	
	include("db.php");
	if(empty($_POST["username"]) || empty($_POST["password"])){
		echo "empty";
	}
	else{
		$username = $_REQUEST["username"];
		$password = $_REQUEST["password"];
		
		$rs = mysqli_query($conn,"select * from user where email='$username'");
		if($r=mysqli_fetch_array($rs)){
			if($r["password"]==$password){
				setcookie("login",$username,time()+3600*24);
				$_SESSION[$username]=$password;
				echo "success";
			}
			else{
				echo "failed";
			}
		}
	}
?>