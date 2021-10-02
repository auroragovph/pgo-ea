@extends('layouts.landing')

@section('content')
<section class="welcome welcome-blue text-white" aria-label="Page header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 text-center text-lg-left pr-lg-5">
                <h1 class="welcome-title">Provincial Government of Aurora Educational Assistance</h1>
                <p class="welcome-description">
                    Online Scholarship Application
                </p>

                <div class="mt-5">
                    <a href="{{ route('apply.form') }}" class="btn btn-green">New Application</a>
                    <a href="https://preview.tabler.io" class="btn btn-white ml-2">Track Application</a>
                </div>
            </div>
            <div class="col-lg-5 pt-6 pt-lg-0">
                <div class="welcome-image welcome-image-2">
                    <img src="{{ asset('images/banner.jpeg') }}" alt="Preview of tabler dashboard" class="preview-image img-responsive">

                    <h3 class="text-center">MIS TEAM - WE KEEP INOVATING</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container container-md">
        <div class="text-center section-title">
            <h2>Application Process</h2>
        </div>
        <div class="typo">
            <p>MGA MAHALAGANG PAALALA PATUNGKOL SA EDUCATIONAL ASSISTANCE APPLICATION PROCESS PARA SA MGA MAG-AARAL NA NASA KOLEHIYO NGAYONG 1ST SEMESTER, S.Y. 2021-2022</p>

            <ol>
                <li> I-click and "NEW APPLICATION" button. Isang beses lamang maaaring mag-register ang bawat aplikante upang maiwasan ang duplicate entries.
                </li>
                <li>
                    Siguraduhin na maayos at mabilis ang iyong internet connection bago magsagot ng form. Huwag mag-refresh ng page, i-click ang "back" button, o i-close ang tab dahil hindi agarang makakapag-edit o makakapagpasa muli sa pagkakataong maantala ang pagsasagot nito.
                </li>
                <li>
                    Kung ikaw ay ma-disconnect at makakita ng failed application notice sa kalagitnaan ng pagsasagot ng form, kontakin lamang ang numerong 0968-854-7611 o magpadala ng mensahe sa Aurora Province Educational Assistance FB Page (www.facebook.com/pga.educ.assistance) tuwing 8AM-4PM, Lunes-Biyernes at sundan ang sumusunod na template:

                    <br><br>

                    APPLICATION FORM REQUEST <br>
                    Full Name: Dela Cruz, Juan Santos <br>
                    Address: Brgy. Suklayin, Baler, Aurora <br>
                    Date of Application: October 1, 2021 <br><br>

                    Maghintay lamang ng update mula sa komite upang makapagpatuloy sa iyong application.
                </li>
                <li>
                    Basahin at unawaing maigi ang mga isinasaad sa form at siguraduhing tama ang lahat ng impormasyon na iyong ilalagay. Sundan lamang ang on-screen instructions hanggang sa huling bahagi at tandaan ang iyong tracking number dahil ito ang iyong gagamitin para makita ang iyong application status sa pamamagitan ng "Track your application" button sa parehong link.
                </li>
                <li>
                    Ang lahat ng application ay dadaan sa ibayong pagsusuri ng komite at ang makakatanggap lamang ng application form via email ay ang mga nakuhang beneficiaries ng programa. Mangyaring antabayanan lamang ang naturang email at sundin ang mga ibibigay na detalye patungkol sa pagpapasa mga requirements.
                </li>
            </ol>

           

            <h3 id="website-visitors">For Failed Application</h3>

            <p>Magpadala ng mensahe sa numerong 0968-854-7611 o Aurora Province Educational Assistance FB Page
                <a href="https://facebook.com/pga.educ.assistance" target="_blank">(www.facebook.com/pga.educ.assistance)</a> tuwing 8AM-4PM,  Lunes-Biyernes at sundan ang sumusunod na template:</p>


        </div>
    </div>
</section>
@endsection