<?php
	include("db.php");
	if(isset($_REQUEST["num"]) && isset($_REQUEST["album_code"])){
		$num = $_REQUEST["num"];
		$album_code = $_REQUEST["album_code"];
		$start = $num*4;
		
		$rs=mysqli_query($conn,"select * from song where status=0 AND album_code='$album_code' limit $start,4");
		while($r=mysqli_fetch_array($rs)){
			$sn = $r["sn"];
		?>
			<div class="col-sm-12">
				<table class="table table-borderless w3-hover-shadow">
					<tr class="song" rel="<?=$r["sn"]?>">
						<th style="width: 100px"><?=$sn?>.</th>
						<th style="width: 400px"><?=$r["song_title"]?></th>
						<td style="width: 200px"><?=$r["description"]?></td>
						<td><i class="fa fa-heart" style="float: right"></i></td
					</tr>											
				</table>
			</div>
	<?php
		}	
		
	}
?>