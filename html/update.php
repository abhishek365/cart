<?php
session_start();
if($_REQUEST['action']=='update'){
    $id=$_POST["id"];
    $value=$_POST["value"];
    foreach($_SESSION['cart'] as $product=>$val){
        if($id==$_SESSION['cart'][$product]['id']){
            $_SESSION['cart'][$product]["quantity"]=$value;
        }
    }
    echo json_encode($_SESSION['cart']);
}