@extends('layouts.index')

@section('page-title', 'Scholars')


@section('page-action')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-ui.table.data-table-api title="Scholar Lists" />
        </div>
    </div>
@endsection
