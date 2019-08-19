<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index.home')->with(['title' => 'Download Big Youtube Videos Download Youtube MP4 and MP3']);
});


Route::get('watch', 'YTController@index');


Route::get('download', function ( ){
    $data = decrypt(Request::get('v'));
    return force_download($data[0] . $data['ext'] , $data['url_download'], '', $data['file_size']);
});
Route::get('download/{path}', function ($path){

    $title = decrypt(strip_tags(Request::get('title'))) . '.mp3';
    $path  = 'public/mp3/' . $path;
    return force_download($title, $path, 'audio/mpeg', 0, false, true);
});

Route::post('ajax/get-similars', function ()
{
    $v_id = Request::post('yt_vid');
    $vids = new \App\Libraries\YTHandler();
    return $vids->get_similar_videos($v_id);
});

Route::post('ajax/audio-processing', function ()
{
    $mp3         = [];
    $v_id        = Request::post('yt_vid');

    $mp3_name    = str_random(10) . '_sound.mp3';
    $path_mp3    = 'public/mp3/' . $mp3_name;
    $path_vid    = 'public/mp3/' . str_random(10) . '_video.m4a';
    
    $commend_vid = "/usr/local/bin/youtube-dl -f 140 -o '{$path_vid}' https://www.youtube.com/watch?v={$v_id}";
    $commend_mp3 = "/usr/bin/ffmpeg -i '{$path_vid}' -vn -f mp3 -ab 128k {$path_mp3}";

    @exec($commend_vid, $v_r);
    @exec($commend_mp3, $a_r);

    @unlink("{$path_vid}");

    $mp3['quality'] = 'High Quality';
    $mp3['format']  = '.mp3';
    $mp3['link']    = url('download/' . $mp3_name);
    $mp3['size']    = human_filesize(filesize($path_mp3));
    return $mp3;
});

// handle pages
Route::get('contact-us', function (){
    return view('index.contact')->with(['title' => 'Contact us']);
});

Route::post('contact-us', function (){
  // send msg to my Gmail account

    $name     = request('name');
    $email    = request('email');
    $subject  = request('subject');
    $mData    = request('message');

    Mail::send([], [], function ($message) use($name, $email, $subject, $mData)
    {
          $message->to('m.gamalayoub@gmail.com')
            ->from('no-replay@i1MP3.COM', 'i1MP3.COM')
            ->subject('New Msg from i1mp3.com')
            ->setBody("<div style='text-align: left;'>from : {$name} <br /> email from : {$email} <br /> Subject : {$subject} <br /> content : {$mData}</div>", 'text/html'); // for HTML rich messages

    });

    session()->flash('result', 'your message has been sent successfully , thank you');
    return back();
});

Route::get('privacy-policy', function (){
    return view('index.policy')->with(['title' => 'Privacy Policy']);
});

Route::get('terms-of-use', function (){
    return view('index.terms')->with(['title' => 'Terms of Use']);
});

Route::get('rss\.xml', function (){
    return view('index.rss');
});

Route::get('sitemap\.xml', function (){
    return view('index.sitemap');
});
