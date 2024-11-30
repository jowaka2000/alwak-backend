<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class RequestServicesController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'location' => 'required',
            'jobScheduleDate' => 'sometimes',
            'preferredDayForCleaning' => 'sometimes',
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
        ]);


       $service =  Service::create([
            'service' => $request->service,
            'employer-location' => $request->location,
            'job-schedule-date' => $request->jobScheduleDate,
            'preferred-day-for-cleaning' => $request->preferredDayForCleaning,
            'preferred-time-for-cleaning' => $request->preferredTimeForCleaning,
            'is-job-date-schedule-flexible' => $request->isJobDateScheduleFlexible,
            'age' => $request->age,
            'gender' => $request->gender,
            'is-full-time-job' => $request->isFullTimeJob,
            'preferred-day-for-part-time' => $request->preferredDayForPartTime,
            'preferred-time-for-part-time' => $request->preferredTimeForPartTime,
            'number-of-workers' => $request->numberOfWorkers,
            'job-description' => $request->jobDescription,
            'things-to-be-cleaned' => json_encode($request->thingsToBeCleaned),
            'budget' => $request->budget,
            'employee-location' => $request->employeeLocation,
            'auto-date-job-schedule' => $request->autoDateJobSchedule,
            'manual-employee-location' => $request->manualEmployeeLocation,
            'main-house-manager-job' => $request->mainHouseManagerJob,
            'payment-schedule' => $request->paymentSchedule,
            'lawn-and-garden-to-be-prepared' => json_encode($request->lawnAndGardenToBePrepared),
            'employee-selected-id' => $request->employeeSelectedId,
            'employer-phone-number' => $request->employerPhoneNumber,
        ]);


        $serviceId = $service->id;
        return response(compact('serviceId'));
    }
}
