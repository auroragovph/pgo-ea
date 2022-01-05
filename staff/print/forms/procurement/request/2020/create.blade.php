@extends('layouts.master')


@section('page-title')
Purchase Request
@endsection

@section('toolbar')

@endsection

@section('content')
<x-ui.card title="Purchase Request Form">
    <form class="form" id="kt_form" method="POST" action="{{ route('fms.procurement.request.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-ui.form.input label="Fund" type="text" name="fund" value="{{ old('fund') }}" required />
            </div>
            <!--end::Group-->
            <!--begin::Group-->
            <div class="col-md-6">
                <x-ui.form.input label="FPP" type="text" name="fpp" value="{{ old('fpp') }}" required />
            </div>
            <!--end::Group-->
        </div>

        <div class="row">
            <!--begin::Group-->
            <div class="col-md-6">
                <x-ui.form.text-area label="Purpose" name="purpose" value="{{ old('purpose') }}" required />
            </div>
            <!--end::Group-->
            <!--begin::Group-->
            <div class="col-md-6">
                <x-ui.form.text-area label="Particulars" name="particulars" value="{{ old('particulars') }}" required />
            </div>
            <!--end::Group-->
        </div>
       
        <hr>

        <div id="kt_repeater_1">
            <div class="form-group row">
                <div data-repeater-list="lists" class="col-lg-12">
                    <div data-repeater-item="" class="form-group row align-items-center">
                        <div class="col-md-3">
                            <x-ui.form.input label="Stock Number:" type="text" name="stock" />
                        </div>
                        <div class="col-md-3">
                            <x-ui.form.input label="Unit:" type="text" name="unit" />
                        </div>

                        <div class="col-md-3">
                            <x-ui.form.input label="Quantity:" type="number" name="quantity" min="0" />
                        </div>

                        <div class="col-md-3">
                            <x-ui.form.input label="Item Cost:" type="number" name="amount" min="0" step="0.01" />
                        </div>

                        <div class="col-md-12 mt-2">
                            <x-ui.form.text-area label="Item Description" name="description" required />
                        </div>
                       
                        <div class="col-md-1">
                            <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-danger mt-5">
                            <i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <a href="javascript:;" data-repeater-create="" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-1"></i>Add New Row</a>
                </div>
            </div>
        </div>

        <hr>

        <h4>Signatories</h4>
        <div class="row">
            <div class="col-md-6">
               

                <x-ui.form.select2 label="Requesting Officer" name="requesting" required >

                    @foreach($employees->where('division_id', auth_division()) as $employee)
                            <option {{ sh($employee->id, old('requesting')) }} value="{{ $employee->id }}">{{ name_helper($employee->name) }}</option>
                    @endforeach

                </x-ui.form.select2> 



            </div>
            <!--end::Group-->
            
            <!--begin::Group-->
            <div class="col-md-6">
                <x-ui.form.select2 label="Treasury" name="treasury" required >
                    @php($treasury_head_id = $heads->where('id', config('constants.office.TREASURY'))->pluck('head_id')->first())
                    @foreach($employees->where('division_id', config('constants.office.TREASURY')) as $employee)
                        <option {{ sh($employee->id, old('treasury')) }} {{ sh($treasury_head_id, $employee->id) }} value="{{ $employee->id }}">{{ name_helper($employee->name) }}</option>
                    @endforeach
                </x-ui.form.select2> 
            </div>
            <!--end::Group-->


        </div>


        @if(!request()->has('attachment') AND request()->get('attachment') !== true)
        <hr>

        <x-ui.form.select2 label="Liaison Officer" name="liaison" required >
            @foreach($employees->where('division_id', auth()->user()->employee->division_id)->where('liaison', true) as $employee)
                <option {{ sh($employee->id, old('liaison')) }} value="{{ $employee->id }}">{{ name_helper($employee->name) }}</option>
            @endforeach
        </x-ui.form.select2> 
        @endif

        <hr>

        <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>

    </form>
</x-ui.card>
@endsection


@plugins('select2')

@section('css-vendor')
@endsection

@section('css-custom')
@endsection


@section('js-vendor')

{{-- Repeater --}}
<script src="{{ asset('adminlte/plugins/repeater/repeater.js') }}"></script>
@endsection

@section('js-custom')
<script src="{{ asset('js/Modules/FileManagement/pages/forms/procurement/request/create.js') }}"></script>

<script>
$(document).ready(function () {
    $('.select2').select2({
        placeholder: "Select from the list"
    });
});
</script>
@endsection

