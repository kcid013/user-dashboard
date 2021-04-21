<!DOCTYPE html>
<html>
<head>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>User Dashboard!</title>

	<style type="text/css">
		.margin{
			margin-left: 100px;
		}
		.container{
			margin-top: 20px;
		}
		td{
			padding: 5px 10px;
		}	
		h4{
			margin-top: 20px;
		}
		.btn-msg{
			padding: 5px 15px;
			color: white;
			background-color: green;
			margin-left: 740px;
		}.btn-cmt{
			padding: 5px 15px;
			color: white;
			background-color: green;
			margin-left: 640px;
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
		         	 <a class="nav-link active" aria-current="page" 
		         	 <?php  
		         	 	if($this->session->userdata('user_info')['user_level'] == 1){
		         	 		echo "href='/user-dashboard/dashboard'";
		         	 	}
		         	 	else if($this->session->userdata('user_info')['user_level'] == 9){
		         	 		echo "href='/user-dashboard/dashboard/admin'";
		         	 	}
		         	 ?>>Dashboard</a>
		        </li>
		        <li class="nav-item">
		         	 <a class="nav-link active" aria-current="page" href="/user-dashboard/users/edit">Profile</a>
		        </li>
	      </ul>
	        <a class="nav-link active" aria-current="page" href="/user-dashboard/logoff">Log off</a>
	    </div>
	  </div>
	</nav>

	<div class="container">
		
		<h3><?= $this->session->userdata('acct_info')['fname']. ' ' . $this->session->userdata('acct_info')['lname'] ?></h3>
		<table>
			<tr>
				<td>Registered At:</td>
				<td><?= $this->session->userdata('acct_info')['created_at'] ?></td>
			</tr>
			<tr>
				<td>User ID:</td>
				<td>#<?= $this->session->userdata('acct_info')['id'] ?></td>
			</tr>
			<tr>
				<td>Email Address:</td>
				<td><?= $this->session->userdata('acct_info')['email'] ?></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><?= $this->session->userdata('acct_info')['description'] ?></td>
			</tr>
			
		</table>

		<h4>Leave a message for <?= $this->session->userdata('acct_info')['fname'] ?>:</h4>
		<form action="/user-dashboard/send_message" method="post">
			<textarea name="message" style="width: 800px; height: 100px;"></textarea>
			<p><input type="submit" value="Post" class="btn-msg"></p>
		</form>

<?php  

	if($this->session->userdata('acct_message') != NULL){
		foreach($this->session->userdata('acct_message') as $values){
?>

		<div class="comment-section">
			<p><?= $values['fname']. ' '. $values['lname'] ?> wrote:</p>
			<textarea style="width: 800px; height: 100px;" disabled><?= $values['message'] ?></textarea>
			<div class="margin">
<?php 	if($this->session->userdata('acct_comment') != NULL){
			foreach($this->session->userdata('acct_comment') as $comment){ 
				if($values['id'] == $comment['message_id']){
?>
				<p><a href="#"><?= $comment['fname']. '' . $comment['lname'] ?></a> wrote</p>
				<textarea style="width: 700px; height: 100px;" disabled><?= $comment['comment'] ?></textarea>
<?php 
				}
			}
		}
?>
				<form action="/user-dashboard/send_comment" method="post">
					<input type="hidden" name="message_id" value="<?= $values['id'] ?>">
					<textarea style="width: 700px; height: 100px;" name="comment"></textarea>
					<p><input type="submit" value="Post" class="btn-cmt"></p>
				</form>
			</div>

		</div>
<?php  

		}
	}
?>
		
	</div>

</body>
</html>