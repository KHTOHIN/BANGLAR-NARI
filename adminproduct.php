<?php
if(!isset($_SESSION))session_start();
if (isset($_SESSION['TYPE']) && isset($_SESSION['USERID'])) {
    if($_SESSION['TYPE']=='User') {
        header("location:userindex.php");
    }
}else{
    header("location:index.php");
}
?>
<!doctype html>
<?php
	include 'connect.php';
	if(isset($_POST['brand']))
	{
		$BRANDNAME = $_POST['BRANDNAME'];
		$sql="INSERT INTO `BRAND`(`BRANDNAME`) VALUES ('$BRANDNAME')";
		
		if(mysqli_query($link, $sql))
		{
			echo "<script>
			alert('New BRAND Inserted.');
			</script>";
		}
		else
		{
			echo "<script>
			alert('Something is Wrong.');
			</script>";
		}
	}
?>
<?php
	include 'connect.php';
	if(isset($_POST['category']))
	{
		$CATEGORYNAME = $_POST['CATEGORYNAME'];
		$sql="INSERT INTO `CATEGORY`(`CATEGORYNAME`) VALUES ('$CATEGORYNAME')";
		
		if(mysqli_query($link, $sql))
		{
			echo "<script>
			alert('New CATEGORY Inserted.');
			</script>";
		}
		else
		{
			echo "<script>
			alert('Something is Wrong.');
			</script>";
		}
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Banglar Nari</title>
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminindex.php">Banglar Nari</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="adminindex.php">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminorder.php">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="adminproduct.php">
                  <span data-feather="shopping-cart"></span>
                  Products <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admincustomer.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminreport.php?<?php echo 'dateFrom='.date('Y-m').'-01&dateTo='.date('Y-m-d');?>">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
            </ul>

            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">Product</h1>
			</div>
			
			<div class="card">
				<h5 class="card-header">Insert Product</h5>
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-sm-8">
								<form method="POST" enctype="multipart/form-data">
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">PRODUCT NAME</label>
										<div class="col-sm-9">
										  <input type="text" name="PRODUCTNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter Product Name">
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">BRAND ID</label>
										<div class="col-sm-9">
										  <input type="text" name="BRANDID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter Brand ID">
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">CATEGORY ID</label>
										<div class="col-sm-9">
										  <input type="text" name="CATEGORYID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter Category ID">
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">PRICE</label>
										<div class="col-sm-9">
										  <input type="text" name="PRICE" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter Product Price">
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">DETAILES</label>
										<div class="col-sm-9">
										  <input type="text" name="DETAILES" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter Product Detailes">
										</div>
									</div>
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-3 col-form-label">Stock</label>
										<div class="col-sm-9">
										  <input type="text" name="stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter Product Stock">
										</div>
									</div>
									<div class="form-group row">
										<label for="exampleFormControlFile1">PRODUCT IMAGE</label>
										<div class="col-sm-9">
											<input type="file" name="images" class="form-control-file" id="images">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-2"></div>
										<div class="col-sm-8"><input type="submit" name='product' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Add Product"></div>
										<div class="col-sm-2"></div>
									</div>
								</form>
								<?php
									if (isset($_POST['product'])) 
									{
										$PRODUCTNAME = $_POST['PRODUCTNAME'];
										$BRANDID = $_POST['BRANDID'];
										$CATEGORYID = $_POST['CATEGORYID'];
										$PRICE = $_POST['PRICE'];
										$Stock = $_POST['stock'];
										$DETAILES = $_POST['DETAILES'];
										
										$PRODUCTIMAGE = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
										$sql = "INSERT INTO `product`(`PRODUCTNAME`, `BRANDID`, `CATEGORYID`, `PRICE`, `DETAILES`,`STOCK`,`PRODUCTIMAGE`) VALUES ('$PRODUCTNAME','$BRANDID','$CATEGORYID','$PRICE','$DETAILES','$Stock','$PRODUCTIMAGE')";
										if (mysqli_query($link, $sql)) 
										{
											?>
											<script>
												alert('New Product Uploaded.');
											</script>
											<?php
										} 
										else 
										{
											echo "Problem" . mysqli_error($link);
										}
									}
								?>
							</div>
							
							<div class="col-sm">
								5
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<h2 class="text-center"><strong>BRAND</strong></h2>
								<div class="table-responsive">
									<table class="table table-striped table-sm">
										<thead>
											<tr>
												<th><strong>BRAND ID</strong></th>
												<th><strong>BRAND NAME</strong></th>
											</tr>
										</thead>
										<?php
											$table = "select * from BRAND";
											$r = mysqli_query($link, $table);
											while($result = mysqli_fetch_assoc($r))
											{
										?>
										<tbody>
											<tr onClick="BrandClick(<?php echo $result['BRANDID'];?>,'<?php echo $result['BRANDNAME'];?>')">
												<td><?php echo $result['BRANDID'];?></td>
												<td><?php echo $result['BRANDNAME'];?></td>
											</tr>
										</tbody>
										<?php
											}
										?>
									</table>
								</div>
							</div>
							<div class="col-sm-6">
								<h2 class="text-center"><strong>CATEGORY</strong></h2>
								<div class="table-responsive">
									<table class="table table-striped table-sm">
										<thead>
											<tr>
												<th><strong>CATEGORY ID</strong></th>
												<th><strong>CATEGORY NAME</strong></th>
											</tr>
										</thead>
										<?php
											$table = "select * from CATEGORY";
											$r = mysqli_query($link, $table);
											while($result = mysqli_fetch_assoc($r))
											{
										?>
										<tbody>
											<tr onClick="CategoryClick(<?php echo $result['CATEGORYID'];?>,'<?php echo $result['CATEGORYNAME'];?>')">
												<td><?php echo $result['CATEGORYID'];?></td>
												<td><?php echo $result['CATEGORYNAME'];?></td>
											</tr>
										</tbody>
										<?php
											}
										?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<h2 class="text-center"><strong>BRAND</strong></h2>
								<form method="POST">
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">BRAND NAME</label>
										<div class="col-sm-8">
										  <input type="text" name="BRANDNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter New Brand Name">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-2"></div>
										<div class="col-sm-8"><input type="submit" name='brand' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Add New Brand"></div>
										<div class="col-sm-2"></div>
									</div>
								</form>
							</div>
							<div class="col-sm-6">
								<h2 class="text-center"><strong>CATEGORY</strong></h2>
								<form method="POST">
									<div class="form-group row">
										<label for="staticEmail" class="col-sm-4 col-form-label">CATEGORY NAME</label>
										<div class="col-sm-8">
										  <input type="text" name="CATEGORYNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter New Category">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-2"></div>
										<div class="col-sm-8"><input type="submit" name='category' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Add New Category"></div>
										<div class="col-sm-2"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-body">
					<div class="container">
						<div class="table-responsive">
							<table class="table table-striped table-sm">
								<thead>
									<tr>
										<th>PRODUCT ID</th>
										<th>PRODUCT NAME</th>
										<th>BRAND ID</th>
										<th>CATEGORY ID</th>
										<th>PRICE</th>
										<th>STOCK</th>
									</tr>
								</thead>
								<?php
									$table = "select * from PRODUCT";
									$r = mysqli_query($link, $table);
									while($result = mysqli_fetch_assoc($r))
									{
								?>
								<tbody>
									<tr onClick="ProductClick(<?php echo $result['PRODUCTID'];?>,'<?php echo $result['PRODUCTNAME'];?>','<?php echo $result['BRANDID'];?>','<?php echo $result['CATEGORYID'];?>','<?php echo $result['PRICE'];?>','<?php echo $result['STOCK'];?>')">
										<td><?php echo $result['PRODUCTID'];?></td>
										<td><?php echo $result['PRODUCTNAME'];?></td>
										<td><?php echo $result['BRANDID'];?></td>
										<td><?php echo $result['CATEGORYID'];?></td>
										<td><?php echo $result['PRICE'];?></td>
										<td><?php echo $result['STOCK'];?></td>
									</tr>
								</tbody>
								<?php
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="modal" id="brandmodal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">UPDATE BRAND</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form method="POST">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">BRAND ID</label>
									<div class="col-sm-8">
									  <input type="text" name="bid" id="bid" class="form-control" aria-describedby="emailHelp" placeholder="Please enter the Brand Name">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">BRAND NAME</label>
									<div class="col-sm-8">
									  <input type="text" name="bname" id="bname" class="form-control" aria-describedby="emailHelp" placeholder="Please enter the Brand Name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2"></div>
									<div class="col-sm-8"><input type="submit" name='brandupdate' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Update Brand"></div>
									<div class="col-sm-2"></div>
								</div>
							</form>
							<?php 
								if (isset($_POST['brandupdate'])) 
									{
										$BRANDID = $_POST['bid'];
										$BRANDNAME = $_POST['bname'];
										$sql = "UPDATE `BRAND` SET `BRANDNAME`='$BRANDNAME' WHERE BRANDID='$BRANDID'";
										if (mysqli_query($link, $sql)) 
										{
											
										} 
										else 
										{
											echo "Problem" . mysqli_error($link);
										}
									}
							?>
							
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="modal" id="categorymodal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">UPDATE CATEGORY</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form method="POST">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">CATEGORY ID</label>
									<div class="col-sm-8">
									  <input type="text" name="cid" id="cid" class="form-control" aria-describedby="emailHelp" placeholder="Please enter the Brand Name">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">CATEGORY NAME</label>
									<div class="col-sm-8">
									  <input type="text" name="cname" id="cname" class="form-control" aria-describedby="emailHelp" placeholder="Please enter the Brand Name">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2"></div>
									<div class="col-sm-8"><input type="submit" name='categoryupdate' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Update Brand"></div>
									<div class="col-sm-2"></div>
								</div>
							</form>
							<?php 
								if (isset($_POST['categoryupdate'])) 
									{
										$CATEGORYID = $_POST['cid'];
										$CATEGORYNAME = $_POST['cname'];
										$sql = "UPDATE `CATEGORY` SET `CATEGORYNAME`='$CATEGORYNAME' WHERE CATEGORYID='$CATEGORYID'";
										if (mysqli_query($link, $sql)) 
										{
											
										} 
										else 
										{
											echo "Problem" . mysqli_error($link);
										}
									}
							?>
							
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="modal" id="productmodal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">UPDATE PRODUCT</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form method="POST">
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">PRODUCT ID</label>
									<div class="col-sm-8">
									  <input type="text" name="pid" id="pid" class="form-control" placeholder="Please enter the PRODUCT ID">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">PRODUCT NAME</label>
									<div class="col-sm-8">
									  <input type="text" name="pname" id="pname" class="form-control" placeholder="Please enter the PRODUCT Name">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">BRAND ID</label>
									<div class="col-sm-8">
									  <input type="text" name="BRANDID" id="BRANDID" class="form-control" placeholder="Please enter the Brand ID">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">CATEGORY ID</label>
									<div class="col-sm-8">
									  <input type="text" name="CATEGORYID" id="CATEGORYID" class="form-control" placeholder="Please enter the CATEGORY ID">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">PRICE</label>
									<div class="col-sm-8">
									  <input type="text" name="price" id="price" class="form-control" placeholder="Please enter the PRODUCT PRICE">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">STOCK</label>
									<div class="col-sm-8">
									  <input type="text" name="stock" id="stock" class="form-control" placeholder="Please enter the PRODUCT PRICE">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-2"></div>
									<div class="col-sm-8"><input type="submit" name='productupdate' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Update Product"></div>
									<div class="col-sm-2"></div>
								</div>
							</form>
							<?php 
								if (isset($_POST['productupdate'])) 
									{
										$PRODUCTID = $_POST['pid'];
										$PRODUCTNAME = $_POST['pname'];
										$BRANDID = $_POST['BRANDID'];
										$CATEGORYID = $_POST['CATEGORYID'];
										$PRICE = $_POST['price'];
										$STOCK = $_POST['stock'];
										$sql = "UPDATE `product` SET `PRODUCTNAME`='$PRODUCTNAME',`BRANDID`='$BRANDID',`CATEGORYID`='$CATEGORYID',`PRICE`='$PRICE',`STOCK`='$STOCK' WHERE PRODUCTID='$PRODUCTID'";
										if (mysqli_query($link, $sql)) 
										{
											
										} 
										else 
										{
											echo "Problem" . mysqli_error($link);
										}
									}
							?>
							
						</div>
					</div>
				</div>
			</div>
			
        </main>
      </div>
    </div>
	
	<!--
	modal definition
	<input type="hidden" id="brandId"/>
	<input type="text" id="brandName"/>
	-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
	  function BrandClick(id, name){
	      debugger;
          $(document).ready(function () {
              $("#brandmodal").modal("show");
				
          });
		  document.getElementById("bid").value=id;
		document.getElementById("bname").value=name;
	  }
	  function CategoryClick(id, name){
	      debugger;
          $(document).ready(function () {
              $("#categorymodal").modal("show");
				
          });
		  document.getElementById("cid").value=id;
		document.getElementById("cname").value=name;
	  }
	  
	  function ProductClick(id, name,BRANDID,CATEGORYID,price,Stock){
	      debugger;
          $(document).ready(function () {
              $("#productmodal").modal("show");
				
          });
			document.getElementById("pid").value=id;
			document.getElementById("pname").value=name;
			document.getElementById("BRANDID").value=BRANDID;
			document.getElementById("CATEGORYID").value=CATEGORYID;
			document.getElementById("price").value=price;
			document.getElementById("stock").value=Stock;
	  }
    </script>
  </body>
</html>
