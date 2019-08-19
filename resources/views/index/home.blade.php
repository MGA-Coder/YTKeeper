@extends('app')
    @section('content')
    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Download BIG MP3 AND MP4 from Youtube</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form method="get" action="watch">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" name="v" class="form-control form-control-lg" placeholder="Enter youtube Link...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-danger"> <i class="fas fa-download"></i> Download</button>
                </div>
              </div>
            </form>
          </div>
        </div>
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
