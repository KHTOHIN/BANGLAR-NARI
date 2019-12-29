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
<?php include 'Connect.php';?>
<!doctype html>
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
                <a class="nav-link active" href="adminorder.php">
                  <span data-feather="file"></span>
                  Orders <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminproduct.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admincustomer.php">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminreport.php">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
            </ul>

            
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<br>
			<div class="card">
				<div class="card-header">
					NEW ORDER
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
								  <th>ORDER ID</th>
								  <th>ORDER DATE</th>
								  <th>TOTAL PRICE</th>
								  <th>PAYMENT METHOD</th>
								  <th>TrxID</th>
								</tr>
							</thead>
							<?php
								$table = "select * from ORDERS where status='Pending'";
								$r = mysqli_query($link, $table);
								while($result = mysqli_fetch_assoc($r))
								{
							?>
							<tbody onClick="OrderClick(<?php echo $result['ORDERID'];?>,'<?php echo $result['ORDERDATE'];?>','<?php echo $result['TOTALPRICE'];?>','<?php echo $result['paymentmethod'];?>','<?php echo $result['TrxID'];?>')">
								<tr>
									<td><?php echo $result['ORDERID'];?></td>
									<td><?php echo $result['ORDERDATE'];?></td>
									<td><?php echo $result['TOTALPRICE'];?></td>
									<td><?php echo $result['paymentmethod'];?></td>
									<td><?php echo $result['TrxID'];?></td>
								</tr>
							</tbody>
							<?php
								}
							?>
						</table>
					</div>
				</div>
			</div>
			
			<div class="modal" id="ordermodal" tabindex="-1" role="dialog">
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
									<label for="staticEmail" class="col-sm-4 col-form-label">Order ID</label>
									<div class="col-sm-8">
										<input type="text" name="orderid" id="orderid" readonly class="form-control-plaintext">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">Order Date</label>
									<div class="col-sm-8">
										<input type="text" name="orderdate" id="orderdate" readonly class="form-control-plaintext">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">Total Price</label>
									<div class="col-sm-8">
										<input type="text" name="totalprice" id="totalprice" readonly class="form-control-plaintext">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">Payment Method</label>
									<div class="col-sm-8">
										<input type="text" name="PaymentMethod" id="PaymentMethod" readonly class="form-control-plaintext">
									</div>
								</div>
								<div class="form-group row">
									<label for="staticEmail" class="col-sm-4 col-form-label">TrxID</label>
									<div class="col-sm-8">
										<input type="text" name="TrxID" id="TrxID" readonly class="form-control-plaintext" value="<?php echo $result['TrxID'];?>">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-6"><input type="submit" name='DELIVARED' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="DELIVARED"></div>
									<div class="col-sm-6"><input type="submit" name='CANCEL' class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="CANCEL"></div>
								</div>
							</form>
							
							
						</div>
					</div>
				</div>
			</div>
			
			<br>
			
			<div class="card">
				<div class="card-header">
					ORDER STATUS
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-sm">
						  <thead>
							<tr>
							  <th>ORDER ID</th>
							  <th>ORDER DATE</th>
							  <th>TOTAL PRICE</th>
							  <th>PAYMENT METHOD</th>
							  <th>TrxID</th>
							  <th>STATUS</th>
							</tr>
						  </thead>
						  <?php
								$table = "select * from ORDERS where status='DELIVARED' OR status='CANCEL'";
								$r = mysqli_query($link, $table);
								while($result = mysqli_fetch_assoc($r))
								{
							?>
						  <tbody>
							<tr>
								<td><?php echo $result['ORDERID'];?></td>
								<td><?php echo $result['ORDERDATE'];?></td>
								<td><?php echo $result['TOTALPRICE'];?></td>
								<td><?php echo $result['paymentmethod'];?></td>
								<td><?php echo $result['TrxID'];?></td>
								<td><?php echo $result['status'];?></td>
							</tr>
						  </tbody>
						  <?php
								}
						  ?>
						</table>
					</div>
				</div>
			</div>
			<?php 
			if(isset($_POST['DELIVARED']))
			{
				$Orderid = $_POST['orderid'];
				$q = "UPDATE `orders` SET `status`='DELIVARED' WHERE Orderid='$Orderid'";
				if(mysqli_query($link, $q))
				{
					echo "<script>
						alert('Order Confirmed.');
						</script>";
				}
			}
			if(isset($_POST['CANCEL']))
			{
				$Orderid = $_POST['orderid'];
				$q = "UPDATE `orders` SET `status`='CANCEL' WHERE Orderid='$Orderid'";
				if(mysqli_query($link, $q))
				{
					echo "<script>
						alert('Order Canceled.');
						</script>";
				}
			}
			?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

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
	  
	  
	  
	  function OrderClick(id,date,price,PaymentMethod,TrxID){
	      debugger;
          $(document).ready(function () {
              $("#ordermodal").modal("show");
				
          });
			document.getElementById("orderid").value=id;
			document.getElementById("orderdate").value=date;
			document.getElementById("totalprice").value=price;
			document.getElementById("PaymentMethod").value=PaymentMethod;
			document.getElementById("TrxID").value=TrxID;
	  }
    </script>
  </body>
</html>
