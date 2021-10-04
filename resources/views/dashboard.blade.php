@extends('layouts.index')

@section('page-title', 'Dashboard')

@section('content')
    <div class="row row-cards">
        <div class="col-md-3">
            <div class="row row-cards">
                <x-ui.widget.tile title="Applicants" metric="{{ $applicants }}" icon="clipboard-list" />
                <x-ui.widget.tile title="Scholars" metric="{{ $scholars }}" icon="school" />
            </div>
        </div>
        <div class="col-md-9 text-center">
            <img src="{{ asset('images/banner.jpeg') }}" alt="" srcset="">
        </div>
    </div>
@endsection
