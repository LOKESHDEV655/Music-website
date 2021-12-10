<?php	
	include("db.php");
	$rs = mysqli_query($conn,"select * from album_category");
	
?>
<!DOCTYPE html>
<html lang="en"><head>
  <title>Dev Music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
  
  <!--<link rel="stylesheet" href="mdb.min.css" />-->
  <link rel="stylesheet" href="index.css">	
  <link rel="stylesheet" href="slick.css"> 
	
    <!--<script type="text/javascript" src="mdb.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
    <script src="https://use.fontawesome.com/09901d9403.js"></script>
	<script type="text/javascript" src="slick.min.js"></script>
	<script src="custom.js"></script>
	
  <script>
	$(document).ready(function(){		
		$("#login_btn").click(function(){
			var username = $("#username").val();
			var password = $("#password").val();			
			$.post(
				"login.php",{username:username,password:password},function(data){					
					if(data=="success"){						
						$("#spin").html("<div class='spinner-border text-success'></div>");
						setTimeout(function(){
							window.location.href="index.php";
						},1000);									
					}
					else{
						alert("Wrong password");	
					}					
				}
			);
		});
		$("#username").on("keypress blur",function(){
			var username = $(this).val();			
			$.post(
				"email_check.php",{username:username},function(data){									
					if(data=="match"){
						$("#msg").html("<p style='color:green'>Email exist</p>");
					}
					else{
						$("#msg").html("<p style='color:red'>Email doesn't exist</p>");	
					}					
				}
			);
		});
	});
	
</script>

<style>
.left_arrow{
	position: absolute;
	top: 40%;
	font-size: 20px;
	left: -7px;
	height: 35px;
	width: 35px;
	background: #000F38;
	color:#9DAA1C;
	border-radius: 50%;
	z-index: 99;
	text-align: center;
	line-height: 1.3;
	border: 3px solid #fff;
	cursor: pointer;
	transform: .3s;
}
.left_arrow:hover{
	background: #9DAA1C;
	color: #000F38;
	border-color: #9DAA1C;
}
	
.right_arrow{
	position: absolute;
	top: 40%;
	font-size: 20px;
	right: -7px;
	height: 35px;
	width: 35px;
	background: #000F38;
	color:#9DAA1C;
	border-radius: 50%;
	z-index: 99;
	text-align: center;
	line-height: 1.3;
	border: 3px solid #fff;
	cursor: pointer;
	transform: .3s;
}
.right_arrow:hover{
	background: #9DAA1C;
	color: #000F38;
	border-color: #9DAA1C;
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
				<span id="msg"></span>
				<label style="font-size: 20px">Username:</label>				
				<input type="text" class="form-control w3-border-cyan" placeholder="Email-Id" name="username" id="username"/>
				  <br>				
				<label style="font-size: 20px">Password:</label>
				<input type="password" class="form-control w3-border-cyan" placeholder="Password" name="password" id="password"/>
				  <br>				
			  </div>
			  <div class="modal-footer justify-content-center">
				<div id="spin"></div><button name="login_btn" class="btn btn-info" id="login_btn">Log In</button>
				<button type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Close</button>		
			  </div>
			</div>
		  </div>
		</div>
	<!-- End Modal -->
	
	<!--Navbar-->
	<?php
		include("navbar.php");
	?>
	
	
	<!-- sample   2-->		
		
			<?php
				while($r=mysqli_fetch_array($rs)){
					$rs1 = mysqli_query($conn,"select * from album where category_code='$r[1]'");			
			?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 w3-card-2" style="background-color: azure;margin-top: 50px">
						<h2><?=$r["category_name"]?><span id="see"><a href="album.php?category_code=<?=$r[1]?>">See All</a></span></h2>
					</div>
				</div>
			</div>
			<div class="container-fluid" style="margin-top: 50px">
				<div class="row slider">
				
				<?php
					while($r1=mysqli_fetch_array($rs1)){
				?>
					<div class="col-sm-12 w3-hover-shadow">
						<a href="song.php?album_code=<?=$r1[1]?>">
							<img src="album/<?=$r1["code"]?>.jpg" class="img-fluid" style="height: 250px;width: 350px;cursor: pointer">
						</a>
						<h4 style="color: #0D74A8"><?=$r1["album"]?></h4>
						<p><?=$r1["description"]?> <i class="fa fa-heart" style="float: right"></i></p>
					</div>
					
				<?php
					}
				?>		
				</div>
			</div>
			<?php
				}
			?>
		
	<!-- end sample   2-->		
		
	
		<!--footer-->
		<footer>
		  <p>Author: Dev Music<br>
		  Follow us on : <i class="fa fa-linkedin-square " aria-hidden="true"></i>&nbsp;&nbsp; <i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;&nbsp; <i class="fa fa-instagram" aria-hidden="true"></i></p>
		</footer>
	
	<script type="text/javascript">
	
		$('.slider').slick({  
		  infinite: true,
		  speed: 500,
		  autoplay: true,
		  autoplaySpeed: 1000,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  prevArrow : '<i class="fas fa-angle-left left_arrow">',
		  nextArrow : '<i class="fas fa-angle-right right_arrow">',
		  responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
		});
	
	</script>
</body>
</html>