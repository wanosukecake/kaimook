$(function(){

    // 内容の単位変更
    $('[name=type]').change(function() {
        let typeVal = $(this).val();
        if (typeVal == 1) {
            // 教材の時
            $(".unit").text('を終わらせる')
        } else if (typeVal == 2) {
            // ページの時
            $(".unit").text('ページまで') 
        } else if (typeVal == 3) {
            // 章の時
            $(".unit").text('章まで')        
        } else if (typeVal == 4) {
            // レッスンの時
            $(".unit").text('レッスンまで')               
        }
    });
});