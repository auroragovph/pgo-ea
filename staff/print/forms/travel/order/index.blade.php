@extends('layouts.master')


@section('page-title')
Travel Order
@endsection

@section('toolbar')
<!--begin::Toolbar-->
<div class="d-flex align-items-center">
    <!--begin::Button-->
    <a href="{{ route('fms.travel.order.create') }}" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">
        <i class="fas fa-plus"></i> New Travel Order
    </a>
    <!--end::Button-->
   
</div>
<!--end::Toolbar-->
@endsection

@section('content')
<x-ui.card>
    <table id="fms_travel_order_dt" class="table table-bordered table-striped table-sm" data-api="{{ route('fms.procurement.request.index') }}">
        <thead>
              <tr>
                <th>QR</th>
                <th>Number</th>
                <th>Employees</th>
                <th>Destination</th>
                <th>Purpose</th>
                <th>Action</th>
              </tr>
        </thead>
    </table>
</x-ui.card>
@endsection

@section('css-vendor')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('css-custom')
@endsection


@section('js-vendor')
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
@endsection

@section('js-custom')
<script src="{{ asset('js/Modules/FileManagement/pages/forms/travel/order/index.js') }}"></script>
@endsection


