<?php
function component($product_name, $product_price, $product_image)
{
    $element = "
        <div class=\"col-md-3 col-sm-6 col-12 my-3 my-md-0\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"./$product_image\" alt=\"Image 1\" class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$product_name</h5>
                    <h6>
                        <i class=\"far fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                        <i class=\"fas fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                        کمی متن الکی برای پر کردن فضای توضیحات محصول.
                    </p>
                    <h5>
                        <small>
                            <s class=\"text-secondary\">1200 ت</s>
                        </small>
                        <span class=\"price\">$product_price ت</span>
                    </h5>
                    <button type=\"submit\" name=\"add\" class=\"btn btn-warning my-3\">
                        <i class=\"fas fa-shopping-cart\"></i>
                        افزودن به سبد خرید
                    </button>
                </div>
            </div>
        </form>
    </div>
        ";
    echo $element;
}
?>