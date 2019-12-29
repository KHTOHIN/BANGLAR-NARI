<!doctype html>
<html lang="en">
	<?php include 'header.php';?>
  <body>
    <?php include 'UserNavber.php';?>
	
	<?php
        $sql = "select * from user where userid=$id";
        $r = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($r);
        ?>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-5">
					<form method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $result['FIRSTNAME'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Last Name</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['LASTNAME'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Present Address</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['PRESENTADDRESS'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Gender</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['GENDER'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">City</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['CITY'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Zip Code</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['ZIPCODE'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Phone</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['PHONE'];?>">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['EMAIL'];?>">
						</div>
						
						
						<button type="submit" name="update" class="btn btn-primary">UPDATE YOUR DATA</button>
					</form>
				</div>
				<div class="col-3">
				</div>
				<div class="col-4">
					<form method="POST">
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="New Password Please...">
						</div>
						
						
						<button type="submit" name="password" class="btn btn-primary">UPDATE YOUR DATA</button>
					</form>
				</div>
			</div>
		</div>
		
	
	<?php include 'footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>