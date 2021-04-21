<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>Admin Dashboard!</title>

	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		.content{
			width: 800px;
			margin: 30px auto;
		}
		.margin{
			display: inline-block;
			margin-left: 500px;
			vertical-align: top;
		}
		.title{
			font-weight: 700;
			color: green;
			font-size: 20px;
			display: inline-block;
		}

	</style>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-ligh bg-dark">
	  <div class="container-fluid">
	    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	      <a class="navbar-brand" href="#">Test App</a>

	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		         	 <a class="nav-link active" aria-current="page" href="/user-dashboard/dashboard/admin">Dashboard</a>
		        </li>
		        <li class="nav-item">
		         	 <a class="nav-link active" aria-current="page" href="#">Profile</a>
		        </li>
	      </ul>
	        <a class="nav-link active" aria-current="page" href="#">Log off</a>
	    </div>
	  </div>
	</nav>

	<div class="content">
		<p class="title">Add a new user</p>
		<a href="/user-dashboard/dashboard/admin" class="margin">Return to dashboard</a>
		<form action="/user-dashboard/admin/admin_new_user" method="post">
			<p>Email Address:</p>
			<p><input type="text" name="email"></p>
			<p>First Name:</p>
			<p><input type="text" name="fname"></p>
			<p>Last Name:</p>
			<p><input type="text" name="lname"></p>
			<p>Password:</p>
			<p><input type="password" name="pword"></p>
			<p>Confirm Password:</p>
			<p><input type="password" name="cpword"></p>
			<p><input type="submit" value="create" ></p>
		</form>
<?php  		if($this->session->userdata('errors') != NULL){
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