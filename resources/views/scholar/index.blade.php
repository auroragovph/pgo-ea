@extends('layouts.index')

@section('page-title', 'Scholars')


@section('page-action')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-ui.table.data-table title="Scholar Lists">

                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>School</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($scholars as $scholar)
                        <tr>
                            <td>{{ $scholar->applicant->tracking_number }}</td>
                            <td>{{ name($scholar->applicant->name) }}</td>
                            <td>{{ $scholar->applicant->personal['address']['present'] ?? '' }}</td>
                            <td>{{ $scholar->applicant->school['name'] ?? '' }}</td>
                            <td>
                                <a href="{{ route('applicant.show', $scholar->applicant->id) }}" title="View">
                                    <x-ui.icon icon="eye" />
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-ui.table.data-table>    

        </div>
    </div>
@endsection
