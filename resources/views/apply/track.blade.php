@extends('layouts.index')

@section('page-title', 'Tracking Page')


@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <x-ui.card title="Track Results">
                @if ($applicant == null)
                    <h1 class="text-center">Tracking number not found. Please check your tracking number and try again.</h1>
                @else

                    @if($applicant->scholar == null)
                    <table class="table">
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td>{{ name($applicant->name) }}</td>
                        </tr>

                    
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>For Verification</td>
                        </tr>
                        <tr>
                            <td><strong>Remark</strong></td>
                            <td>For Verification</td>
                        </tr>
                        
                    </table>
                    @else

                        <table class="table">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ name($applicant->name) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Particulars:</strong></td>
                                <td>{{ $applicant->scholar->particulars }}</td>
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
                            
                            <tr>
                                <td><strong>Remarked By:</strong></td>
                                <td>{{ name($latest_remark->user->name) }}</td>
                            </tr>
                        </table>

                    @endif


                @endif


                <div class="hr-text">Track New</div>


                <form action="{{ route('track') }}" method="GET">
                    <x-ui.form.input label="Enter track number" name="id" />
                    <button class="btn btn-primary">Track</button>
                </form>


            </x-ui.card>
        </div>
    </div>
@endsection
