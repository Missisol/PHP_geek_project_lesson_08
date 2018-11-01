<h1>Управление товарами</h1>

<form method="POST">
    <div class="form-row mb-5">
        <div class="col">
            <label for="exampleInputEmail1">Название товара</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Название товара">
        </div>
        <div class="col">
            <label for="exampleInputPassword1">Описание товара</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Описание товара">
        </div>
    </div>
    <div class="form-row mb-5">
        <div class="col">
            <label for="exampleInputEmail1">Цена товара</label>
            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Цена товара">
        </div>
        <div class="col">
            <label for="exampleInputPassword1">Количество на складе</label>
            <input type="text" name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Количество на складе">
        </div>
    </div>
    <div class="form-row mb-5">
        <div class="col">
            <label for="exampleInputEmail1">Url картинки</label>
            <input type="text" name="img" class="form-control" id="exampleInputEmail1" placeholder="Url картинки">
        </div>
        <div class="col">
            <label for="exampleInputPassword1">Url миниатюры</label>
            <input type="text" name="img_min" class="form-control" id="exampleInputPassword1" placeholder="Url миниатюры">
        </div>
    </div>
    <div class="form-row mb-5">
        <div class="col-sm-6">
            <label for="exampleInputEmail1">Категория товара</label>
            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Категория товара">
            <div class="small"><?= $message ?></div>
        </div>
    </div>

    <button type="submit" name="addtobase" id="addtobase" class="btn btn-primary">Сохранить в базе</button>
</form>


