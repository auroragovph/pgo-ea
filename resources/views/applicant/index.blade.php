@extends('layouts.index')

@section('page-title', 'Applicants')


@section('page-action')
    <a target="_blank" href="{{ route('apply.form') }}" class="btn btn-primary">New Applicant</a>    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-ui.table.data-table-api title="Applicant Lists" />

        </div>
    </div>
@endsection
