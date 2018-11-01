(function ($) {
  $(function () {

    $('#add-product').on('click', function () {
      const id = $(this).data('id');

      $.post(
        '/shop/cart.php?action=additem',
        {id: id, quantity: 1},

        function (response) {
          if (response.result !== 'ERROR') {
            alert('Товар добавлен в корзину');
          } else {
            alert('Не удалось добавить товар в корзину');
          }
        }
      );
    });

    $('.buttonWrap').on('click', '.add-product', function () {
      const id = $(this).data('id');
      const $p = $('#quantity' + id);

      $.post(
        '/shop/cart.php?action=additem',
        {id: id, quantity: 1},

        function (response) {
          if (response.result !== "ERROR") {
            alert('Товар добавлен в корзину');
            $p.text('количество: ' + response.result);
          } else {
            alert('Не удалось добавить товар в корзину');
          }
        }
      );
    });

    $('.buttonWrap').on('click', '.delete-oneproduct', function () {
      const id = $(this).data('id');
      const $p = $('#quantity' + id);
      const $ul = $(this).parents('.buttonWrap');

      $.post(
        '/shop/cart.php?action=deleteoneitem',
        {id: id, quantity: 1},

        function (response) {
          if (response.result !== 'ERROR') {
            alert('Единица товара удалена из корзины');
            response.result > 0 ? $p.text('количество: ' + response.result) : $ul.remove();
          } else {
            alert('Не удалось удалить товар из корзины');
          }
        }
      );
    });

    $('.buttonWrap').on('click', '.delete-product', function () {
      const id = $(this).data('id');
      const $el = $(this).parents('.buttonWrap');

      $.post(
        '/shop/cart.php?action=deleteitem',
        {id: id, quantity: 1},

        function (response, status) {
          if (response.result == "OK") {
            alert('Товар удален из корзины');
            $el.remove();
          } else {
            alert('Не удалось удалить товар из корзины');
          }
        }
      );
    });




  })
})(jQuery);

