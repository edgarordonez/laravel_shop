var $
$(document).ready(function () {

  $('.ratingProduct').rating({displayOnly: true})

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  })

  // Update items cart
  $('.btn-update-item').on('click', function (event) {
    event.preventDefault()

    let id = $(this).data('id')
    let href = $(this).data('href')
    let quantity = $(`#product_${id}`).val()

    let elementPriceProduct = $(`#price_quantity_${id}`)
    let elementPriceTotalProduct = $(`#price_total_${id}`)
    let elementSubtotalTable = $('#price_total_table')
    let elementSubtotalDetail = $('#price_total_detail')
    let badge = $('.badge')

    $.ajax({
      url: `${href}/${quantity}`,
      type: 'POST',
      dataType: 'JSON',
      data: {
        quantity: quantity
      },
      success: function (response) {
        if (response.status === '200') {
          badge.html(response.data.itemsQuantity)
          let priceProductTotal = Number(elementPriceProduct.html().slice(0, -1)) * Number(quantity)
          elementPriceTotalProduct.html(`${priceProductTotal.toFixed(2)}€`)

          elementSubtotalTable.html(`${response.data.total.toFixed(2)}€`)
          elementSubtotalDetail.html(`Total: ${response.data.total.toFixed(2)}€`)
        }
      }
    })
  })
})
