<?php

require '../engine/core.php';

/**
 * Отображает форму управления продуктами
 */
function routeIndex() {
  $name = $_POST['name'];
  $des = $_POST['description'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $img = $_POST['img'];
  $imgmin = $_POST['img_min'];

  $cat = $_POST['category_name'];
  $catIdobj = getItem("select id from category where `name` = '{$cat}'");
  $catId = $catIdobj['id'];

  if ($catId == null) {
    $message = 'Такой категории в базе не существут';
  } else {
    $sql = "insert into `product` (`name`, `description`, `price`, `quantity`, `category_id`, `img`, `img_min`) values ('{$name}', '{$des}', '{$price}', '{$quantity}', '{$catId}', '{$img}', '{$imgmin}')";
    execute($sql);
    $message = "";
    unset($_POST);
  }


  echo render('admin/adminproducts', [
    'message' => $message,
  ]);
}

route();