<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'g-recaptcha-response' => ['recaptcha'],

            // personal information
            'first_name'        => ['required'],
            'last_name'         => ['required'],
            'middle_name'       => ['required'],
            'birthday'          => ['required'],
            'birthplace'        => ['required'],
            'sex'               => ['required'],
            'present_address'   => ['required'],
            'permanent_address' => ['required'],
            'contact_number'    => ['required'],
            'email_address'     => ['required', 'email'],

            // school information
            'school_name'       => ['required'],
            'school_address'    => ['required'],
            'school_year'       => ['required'],
            'school_gwa'        => ['required'],

            // family information
            'father_name'       => ['required'],
            'father_occupation' => ['required'],
            'father_address'    => ['required'],
            'father_contact'    => ['required'],
            'father_employer'   => ['required'],

            'mother_name'       => ['required'],
            'mother_occupation' => ['required'],
            'mother_address'    => ['required'],
            'mother_contact'    => ['required'],
            'mother_employer'   => ['required'],

            'family_number'     => ['required'],
            'family_income'     => ['required'],
            'family_assets'     => ['required'],
            'family_living'     => ['required'],
            'family_sibling'    => ['required'],
            'family_sponsor'    => ['required'],

            // other information
            'other_working'     => ['required'],
            'other_apply_sem'   => ['required'],
            'other_apply_where' => ['required'],
            'other_ol_own'      => ['required'],
            'other_ol_type'     => ['required'],
            'other_ol_internet' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.recaptcha' => 'Check the CAPTCHA validation.'
        ];
    }
}
