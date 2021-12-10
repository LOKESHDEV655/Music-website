<?php
	$conn=mysqli_connect("localhost","root","","wedding");
	$id=0;
	
	if(isset($_GET["id"])){
		$id=intval($_GET["id"]);
	}
	$count=0;
	$start=$id*2;
	$rs = mysqli_query($conn,"select * from marital limit $start,2");
	while($r=mysqli_fetch_array($rs)){
		$count++;
		echo $r[0]." ".$r[2]." ".$r[3]." ".$r[4]."<br><br>";
	}
	
	if($count==0){
		header("location:pagging.php");
	}
	if($id!=0){
		echo "<a href='pagging.php?id=".($id-1)."'>Previous</a> &nbsp;&nbsp;";
	}
	if($count==2){
		echo "<a href='pagging.php?id=".($id+1)."'>Next</a>";
	}
?>