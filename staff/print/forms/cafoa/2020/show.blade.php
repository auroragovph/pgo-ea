@extends('layouts.master')


@section('page-title')
CAFOA
@endsection

@section('toolbar')

@include('filemanagement::documents.general_action_button', [
    'qrcode' => $cafoa->document->qr,
    'document_id' => $cafoa->document->id
])
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3">
        <x-fms-qr :document="$cafoa->document" />
    </div>
    <div class="col-xl-9">

        <x-ui.card>

            <div class="table-responsive">
                <table class="table table-hover mt-3 table-sm">
    
                    <tr>
                        <td><strong>Obligation No:</strong></td>
                        <td>{{ $cafoa->number }}</td>
                        <td><strong>Payee: </strong></td>
                        <td>{{ $cafoa->payee }}</td>
                    </tr>
    
                    <tr>
                        <td colspan="2"><strong>Requesting Officer:</strong></td>
                        <td colspan="2">{{ $cafoa->signatories['requester']['name'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Particulars:</strong></td>
                        <td colspan="2">{{ $cafoa->particulars }}</td>
                    </tr>
    
    
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mt-5 table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Function</th>
                            <th>Allotment Class</th>
                            <th>Expense Code</th>
                            <th class="text-right">Amount</th>
                        </tr>
    
                       
                    </thead>
                    <tbody>
                        @php($lists = collect($cafoa->lists))
                        
                        @foreach($lists as $list)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $list['function'] ?? '' }}</td>
                                <td>{{ $list['allotment'] ?? '' }}</td>
                                <td>{{ $list['expense'] ?? '' }}</td>
                                <td class="text-right">{{ number_format(floatval($list['amount'] ?? 0), 2) }}</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="4" class="text-right"><strong>TOTAL AMOUNT:</strong></td>
                                <td colspan="1" class="text-right">
                                    <strong>
                                        {{ number_format($lists->sum(function($val){
                                            return floatval($val['amount'] ?? 0);
                                            }), 2) }}
                                    </strong>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>

            @include('filemanagement::forms.cafoa.buttons')

        </x-ui.card>
        
        <x-fms-attachments :attachments="$cafoa->document->attachments" :forms="$cafoa->document->forms" />
    </div>
</div>
@endsection


@section('css-vendor')
@endsection

@section('css-custom')
@endsection


@section('js-vendor')
@endsection

@section('js-custom')
@endsection


