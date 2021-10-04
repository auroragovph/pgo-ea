@extends('layouts.index')

@section('page-title', 'Tracking Page')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-ui.card title="Track Results">

                @if (request()->has('id'))

                    @if ($applicant == null)
                        <h1 class="text-center">Tracking number not found. Please check your tracking number and try again.</h1>
                    @else

                        @if ($applicant->scholar == null)
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

                            </table>

                        @endif


                    @endif


                    <div class="hr-text">Track New</div>

                @endif

                <form action="{{ route('track') }}" method="GET">
                    <x-ui.form.input label="Enter track number" name="id" autofocus required />
                    <button class="btn btn-primary">Track</button>
                </form>


            </x-ui.card>
        </div>
        <div class="col-md-6">
            <x-ui.card>
                <p>Ang lahat ng application ay dadaan sa ibayong pagsusuri ng komite at ang makakatanggap lamang ng
                    application form via email ay ang mga nakuhang beneficiaries ng programa. Mangyaring antabayanan lamang
                    ang naturang email at sundin ang mga ibibigay na detalye patungkol sa pagpapasa mga requirements.</p>

                <p>Para sa anumang mga katanungan, magpadala lamang ng mensahe sa sa numerong 0968-854-7611 o Aurora
                    Province Educational Assistance FB Page <a
                        href="https://www.facebook.com/pga.educ.assistance">(www.facebook.com/pga.educ.assistance)</a>.</p>

            </x-ui.card>
        </div>
    </div>
@endsection
