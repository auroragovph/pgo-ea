@extends('layouts.index')

@section('page-title', 'Screening')



@section('content')
    <div class="row">
        <div class="col-md-12">

            @php($card_title = config('lists.status')[$status]. " lists")

            <x-ui.table.data-table-api title="{{ $card_title }}">
                <x-slot name="actions">
                    <a target="_new" href="{{route('screen', [
                        'export' => true,
                        'type' => $status,
                    ])}}" class="btn btn-primary">Export to Excel</a>
                </x-slot />
            </x-ui.table.data-table-api>
        </div>
    </div>
@endsection
