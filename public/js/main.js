$(document).ready(function () {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // Update items cart
  $(".btn-update-item").on('click', function (event) {
    event.preventDefault();

    let id = $(this).data('id');
    let href = $(this).data('href');
    let quantity = $(`#product_${id}`).val();

    $.ajax({
      url: `${href}/${quantity}`,
      type: 'POST',
      dataType: 'JSON',
      data: {
        quantity: quantity
      },
      success: function (response) {
        if (response.status === '200') {
          window.location.href = '/cart/show'
        }
      }
    });
  });
});
