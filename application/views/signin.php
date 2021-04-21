<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>signin!</title>

	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		.content{
			width: 500px;
			height: 400px;
			margin: 30px auto;

		}
		.title{
			font-weight: 700;
			color: green;
			font-size: 20px;
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
		<form action="sign_in_process" method="post">
			<p class="title">Sign in</p>
			<p>Email Address:</p>
			<p><input type="text" name="email"></p>
			<p>Password:</p>
			<p><input type="password" name="pword"></p>
			<p><input type="submit" value="Sign in!" ></p>
			<p><a href="register">Don't have an account? Register</a></p>
		</form>
<?php  		
	
	if($this->session->userdata('errors') != NULL){
		echo $this->session->userdata('errors');
		$this->session->sess_destroy('errors');
	}
	else if($this->session->userdata('success') != NULL){
		echo $this->session->userdata('success');
		$this->session->sess_destroy('success');
	}
?>
	</div>


</body>
</html>