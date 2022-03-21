<?php

class cart
{
    public $cart1;

    public function __construct()
    {
        $this->cart1 = array();
    }


    /**
     * Function for storing previously added products in cart array
     *
     * @param [array] $array
     * @return void
     */
    public function getCart($array)
    {
        $this->cart1 = $array;
    }
    public function addCart(products $products)
    {
        if (!$this->isProductExistsInCart($products)) {
            $products->quantity = 1;
            array_push($this->cart1, $products);
        }
    }
    public function isProductExistsInCart(products $products)
    {
        foreach ($this->cart1 as $key => $value) {
            if ($value->id == $products->id) {
                $value->quantity += 1;
                return true;
            }
        }
        return false;
    }
    public function reCart()
    {
        return $this->cart1;
    }
    public function updateQuantity($index, $quan)
    {
        foreach ($this->cart1 as $key => $value) {
            if ($key == $index) {
                $this->cart1[$key]->quantity = $quan;
            }
        }
    }
    public function deleteProduct($index)
    {
        foreach ($this->cart1 as $key => $value) {
            if ($key == $index) {
                array_splice($this->cart1, $key, 1);
            }
        }
    }
    public function emptyCart()
    {
        $this->cart1 = [];
    }
}
