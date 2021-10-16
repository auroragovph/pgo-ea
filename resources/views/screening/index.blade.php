@extends('layouts.index')

@section('page-title', 'Screening')



@section('content')
    <div class="row">
        <div class="col-md-12">
            @php($card_title = config('lists.status')[$status]. " lists")
            <x-ui.table.data-table-api title="{{ $card_title }}" />
        </div>
    </div>
@endsection
