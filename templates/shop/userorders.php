<h1>Пользователь #<?= $user ?></h1>

<?php foreach ($userOrders as $id => $order) : ?>
<h2>Заказ # <?= $id ?> оформлен <?= $order['date'] ?></h2>
<?php if (count($order['products']) > 0) : ?>
    <div class="container mt-5">
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
<?php else: ?>
    <div class="py-5">
        <em>В корзине пока ничего нет...</em>
    </div>
<?php endif ?>
<?php endforeach; ?>

