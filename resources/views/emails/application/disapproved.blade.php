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
                        <h3>DEAR {{ strtoupper(name($applicant->name)) }},</h3>

                        <p>We regret to inform you that your application for the Provincial Government of Aurora's Educational Assistance Program for Indigent College Students this 1st semester, S.Y. 2021-2022 has been UNSUCCESSFUL due to the very limited slots that we can fill up.</p>
                        <p>However, if our resources allow to accommodate more applicants for the semester, rest assured that you are already listed for possible inclusion the next batch. Kindly standy for updates. </p>
                        <p>Thank you very much for your understanding and interest in our program.</p>
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection