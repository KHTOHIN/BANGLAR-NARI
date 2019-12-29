<!doctype html>
<html lang="en">
<?php include 'header.php'; ?>
<body>
<?php include 'UserNavber.php'; ?>
<div>
    <div class="container-fluid">
        <p>
        <h3>Your Shopping Cart</h3></p>

        <?php
        if (isset($_SESSION['cart'])) {
        $total = 0;
        ?>
        <table class="table table-responsive" style="width: 100%">
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Quantity</th>
                <th>Cost</th>
            </tr>
            <?php
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                $sql = "select pr.PRODUCTNAME as product, br.BRANDNAME as brand, ct.CATEGORYNAME as category, pr.PRICE as price, pr.STOCK as stock from product pr inner join brand br on pr.BRANDID = br.BRANDID inner join category ct on pr.CATEGORYID = ct.CATEGORYID where pr.PRODUCTID=" . $product_id;
                $result = mysqli_query($link, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cost = $row['price'] * $quantity; //work out the line cost
                        $total = $total + $cost;
                        $style = "";
                        if($quantity>$row['stock']){
                            $style='style="background-color:red"';
                        }
                        echo '<tr '.$style.'>';
                        echo '<td><a style="text-decoration: none; color: #000;" href="userproduct.php?id='.$product_id.'">' . $row['product'] . '</a></td>';
                        echo '<td>' . $row['brand'] . '</td>';
                        echo '<td>' . $row['category'] . '</td>';
                        echo '<td>' . $row['stock'] . '</td>';
                        echo '<td>' . $quantity .'</td>';
                        echo '<td>' . $cost . '</td>';
                        echo '</tr>';
                    }
                }
            }

            echo '<tr>';
            echo '<td colspan="5" align="right">Total</td>';
            echo '<td>' . $total . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td colspan="6" align="right"><a href="update-cart.php?action=empty" class="btn btn-primary">Empty Cart</a>&nbsp;'
                . '<a href="UserShop.php" class="btn btn-primary ">Continue Shopping</a>&nbsp;';
            if (isset($_SESSION['USERID'])) {
                echo '<a class="btn btn-primary" href="checkout.php">Checkout</a>';
            } else {
                echo '<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Login</a>';
            }

            echo '</td>';
            echo '</tr>';
            echo '</table>';
            } else {
                echo "You have no items in your shopping cart.";
            }

            ?>
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