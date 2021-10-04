@extends('layouts.index')

@section('page-title', 'Dashboard')

@section('content')
    <div class="row row-cards">
        <div class="col-md-3">
            <div class="row row-cards">

                <div class="col-12">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="font-weight-medium">
                                        1700
                                    </div>
                                    <div class="text-muted">
                                        Applicant
                                    </div>
                                </div>
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9 text-center">
            <img src="{{ asset('images/banner.jpeg') }}" alt="" srcset="">
        </div>
    </div>
@endsection
