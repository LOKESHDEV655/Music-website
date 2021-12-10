<div class="container-fluid">
		<!--Navbar -->
		<div class="row">
			<div class="col-sm-12">				
				<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
				  <a class="navbar-brand" href="#">Dev Music</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav mr-auto">
					  <li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					  </li>					      
					</ul>
					  
					 <?Php
					 	    if(!isset($_COOKIE["login"])){	
					 
					echo '<ul class="navbar-nav mr-4">
						<li class="nav-item">
							<a class="nav-link" id="signup" href="#">Sign Up</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="modal" data-target="#myModal" id="login" href="#">Log In</a>
						</li>    
					</ul>';
						}
					  	else{
							echo '<ul class="navbar-nav mr-4">
								<li class="nav-item">
									<a class="nav-link" id="logout" href="logout.php">Log Out</a>
								</li>								   
							</ul>';
						}
					?>
					<form class="form-inline" action="">
						<input type="search" class="form-control mr-sm-2" id="search" placeholder="search...">
						<button class="btn btn-outline-success my-2 my-sm-0">Search</button>
					</form>
					  
				  </div>  
				</nav>
			</div>
		</div>
	</div>