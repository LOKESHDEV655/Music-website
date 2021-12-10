<?php	
	include("db.php");
	$category_code = $_REQUEST["category_code"];
	
	
	$rs = mysqli_query($conn,"select * from album where status=0 AND category_code='$category_code' limit 0,4");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Albums</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://use.fontawesome.com/09901d9403.js"></script>	
	
 <script>
	$(document).ready(function(){		
		$("#login_btn").click(function(){
			var username = $("#username").val();
			var password = $("#password").val();
			
			$.post(
				"login.php",{username:username,password:password},function(data){					
					if(data=="success"){
						window.location.href="album.php?category_code=<?=$category_code?>";
					}
					else{
						alert("Wrong password");	
					}					
				}
			);
		});
	});	
	 
	$(document).on("click",".showmore",function(){
		var pre = $("#pre").attr("rel");
		var next = $("#next").attr("rel");
		alert(pre+" "+next);
		
	});
</script>
	
  <style>
	#sidenav {
	  height: 100%;	 
	  position: fixed;
	  z-index: 1;
	  top: 0;
	  left: 0;
	  background-color: #000F38;
	  overflow-x: hidden;
	  padding-top: 20px;
	}

	#sidenav a {
	  padding: 6px 8px 6px 16px;
	  text-decoration: none;
	  font-size: 20px;
	  color:#9DAA1C;
	  display: block;
	}

	#sidenav a:hover {
	  color: #f1f1f1;
	}
	
	#sidenav b {	  
	  font-size: 30px;
	  color:#9DAA1C;
	 
	}
	  
	.showmore{
		cursor: pointer;
		
		background-color: #000F38;
		border: 2px solid #9DAA1C;
		color:#9DAA1C;
		border-radius: 20px;
		padding: 0.2rem 1rem!important;
		line-height: 30px;
	}
	.showmore:hover{
		background-color:#9DAA1C;
		color: white;
		border: 3px solid #000F38;
	}
	  
	#main-block {
	  margin-left: 260px; /* Same as the width of the sidenav */	  
	  padding: 0px 10px;
	}

	@media screen and (max-height: 450px) {
	  #sidenav {padding-top: 15px;}
	  #sidenav a {font-size: 18px;}
	}
  </style>
</head>
<body>
	<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		  aria-hidden="true">

		  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
		<div class="modal-dialog modal-dialog-centered modal-notify modal-info" role="document">
		<div class="modal-content">
			  <div class="modal-header" style="background: #0A93B1">
				<h4 class="modal-title" style="color: white;font-size: 30px">Log In</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true" style="color: white">&times;</span>
        		</button>
			  </div>
			  <div class="modal-body">
				<label style="font-size: 20px">Username:</label>
				<input type="text" class="form-control w3-border-cyan" placeholder="Email-Id" name="username" id="username"/>
				  <br>
				<label style="font-size: 20px">Password:</label>
				<input type="password" class="form-control w3-border-cyan" placeholder="Password" name="password" id="password"/>
				  <br>				
			  </div>
			  <div class="modal-footer justify-content-center">
				<button name="login_btn" class="btn btn-info" id="login_btn">Log In</button>
				<button type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Close</button>		
			  </div>
			</div>
		  </div>
		</div>
	<!-- End Modal -->
	
	<div class="container-fluid">
		<div class="row">
			<!--left sidebar-->
			<div class="col-sm-2" id="sidenav">
				<table class="table table-borderless">
					<tr><td><img src="dev music.png" style="width: 100px;height: 100px;margin-left: 20px" class="img-fluid rounded-circle"></td></tr>
					<tr><td align="center">	<b>Dev Music</b></td></tr>
				</table>
				<table class="table table-borderless">
					<tr><td><a href="index.php">Home</a></td></tr>	
					
					<tr><td><a href="#">Music</a></td></tr>
					<tr><td><a href="#">Liked Songs</a></td></tr>
				</table>
			</div>
			<!--End left sidebar-->
			<!--main block-->
			<div class="col-sm-10" id="main-block" style="background-color: antiquewhite;padding-bottom: 50px">
				<div class="row">
					<!--Nav bar-->
					<?php
						include("navbar.php");
					?>
					<!--End nav bar-->
					<!--content-->					
					<div class="col-sm-12">						
						<!--albums-->
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
						<!--end albums-->
					</div>
					<!--End content-->
				</div>
			</div>
			<!--end main block-->
		</div>
	</div>


</body>
</html>