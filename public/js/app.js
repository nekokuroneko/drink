//テーブルソート
$(document).ready(function() {
  $('.drinkList').tablesorter( {
      headers: {
         1: { sorter: false },
         6: { sorter: false }
      }
  });
});

//検索
$(document).on('click', '.btnKensaku', function() {
  let formdata = $('#serchform').serialize();
  $.ajax({
      type: 'get',
      url:'/index',
      dataType: 'html',
      data: formdata
    })

    .done(function(data) {
      $('.container').html(data);
      $(document).ready(function() {
        $('.drinkList').tablesorter( {
            headers: {
               1: { sorter: false },
               6: { sorter: false }
            }
        });
      });
    })

    .fail(function() {
      console.log('エラー');
    });
});

//削除
$(document).on('click', '.btnSakujo', function() {
  let deleteConfirm = confirm('商品情報を削除しますか？');
  if(deleteConfirm == true) {
    let clickEle = $(this)
    let productID = clickEle.attr('data-product_id');

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        url: '/destroy/'+productID,
        data: {'id':productID}
      })
          
      .done(function() {
        clickEle.parents('tr').remove();
      })

      .fail(function() {
        console.log('エラー');
      });

    } else {
      (function(e) {
        e.preventDefault()
      });
    };
  });
