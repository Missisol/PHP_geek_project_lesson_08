<h1>Корзина</h1>
<?php if (count($orderItems) > 0) : ?>
    <ul class="list-group my-5"">
      <?php foreach ($orderItems as $item) : ?>
          <li class="list-group-item buttonWrap <?= $item['id'] ?>">
            <?= $item['name'] ?>
              <a href="/shop/product.php?id=<?= $item['id'] ?>">Посмотреть</a>
              <p id="quantity<?= $item['id'] ?>">
                  количество: <?= $item['quantity'] ?>
              </p>
              <button class="btn btn-info add-product" data-id="<?= $item['id'] ?>">Добавить товар</button>
              <button class="btn btn-info ml-5 delete-oneproduct" data-id="<?= $item['id'] ?>">Удалить единицу
                  товара
              </button>
              <button class="btn btn-info ml-5 delete-product" data-id="<?= $item['id'] ?>">Удалить весь товар
              </button>
          </li>
      <?php endforeach; ?>
    </ul>

  <?php if (isLoggedUser()) : ?>
        <a href="/shop/cart.php?action=order" class="btn btn-success">Оформить заказ</a>
  <?php else : ?>
        <button disabled class="btn btn-success">Оформить заказ (только для зарегистрированных пользователей)</button>
  <?php endif; ?>
<?php else: ?>
    <div class="my-5">
        <em>в корзине пока ничего нет</em>
    </div>
<?php endif ?>

<script src="/js/product.js" defer></script>
