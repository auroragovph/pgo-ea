<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Educational Assistance Form</title>
    <link rel="stylesheet" href="{{ asset('tabler/libs/tailwind/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tabler/libs/paper/paper.css') }}">


    <style>
        body {
            font-family: 'Times New Roman', Times, serif !important;
            font-size: 9px;

        }

        center {
            font-family: 'Times New Roman', Times, serif !important;
            font-size: 10px;
            font-color: red;

        }

        @page {
            size: legal;
        }




        .office-title {
            font-size: 300px;
            font-family: 'Monotype Corsiva', sans-serif;
        }

        .namedes {
            line-height: 0.5em;
        }

        .pt-2 {
            padding-top: 7px;
        }

        .align-left {
            float: left;
        }

        .align-right {
            float: right;
        }

        .m-auto {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }



        hr {
            border: 0.5px solid gray;
        }

    </style>



</head>

<body class="legal ">
    <section class="sheet padding-10mm">

        <!-- HEADER -->
        <div class="mt-6 flex">
            <div class="w-3/12 flex">
                <img class="h-12 m-auto" src="{{ asset('logo/md.png') }}" alt="" srcset="">
            </div>
            <div class="text-center w-8/12 flex">
                <div class="m-auto">
                    <p>Republic of the Philippines</p>
                    <p><b>PROVINCIAL GOVERNMENT OF AURORA</b></p>
                    <p>Baler</p>
                    <p><b>EDUCATIONAL ASSISTANCE PROGRAM FOR INDIGENT COLLEGE STUDENTS</b></p>
                    <p>Application Form | S.Y. 2020-2021 First Semester| TRACKING NUMBER: {{ $applicant->tracking_number }}</p>



                </div>
            </div>
            <div class="w-3/12 flex">
                <img class="h-12 m-auto" src="{{ asset('images/kumakalinga.png') }}" alt="" srcset="">
            </div>


        </div>



        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">

            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  "><b>SINU-SINO ANG MAAARING
                        MAG-APPLY?ANU-ANO ANG MGA DOKUMENTO NA KAILANGANG IPASA?</b> </th>

            </tr>

        </table>

        <table class="m-0 border-black border-opacity-75 border border-opacity-50 " style="width: 100%;">

            <tr>
                <th
                    class="text-left bg-white-500  border-opacity-50 border-black border-opacity-75 border-opacity-100  text-xs font-sans font-light ">
                    QUALIFICATIONS:<br>
                    - Kasalukuyang enrolled sa 4-5 year course at nag-aaral sa anumang <br>public o private school sa
                    bansa<br>
                    - Filipino citizen na may isa o parehong magulang ang isinilang at nakatira sa lalawigan<br>
                    - High school graduate o kasalukuyang college student na may<br> 80% pataas na general weighted
                    average mula sa nakaraang school year/semester; <br>70% pataas para sa mga Out-of-School Youth and
                    Adult Learners (OSYA) sa ilalim ng Alternative Learning System (ALS)<br>
                    - Kabilang sa indigent/low-income family <br>at may buwanang kita na hindi lalagpas sa Php10,481
                    para sa pamilya na may limang miyembro<br>
                    - Kasalukuyang hindi nakakatanggap ng anumang scholarship o grant mula sa pamahalaan
                </th>
                <th
                    class="text-left  border-black border-opacity-75 text-xs border-l-2  border-opacity-50 bg-white-500 font-sans font-light  ">
                    REQUIREMENTS:<br>
                    ( ) Clear copy ng certificate <br>of grades mula sa school registrar<br>
                    ( ) Clear copy of certificate of enrollment/registration<br> mula sa school registrar<br>
                    ( ) Original copy ng certificate of indigency/low income mula sa barangay kung saan<br>
                    permanenteng naninirahan ang aplikante<br>
                    ( ) Original copy ng certificate of no existing scholarship mula sa school registrar o
                    munisipyo kung saan kabilang ang aplikante<br>

                    KARAGDAGANG PAPEL PARA<br> SA MGA OUT-OF-SCHOOL YOUTH/ALS:<br>
                    ( ) Original certificate mula sa ALS Mobile Teacher/ALS <br>District Coordinator na ang mag-aaral
                    ay<br> isang OSYA learner at parte ng ALS<br>
                </th>


            </tr>

        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">

            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light">FOR UPDATES AND INQUIRIES:
                    ea.aurora.gov.ph | facebook.com/pga.educ.assistance | pga.educ.assistance@gmail.com </th>

            </tr>

        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">

            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">MGA PANUTO: Sagutan ang lahat ng mga
                    hinihinging impormasyon. </th>

            </tr>

        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">

            <tr>
                <th class="text-center bg-gray-100 text-xs border-black border-opacity-50 font-sans font-light  ">
                    PERSONAL NA IMPORMASYON NG APLIKANTENG MAG-AARAL </th>

            </tr>

        </table>


        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>

                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light   ">
                    <p class="uppercase">Last Name:<b> {{ $applicant->name['last'] }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">First Name: <b>{{ $applicant->name['first'] }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">Middle Initial:<b> {{ $applicant->name['middle'][0] }}</b></p>
                </th>

            </tr>

        </table>

        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">AGE:<b> {{ Carbon\Carbon::parse($applicant->personal['birthday'] ?? '')->age }}</b></p>
                </th>

                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">PRESENT ADDRESS:<b>{{ $applicant->personal['address']['present'] ?? '' }}</b></p>
                </th>


            </tr>

        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">
                    <p class="uppercase">DATE OF BIRTH: <b>{{ $applicant->personal['birthday'] ?? '' }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100  border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">PLACE OF BIRTH:<b> {{ $applicant->personal['birthplace'] ?? '' }}</b></p>
                </th>
            </tr>

        </table>


        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-normal ">
                    <p class="uppercase">SEX: {{ $applicant->personal['sex'] ?? '' }}</p>
                </th>

                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">PERMANENT ADDRESS:<b> {{ $applicant->personal['address']['permanent'] ?? '' }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light   ">
                    <p class="uppercase">CIVIL STATUS:<b> {{ $applicant->personal['civil_status'] ?? '' }}</b></p>
                </th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>
            </tr>
        </table>


        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">CONTACT NUMBER: <b>{{ $applicant->personal['contact_number'] ?? '' }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    EMAIL ADDRESS:<b> {{ $applicant->personal['email_address'] ?? '' }}</b></th>

            </tr>
        </table>

        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">SCHOOL ADDRESS:<b>{{ $applicant->school['address'] ?? '' }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100  border-black border-opacity-75 border-l-2 text-xs font-sans font-light  ">
                    <p class="uppercase">SCHOOL:<b> {{ $applicant->school['name'] ?? '' }}</b></p>
                </th>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">YEAR LEVEL: <b>{{ $applicant->school['year_level'] ?? '' }}</b></p>
                </th>



            </tr>
        </table>

        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light  ">
                    NAKAPAG-APPLY KA NA BA SA PGA EDUCATIONAL ASSISTANCE PROGRAM NOON? KUNG OO, ANONG MGA SEMESTER AT
                    SCHOOL YEAR ITO? <BR><b>{{ $applicant->other['apply']['sem'] ?? '' }} </b> </th>
                <th
                    class="text-left bg-gray-100 border-l-2  border-black border-opacity-75 text-xs font-sans font-light  ">
                    NAG-APPLY KA NA RIN BA SA IBA PANG EDUCATIONAL ASSISTANCE PROGRAM NG GOBYERNO? KUNG OO, SAAN?<br><b>
                        {{ $applicant->other['apply']['where'] ?? '' }}  </b> </th>

            </tr>
        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <!--  <tr>
                   <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light  "></th>
                   
                  
               </tr> -->

            <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
                <tr>
                    <th class="text-left bg-gray-100 text-xs font-sans font-light  ">IKAW BA AY WORKING
                        STUDENT?<br><b>{{ $applicant->other['working'] ?? '' }} </b></th>
                    <th class="text-left bg-gray-100"></th>
                    <th class="text-left bg-gray-100"></th>

                </tr>

            </table>
        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-center bg-gray-100 border-black border-opacity-75 text-xs font-sans font-light  ">
                    IMPORMASYON NG IYONG PAMILYA</th>


            </tr>
        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">FATHER`S NAME: <b> {{ $applicant->family['father']['name'] ?? '' }} </b><br>
                        ADDRESS:<b> {{ $applicant->family['father']['address'] ?? '' }}</b><br>
                        CONTACT NUMBER: <b>{{ $applicant->family['father']['contact_number'] ?? '' }}</b><br>
                        OCCUPATION: <b>{{ $applicant->family['father']['occupation'] ?? '' }}</b><br>
                        NAME OF EMPLOYER: <b>{{ $applicant->family['father']['employer'] ?? '' }}</b><br>



                    </p>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light  ">
                    <p class="uppercase">MOTHER`S NAME: <b>{{ $applicant->family['mother']['name'] ?? '' }}/b><br>
                        ADDRESS:<b> {{ $applicant->family['mother']['address'] ?? '' }}</b><br>
                        CONTACT NUMBER: <b>{{ $applicant->family['mother']['contact_number'] ?? '' }}</b><br>
                        OCCUPATION:<b> {{ $applicant->family['mother']['occupation'] ?? '' }}</b><br>
                        NAME OF EMPLOYER: <b>{{ $applicant->family['mother']['employer'] ?? '' }}</b><br>


                    </p>
                </th>


            </tr>

        </table>






        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">MONTHLY INCOME:<b>
                    {{ $applicant->family['income']?? '' }}</b> </th>
                <th
                    class="text-left bg-gray-100 border-l-2 border-black border-opacity-75 text-xs font-sans font-light   ">
                    ILAN KAYO SA BAHAY:<b>  {{ $applicant->family['member']?? '' }} </b></th>
                <th class="text-left bg-gray-100"></th>

            </tr>

        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">ANU-ANO ANG MGA PAG-AARI NG INYONG
                    PAMILYA?<br><b>{{ $applicant->family['assets']?? '' }} </b></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>

            </tr>

        </table>
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">NANINIRAHAN KA BA KASAMA ANG IYONG MGA
                    MAGULANG?<br><b> {{ $applicant->family['living']?? '' }} </b></th>



            </tr>

        </table>

        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">KUNG MAY MGA KAPATID NA NAG-AARAL PA,
                    ILAN AT ANONG GRADE/YEAR LEVEL NA NILA?<br><b>{{ $applicant->family['sibling']?? '' }} </b></th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>

            </tr>

        </table>
        <!--    <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
                   <tr>
                   <th class="text-left bg-gray-100 text-xs">-</th>
                   <th class="text-left bg-gray-100"></th>
                   <th class="text-left bg-gray-100"></th>
                  
               </tr>
              
            </table> -->
        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100 text-xs font-sans font-light  ">KUNG MAYROONG MGA KAPATID NA
                    NAGSUSUSTENTO SA INYONG PAMILYA, ANO ANG KANILANG TRABAHO AT MAGKANO ANG KANILANG BUWANANG KITA?<br>
                    <b>{{ $applicant->family['sponsor']?? '' }} </b>
                </th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>

            </tr>

        </table>

        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-left bg-gray-100  font-sans font-light   text-xs">ANO ANG IYONG GAMIT PARA SA
                    ONLINE/DISTANCE LEARNING?<br>
                    <b>{{ $applicant->other['ol']['own'] ?? '' }} |
                        {{ $applicant->other['ol']['type'] ?? '' }} |
                        {{ $applicant->other['ol']['internet'] ?? '' }}</b>
                </th>
                <th class="text-left bg-gray-100"></th>
                <th class="text-left bg-gray-100"></th>

            </tr>

        </table>

        <table class="m-0 border-black border-opacity-75 border " style="width: 100%">
            <tr>
                <th class="text-center bg-gray-100 text-xs font-sans font-light  ">PATOTOO AT PAGSANG-AYON</th>


            </tr>
            <tr>
                <th class="text-center bg-gray-100 font-sans font-light   font-thim text-xs">ANG LAHAT NG IMPORMASYON
                    NA NAKASAAD SA APPLICATION FORM NA ITO AY TOTOO AT TAMA SA ABOT NG AMING KAALAMAN. ANUMANG
                    KASINUNGALINGAN, PANDARAYA, O MALING IMPORMASYON NA NARIRITO AY MAAARING MAGING DAHILAN NG AMING
                    PAGKAKADISKWALIPIKA. AMING NAUUNAWAAN NA TUNGKULIN RIN NAMIN NA AKTIBONG SUMUBAYBAY SA OPISYAL NA
                    ACCOUNTS NG PAMUNUAN PARA SA UPDATES AT ANNOUNCEMENTS. GAYUNDIN, MAKAKAASA ANG PAMAHALAANG
                    PANLALAWIGAN SA AMING PAGGALANG AT PAGSUNOD SA MGA IPINAPATUPAD NA POLISIYA AT ALITUNTUNIN NG
                    PROGRAMA..</th>


            </tr>

        </table>

        <table class="m-0 border-black border-opacity-75 " style="width: 100%">

            <div class="flex w-full ">

                <div class="w-1/2">


                    <br>
                    <br>

                    <p class="text-center uppercase font-bold text-lg">_____________________________</p>
                    <p class="text-center text-sm">PANGALAN AT LAGDA NG APLIKANTENG MAG-AARAL</p>

                </div>
                <div class="w-1/2">

                    <br>
                    <br>

                    <p class="text-center uppercase font-bold text-lg">_____________________________</p>
                    <p class="text-center text-sm">PANGALAN AT LAGDA NG MAGULANG/GUARDIAN/SPONSOR/SPOUSE</p>
                </div>
            </div>

            <!--   <tr>
                   <th class="text-left bg-gray-100 font-sans font-light   text-xs">PANGALAN AT LAGDA NG APLIKANTENG MAG-AARAL</th>
                   <th class="text-left bg-gray-100"></th>
                   <th class="text-left bg-gray-100 border-l-2 font-sans font-light   text-xs">PANGALAN AT LAGDA NG MAGULANG/GUARDIAN/SPONSOR/SPOUSE</th>
                  
               </tr> -->

        </table>
        <!--  <table class="m-0 border-black border-opacity-75 border divide-y-4 divide-yellow-600 divide-dashed" style="width: 100%">
                   <tr>
                   <th class="text-center bg-gray-100 font-sans border-opacity-75 text-xs">HUWAG SAGUTAN ANG BAHAGING ITO. FOR COMMITEE ONLY. Print in legal(13 x 8.5)</th>
                
               </tr>
              
            </table> -->
        <div class="flex w-full ">
            <div class="w-1/1">

                <p class="text-sm">
                    --------------------------------------------------------------------------------</p>

            </div>

            <div class="w-1/1">


                <p class="text-sm">--------------------------------------------------------------------------
                </p>
            </div>

        </div>
        <center>HUWAG SAGUTAN ANG BAHAGING ITO. FOR COMMITEE ONLY. PRINT IN LEGAL(13 x 8.5)</center>


        <div class="flex w-full ">
            <div class="w-1/2">

                <p class="text-sm"> Date of Application <span class="ml-3">
                        {{ $applicant->created_at }}
                    </span> </p>
                <p class="text-sm"> Date Received <span class="ml-9">_____________________</span>
                </p>
                <p class="text-sm"> Received By <span class="ml-12">_____________________</span> </p>
            </div>
            <div class="w-1/2">

                <hr class="border-b-3 border-black border-opacity-75-500 mt-7">
                <p class="text-center uppercase font-bold text-lg">GERARDO A. NOVERAS</p>
                <p class="text-center text-sm">Governor</p>
            </div>
        </div>








    </section>
</body>

</html>
