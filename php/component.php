<?php
function component($product_name, $product_price, $product_image, $product_id)
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
                    <input type=\"hidden\" name=\"product_id\" value=$product_id>
                </div>
            </div>
        </form>
    </div>
        ";
    echo $element;
}


function cartElement($product_image, $product_name, $product_price, $product_id)
{
    $element = "
    <form action=\"cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3 pr-md-0\">
                <img src=$product_image alt=\"Imag 1\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-6 text-right\">
                <h5 class=\"pt-2\">$product_name</h5>
                <small class=\"text-secondary\">فروشنده: علی اکبر ملاجعفری</small>
                <h5 class=\"pt-2\">$product_price ت</h5>
                <button type=\"submit\" class=\"btn btn-warning\">ذخیره برای بعد</button>
                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">حذف</button>
            </div>
            <div class=\"col-md-3 py-5\">
                <div class=\"d-flex\">
                    <button type=\"button\" class=\"btn bg-light border rounded\">
                        <i class=\"fas fa-minus\"></i>
                    </button>
                    <input type=\"number\" value=\"1\" class=\"d-inline w-50 mx-2 form-control\">
                    <button type=\"button\" class=\"btn bg-light border rounded\">
                        <i class=\"fas fa-plus\"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

    ";
    echo $element;
}
?>