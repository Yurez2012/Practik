
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $(document).on('click','.like_passive',function(){

        var news_id = $(this).attr('data-id');
        var id = '#like_count'+ news_id;
        var user_id = $('#user_id').text();
        var like_count = $(id).text();
        $(id).text(parseInt(like_count) + 1);
        var like_class = 'like_active';

        $(this).removeClass('like_passive');
        $(this).addClass('like_active');


        $.ajax({
            type: "POST",
            url: '/like',
            data: {
                news_id: news_id,
                user_id: user_id,
                like_class: like_class
            },
            success: function (data) {
                console.log(data);
            }
        });

    });

    $(document).on('click','.like_active',function(){

        var news_id = $(this).attr('data-id');
        var id = '#like_count'+ news_id;
        var user_id = $('#user_id').text();
        var like_count = $(id).text();
        $(id).text(parseInt(like_count) - 1);

        $(this).removeClass('like_active');
        $(this).addClass('like_passive');

        $.ajax({
            type: "DELETE",
            url: '/like/delete',
            data: {
                news_id: news_id,
                user_id: user_id,
            },
            success: function (data) {
                console.log(data);
            }
        });
    });








});