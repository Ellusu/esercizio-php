<?php

class cart {
    public $list = array();

    public function addCart($product, $quantity) {
        if(array_key_exists($product->product, $this->list)) {
            $this->list[$product->product]+=$quantity;
        } else{
            $this->list[$product->product] = $quantity;
        }
    }

}