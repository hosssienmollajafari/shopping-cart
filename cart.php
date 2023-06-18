<?php
session_start();

require_once('./php/CreateDb.php');
require_once('./php/component.php');

$db = new CreateDb("Productdb", "Producttb");

if(isset($_POST['remove'])) {
    if($_GET['action'] == 'remove') {
        foreach($_SESSION['cart'] as $key => $value) {
            if($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('محصول از سبد خرید حذف شد.')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید</title>
    <!-- stylesheet file  -->
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap cdn  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- fontawesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        integrity="sha512-rqQltXRuHxtPWhktpAZxLHUVJ3Eombn3hvk9PHjV/N5DMUYnzKPC1i3ub0mEXgFzsaZNeJcoE0YHq0j/GFsdGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">
    <?php
    require_once("./php/header.php")
        ?>
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart text-right">
                    <h6 class="my-3">سبد خرید من</h6>
                    <hr>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($product_id as $id) {
                                if ($row['id'] == $id) {
                                    cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                    $total = $total + (int) $row['product_price'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>سبد خرید شما خالی است.</h5>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4 mr-auto border rounded mt-5 bg-white h-25">
                <div class="pt-sm-4 pt-md-0 text-right">
                    <h6 class="my-3 text-nowrap">فاکتور</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6 pb-1">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>مجموع: ($count) محصول:</h6>";
                            } else {
                                echo "<h6>مجموع: (0) محصول:</h6>";
                            }
                            ?>
                            <h6>هزینه حمل و نقل:</h6>
                            <hr>
                            <h6>مجموع قابل پرداخت:</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>
                                <?php
                                echo number_format($total);
                                ?>
                                ت
                            </h6>
                            <h6 class="text-success">رایگان</h6>
                            <hr>
                            <h6>
                                <?php 
                                echo number_format($total);
                                ?>
                                ت
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- bootstrap js  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>