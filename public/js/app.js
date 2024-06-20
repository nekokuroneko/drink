//削除機能 
$(function() {
  $('.btnSakujo').on('click', function() {
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
});


//検索機能
$(function() {
  $('.btnKensaku').on('click', function() {
    let formdata = $('#serchform').serialize();
    $.ajax({
        type: 'get',
        url:'/index',
        dataType: 'html',
        data: formdata
      })

      .done(function(data) {
        $('.container').html(data);
      })

      .fail(function() {
        console.log('エラー');
      });
  });
});


//テーブルソート
$(function() {
    $('.drinkList').tablesorter( {
        headers: {
           1: { sorter: false },
           6: { sorter: false }
        }
    });
});
