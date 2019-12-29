<?php
include 'connect.php';
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
      <style>
          @media print {
              page{
                  size: A4;
                  margin: 1in 0.5in 0in;
              }
          }
      </style>
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
                <a class="nav-link active" href="adminreport.php?<?php echo 'dateFrom='.date('Y-m').'-01&dateTo='.date('Y-m-d');?>">
                  <span data-feather="bar-chart-2"></span>
                  Reports <span class="sr-only">(current)</span>
                </a>
              </li>Y
            </ul>

            
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			
			<div class="card">
				<h5 class="card-header">REPORT</h5>
				<div class="card-body">
					<div class="container">

                        <form method="post">
                            <input type="date" name="dateFrom">
                            <input type="date" name="dateTo">
                            <input type="submit" name="Search" value="submit">
                        </form>
            <?php
            $dateFrom = $_GET['dateFrom'];
            $dateTo = $_GET['dateTo'];
            if(isset($_POST['Search'])){
                $dateFrom = $_POST['dateFrom'];
                $dateTo = $_POST['dateTo'];
            }
                ?>
                        <br>
<!--                        <div class="container-fluid" style="height: 30vh; overflow-y: scroll ;">-->
                            <div id="report1">
                                <div style="text-align: center">
                                    <h3>Order Report of Banglar Nari</h3>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>SL</th>
                                            <th>Order ID</th>
                                            <th>Order Date</th>
                                            <th>Total Price</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                        </tr>
                                        <?php
                                        $sql ="select * from orders where date(ORDERDATE) between date('".$dateFrom."') and date('".$dateTo."') order by ORDERDATE asc";
                                        if($result = mysqli_query($link,$sql)){
//                                            echo 'successful';
                                        }else{
                                            echo mysqli_error($link);
                                        }
                                        $sl = 0 ;
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo '<tr>'.
                                                '<td>'.(++$sl).'</td>'.
                                                '<td>'.$row['ORDERID'].'</td>'.
                                                '<td>'.$row['ORDERDATE'].'</td>'.
                                                ' <td>'.$row['TOTALPRICE'].'</td>'.
                                                ' <td>'.$row['paymentmethod'].'</td>'.
                                                '<td>'.$row['status'].'</td>'.'</tr>';
                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                            <a href="#" onclick="reportPrint('report1')">Print Report</a>
<!--                        </div>-->

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

      function reportPrint(id){
          var divElements = document.getElementById(id).innerHTML;
          //Get the HTML of whole page
          var oldPage = document.body.innerHTML;
          document.body.innerHTML = divElements;
          window.print();
          window.onafterprint = function(){
              document.body.innerHTML = oldPage;
          }
          window.location.href = "";
      }
    </script>
  </body>
</html>
