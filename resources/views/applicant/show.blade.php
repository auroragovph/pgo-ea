@extends('layouts.index')

@php($tracking_number = generate_tracking_number($applicant->id))

@section('page-title', $tracking_number)


@section('page-action')
    @if ($applicant->scholar !== null)
        <a href="{{ route('applicant.show', $applicant->id) }}?print=true" class="btn btn-primary">
            <x-ui.icon icon="printer" /> Print
        </a>
    @endif
@endsection


@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="row row-cards">

                <div class="col-md-12">
                    <x-ui.card title="Assessment Details">
                        @if ($applicant->scholar == null)
                            <h1 class="text-center">No assessment for this applicant at this moment.</h1>
                        @else
                            <table class="table">
                                <tr>
                                    <td><strong>Particulars</strong></td>
                                    <td>{{ $applicant->scholar->particulars }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Amount</strong></td>
                                    <td>{{ pretty_number($applicant->scholar->amount) }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Period Cover</strong></td>
                                    <td>{{ $applicant->scholar->period['start'] }} -
                                        {{ $applicant->scholar->period['end'] }}</td>
                                </tr>

                                <?php
                                $remarks = $applicant->remarks;
                                $latest_remark = $remarks->first();
                                ?>

                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>{{ config('lists.status')[$latest_remark->status ?? 1] ?? 'undefined' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Remark</strong></td>
                                    <td>{{ $latest_remark->remark }}</td>
                                </tr>
                            </table>
                        @endif
                    </x-ui.card>
                </div>

                <div class="col-md-12">
                    <x-ui.card title="Personal Details">
                        <table class="table">
                            <table class="table">
                                <tr>
                                    <td><strong>Name:</strong></td>
                                    <td>{{ name($applicant->name) }}</td>
                                    <td><strong>Birthday:</strong></td>
                                    <td>{{ $applicant->personal['birthday'] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Address:</strong></td>
                                    <td>{{ $applicant->personal['address']['present'] }}</td>
                                    <td><strong>Email Address:</strong></td>
                                    <td>{{ $applicant->personal['email_address'] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Contact Number:</strong></td>
                                    <td>{{ $applicant->personal['contact_number'] }}</td>
                                    <td><strong>Civil Status:</strong></td>
                                    <td>{{ $applicant->personal['civil_status'] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>School Name:</strong></td>
                                    <td>{{ $applicant->school['name'] }}</td>
                                    <td><strong>School Address:</strong></td>
                                    <td>{{ $applicant->school['address'] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Year/Grade Level:</strong></td>
                                    <td>{{ $applicant->school['year_level'] }}</td>
                                    <td><strong>GWA:</strong></td>
                                    <td>{{ $applicant->school['gwa'] }}</td>
                                </tr>
                            </table>
                        </table>
                    </x-ui.card>
                </div>

                <div class="col-md-12">
                    <x-ui.card title="Family Details">
                        <table class="table">

                            <tr>
                                <td>
                                    <p class="text-center"><strong>Father Details:</strong></p>

                                    <p><strong>Name: </strong>  {{ $applicant->family['father']['name'] ?? '' }}</p>
                                    <p><strong>Address: </strong> {{ $applicant->family['father']['address'] ?? '' }}</p>
                                    <p><strong>Contact Number: </strong> {{ $applicant->family['father']['contact_number'] ?? '' }}</p>
                                    <p><strong>Occupation: </strong> {{ $applicant->family['father']['occupation'] ?? '' }}</p>
                                    <p><strong>Employer: </strong> {{ $applicant->family['father']['employer'] ?? '' }}</p>
                                </td>

                                <td>
                                    <p class="text-center"><strong>Mother Details:</strong></p>

                                    <p><strong>Name: </strong>  {{ $applicant->family['mother']['name'] ?? '' }}</p>
                                    <p><strong>Address: </strong> {{ $applicant->family['mother']['address'] ?? '' }}</p>
                                    <p><strong>Contact Number: </strong> {{ $applicant->family['mother']['contact_number'] ?? '' }}</p>
                                    <p><strong>Occupation: </strong> {{ $applicant->family['mother']['occupation'] ?? '' }}</p>
                                    <p><strong>Employer: </strong> {{ $applicant->family['mother']['employer'] ?? '' }}</p>
                                </td>
                            </tr>



                            <tr>
                                <td><strong>Pag-aari ng Pamilya</strong></td>
                                <td>{{ $applicant->family['assets'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Naninirahan Kasama Ang Magulang</strong></td>
                                <td>{{ $applicant->family['living'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kapatid na nag aaral</strong></td>
                                <td>{{ $applicant->family['sibling'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Kapatid nag susustento</strong></td>
                                <td>{{ $applicant->family['sponsor'] ?? '' }}</td>
                            </tr>


                        </table>
                    </x-ui.card>
                </div>

                <div class="col-md-12">
                    <x-ui.card title="Other Details">
                        <table class="table">
                            
                            <tr>
                                <td><strong>Working Student</strong></td>
                                <td>{{ $applicant->other['working'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>NAG APPLY SA IBA PANG EDUCATIONAL ASSISTANCE PROGRAM NG GOBYERNO</strong></td>
                                <td>{{ $applicant->other['apply']['sem'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Gamit Sa pag aaral</strong></td>
                                <td>{{ $applicant->other['ol']['own'] ?? '' }} |
                                    {{ $applicant->other['ol']['type'] ?? '' }} |
                                    {{ $applicant->other['ol']['internet'] ?? '' }}</td>
                            </tr>
                        </table>
                    </x-ui.card>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <x-ui.card title="Assessment Form" class="sticky-top">
                <form id="ajax_form" method="POST" action="{{ route('applicant.assess', $applicant->id) }}">
                    @csrf
                    <div class="row">

                        @if ($applicant->scholar == null)
                            <div class="col-md-12">

                                <x-ui.form.text-area label="Particulars" name="particulars" readonly>
                                    Educational Assistance
                                </x-ui.form.text-area>

                                <x-ui.form.input type="number" label="Amount" step="0.01" name="amount" required />


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <x-ui.form.input type="date" label="Period Cover Start" name="period_start" required />
                                </div>
                                <div class="col-md-6">
                                    <x-ui.form.input type="date" label="Period Cover End" name="period_end" required />
                                </div>
                            </div>

                        @else

                            <div class="col-md-12">

                                <x-ui.form.text-area label="Particulars" readonly>
                                    Educational Assistance
                                </x-ui.form.text-area>

                                <x-ui.form.input label="Amount" value="{{ pretty_number($applicant->scholar->amount) }}" readonly/>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <x-ui.form.input type="date" label="Period Cover Start" value="{{ $applicant->scholar->period['start'] }}" readonly />
                                </div>
                                <div class="col-md-6">
                                    <x-ui.form.input type="date" label="Period Cover End" value="{{ $applicant->scholar->period['end'] }}" readonly />
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">

                            <x-ui.form.text-area label="Remarks" name="remarks" required />

                            <x-ui.form.choices label="Status" name="status" required>
                                @foreach (config('lists.status') as $key => $status)
                                    <option value="{{ $key }}">{{ $status }}</option>
                                @endforeach
                            </x-ui.form.choices>

                        </div>




                    </div>

                    <hr>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </x-ui.card>
        </div>

    </div>

    <x-include.form.ajax />
@endsection
