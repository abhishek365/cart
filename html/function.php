<?php
include "config.php";
if($_REQUEST['action']="add"){
    $id = $_POST["id"];
    if(!ispresent($id)){
        addToCart($id);
    }
    echo json_encode($_SESSION['cart']);
    // addToCart($id);
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "</pre>";
}

//Adds the product to the cart
function addToCart($id){
    global $products;
    foreach($products as $products){
        if($id==$products["id"]){
            $var=$products;
            $var['quantity']=1;
            array_push($_SESSION['cart'],$var);
        }
    }
}
//Checks whether the cart already has the product
function ispresent($id){
    foreach($_SESSION['cart'] as $key=>$val){
        if($id==$_SESSION['cart'][$key]['id']){
            $_SESSION['cart'][$key]['quantity']++;
            return true;
        }
    }
    return false;
}

