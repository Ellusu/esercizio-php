<?php
    include ('class/product.php');
    include ('class/cart.php');

    $cart = new cart();
    $def = new defaultList();
    $def->insertDefault();
    $def->getList();

    echo "git init\n";
    do {
        $product = readline("Write STOP or insert product: ");
        if($prod = $def->productExist($product)) {
            do {
                $quantity = readline("quantity ".$product.": ");

            } while(filter_var($quantity, FILTER_VALIDATE_INT) === false);
            echo "Insert product\n";
            $cart->addCart($prod,$quantity);
        } elseif($product!="STOP") {
            echo "product not exists\n";
        }

    } while($product!="STOP");
    echo "\n";
    $tot_tax_i = 0;
    $tot_tax_e = 0;

    foreach($cart->list as $k=>$elem) {
        $inventary = $def->productExist($k);
        $tax = $def->getTax($k);
        $tot_tax_i += $inventary->price*$tax*$elem;
        $tot_tax_e += $inventary->price*$elem;
        echo $elem.' '.$k.' '.$inventary->price*$tax*$elem."\n";
    }
    echo "Sales tax: ".($tot_tax_i-$tot_tax_e)."\n";
    echo "Total: ".$tot_tax_i."\n";
?>