// btns , show videos links|show audios links
$(function (){
    $('#show_mp3_links').hide();
    $(document).on('click', '.get_mp3_links', function (){
      $('#show_mp3_links').show();
      $('#show_videos_links').hide();
      $('.get_mp3_links .mp3_btn').removeClass('d-none');
      $('.get_v_links .vid_btn').addClass('d-none');
    });

    $(document).on('click', '.get_v_links', function (){
      $('#show_mp3_links').hide();
      $('#show_videos_links').show();
      $('.get_v_links .vid_btn').removeClass('d-none');
      $('.get_mp3_links .mp3_btn').addClass('d-none');
    });
});
// ./ btns , show videos links|show audios links


// suggests videos
$(function (){
    // get video id

    var vid_id = $('#btn_extract_mp3').attr('data-v-id');
    if ( vid_id !== undefined )
    {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // do ajax to get mp3 link
        $.ajax({
            url: "/ajax/get-similars",
            type: "post",
            data: {'yt_vid' : vid_id},
            dataType: "json",
            beforeSend:function(){
              $('#videos-suggests').html('<div class="loader-videos"><img width="60px" src="/public/img/loader.gif" /></div>');
            },
            success: function (data) {
                $('#videos-suggests').html('');
                $.each(data, function(index) {
                    $('#videos-suggests').append('<a class="row no-gutters vidsuggest" href="https://www.i1mp3.com/watch?v='+ data[index]['id'] +'"><div class="img col-5"><div class="img-video"><img width="100%" src="'+ data[index]['thumbnails'] +'"><span>'+ data[index]['duration'] +'</span></div></div><div class="title col-7">'+data[index]['title']+'<p class="d-block name-channel">'+data[index]['channelTitle']+'</p><p class="counter"><i class="far fa-eye"></i> '+data[index]['viewCount']+'</p></div></a>');
                });
                //
                // list       = [];
                // data.forEach(function(item){
                //   //list.push();
                //   list.push('<a class="row no-gutters vidsuggest" href="https://www.i1mp3.com/watch?v=');
                // });
                // $results.html(list.join(''));

            }
        });
    }

    //
    // if ( vid_id !== undefined )
    // {
    //   var d      = {
    //     part:'snippet',
    //     type:'video',
    //     relatedToVideoId: vid_id,
    //     key:'AIzaSyBxEaM5O2ImjXq0qcoJjSKBx5ZuUZ0s2lQ',
    //     maxResults: 30
    //   },
    //   $results   = $('#videos-suggests'),
    //   $relatedId = vid_id,
    //   list       = [];
    //   var getRelated = function( relatedId )
    //   {
    //       d.relatedToVideoId = relatedId || $relatedId || d.relatedToVideoId;
    //       $.getJSON('https://www.googleapis.com/youtube/v3/search', d, function(data){
    //         list = [];
    //         data.items.forEach(function(item){
    //           list.push('<a class="row no-gutters vidsuggest" href="https://www.i1mp3.com/watch?v='+ item.id.videoId +'"><div class="img col-5"><img width="100%" src="'+ item.snippet.thumbnails.default.url +'"></div><div class="title col-7">'+item.snippet.title+'</div></a>');
    //         });
    //         $results.html(list.join(''));
    //       });
    //   };
    //   getRelated();
    // } // ./ if found video id

});
// ./ suggests videos

// extract mp3 audio from video id
$(document).on('click', '#btn_extract_mp3', function (e)
{
    e.preventDefault();

    var vid_id = $(this).attr('data-v-id');
    $('.extract_mp3_tr').html('<td colspan="4" class="text-center"><img width="60px" src="/public/img/loader.gif" /></td>');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      // do ajax to get mp3 link
      $.ajax({
          url: "/ajax/audio-processing",
          type: "post",
          data: {'yt_vid' : vid_id},
          dataType: "json",
          beforeSend:function(){
            $('.extract_mp3_tr').html('<td colspan="4" class="text-center"><img width="60px" src="/public/img/loader.gif" /><br />Please wait a little <br /> Audio is being extracted</td>');
          },
          success: function (data) {
              $('.extract_mp3_tr').html('\
                <td>'+data.quality+'</td> \
                <td>'+data.format+'</td> \
                <td>'+data.size+'</td> \
                <td><a title="" class="btn btn-primary btn-sm" target="_blank" href="'+data.link+'"><i class="fa fa-download"></i> Download</a></td> ');

                window.location.href = data.link + '?title=' + $('.title_video').attr('data-title');
          }
      });
})
// ./ extract mp3 audio from video id


// handle video description (more|less)
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";

    $('.more').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }
    });
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
// ./ handle video description (more|less)
