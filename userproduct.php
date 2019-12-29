<!doctype html>
<?php include 'connect.php';
?>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'UserNavber.php';
?>

<div style="margin: 30px;">
    <div class="row">
        <?php
        $sql = "select * from product where PRODUCTID=" . $_GET['id'];
        $r = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($r);
        ?>
        <div class="col-4">
            <div class="card" href="product.php" style="width: 25rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($result['PRODUCTIMAGE']); ?>"
                             class="figure-img img-fluid rounded" alt="...">
                    </figure>
                </div>
            </div>
        </div>
        <div class="col">
            <?php
            if (isset($_SESSION['cart'][$result['PRODUCTID']])) {
                $quantity = $_SESSION['cart'][$result['PRODUCTID']];
            } else {
                $quantity = 1;
            }
            ?>
            <!--            <form method="POST" action="">-->
            <div class="row">
                <div class="col">
                    <input type="hidden" id="url" value="update-cart.php?id=<?php echo $result['PRODUCTID']; ?>&action=add">
                    <h2><?php echo $result['PRODUCTNAME']; ?></h2>
                    <br>
                    <hr/>
                    <h1 style="color: red;">৳ <?php echo $result['PRICE']; ?></h1>
                    <br>
                    <h5>Quantity : </h5>

                    <button type="button" onclick="Drecrement()" class="btn btn-secondary btn-sm"
                            style="width: 40px;height: 40px;">-
                    </button>
                    <input type="text" name="quantity" readonly="true" id="myNumber" value="<?php echo $quantity; ?>"
                           style="width: 50px;text-align: center;">
                    <script>
                        function Increment() {
                                var val = parseInt(document.getElementById("myNumber").value) + 1;
								if (val > 100) {
                                    val = 100;
                                    alert("Quantity must be less than or equal 100");
                                }
                                document.getElementById("myNumber").value = val;
                            }

                        function Drecrement() {
                            var val = parseInt(document.getElementById("myNumber").value) - 1;
                            if (val < 1) {
                                val = 1;
                                alert("Quantity must be more than 0");
                            }
                            document.getElementById("myNumber").value = val;
                        }
                    </script>
                    <button type="button" onclick="Increment()" class="btn btn-secondary btn-sm"
                            style="width: 40px;height: 40px;">+
                    </button>
                </div>
            </div>
            <br>

            <a href="#" class="btn btn-secondary btn-sm" style="padding:10px 50px;"
               onclick="formSubmitter()">Proceed</a>

            <!--                <input type="submit" name="submit" class="btn btn-secondary btn-sm" style="width: 200px;height: 40px;" value="Proceed"/>-->
            <!--            </form>-->
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script>
    function formSubmitter() {
        let url = document.getElementById("url").value;
        let qtty = document.getElementById("myNumber").value;
        console.log( url+"&qtty="+qtty);
        window.location.href = url+"&qtty="+qtty;
    }
</script>

</body>
</html>