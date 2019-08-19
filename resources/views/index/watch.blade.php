@extends('app')
    @section('content')
    <header class="masthead text-white text-left">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-7 mx-auto video-info">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="img-video">
                        <img width="300" class="img-thumbnail" src="{{$video_info['v_img']}}" />
                        <span>{{$video_info['v_time']}}</span>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <h1 class="title_video" data-title="{{encrypt($video_info['v_title'])}}">{{$video_info['v_title']}}</h1>
                    <p class="more">{{$video_info['v_desc']}}</p>
                </div>
            </div>
            <!-- download links  -->
            <div class="row">
              <div class="col-xl-12 mx-auto" id="download-area">
                <a href="javascript:void(0)" class="select-type get_v_links btn btn-danger btn-sm"><i class="fas fa-video"></i> Download Video <span class="arrow vid_btn"></span></a>
                <a href="javascript:void(0)" class="select-type get_mp3_links btn btn-warning btn-sm"><i class="fas fa-music"></i> Download MP3 <span class="arrow mp3_btn d-none"></span></a>
                <div class="content">
                    <table id="show_videos_links" class="table-download-links text-dark text-center bg-light table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td style="width: 50%;">Quality</td>
                                <td style="width: 10%;">Format</td>
                                <td style="width: 10%;">Size</td>
                                <td style="width: 30%;">Download</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($video_info['formats']['video'] as $video)
                                <tr>
                                    <td>{{$video['quality']}}</td>
                                    <td>{{$video['ext']}}</td>
                                    <td>{{human_filesize($video['file_size'])}}</td>
                                    <td> <a class="btn btn-success btn-sm" href="{{download_link($video, $video_info['v_title'])}}"> <i class="fas fa-download"></i> Download</a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table id="show_mp3_links" class="table-download-links text-dark text-center bg-light table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td style="width: 50%;">Quality</td>
                                <td style="width: 10%;">Format</td>
                                <td style="width: 10%;">Size</td>
                                <td style="width: 30%;">Download</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($video_info['formats']['audio'] as $sound)
                                @if ( isset($sound['quality']) )
                                <tr>
                                    <td>{{$sound['quality']}}</td>
                                    <td>{{$sound['ext']}}</td>
                                    <td>{{human_filesize($sound['file_size'])}}</td>
                                    <td> <a class="btn btn-success btn-sm" href="{{download_link($sound, $video_info['v_title'])}}"> <i class="fas fa-download"></i> Download</a> </td>
                                </tr>
                                @endif
                            @endforeach
                                <tr class="extract_mp3_tr">
                                    <td>High Quality</td>
                                    <td>.mp3</td>
                                    <td>-</td>
                                    <td> <a class="btn btn-danger btn-sm" data-v-id="{{$video_info['v_id']}}" id="btn_extract_mp3" href="javascript:void(0)"> <i class="fas fa-download"></i> Download MP3</a> </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div><!-- ./row -->
          </div>
          <div class="col-12 col-lg-5">
            <div class="head bg-danger"> <i class="fas fa-video"></i> Suggestes Videos</div>
            <div id="videos-suggests"></div>
          </div>
        </div> <!-- ./row -->
      </div>
    </header>


    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <h2><span class="left d-none d-md-block"></span>Best Features<span class="d-none d-md-block right"></span></h2>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="far fa-handshake m-auto text-primary"></i>
              </div>
              <h3>Free unlimited download </h3>
              <p class="lead mb-0">you can unlimited download free for ever no sign up , no Monthly subscriptions</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="far fa-clock m-auto text-primary"></i>
              </div>
              <h3>Unlimited videos Durations</h3>
              <p class="lead mb-0">small video or Big you can download videos more than +20 hour and covert it MP3 OR MP4</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fas fa-book-open m-auto text-primary"></i>
              </div>
              <h3>Easy to Use</h3>
              <p class="lead mb-0">Quick download as soon as you add the link without any complications!</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fas fa-video m-auto text-primary"></i>
              </div>
              <h3>Videos suggested</h3>
              <p class="lead mb-0">We offer you the best videos suggested by the special video you want to download</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fas fa-music m-auto text-primary"></i>
              </div>
              <h3>Multiple Formats</h3>
              <p class="lead mb-0">Video Downloader Script offers you to download videos in multiple formats including MP4, M4A, 3GP, WEBM, MP3</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fas fa-check m-auto text-primary"></i>
              </div>
              <h3>no Ads annoying</h3>
              <p class="lead mb-0">With your support! There will be no annoying ads or pop-up pages. We will work on it!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection
