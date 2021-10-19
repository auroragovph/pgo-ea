@extends('layouts.index')

@section('page-title', 'Tracking Page')


@section('content')
    <div class="row row-cards">
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

                                @if($latest_remark->status == 4)

                                <tr>
                                    <td colspan="2">
                                        <h3 class="text-center">APPROVED APPLICATIONS </h3>
                                        <p>Your application form will be sent via email along with further instructions and submission schedule. In the meantime, please prepare the following documents:</p>
                                        <ul>
                                            <li>Original or certified true copy of enrollment/registration form issued by the school registrar</li>
                                            <li>Original or certified true copy of grades with general weighted average issued by the school registrar</li>
                                            <li>Original Certificate of Indigency/Low Income issued by the barangay </li>
                                            <li>Original Certificate of No Existing Scholarship issued by the school registrar or MSWDO</li>
                                            <li>Photocopy of both parents'/guardian's valid ID</li>
                                        </ul>
                                
                                        <p>Incomplete requirements will not be accepted. For inquiries, please contact 0968-854-7611 or Aurora Province Educational Assistance FB page (www.facebook.com/pga.educ.assistance). Thank you!</p>
                                    </td>
                                </tr>

                                @endif

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

                    <x-include.help />

            </x-ui.card>
        </div>
    </div>
@endsection
