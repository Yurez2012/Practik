
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $(document).on('click','.like_passive',function(){

        var news_id = $(this).attr('data-id');
        var user_id = $('#user_id').text();
        var like_count = $('#like_count').text();

        $(this).removeClass('like_passive');
        $(this).addClass('like_active');


        $.ajax({
            type: "POST",
            url: '/like',
            data: {
                news_id: news_id,
                user_id: user_id,
                count: 1
            },
            success: function (data) {
                console.log(data);
            }
        });

    });

    $(document).on('click','.like_active',function(){

        var news_id = $(this).attr('data-id');
        var user_id = $('#user_id').text();
        var like_count = $('#like_count').text();

        $(this).removeClass('like_active');
        $(this).addClass('like_passive');

        $.ajax({
            type: "POST",
            url: '/like',
            data: {
                news_id: news_id,
                user_id: user_id,
                count: 0
            },
            success: function (data) {
                console.log(data);
            }
        });
    });

});