<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlwakRequestServiceRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class RequestServicesController extends Controller
{
    public function store(AlwakRequestServiceRequest $request)
    {

        $request = $request->validated();

        if ($request['userId']) {
            $user = User::find($request['userId']);

            /** @var User $user */

            $service = $user->services()->create([
                'service' => $request['service'],
                'employer-location' => $request['location'],
                'job-schedule-date' => $request['jobScheduleDate'],
                'preferred-time-for-cleaning' => $request['preferredTimeForCleaning'],
                'is-job-date-schedule-flexible' => $request['isJobDateScheduleFlexible'],
                'age' => $request['age'],
                'gender' => $request['gender'],
                'is-full-time-job' => $request['isFullTimeJob'],
                'preferred-day-for-part-time' => $request['preferredDayForPartTime'],
                'preferred-time-for-part-time' => $request['preferredTimeForPartTime'],
                'number-of-workers' => $request['numberOfWorkers'],
                'job-description' => $request['jobDescription'],
                'things-to-be-cleaned' => json_encode($request['thingsToBeCleaned']),
                'budget' => $request['budget'],
                'employee-location' => $request['employeeLocation'],
                'auto-date-job-schedule' => $request['autoDateJobSchedule'],
                'manual-employee-location' => $request['manualEmployeeLocation'],
                'main-house-manager-job' => $request['mainHouseManagerJob'],
                'payment-schedule' => $request['paymentSchedule'],
                'lawn-and-garden-to-be-prepared' => json_encode($request['lawnAndGardenToBePrepared']),
                'employee-selected-id' => $request['employeeSelectedId'],
                'employer-phone-number' => $request['employerPhoneNumber'],
            ]);


        } else {
            $service = Service::create([
                'service' => $request['service'],
                'employer-location' => $request['location'],
                'job-schedule-date' => $request['jobScheduleDate'],
                'preferred-time-for-cleaning' => $request['preferredTimeForCleaning'],
                'is-job-date-schedule-flexible' => $request['isJobDateScheduleFlexible'],
                'age' => $request['age'],
                'gender' => $request['gender'],
                'is-full-time-job' => $request['isFullTimeJob'],
                'preferred-day-for-part-time' => $request['preferredDayForPartTime'],
                'preferred-time-for-part-time' => $request['preferredTimeForPartTime'],
                'number-of-workers' => $request['numberOfWorkers'],
                'job-description' => $request['jobDescription'],
                'things-to-be-cleaned' => json_encode($request['thingsToBeCleaned']),
                'budget' => $request['budget'],
                'employee-location' => $request['employeeLocation'],
                'auto-date-job-schedule' => $request['autoDateJobSchedule'],
                'manual-employee-location' => $request['manualEmployeeLocation'],
                'main-house-manager-job' => $request['mainHouseManagerJob'],
                'payment-schedule' => $request['paymentSchedule'],
                'lawn-and-garden-to-be-prepared' => json_encode($request['lawnAndGardenToBePrepared']),
                'employee-selected-id' => $request['employeeSelectedId'],
                'employer-phone-number' => $request['employerPhoneNumber'],
            ]);
        }




        $serviceId = $service->id;

        return response(compact('serviceId'));
    }

    public function updateServiceUserId(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'serviceId' => 'required',
        ]);


        $service = Service::find($request->serviceId);

        $service->update(['user_id' => $request->userId]);

        return response('', 200);
    }
}
