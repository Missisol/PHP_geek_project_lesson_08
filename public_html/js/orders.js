(function ($) {
  $(function () {

    $('.container').on('click', '#delete-order', function () {
      const id = $(this).data('order_id');
      const $el1 = $('#orderItem' + id);
      const $el2 = $('.order' + id);

      $.ajax({
          url: '/shop/orders.php?action=deleteorder',
          type: 'POST',
          data:
            {
              id: id
            },
          success: function (response) {
            if (response.result === 'ok') {
              alert('Заказ удален');
              $el1.remove();
              $el2.remove();
            } else {
              alert('Заказ исполнен, его нельзя удалить');
            }
          },
          error: function () {
            alert('Не удалось удалить заказ');
          }
        });
      });


    $('.container').on('click', '#appruve-order', function () {
      const id = $(this).data('order_id');

      $.ajax({
          url: '/shop/orders.php?action=appruveorder',
          type: 'POST',
          data:
            {
              id: id
            },
          success: function (response) {
            console.log(response.result);
            if (response.result === 'ok') {
              alert('Статус заказа изменен');
            } else {
              alert('Статус заказа был изменен ранее');
            }
          },
          error: function () {
            alert('Не удалось изменить статус заказа');
          }
        });
      });




  })
})(jQuery);




