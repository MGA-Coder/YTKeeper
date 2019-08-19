<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YTController extends Controller
{
    public function index( Request $request )
    {
    	$v_id = $request->get('v');

        // it's link
        // extract YT id
        if ( !isset($v_id) || empty($v_id) || strlen($v_id) < 5)
            return back();

          // handle id and Link Video
          preg_match( "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $v_id, $matches );


          // If this match exists.
          if ( sizeof( $matches ) >= 2 && strlen( $matches[1] ) )
          {
              $v_id = $matches[1];
              return redirect('watch?v=' . $v_id);
          }

          $full_link  = 'https://www.youtube.com/watch?v=' . $v_id;
          $video_info = YT_get_Video_info($full_link);
          $video_info['v_id'] =  $v_id;


          if (false === $video_info || ! isset( $video_info['formats'] ))
                return abort(404)->with(['video_link',$full_link]);


          $video_info['formats'] = YT_handle_formats($video_info['formats']);

          return view('index.watch')->with(['video_info' => $video_info, 'title' => $video_info['v_title']]);

    }
}
