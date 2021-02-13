(function( $ ) {
    // ajaxリクエスト関数
    $.fn.ajaxRequest = function(doneFunc, data, url, type) {
        // event.preventDefault();
        // event.stopPropagation();
        $(this).showLoading();
        if(typeof url == 'undefined') {
            url = $(this).attr('action');
        }

        // if(typeof data == 'undefined') {
        //     data = $(this).serialize();
        // }
        // var loading = $(".loading");
        $.ajax({
            url: url,
            type: type,
            data: data,
            dataType:"json",
            beforeSend:function(){
                // loading.removeClass("is-hide");
            },
        })
        .done(function (data) {
            // 通信成功時のコールバック処理
            doneFunc(data)
        })
        .fail(function (data) {
            // 通信失敗時のコールバック処理
            alert('通信に失敗しました。')
        })
        .always(function(){
            $(this).hideLoading();
        })
    };

    $.fn.showLoading = function() {
        let loadingUrl = $("#loading").val();
        $('body').append('<div id="loading_box"><img src=" ' + loadingUrl + '"></div>');
    };

    $.fn.hideLoading = function() {
        $('#loading_box').remove();
    }

})( jQuery );