
$(function () {


    $(".heart").on('click', function () {
        let $this = $(this);
        let question_id_goods;
        question_id_goods = $this.data('good_id');

        // $(this).toggleClass("click");

        //ajax処理スタート
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
            url: '/admin', //通信先アドレスで、このURLをあとでルートで設定します
            type: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
            data: {
                good_id: question_id_goods,
            },
        })
            //通信成功した時の処理
            .done(function (data) {
                $(".heart").toggleClass("click"); //likedクラスのON/OFF切り替え。

            })
            //通信失敗した時の処理
            .fail(function () {
                console.log('fail');
            });
    });

});
