@extends('layouts.index')

@section('page-title', '')

@push('js-lib')
{!! htmlScriptTagJsApi() !!}
@endpush
    

@section('content')


@auth

    <div class="row row-cards">
        <div class="col-md-8">
            <x-ui.card title="Application Form" class_header="bg-green">

                <p><strong>*Kumpletuhin ang lahat ng mga hinihinging impormasyon sa ibaba. Ilagay ang "N/A" kung not applicable.</strong></p>

                <form action="{{ route('apply.submit') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="hr-text">Personal Information</div>

                    <div class="row">
                        <div class="col-md-4">
                            <x-ui.form.input label="Last Name" name="last_name" required />
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.input label="First Name" name="first_name" required />
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.input label="Middle Name" name="middle_name" required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <x-ui.form.choices label="Civil Status" name="civil_status" required>
                                @foreach(config('lists.civilStatus') as $cs)
                                    <option>{{ $cs }}</option>
                                @endforeach
                            </x-ui.form.choices>
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.input label="Birthday" type="date" name="birthday" required />
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.choices label="Sex" name="sex" required>
                            <option>Male</option>
                            <option>Female</option>
                            </x-ui.form.choices>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <x-ui.form.input label="Birthplace" name="birthplace" required />
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.choices label="Present Address" name="present_address" required>

                                @foreach(json_to_collection(base_path()."/barangay.json") as $key => $municipality)
                                    @foreach($municipality['barangay_list'] as $brgy)
                                        <option>{{ $brgy }} - {{ $key }}</option>
                                    @endforeach
                                @endforeach

                            </x-ui.form.choices>
                        </div>
                        <div class="col-md-4">
                            <x-ui.form.choices label="Permanent Address" name="permanent_address" required>
                                @foreach(json_to_collection(base_path()."/barangay.json") as $key => $municipality)
                                    @foreach($municipality['barangay_list'] as $brgy)
                                        <option>{{ $brgy }} - {{ $key }}</option>
                                    @endforeach
                                @endforeach
                            </x-ui.form.choices>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-ui.form.input label="Contact Number" type="number" name="contact_number" required />
                        </div>
                        <div class="col-md-6">
                            <x-ui.form.input label="Email Address" type="email" name="email_address" required />
                        </div>
                    </div>

                    <div class="hr-text">School Information</div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-ui.form.input label="School Name" name="school_name" required />
                        </div>
                        <div class="col-md-6">
                            <x-ui.form.input label="School Address" name="school_address" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-ui.form.input label="Year/Grade Level" name="school_year" required />
                        </div>
                        <div class="col-md-6">
                            <x-ui.form.input label="GWA From Last SEM/SY" name="school_gwa" required />
                        </div>
                    </div>

                    <div class="hr-text">Family Information</div>

                    <div class="row">
                        <div class="col-md-6 border-end">
                            <p class="text-center">Father Information</p>

                            <x-ui.form.input label="Full name" name="father_name" required />
                            <x-ui.form.input label="Occupation" name="father_occupation" required />
                            <x-ui.form.input label="Address" name="father_address" required />
                            <x-ui.form.input label="Contact Number" name="father_contact" required />
                            <x-ui.form.input label="Employer" name="father_employer" required />


                        </div>
                        <div class="col-md-6">
                            <p class="text-center">Mother Information</p>

                            <x-ui.form.input label="Full name" name="mother_name" required />
                            <x-ui.form.input label="Occupation" name="mother_occupation" required />
                            <x-ui.form.input label="Address" name="mother_address" required />
                            <x-ui.form.input label="Contact Number" name="mother_contact" required />
                            <x-ui.form.input label="Employer" name="mother_employer" required />
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <x-ui.form.input label="Number of Family Member" type="number" name="family_number" required />
                        </div>
                        <div class="col-md-6">
                            <x-ui.form.input label="Family Monthly Income" type="number" name="family_income" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <x-ui.form.input label="Ano ano ang pagmamay-ari ng iyong pamilya?" placeholder="eg. bukid, bangka, tricycle, atbp." name="family_assets" required />
                            <x-ui.form.input label="Naninirahan ka ba kasama ang iyong mga magulang?"  name="family_living" required />
                            <x-ui.form.input label="Kung may mga kapatid na nag-aaral pa, ilan at anong grade/year level na nila?"  name="family_sibling" required />
                            <x-ui.form.input label="Kung mayroong mga kapatid na nagsusustento sa inyong pamilya, ano ang kanilang trabaho at magkano ang kanilang buwanang kita?"  name="family_sponsor" required />
                        </div>
                    </div>

                    <div class="hr-text">Other Information</div>

                    <div class="row">
                        <div class="col-md-12">
                            <x-ui.form.input label="Ikaw ba ay working student?" name="other_working" required />
                            <x-ui.form.input label="Nag-apply ka na ba sa pga educational assistance program noon? kung oo, anong semester at year ito?"  name="other_apply_sem" required />
                            <x-ui.form.input label="Nag-apply ka na rin ba sa iba pang educational assistance program ng gobyerno? kung oo, saan?"  name="other_apply_where" required />
                        
                            <div class="row">
                                <p><strong>Ano ang iyong gamit para sa online/distance learning?</strong></p>

                                <div class="col-md-4">
                                    <x-ui.form.choices name="other_ol_own" required>
                                        <option>Owned</option>
                                        <option>Borrowed</option>
                                        <option>Shared</option>
                                    </x-ui.form.choices>
                                </div>

                                <div class="col-md-4">
                                    <x-ui.form.choices name="other_ol_type" required>
                                        <option>Smartphone</option>
                                        <option>Computer Desktop</option>
                                        <option>Laptop</option>
                                        <option>Tablet</option>
                                    </x-ui.form.choices>
                                </div>

                                <div class="col-md-4">
                                    <x-ui.form.choices name="other_ol_internet" required>
                                        <option>Wifi</option>
                                        <option>Mobile Data</option>
                                        <option>No internet connection</option>
                                    </x-ui.form.choices>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>

                    <hr>


                    {!! htmlFormSnippet() !!}

                    <hr>

                    <p>By clicking "Submit" you are agree with <a target="_blank" href="{{ route('pripol') }}">privacy policy</a> for application of educational assistance of Provincial Government of Aurora.</p>

                    <button class="btn btn-primary text-right">Submit</button>
                </form>
            </x-ui.card>
        </div>
        <div class="col-md-4">
            <x-ui.card title="Instructions" class="sticky-top">
                <ol>
                    <li>Isang beses lamang maaaring mag-register ang aplikante upang maiwasan ang duplicate entries.</li>
                    <br>
                    <li>Basahin at unawaing maigi ang mga isinasaad sa form at siguraduhing tama ang lahat ng impormasyon na iyong ilalagay. Sundan lamang ang on-screen instructions hanggang sa huling bahagi at tandaan ang iyong tracking number dahil ito ang iyong gagamitin para makita ang iyong application status sa pamamagitan ng "TRACK APPLICATION" button.</li>
                    <br>
                    <li>Ang lahat ng application ay dadaan sa ibayong pagsusuri ng komite at ang makakatanggap lamang ng application form via email ay ang mga nakuhang beneficiaries ng programa. Mangyaring antabayanan lamang ang naturang email at sundin ang mga ibibigay na detalye patungkol sa pagpapasa mga requirements.</li>
                </ol>

                <hr>

                <x-include.help />

            </x-ui.card>
        </div>
    </div>


@else  

<h1 class="text-center">Application has been closed.</h1>


@endauth



<x-include.form.ajax />
@endsection

