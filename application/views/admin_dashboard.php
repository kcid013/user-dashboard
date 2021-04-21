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
			width: 900px;
			margin: 30px auto;
		}
		.margin{
			display: inline-block;
			margin-left: 690px;
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
		         	 <a class="nav-link active" aria-current="page" href="#">Profile</a>
		        </li>
	      </ul>
	        <a class="nav-link active" aria-current="page" href="/user-dashboard/logoff">Log off</a>
	    </div>
	  </div>
	</nav>

	<div class="content">
		<p class="title">Manage Users</p>
		<a href="/user-dashboard/users/new" class="margin">Add new</a>

		<table>
			<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created_at</th>
				<th>User_level</th>
				<th>Action</th>
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
					</td>
					<td>
						<a href="/user-dashboard/edit_user/<?= $values['id'] ?>" class="border-right">Edit</a>
						<a href="/user-dashboard/remove_user/<?= $values['id'] ?>">Remove <?= $values['id'] ?></a>
					</td>
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