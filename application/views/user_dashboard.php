<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>User Dashboard!</title>

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
			margin-left: 570px;
			vertical-align: top;
		}
		.title{
			font-weight: 700;
			color: green;
			font-size: 20px;
			display: inline-block;
		}
		table{
			width: 900px;
			margin: auto;
			border-collapse: collapse;
		}
		th{
			border: 1px solid black;
			text-align: center;
			background-color: yellow;
		}
		td{
			border: 1px solid black;
			text-align: center;

		}
		.border-right{
			padding-right: 10px;
			border-right: 1px solid black;
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
		         	 <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
		        </li>
		        <li class="nav-item">
		         	 <a class="nav-link active" aria-current="page" href="/user-dashboard/users/edit">Profile</a>
		        </li>
	      </ul>
	        <a class="nav-link active" aria-current="page" href="/user-dashboard/logoff">Log off</a>
	    </div>
	  </div>
	</nav>

	<div class="content">
		<p class="title">All Users</p>

		<table>
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created_at</th>
				<th>User_level</th>
			</thead>
			<tbody>

			<!-- list of users  -->

<?php
			if($this->session->userdata('users_list') != NULL){
				foreach($this->session->userdata('users_list') as $values){
?>

				<tr>
					<td><?= $values['id'] ?></td>
					<td><a href="/user-dashboard/users/show/<?= $values['id'] ?>"><?= $values['fname'].' '.$values['lname'] ?></a></td>
					<td><?= $values['email'] ?></td>
					<td><?= $values['created_at'] ?></td>
					<td>
<?php  					if($values['user_level'] == 9){ 
?>
							<?= "admin"; ?>
<?php					} 
						else{
?>
							<?= "user"; ?>
<?php					}
?>
				</tr>

<?php 
				}
			}
 ?>

			</tbody>
		</table>
	</div>


</body>
</html>