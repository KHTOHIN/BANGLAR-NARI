<?php
if (isset($_SESSION['TYPE']) && isset($_SESSION['USERID'])) {
    if($_SESSION['TYPE']=='Admin') {
        header("location:adminindex.php");
    }
}else{
    header("location:index.php");
}

$id = $_SESSION['USERID'];
?>
<ul class="nav justify-content-end">                                                                                   
  <li class="nav-item">
    <a class="nav-link" href="profile.php"><i class="fas fa-user-alt"> My Account</i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"> Cart <span class="badge badge-danger"><?php 
if(isset($_SESSION['cart']))
{	
	echo count($_SESSION['cart']);
}else
{
	echo 0;
} 
?></span></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"> Logout</i></a>
  </li>
</ul>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="userindex.php">Banglar Nari</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="userindex.php"><i class="fas fa-home"> Home</i></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="UserShop.php"><i class="fas fa-store"> Shop</i></a>
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
					<a class="dropdown-item" href="CUShop.php?bid=<?php echo $result['CATEGORYID'];?>"><?php echo $result['CATEGORYNAME'];?></a>
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
					<a class="dropdown-item" href="BUShop.php?bid=<?php echo $result2['BRANDID'];?>"><?php echo $result2['BRANDNAME'];?></a>
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