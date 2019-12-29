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
<?php include 'Connect.php';?>
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
                <a class="nav-link" href="adminproduct.php">
                  <span data-feather="shopping-cart"></span>
                  Products <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="admincustomer.php">
                  <span data-feather="users"></span>
                  Customers <span class="sr-only">(current)
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
			
			<div class="card">
				<h5 class="card-header">Manage Customer</h5>
				<div class="card-body">
					<div class="container">
						<div class="table-responsive">
							<table class="table table-striped table-sm">
							  <thead>
								<tr>
								  <th>ID</th>
								  <th>NAME</th>
								  <th>EMAIL</th>
								  <th>PHONE</th>
								  <th>GENDER</th>
								</tr>
							  </thead>
							  <?php
									$table = "select * from USER where type='User'";
									$r = mysqli_query($link, $table);
									while($result = mysqli_fetch_assoc($r))
									{
								?>
							  <tbody>
								<tr>
								  <td><?php echo $result['USERID'];?></td>
								  <td><?php echo $result['FIRSTNAME'];?></td>
								  <td><?php echo $result['EMAIL'];?></td>
								  <td><?php echo $result['PHONE'];?></td>
								  <td><?php echo $result['GENDER'];?></td>
								</tr>
							  </tbody>
                                <?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
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
    </script>
  </body>
</html>
