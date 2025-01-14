<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'userId'=>'sometimes',
            'location' => 'required',
            'selectedJob' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'haveWorkExperience' => 'required',
            'region' => 'sometimes',
            'manualEmployeeRegion' => 'sometimes',
            'educationLevel' => 'required',
            'otherJobsDowable' => 'required',
            'howToDoJob' => 'required',
            'amountWillingToBePaid' => 'required',
            'paymentSchedule' => 'required',
            'phoneNumber' => 'required',
        ];
    }
}
