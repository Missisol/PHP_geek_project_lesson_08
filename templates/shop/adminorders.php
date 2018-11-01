<h1>Управление заказами</h1>
<?php foreach ($userOrders as $id => $order) : ?>
<h2 id="orderItem<?= $id ?>">Заказ # <?= $id ?> оформлен <?= $order['date'] ?> пользователь id#<?= $order['user'] ?> статус <?= $order['status'] ?> </h2>
      <?php if (count($order['products']) > 0) : ?>
        <div class="container mt-5 order<?= $id ?>" >
          <?php foreach ($order['products'] as $item) : ?>
              <div class="card col-12 mt-2">
                  <div class="card-body">
                      <img src="<?= $item['img_min'] ?>" alt="">
                      <h5 class="card-title">Наименование товара: <?= $item['name'] ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted">
                          Количество <?= $item['quantity'] ?> шт.
                      </h6>
                      <p class="card-text">
                          Цена $<?= $item['price'] ?>. Общая стоимость $<?= $item['quantity'] * $item['price']  ?>
                      </p>
                  </div>
              </div>
          <?php endforeach; ?>
        </div>
  <?php else :?>
  <?php endif ?>
    <div class="text-center py-5 order<?= $id ?>">
        <button class="btn btn-info" id="delete-order" data-order_id="<?= $id ?>">Удалить заказ</button>
        <button class="btn btn-info" id="appruve-order" data-order_id="<?= $id ?>">Исполнить заказ</button>
    </div>
<?php endforeach; ?>

<script src="/js/orders.js" defer></script>

