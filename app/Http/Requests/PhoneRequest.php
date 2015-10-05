<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhoneRequest extends Request
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
            //
            'number'=>'required|unique:phones',
            'company_id'=>'required',

            'payment_company_id'=>'required',
            'category_id'=>'required',
            'phone_number'=>'required'

        ];
    }
}
