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
<div class="row">
							<div class="col-sm-12" style="margin-top: 50px">
								<h1>All Albums:</h1>
							</div>							
							<div class="col-sm-12" id="record">								
								<div class="row">
									<?php
										while($r=mysqli_fetch_array($rs)){								
									?>
									<div class="col-sm-3">
										<table class="table table-borderless w3-card w3-hover-shadow">
											<tr><td><a href="song.php?album_code=<?=$r[1]?>"><img src="album/<?=$r["code"]?>.jpg" class="img-fluid card-img-top" style="height:200px"></a></td></tr>
											<tr><td><?=$r["album"]?> <i class="fa fa-heart" style="float: right"></i><br><?=$r["description"]?></td></tr>
										</table>
									</div>
									<?php
										}								
									?>
								</div>									
							</div>	
							<div class="col-sm-12" style="margin-top: 30px">
								<?php
									$num=0;
									
								?>
								<button class="showmore" id="pre" rel='<?=$num-1?>'>Previous</button>
								<button class="showmore" style="float: right" id="next" rel="<?=$num+1?>">Next</button>
							</div>
						</div>