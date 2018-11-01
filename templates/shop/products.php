<h1>Товары в категории</h1>

<div class="container contentPageProduct">
    <div class="containerRightProductsWrap">
        <div class="products">
          <?php foreach ($prods as $product) : ?>
              <div class="oneProductWrap" id="<?= $product['id'] ?>" data-category_id="<?= $product['category_id']?>">
                  <a class="oneProduct" href="/shop/product.php?id=<?= $product['id'] ?>">
                      <img class="imageOneProduct" alt="product" src=<?= $product['img'] ?> >
                      <div class="textProduct">
                          <p><?= $product['name'] ?></p>
                          <span>$<?= $product['price'] ?></span>
                      </div>
                  </a>
                  <div class="addToCartWrap">
                      <a class="addToCart" href="#">
                          <img src="/img/basket_white.svg" alt="basket">
                          <div class="textAddToCart">
                              Add to Cart
                          </div>
                      </a>
                  </div>
              </div>
          <?php endforeach; ?>
        </div>
    </div>
</div>