@extends('emails.layouts.template1')


@section('content')
<table class="box" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td class="content text-center">
                        <div>
                            <img src="https://i.ibb.co/L1j6xsc/educ-PNG-min.png" alt="" height="160" class="img-illustration" />
                        </div>

                        <h2 class="mb-0 mt-lg">EDUCATIONAL ASSISTANCE PROGRAM FOR INDIGENT COLLEGE STUDENTS</h2>
                    </td>
                </tr>
                <tr>
                    <td class="content pt-0">
                        <h3>Good day, {{ strtoupper(name($applicant->name)) }}!</h3>

                        <p>We are pleased to inform you that you have been ACCEPTED as one of the beneficiaries of the Provincial Government of Aurora's Educational Assistance Program for Indigent College Students for the 1st semester, S.Y. 2021-2022.</p>
                        <p>To proceed with your application, please read and follow these instructions carefully:</p>
                        
                        <ol>
                            <li>Print one (1) copy of your application form below in long bond paper (8.5 x 13"). If there are any errors, write down the right information in capital letters and add your signature beside each correction.</li>
                            <li>Add yours and your parent/guardian's signature to the application form and attach it to the rest of your requirements — original and/or certified true copy of:
                                <ul>
                                    <li>Enrollment/registration form issued by the school registrar</li>
                                    <li>Grades with General Weighted Average issued by the school registrar</li>
                                    <li>Certificate of Indigency/Low Income issued by the barangay </li>
                                    <li>Certificate of No Existing Scholarship issued by the school registrar or MSWDO</li>
                                    <li>Photocopy of both parents/guardian's valid IDs</li>
                                </ul>
                            </li>
                            <li>
                                <p>Submit your application following your preferred schedule:</p>

                                <p>
                                    <strong>BALER, MARIA AURORA, SAN LUIS, AND DIPACULAO APPLICANTS</strong> <br>
                                    November 2-12, 2021 <br>
                                    8 AM - 5 PM <br>
                                    PGO-EA, 2nd Floor, Provincial Capitol
                                </p>


                               <p>
                                    <strong>DINALUNGAN APPLICANTS</strong> <br>
                                    November 10, 2021 <br>
                                    9 AM - 4 PM <br>
                                    Dinalungan Central School
                               </p>

                               <p>
                                    <strong>CASIGURAN APPLICANTS</strong> <br>
                                    November 11, 2021 <br>
                                    Casiguran Central School                                
                               </p>

                               <p>
                                    <strong>DILASAG APPLICANTS</strong> <br>
                                    November 12, 2021 <br>
                                    Dilasag Sports Complex
                               </p>

                               <p>
                                    <strong>DINGALAN APPLICANTS</strong> <br>
                                    November 2-12, 2021 <br>
                                    8 AM - 5 PM <br>
                                    FTC Dingalan
                               </p>


                            </li>
                        </ol>

                        <p>Please double-check your requirements before submission. Applications with incomplete documents will not be accepted. </p>
                        <p>Kindly reply once this email is received.</p>
                        <p>Thank you very much.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection