<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>Home!</title>
	<style type="text/css">
		
		.content{
			width: 600px;
			margin: 50px auto 0px auto;
			background-color: #bfc2c7;
			padding: 20px;
		}.content-bot{
			width: 600px;
			margin: 10px auto;
			padding: 20px;
		}

	</style>
</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-ligh bg-dark">
		  <div class="container-fluid">
		    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		      <a class="navbar-brand" href="/user-dashboard">Test App</a>

		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			         	 <a class="nav-link active" aria-current="page" href="#">Home</a>
			        </li>
		      </ul>
		        <a class="nav-link active" aria-current="page" href="signin">Sign in</a>
		    </div>
		  </div>
		</nav>	

		<div class="content">
			<div class="jumbotron">
				  <h1 class="display-5">Welcome to the Test</h1>
				  <p class="lead">We're going to build a cool application using MVC framework! This application was built with the village88 folks</p>
				 
				    <a class="btn btn-primary btn-lg" href="signin" role="button">Start</a>

			</div>

		</div>
		<div class="content-bot">
			<div class="container">
			  <div class="row">
			    <div class="col-sm">
			    	<h4>Welcome to the Test</h4>
			      	Using this application, you'll learn how to add, remove and edit users for the application.
			    </div>
			    <div class="col-sm">
			    	<h4>Leave Messages</h4>
			    	Users will be able to leave a message to another user using this application.
			      	
			    </div>
			    <div class="col-sm">
			    	<h4>Edit user information</h4>
				      Admins will be able to edit another user's information ( email address, first name, last name and etc. ).
			    </div>
			  </div>
			</div>
		</div>	
		


</body>
</html>