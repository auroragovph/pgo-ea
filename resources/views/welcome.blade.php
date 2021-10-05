@extends('layouts.landing')

@section('content')
    
<section class="section">
    <div class="container container-md">
        <div class="text-center section-title">
            <h2>Application Process</h2>
        </div>
        <div class="typo">
            <p>MGA MAHALAGANG PAALALA PATUNGKOL SA EDUCATIONAL ASSISTANCE APPLICATION PROCESS PARA SA MGA MAG-AARAL NA NASA KOLEHIYO NGAYONG 1ST SEMESTER, S.Y. 2021-2022</p>

            <ol>
                <li>I-click and "NEW APPLICATION" button para makapag-register. Isang beses lamang ito maaaring gawin ng aplikante upang maiwasan ang duplicate entries.</li>
                <li>Basahin at unawaing maigi ang mga isinasaad sa form at siguraduhing tama ang lahat ng impormasyon na iyong ilalagay. Sundan lamang ang on-screen instructions hanggang sa huling bahagi at tandaan ang iyong tracking number dahil ito ang iyong gagamitin para makita ang iyong application status sa pamamagitan ng "TRACK APPLICATION" button.</li>
                <li>Ang lahat ng application ay dadaan sa ibayong pagsusuri ng komite at ang makakatanggap lamang ng application form via email ay ang mga nakuhang beneficiaries ng programa. Mangyaring antabayanan lamang ang naturang email at sundin ang mga ibibigay na detalye patungkol sa pagpapasa mga requirements.</li>
            </ol>

            <x-include.help />
        </div>
    </div>
</section>
   

    <section class="welcome welcome-blue text-white" aria-label="Page header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 text-center text-lg-left pr-lg-5">

                    <h2 class="welcome-title">Provincial Government of Aurora</h2>

                    <h3>Educational Assistance for College Students</h3>

                    <p class="welcome-description">
                        Online Pre-Application
                    </p>

                    <small>1st Semester, S.Y. 2021-2022</small>

                    <div class="mt-5">
                        <a href="{{ route('apply.form') }}" class="btn btn-green">New Application</a>
                        <a href="{{ route('track') }}" class="btn btn-white ml-2">Track Application</a>
                    </div>
                </div>
                <div class="col-lg-5 pt-6 pt-lg-0">
                    <div class="welcome-image welcome-image-2">
                        <img src="{{ asset('images/banner.jpeg') }}" alt="Kumakalinga, banner"
                            class="preview-image img-responsive">

                        {{-- <h3 class="text-center">MIS TEAM - WE KEEP INNOVATION</h3> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
