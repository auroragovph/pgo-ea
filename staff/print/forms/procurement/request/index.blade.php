@extends('layouts.master')


@section('page-title')
Purchase Request (PR)
@endsection

@section('toolbar')
<a href="{{ route('fms.procurement.request.create') }}" class="btn btn-primary px-3 font-size-base">
    <i class="fas fa-plus"></i> New Purchase Request
</a>
@endsection

@section('content')
<x-ui.card>
    <table id="fms_proc_pr_dt" class="table table-bordered table-striped table-sm" data-api="{{ route('fms.procurement.request.index') }}">
        <thead>
              <tr>
                <th>QR</th>
                <th>Number</th>
                <th>Office</th>
                <th>Particulars</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
        </thead>
    </table>
</x-ui.card>
@endsection

@plugins('datatables')

@section('css-vendor')
@endsection

@section('css-custom')
@endsection


@section('js-vendor')
@endsection

@section('js-custom')
<script src="{{ asset('js/Modules/FileManagement/pages/forms/procurement/request/index.js') }}"></script>
@endsection


