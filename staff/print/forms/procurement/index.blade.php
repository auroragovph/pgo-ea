@extends('layouts.master')


@section('page-title')
Procurement
@endsection

@section('toolbar')
<!--begin::Toolbar-->
<div class="d-flex align-items-center">
    <!--begin::Button-->
    <a href="{{ route('fms.procurement.request.create') }}" class="btn btn-primary btn-sm px-3 font-size-base">
        <i class="fas fa-plus"></i> New Purchase Request
    </a>
    <!--end::Button-->
   
</div>
<!--end::Toolbar-->
@endsection

@section('content')
<x-ui.card>
    <table id="fms_proc_dt" class="table table-bordered table-striped table-sm" data-api="{{ route('fms.procurement.index') }}">
        <thead>
              <tr>
                <th>#</th>
                <th>QR</th>
                <th>Number</th>
                <th>Type</th>
                <th>Office</th>
                <th>Particulars</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
        </thead>
    </table>
</x-ui.card>
@endsection

@plugins(['datatables', 'select2', 'swal2'])

@section('css-vendor')
@endsection

@section('css-custom')
@endsection


@section('js-vendor')
@endsection

@section('js-custom')
<script src="{{ asset('js/Modules/FileManagement/pages/forms/procurement/index.js') }}"></script>
@endsection

