@extends('layouts.index')

@section('page-title', 'Applicants')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-ui.table.data-table title="Applicant Lists">

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
                    @foreach($applicants as $applicant)
                        <tr>
                            <td>{{ generate_tracking_number($applicant->id) }}</td>
                            <td>{{ name($applicant->name) }}</td>
                            <td>{{ $applicant->personal['address']['permanent'] }}</td>
                            <td>{{ $applicant->school['name'] }}</td>
                            <td>
                                <a href="{{ route('applicant.show', $applicant->id) }}" class="btn bg-lime btn-sm"> <x-ui.icon icon="book" /> Assess</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-ui.table.data-table>    

        </div>
    </div>
@endsection
