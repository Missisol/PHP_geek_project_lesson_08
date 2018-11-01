<?php

// поключаем конфигурации приложения
require '../../engine/core.php';

/**
 * Управляет отображением страницы заказов
 */
function routeIndex()
{
  if (isAdmin()) {
    routeOrderadmin();
  } else routeOrderuser();
}

/**
 * Создает страницу управления заказами для администратора
 */
function routeOrderadmin()
{

  $orders = getItemArray("select * from `order`");

  $userOrders = [];

  foreach ($orders as $order) {
    $orderId = $order['id'];

    $products = getItemArray("select order_item.order_id, `order`.created_at, `order`.user_id, product.name, product.price, order_item.quantity, product.img_min  from `order_item`
	inner join `order` on order_item.order_id = `order`.id
    inner join product on product.id = order_item.product_id
    where `order_id` = '{$orderId}'");

    $userOrders[$orderId] = [
      'user' => $order['user_id'],
      'date' => $order['created_at'],
      'status' => $order['status'],
      'products' => $products,
    ];
  }

  echo render('admin/adminorders', [
    'userOrders' => $userOrders,
  ]);
}


/**
 * Создает страницу заказов пользователя
 */
function routeOrderuser()
{

  $user = $_SESSION['auth']['login'];
  $userId = $_SESSION['auth']['id'];
  $orders = getItemArray("select `id`, `created_at` from `order` where `user_id` = '{$userId}' ");

  $userOrders = [];

  foreach ($orders as $order) {
    $orderId = $order['id'];

    $products = getItemArray("select order_item.order_id, `order`.created_at, product.name, product.price, order_item.quantity, product.img_min  from `order_item`
	inner join `order` on order_item.order_id = `order`.id
    inner join product on product.id = order_item.product_id
    where `user_id` = '{$userId}' and `order_id` = '{$orderId}'");

    $userOrders[$orderId] = [
      'date' => $order['created_at'],
      'status' => $order['status'],
      'products' => $products,
    ];
  }

  echo render('shop/userorders', [
    'user' => $user,
    'userOrders' => $userOrders,
  ]);
}

/**
 * Удаление заказа
 */
function routeDeleteorder()
{
  $id = $_POST['id'];

  $status = getItem("select `status` from `order` where `id` = '{$id}'");

  if ($status['status'] == 0) {
    execute("delete from `order_item` where `order_id` = '{$id}'");
    execute("delete from `order` where `id` = '{$id}'");

    renderJson([
      'result' => 'ok',
    ]);
  }
}

/**
 * Изменение статуса заказа администратором
 */
function routeAppruveorder()
{
  $id = $_POST['id'];

  $status = getItem("select `status` from `order` where `id` = '{$id}'");

  if ($status['status'] == 0) {
    execute("update `order` set `status` = '1'");

    renderJson([
      'result' => 'ok',
    ]);
  } else {
    renderJson([
      'result' => 'no',
    ]);
  }
}


// запуск маршрутизации
route();