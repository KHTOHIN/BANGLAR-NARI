<?php
	if(isset($_POST['submit']))
	{
		$EMAIL=$_POST['EMAIL'];
		$PASSWORD=$_POST['PASSWORD'];
		$sql="select * from user where EMAIL='".$EMAIL."'AND PASSWORD='".$PASSWORD."'";
		$result=mysqli_query($link,$sql);
		if(mysqli_num_rows($result)==1)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION['USERID']=$row['USERID'];
			$_SESSION['TYPE']=$row['TYPE'];
//			var_dump($_SESSION);
//			var_dump($row);
			if($_SESSION['TYPE']=='Admin') {
				header("location:adminindex.php");
			}
			else if($_SESSION['TYPE']=='User') {
				header("location:userindex.php");
			}
		}
		else
		{			
		echo "<script>
		alert('wrong password');
		</script>";
		}   
	}
?>
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#Signin" href="#"><i class="fas fa-sign-in-alt"> Login</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Signup.php"><i class="fas fa-user-plus"> Signup</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"> Cart <span class="badge badge-danger"></span></i></a>
  </li>
</ul>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">Banglar Nari</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="index.php"><i class="fas fa-home"> Home</i></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="Shop.php"><i class="fas fa-store"> Shop</i></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<strong>Category</strong>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php
						$table = "select * from category";
						$r = mysqli_query($link, $table);
						while($result = mysqli_fetch_assoc($r))
						{
					?>
					<a class="dropdown-item" href="CShop.php?bid=<?php echo $result['CATEGORYID'];?>"><?php echo $result['CATEGORYNAME'];?></a>
						<?php } ?>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<strong>Brand</strong>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php
						$table2 = "select * from BRAND";
						$r2 = mysqli_query($link, $table2);
						while($result2 = mysqli_fetch_assoc($r2))
						{
					?>
					<a class="dropdown-item" href="BShop.php?bid=<?php echo $result2['BRANDID'];?>"><?php echo $result2['BRANDNAME'];?></a>
						<?php } ?>
				</div>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<div class="input-group">
			  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
			  <div class="input-group-append">
				<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
			  </div>
			</div>
		</form>
	</div>
</nav>

<!-- Modal -->
<div class="modal fade" id="Signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Signin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="text" class="form-control" name="EMAIL" aria-describedby="emailHelp" placeholder="Please enter your Phone Number or Email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="PASSWORD" placeholder="Please enter your password">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Remember me</label>
					</div>
					<input class="btn btn-outline-primary btn-lg btn-block" type="submit" name='submit' value="Signin">
				</form>
			</div>
			<div class="modal-footer">
				<h6>Don't Have an account?<a href="Signup.php"> Create one</a></h6>
			</div>
		</div>
	</div>
</div>