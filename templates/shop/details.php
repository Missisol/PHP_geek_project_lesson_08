<div class="container contentPageProduct singleProduct">

    <div class="oneProductWrap">
        <a class="oneProduct" href="/shop/category.php?action=view&id=<?= $item['category_id'] ?>">
            <img class="imageOneProduct" alt="product" src=<?= $item['img'] ?> >
            <br>
            <div class="textProduct">
                <br>
                <p><?= $item['name'] ?></p>
                <br>
                <span>$<?= $item['price'] ?></span>
            </div>
        </a>
    </div>
    <div class="description">
        <h4 class="singleProductText">Описание товара</h4>
        <p class="descriptionText"><?= $item['description'] ?></p>
        <p class="descriptionText">Store quantity  : <?= $item['quantity'] ?></p>
    </div>
    <button class="btn btn-info" id="add-product" data-id="<?= $item['id'] ?>">
        Добавить в корзину
    </button>

    <a href="/shop/category.php?action=view&id=<?= $item['category_id'] ?>">Back</a>
</div>

<script src="/js/product.js" defer></script>