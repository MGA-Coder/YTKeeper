<?php
/*
|-------------------------------------------------------------------------------
|             YTHandler Class To handler Youtube Videos
|                         Programmer -> MGAyoub
|                             MGA-coder.com
|-------------------------------------------------------------------------------
*/
namespace App\Libraries;


// instance of GuzzelHTTP Client Request
use  \GuzzleHttp\Client as Guzzel;

class YTHandler
{
    // GoogleAPI Code
    private $YT_main_key       = 'AIzaSyBxEaM5O2ImjXq0qcoJjSKBx5ZuUZ0s2lQ';

    // get video details endpoint
    private $YT_endpoint_video = 'https://www.googleapis.com/youtube/v3/videos';
    private $YT_part_get_video = 'snippet,contentDetails,statistics'; // default part get video with all data

    // get similar videos endpoint
    private $YT_endpoint_similar = 'https://www.googleapis.com/youtube/v3/search';
    private $YT_part_get_similar = 'snippet'; // default part get video with all data
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct(){
      return $this;
    }

    // get similars videos
    public function get_similar_videos($v_id)
    {
      $client = new Guzzel();

      /*
      | request to GoogleAPIs
      */
      $responseClient = $client->request('GET', $this->YT_endpoint_similar,
      [
        'query' => 'part='.$this->YT_part_get_similar.'&key='.$this->YT_main_key.'&relatedToVideoId=' . $v_id . '&maxResults=15&type=video'
      ]);

      // data video
      $check_video = (json_decode($responseClient->getBody(), true));

      if ( empty($check_video['items']) )
        return 'Video id is not correct';

      $video_data = [];
      foreach( $check_video['items'] as $video )
        $video_data[] =  $this->get_video_info($video['id']['videoId']);

      return $video_data;
    }

    // get video info
    public function get_video_info($v_id)
    {
      $client = new Guzzel();

      /*
      | request to GoogleAPIs
      */
      $responseClient = $client->request('GET', $this->YT_endpoint_video,
      [
        'query' => 'part='.$this->YT_part_get_video.'&key='.$this->YT_main_key.'&id=' . $v_id
      ]);

      // data video
      $check_video = (json_decode($responseClient->getBody(), true));

      if ( empty($check_video['items']) )
        return 'Video id is not correct';


      $video_data = [];
      // handle duration with human
      $video_data['duration']      = $this->read_duration($check_video['items'][0]['contentDetails']['duration']);
      $video_data['title']         = $check_video['items'][0]['snippet']['title'];
      $video_data['description']   = $check_video['items'][0]['snippet']['description'];
      $video_data['thumbnails']    = $check_video['items'][0]['snippet']['thumbnails']['default']['url'];
      $video_data['channelTitle']  = $check_video['items'][0]['snippet']['channelTitle'];
      $video_data['viewCount']     = $this->nice_number($check_video['items'][0]['statistics']['viewCount']);
      //$video_data['likeCount']     = $check_video['items'][0]['statistics']['likeCount'];
      //$video_data['dislikeCount']  = $check_video['items'][0]['statistics']['dislikeCount'];
      //$video_data['favoriteCount'] = $check_video['items'][0]['statistics']['favoriteCount'];
      $video_data['id']            = $check_video['items'][0]['id'];
      // $video_data['commentCount']  = $check_video['items'][0]['statistics']['commentCount'];

      return $video_data;
    }

    private function nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n/1000000000000), 2).'T Views';
        elseif ($n > 1000000000) return round(($n/1000000000), 2).'B Views';
        elseif ($n > 1000000) return round(($n/1000000), 2).'M Views';
        elseif ($n > 1000) return round(($n/1000), 2).'K Views';

        return number_format($n);
    }


    // handle video Duration
    private function read_duration($time)
    {
      $start = new \DateTime('@0'); // Unix epoch
      $start->add(new \DateInterval($time));
      return str_replace('00:', '', $start->format('H:i:s'));
    }

}
