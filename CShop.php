<!doctype html>
<?php include 'connect.php';?>
<html lang="en">
	<?php include 'header.php';?>
  <body>
    <?php include 'navber.php';?>
	
	<div style="margin: 30px;">
		<div class="row">
			<?php
				$table = "select * from Product where CATEGORYID=". $_GET['bid'];
				$r = mysqli_query($link, $table);
				while($result = mysqli_fetch_assoc($r))
				{
			?>
			<div class="col-2" style="width: 12rem;height: 16rem;">
				<a class="card" href="product.php?id=<?php echo $result['PRODUCTID'];?>">
					<div class="card-body">
						<figure class="figure">
							<img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($result['PRODUCTIMAGE']); ?>" class="figure-img img-fluid rounded" alt="...">
							<figcaption class="figure-caption"><Strong><?php echo $result['PRODUCTNAME'];?></Strong></figcaption>
							<figcaption class="figure-caption" style="color: red;"><?php echo $result['PRICE'];?>৳</figcaption>
						</figure>
					</div>
				</a>			
			</div>
			<?php
				}
			?>
		</div>
	</div>
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
	</nav>
	
	<?php include 'footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>