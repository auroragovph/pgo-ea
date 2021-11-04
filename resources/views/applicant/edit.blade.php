@extends('layouts.index')

@php($tracking_number = generate_tracking_number($applicant->id))

@section('page-title', 'Update '.$tracking_number)


@section('page-action')
    
@endsection


@section('content')
<div class="row row-cards">

    <div class="col-md-12">
        <x-ui.card title="Application Form" class_header="bg-green">

            <form action="{{ route('applicant.update', $applicant->id) }}" method="POST" id="ajax_form">
                @csrf
                <div class="hr-text">Personal Information</div>

                <div class="row">
                    <div class="col-md-4">
                        <x-ui.form.input label="Last Name" name="last_name" :value="$applicant->name['last'] ?? ''" required />
                    </div>
                    <div class="col-md-4">
                        <x-ui.form.input label="First Name" name="first_name" :value="$applicant->name['first'] ?? ''" required />
                    </div>
                    <div class="col-md-4">
                        <x-ui.form.input label="Middle Name" name="middle_name" :value="$applicant->name['middle'] ?? ''" />
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <x-ui.form.choices label="Civil Status" name="civil_status" required>
                            @foreach(config('lists.civilStatus') as $cs)
                                <option {{ sh($cs, $applicant->personal['civil_status']) }}>{{ $cs }}</option>
                            @endforeach
                        </x-ui.form.choices>
                    </div>
                    <div class="col-md-4">
                        <x-ui.form.input label="Birthday" type="date" name="birthday" :value="$applicant->personal['birthday']" required />
                    </div>
                    <div class="col-md-4">
                        <x-ui.form.choices label="Sex" name="sex" required>
                            @foreach(config('lists.sex') as $sex)
                                <option {{ sh($sex, $applicant->personal['sex']) }} >{{ $sex }}</option>
                            @endforeach
                        </x-ui.form.choices>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <x-ui.form.input label="Birthplace" name="birthplace" :value="$applicant->personal['birthplace']" required />
                    </div>
                    <div class="col-md-4">
                        <x-ui.form.choices label="Present Address" name="present_address" required>

                            @foreach(json_to_collection(base_path()."/barangay.json") as $key => $municipality)
                                @foreach($municipality['barangay_list'] as $brgy)
                                    <option {{ sh($brgy." - ".$key, $applicant->personal['address']['present']) }} >{{ $brgy }} - {{ $key }}</option>
                                @endforeach
                            @endforeach

                        </x-ui.form.choices>
                    </div>
                    <div class="col-md-4">
                        <x-ui.form.choices label="Permanent Address" name="permanent_address" required>
                            @foreach(json_to_collection(base_path()."/barangay.json") as $key => $municipality)
                                @foreach($municipality['barangay_list'] as $brgy)
                                <option {{ sh($brgy." - ".$key, $applicant->personal['address']['permanent']) }} >{{ $brgy }} - {{ $key }}</option>
                                @endforeach
                            @endforeach
                        </x-ui.form.choices>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-ui.form.input label="Contact Number" type="number" name="contact_number" :value="$applicant->personal['contact_number']" required />
                    </div>
                    <div class="col-md-6">
                        <x-ui.form.input label="Email Address" type="email" name="email_address" :value="$applicant->personal['email_address']" required />
                    </div>
                </div>

                <div class="hr-text">School Information</div>

                <div class="row">
                    <div class="col-md-6">
                        <x-ui.form.input label="School Name" name="school_name" :value="$applicant->school['name']" required />
                    </div>
                    <div class="col-md-6">
                        <x-ui.form.input label="School Address" name="school_address" :value="$applicant->school['address']" required />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-ui.form.input label="Year/Grade Level" name="school_year" :value="$applicant->school['year_level']" required />
                    </div>
                    <div class="col-md-6">
                        <x-ui.form.input label="GWA From Last SEM/SY" name="school_gwa" :value="$applicant->school['gwa']" required />
                    </div>
                </div>

                <div class="hr-text">Family Information</div>

                <div class="row">
                    <div class="col-md-6 border-end">
                        <p class="text-center">Father Information</p>

                        <x-ui.form.input label="Full name" name="father_name" :value="$applicant->family['father']['name']" required />
                        <x-ui.form.input label="Occupation" name="father_occupation" :value="$applicant->family['father']['occupation']" required />
                        <x-ui.form.input label="Address" name="father_address" :value="$applicant->family['father']['address']" required />
                        <x-ui.form.input label="Contact Number" name="father_contact" :value="$applicant->family['father']['contact_number']" required />
                        <x-ui.form.input label="Employer" name="father_employer" :value="$applicant->family['father']['employer']" required />


                    </div>
                    <div class="col-md-6">
                        <p class="text-center">Mother Information</p>

                        <x-ui.form.input label="Full name" name="mother_name" :value="$applicant->family['mother']['name']" required />
                        <x-ui.form.input label="Occupation" name="mother_occupation" :value="$applicant->family['mother']['occupation']" required />
                        <x-ui.form.input label="Address" name="mother_address" :value="$applicant->family['mother']['address']" required />
                        <x-ui.form.input label="Contact Number" name="mother_contact" :value="$applicant->family['mother']['contact_number']" required />
                        <x-ui.form.input label="Employer" name="mother_employer" :value="$applicant->family['mother']['employer']" required />
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <x-ui.form.input label="Number of Family Member" type="number" name="family_number" :value="$applicant->family['member']" required />
                    </div>
                    <div class="col-md-6">
                        <x-ui.form.input label="Family Monthly Income" type="number" name="family_income" :value="$applicant->family['income']" required />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <x-ui.form.input
                            label="Ano ano ang pagmamay-ari ng iyong pamilya?"
                            placeholder="eg. bukid, bangka, tricycle, atbp."
                            name="family_assets"
                            :value="$applicant->family['assets']"
                            required />
                        <x-ui.form.input
                            label="Naninirahan ka ba kasama ang iyong mga magulang?"
                            name="family_living"
                            :value="$applicant->family['living']"
                            required />
                        <x-ui.form.input 
                            label="Kung may mga kapatid na nag-aaral pa, ilan at anong grade/year level na nila?"
                            :value="$applicant->family['sibling']"
                            name="family_sibling"
                            required />
                        <x-ui.form.input
                            label="Kung mayroong mga kapatid na nagsusustento sa inyong pamilya, ano ang kanilang trabaho at magkano ang kanilang buwanang kita?" 
                            name="family_sponsor"
                            :value="$applicant->family['sponsor']" 
                            required />
                    </div>
                </div>

                <div class="hr-text">Other Information</div>

                <div class="row">
                    <div class="col-md-12">
                        <x-ui.form.input
                            label="Ikaw ba ay working student?"
                            name="other_working"
                            :value="$applicant->other['working']"
                            required />
                        <x-ui.form.input
                            label="Nag-apply ka na ba sa pga educational assistance program noon? kung oo, anong semester at year ito?" 
                            name="other_apply_sem"
                            :value="$applicant->other['apply']['sem']" 
                            required />
                        <x-ui.form.input 
                            label="Nag-apply ka na rin ba sa iba pang educational assistance program ng gobyerno? kung oo, saan?"
                            name="other_apply_where"
                            :value="$applicant->other['apply']['where']" 
                            required />
                    
                        <div class="row">
                            <p><strong>Ano ang iyong gamit para sa online/distance learning?</strong></p>

                            <div class="col-md-4">
                                <x-ui.form.choices name="other_ol_own" required>
                                    @foreach(config('lists.learning.own') as $own)
                                        <option {{ sh($own, $applicant->other['ol']['own']) }}>{{ $own }}</option>
                                    @endforeach
                                </x-ui.form.choices>
                            </div>

                            <div class="col-md-4">
                                <x-ui.form.choices name="other_ol_type" required>
                                    @foreach(config('lists.learning.type') as $ol_type)
                                        <option {{ sh($ol_type, $applicant->other['ol']['type']) }}>{{ $ol_type }}</option>
                                    @endforeach
                                </x-ui.form.choices>
                            </div>

                            <div class="col-md-4">
                                <x-ui.form.choices name="other_ol_internet" required>
                                    @foreach(config('lists.learning.internet') as $wifi)
                                        <option {{ sh($wifi, $applicant->other['ol']['internet']) }}>{{ $wifi }}</option>
                                    @endforeach
                                </x-ui.form.choices>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>

                <hr>

                <button class="btn btn-primary text-right">Update</button>
            </form>
        </x-ui.card>
    </div>
</div>

<x-include.form.ajax />
@endsection
