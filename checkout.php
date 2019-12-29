<!doctype html>
<?php
    include 'connect.php';
?>
<html lang="en">
<?php include 'header.php'; ?>
<?php
if(isset($_POST['order'])) {
    $TrxID = $_POST['TrxID'];
    $DATE = date('y-m-d');
    $id = $_SESSION['USERID'];
    $TotalPrice = 0.0;
//    inserting value in order
    $sql = "INSERT INTO `orders`(`USERID`, `TOTALPRICE`, `ORDERDATE`, `paymentmethod`, `TrxID`, `status`) VALUES ('$id','$TotalPrice','$DATE','Bkash','$TrxID','Pending')";

    if(mysqli_query($link, $sql)) {
    echo "inserted in orders";
        $s = "SELECT MAX(ORDERID) FROM `orders`";
        $r = mysqli_query($link, $s);
        $result = mysqli_fetch_array($r);
        $ORDERID = $result[0];
//        inserting product details and order id in order details from session cart
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $sql = "select pr.PRICE as price, pr.STOCK as stock from product pr where pr.PRODUCTID=" . $product_id;
            $result = mysqli_query($link, $sql);
            $productDetails = mysqli_fetch_assoc($result);
            if($productDetails['stock']<$quantity){continue;}
            $sql="INSERT INTO orderdetailes (PRODUCTID, PRICE, ORDERID) VALUES ('$product_id','".$productDetails['price']."','$ORDERID')";
            $TotalPrice += ($quantity * $productDetails['price']);
            if(!mysqli_query($link, $sql))
            {
                echo mysqli_error($link);
            }
            unset($_SESSION['cart'][$product_id]);

            $stock = $productDetails['stock'] - $quantity ;
            $sql = "update product set STOCK = ".$stock." where PRODUCTID =".$product_id;
//        updating stock in product
            if(!mysqli_query($link, $sql)) {
                echo mysqli_error($link);
            }
        }
        $sql = "update orders set TOTALPRICE = ".$TotalPrice." where ORDERID =".$ORDERID;
//        updating total price in order
        if(!mysqli_query($link, $sql)) {
            echo mysqli_error($link);
        }
    }else{
        echo mysqli_error($link);
    }
    unset($_SESSION['cart']);
    header("location:userindex.php");
}
?>
<body>
<?php include 'UserNavber.php'; ?>


<div class="container">

    <h1>Checkout</h1>
    <?php
    if (isset($_SESSION['cart'])) {
        $total = 0;
        ?>
        <table class="table table-responsive">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Category</th>
                <th scope="col">Stock</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
            </tr>
            <?php

            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $sql = "select pr.PRODUCTNAME as product, br.BRANDNAME as brand, ct.CATEGORYNAME as category, pr.PRICE as price, pr.STOCK as stock from product pr inner join brand br on pr.BRANDID = br.BRANDID inner join category ct on pr.CATEGORYID = ct.CATEGORYID where pr.PRODUCTID=" . $product_id;
                $result = mysqli_query($link, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cost = $row['price'] * $quantity; //work out the line cost
                        $style = "";
                        if ($quantity > $row['stock']) {
                            echo '<tr>
<td>' . $row['product'] . '</td>
<td>' . $row['brand'] . '</td>
<td>' . $row['category'] . '</td>
<td>' . $row['stock'] . '</td>
<td>' . $quantity . '</td>
<td style="text-align: center; color: darkred;">Product skipped due to stock shortage</td>
</tr>';
                            continue;
                        }
                        $total = $total + $cost;
                        echo '<tr ' . $style . '>';
                        echo '<td><a style="text-decoration: none; color: #000;" href="userproduct.php?id=' . $product_id . '">' . $row['product'] . '</a></td>';
                        echo '<td>' . $row['brand'] . '</td>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td>' . $row['stock'] . '</td>';
                        echo '<td>' . $quantity . '</td>';
                        echo '<td>' . $cost . '</td>';
                        echo '</tr>';
                    }
                }
            }

            echo '<tr>';
            echo '<td colspan="5" align="right">Total</td>';
            echo '<td>' . $total . '</td>';
            echo '</tr>';
            ?>
        </table>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    <button type="button" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-secondary btn-lg text-center" style="width: 200px;height: 50px;">BKASH
                    </button>
                    <input type="submit" style="width: 200px;height: 50px;" name='cart'
                           class="btn btn-secondary btn-lg text-center fas fa-user-plus"
                           value="Add to Cart">
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "You have no items in your shopping cart.";
    }
    ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="photo/bkash.jpg" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-4">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TrxID</label>
                                    <input type="text" name="TrxID" class="form-control" id="exampleInputEmail1"
                                           aria-describedby="emailHelp" placeholder="TrxID Please....">
                                </div>
                                <input type="submit" name='order'
                                       class="btn btn-outline-primary btn-lg btn-block fas fa-user-plus" value="Send">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
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
</body>
</html>