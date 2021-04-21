<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>Edit user!</title>

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
		select{
			width: 200px;
		}

		form{
			display: inline-block;
		}
		.change_pword{
			margin-left: 100px;
			vertical-align: top;
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
		<p class="title">Edit User# <?php echo $id; ?></p>
		<a href="/user-dashboard/dashboard/admin" class="margin">Return to dashboard</a>
		<form action="/user-dashboard/change_user_info/<?php echo $id; ?>" method="post">
			<p>Email Address:</p>
			<p><input type="text" name="email" placeholder="<?php echo $email; ?>"></p>
			<p>First Name:</p>
			<p><input type="text" name="fname" placeholder="<?php echo $fname; ?>"></p>
			<p>Last Name:</p>
			<p><input type="text" name="lname" placeholder="<?php echo $lname; ?>"></p>
			<p>User Level:</p>
			<p>
				<select name="user_level">
					<option value="9">admin</option>
					<option value="1">user</option>
				</select>
			</p>
		
			<p><input type="submit" value="save" ></p>
		</form>

		<form action="/user-dashboard/change_user_pword/<?php echo $id; ?>" method="post" class="change_pword">
			<p class="title">Change Password</p>
			<p>Password:</p>
			<p><input type="password" name="pword" ></p>
			<p>Confirm Password:</p>
			<p><input type="password" name="cpword" ></p>
			<p><input type="submit" value="save" ></p>
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