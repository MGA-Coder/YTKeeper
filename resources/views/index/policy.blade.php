@extends('app')

@section('content')

<div class="page-master">
  <div class="container">
    <h1 class="header">{{$title}}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
      </ol>
    </nav>

    <div class="page-content">
      <p>
          Pursuant to our <a href="{{url('terms-of-use')}}">Terms of Use</a>, this document describes how we treat personal information related to your use of this website and the services offered on and through it
          (the „Service”), including information you provide when using it.
          </p>
          <p>
          We expressly and strictly limit use of the Service to adults over 18 years of age or the age of majority in the individual's jurisdiction, whichever is greater. Anyone under this age is strictly forbidden from using
          the Service. We do not knowingly seek or collect any personal information or data from persons who have not attained this age.
          </p>
          <p>
          <span class="b">Data Collected</span>
          <br>
          <span class="i">Using the Service.</span> When you access the Service, use the search function, convert files or download files, your IP address, country of origin and other non-personal information about your computer
          or device (such as web requests, browser type, browser language, referring URL, operating system and date and time of requests) may be recorded for log file information, aggregated traffic information and in the event
          that there is any misappropriation of information and/or content.
          </p>
          <p>
          <span class="i">Usage Information.</span> We may record information about your usage of the Service such as your search terms, the content you access and download and other statistics.
          </p>
          <p>
          <span class="i">Uploaded Content.</span> Any content that you upload, access or transmit through the Service may be collected by us.
          </p>
          <p>
          <span class="i">Correspondences.</span> We may keep a record of any correspondence between you and us.
          </p>
          <p>
          <span class="i">Cookies.</span> When you use the Service, we may send cookies to your computer to uniquely identify your browser session. We may use both session cookies and persistent cookies.
          </p>
          <p>
          <span class="b">Data Usage</span>
          <br>
          We may use your information to provide you with certain features and to create a personalized experience on the Service. We may also use that information to operate, maintain and improve features and functionality of
          the Service.
          </p>
          <p>
          We use cookies, web beacons and other information to store information so that you will not have to re-enter it on future visits, provide personalized content and information, monitor the effectiveness of the Service
          and monitor aggregate metrics such as the number of visitors and page views (including for use in monitoring visitors from affiliates). They may also be used to provide targeted advertising based on your country of
          origin and other personal information.
          </p>
          <p>
          We may aggregate your personal information with personal information of other members and users, and disclose such information to advertisers and other third-parties for marketing and promotional purposes.
          </p>
          <p>
          We may use your information to run promotions, contests, surveys and other features and events.
          </p>
          <p>
          <span class="b">Disclosures of Information</span>
          <br>
          We may be required to release certain data to comply with legal obligations or in order to enforce our <a href="{{url('terms-of-use')}}">Terms of Use</a> and other agreements. We may also release certain data to protect the
          rights, property or safety of us, our users and others. This includes providing information to other companies or organizations like the police or governmental authorities for the purposes of protection against or
          prosecution of any illegal activity, whether or not it is identified in the <a href="{{url('terms-of-use')}}">Terms of Use</a>.
          </p>
          <p>
          If you upload, access or transmit any illegal or unauthorized material to or through the Service, or you are suspected of doing such, we may forward all available information to relevant authorities, including
          respective copyright owners, without any notice to you.
          </p>
          <p>
          <span class="b">Miscellaneous</span>
          <br>
          While we use commercially reasonable physical, managerial and technical safeguards to secure your information, the transmission of information via the Internet is not completely secure and we cannot ensure or warrant
          the security of any information or content you transmit to us. Any information or content you transmit to us is done at your own risk.
          </p>

    </div>
  </div>
</div>



@endsection
