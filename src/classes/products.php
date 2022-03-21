<?php
class products
{
    public int $id;
    public string $image;
    public float $price;

    public function __construct($id, $image, $price)
    {
        $this->id=$id;
        $this->image=$image;
        $this->price=$price;
    }
    public function display($products)
    {
        foreach ($products as $k => $v) {
            echo '<div id="product-'.$v->id.'" class="product">
            <img src="images/'.$v->image.'">
            <h3 class="title"><a href="#">'.$v->image.'</a></h3>
            <span>Price: $'.$v->price.'</span>
            <button id="products" class="add-to-cart" id="'.$v->id.'" data-pid="'.$v->id.'" href="#" type="submit" name="addCart">Add To Cart</button>
            <input type="text" hidden name="myVal" value="'.$v->id.'">
            </div> ';
        }
    }
}
