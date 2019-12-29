<!doctype html>
<?php
if(!isset($_SESSION))session_start();

if (isset($_SESSION['TYPE']) && isset($_SESSION['USERID'])) {
    if($_SESSION['TYPE']=='User') {
        header("location:userindex.php");
    }
    if($_SESSION['TYPE']=='Admin') {
        header("location:Adminindex.php");
    }
}
?>
<?php
	require"connect.php";
?>
<html lang="en">
	<?php require 'header.php';?>
  <body>
    <?php require 'navber.php';?>
	<?php require 'slider.php';?>
	<?php require 'footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>