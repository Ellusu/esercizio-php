<?php

class product {
    public $product;
    public $quantity;
    public $category;
    public $price;

    public function createProduct($product, $quantity, $category, $price) {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->category = $category;
        $this->price = $price;
    }

}

class defaultList {
    public $store = array();

    public function productExist($name) {
        foreach($this->store as $product) {
            if(strtolower($product->product) == strtolower($name)) {
                return $product;
            }
        }
        return FALSE;
    }

    public function insertDefault() {

        $products = $this->getDefProduct();
        foreach($products as $product) {
            $prd = new product();
            $prd->createProduct($product[0],0,$product[1],$product[2]);
            $this->insertProduct($prd);
        }
    }

    public function insertProduct($prodotto) {
        $this->store[] = $prodotto;
    }

    public function getList() {
        return $this;
    }

    public function getDefProduct() {
        $products = array(
            array('Lord of the ring','book','23'),
            array('chips','food','1'),
            array('Oki','medical','8'),
            array('Harry Potter','book','22'),
            array('Fish','food','2'),
            array('Tachipirina','medical','6'),
            array('Paper','general','2'),
            array('Pen','general','1'),
            array('Flower','general','1'),
            array('Tablet','general','100')
        );
        return $products;
    }

    public function getTax($name) {
        foreach($this->store as $product) {
            if(strtolower($product->product) == strtolower($name)) {
                if($product->category=='book' || $product->category=='food' || $product->category=='medical') {
                    return 1.05;
                } else {
                    return 1.1;
                }

            }
        }
    }


}