<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlwakRequestServiceRequest extends FormRequest
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
            'service' => 'required',
            'location' => 'required',//client location
            'jobScheduleDate' => 'sometimes',
            'preferredTimeForCleaning' => 'sometimes',
            'isJobDateScheduleFlexible' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'isFullTimeJob' => 'required',
            'isPartTimeJob' => 'required',
            'preferredDayForPartTime' => 'sometimes',
            'preferredTimeForPartTime' => 'sometimes',
            'numberOfWorkers' => 'sometimes',
            'jobDescription' => 'sometimes',
            'thingsToBeCleaned' => 'sometimes',
            'budget' => 'required',
            'employeeLocation' => 'sometimes',
            'autoDateJobSchedule' => 'sometimes',
            'manualEmployeeLocation' => 'sometimes',
            'mainHouseManagerJob' => 'sometimes',
            'paymentSchedule' => 'required',
            'lawnAndGardenToBePrepared' => 'sometimes',
            'employeeSelectedId' => 'required',
            'employerPhoneNumber' => 'required',
        ];
    }
}
