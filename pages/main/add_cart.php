<?php
    session_start();
    include "../../admin/config/config.php";
    //them so luong
    if(isset($_GET['query']) && $_GET['query'] == 'plus'){

        $id = $_GET['idsanpham'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array(
                    'pro_name' => $cart_item['pro_name'],
                    'id' => $cart_item['id'],
                    'quantity' => $cart_item['quantity'],
                    'pro_price' => $cart_item['pro_price'],
                    'image' => $cart_item['image'],
                    'pro_code' => $cart_item['pro_code']
                );
                $_SESSION['cart'] = $product;
            } else {
                $plus_quantity = $cart_item['quantity'] + 1;

                if($plus_quantity <= 10){
                    $product[] = array(
                        'pro_name' => $cart_item['pro_name'],
                        'id' => $cart_item['id'],
                        'quantity' => $plus_quantity,
                        'pro_price' => $cart_item['pro_price'],
                        'image' => $cart_item['image'],
                        'pro_code' => $cart_item['pro_code']
                    );
                } else {
                    $product[] = array(
                        'pro_name' => $cart_item['pro_name'],
                        'id' => $cart_item['id'],
                        'quantity' => $cart_item['quantity'],
                        'pro_price' => $cart_item['pro_price'],
                        'image' => $cart_item['image'],
                        'pro_code' => $cart_item['pro_code']
                    );
                }

                $_SESSION['cart'] = $product;
            }
        }

        header("Location:../../index.php?action=cart");
    }

    // tru so luong
    if(isset($_GET['query']) && $_GET['query'] == 'subtract'){
        $id = $_GET['idsanpham'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id) {
                $product[] = array(
                    'pro_name' => $cart_item['pro_name'],
                    'id' => $cart_item['id'],
                    'quantity' => $cart_item['quantity'],
                    'pro_price' => $cart_item['pro_price'],
                    'image' => $cart_item['image'],
                    'pro_code' => $cart_item['pro_code']
                );
                $_SESSION['cart'] = $product;
            } else {
                $sub_quantity = $cart_item['quantity'] - 1;

                if($sub_quantity >= 1){
                    $product[] = array(
                        'pro_name' => $cart_item['pro_name'],
                        'id' => $cart_item['id'],
                        'quantity' => $sub_quantity,
                        'pro_price' => $cart_item['pro_price'],
                        'image' => $cart_item['image'],
                        'pro_code' => $cart_item['pro_code']
                    );
                } else {
                    $product[] = array(
                        'pro_name' => $cart_item['pro_name'],
                        'id' => $cart_item['id'],
                        'quantity' => $cart_item['quantity'],
                        'pro_price' => $cart_item['pro_price'],
                        'image' => $cart_item['image'],
                        'pro_code' => $cart_item['pro_code']
                    );
                }

                $_SESSION['cart'] = $product;
            }
        }
        header("Location:../../index.php?action=cart");
    }

    // xoa san pham vao gio hang
    if(isset($_GET['query']) && $_GET['query'] == 'delete'){
        $id = $_GET['idsanpham'];

        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] != $id){
                $product[] = array(
                    'pro_name' => $cart_item['pro_name'],
                    'id' => $cart_item['id'],
                    'quantity' => $cart_item['quantity'],
                    'pro_price' => $cart_item['pro_price'],
                    'image' => $cart_item['image'],
                    'pro_code' => $cart_item['pro_code']
                );
            }
            $_SESSION['cart'] = $product;
        }
        header("Location:../../index.php?action=cart");
    }

    // xoa tat ca san pham
    if(isset($_GET['xoatatca'])  && $_GET['xoatatca']=='1'){
        unset($_SESSION['cart']);
        header('Location:../../index.php?action=cart');
    }

    // them san pham vao gio hang
    if(isset($_POST['add_cart'])){
        // unset($_SESSION['cart']);
        $id = $_GET['idsanpham'];
        $quantity = 1;

        $sql = "SELECT * FROM tbl_product WHERE id_product='".$id."'";
        $sql_query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($sql_query);
        if($row){
            $new_product = array(
                array(
                    'pro_name' => $row['pro_name'],
                    'id' => $id,
                    'quantity' =>  $quantity,
                    'pro_price' => $row['pro_price'],
                    'image' => $row['picture'],
                    'pro_code' => $row['pro_code']
                    )
                );

                // kiểm tra có tồn tại session
                if(isset($_SESSION['cart'])) {
                    $found = false;
                    foreach($_SESSION['cart'] as $cart_item){
                        if($cart_item['id'] == $id) {
                            $product[] = array(
                                'pro_name' => $cart_item['pro_name'],
                                'id' => $cart_item['id'],
                                'quantity' => $cart_item['quantity']+1,
                                'pro_price' => $cart_item['pro_price'],
                                'image' => $cart_item['image'],
                                'pro_code' => $cart_item['pro_code']
                            );
                            $found = true;
                        } else {
                            $product[] = array(
                                'pro_name' => $cart_item['pro_name'],
                                'id' => $cart_item['id'],
                                'quantity' =>  $quantity,
                                'pro_price' => $cart_item['pro_price'],
                                'image' => $cart_item['image'],
                                'pro_code' => $cart_item['pro_code']
                            );
                        }
                    }

                    if($found == false){
                        $_SESSION['cart'] = array_merge($product, $new_product);
                    } else {
                        $_SESSION['cart'] = $product;
                    }

                } else {
                    $_SESSION['cart'] = $new_product;
                }
        }

        header("Location:../../index.php?action=cart");
    }
?>