<!doctype html>
<?php
	include 'connect.php';
	session_start();
	if(isset($_POST['submit']))
	{
		$FIRSTNAME = $_POST['FIRSTNAME'];
		$LASTNAME = $_POST['LASTNAME'];
		$GENDER = $_POST['GENDER'];
		$PRESENTADDRESS = $_POST['PRESENTADDRESS'];
		$CITY = $_POST['CITY'];
		$ZIPCODE = $_POST['ZIPCODE'];
		$PHONE = $_POST['PHONE'];
		$EMAIL = $_POST['EMAIL'];
		$PASSWORD = $_POST['PASSWORD'];
		$sql="INSERT INTO `USER`(`FIRSTNAME`, `LASTNAME`, `GENDER`, `PRESENTADDRESS`,`CITY`, `ZIPCODE`, `PHONE`, `EMAIL`, `PASSWORD`, `TYPE`) VALUES ('$FIRSTNAME','$LASTNAME','$GENDER','$PRESENTADDRESS','$CITY','$ZIPCODE','$PHONE','$EMAIL','$PASSWORD','User')";
		
		if(mysqli_query($link, $sql))
		{
			$s="select id from user where Email='$email'";
			$result=mysqli_query($link,$s);
			$row=mysqli_fetch_assoc($result);
			$_SESSION['id']=$row['id'];
			header("location:userindex.php");
		}
		else
		{
			echo "Problem";
		}
	}
?>
<html lang="en">
	<?php include 'header.php';?>
  <body>
    <?php include 'navber.php';?>
	<br><br>
	<div class="container">
		<div class="card">
			<h5 class="card-header justify-content-center">Signup</h5>
			<div class="card-body">
				<form method="POST">
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">FIRST NAME</label>
						<div class="col-sm-6">
						  <input type="text" name="FIRSTNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your First Name">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">LAST NAME</label>
						<div class="col-sm-6">
						  <input type="text" name="LASTNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Last Name">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">EMAIL</label>
						<div class="col-sm-6">
						  <input type="email" name="EMAIL" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Email Address">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">GENDER</label>
						<div class="col-sm-6">
						  <input type="text" name="GENDER" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Gender">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">PRESENT ADDRESS</label>
						<div class="col-sm-6">
						  <input type="text" name="PRESENTADDRESS" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Present Address">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">CITY</label>
						<div class="col-sm-6">
						  <input type="text" name="CITY"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your City">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">ZIP CODE</label>
						<div class="col-sm-6">
						  <input type="number" name="ZIPCODE" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Zip Code">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="staticEmail" class="col-sm-2 col-form-label">PHONE</label>
						<div class="col-sm-6">
						  <input type="text" name="PHONE" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter your Phone Number">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="inputPassword" class="col-sm-2 col-form-label">PASSWORD</label>
						<div class="col-sm-6">
						  <input type="password" name="PASSWORD" class="form-control" id="inputPassword" placeholder="Password Please....">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2"></div>
						<label for="inputPassword" class="col-sm-2 col-form-label">REPEAT PASSWORD</label>
						<div class="col-sm-6">
						  <input type="password" class="form-control" id="inputPassword" placeholder="Again type your Password please....">
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6"><input type="submit" name='submit' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Signup">
						<div class="col-sm-3"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br><br>
	
	<?php include 'footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>