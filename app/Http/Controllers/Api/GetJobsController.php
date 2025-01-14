<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeJobRequest;
use App\Models\JobRequest;
use App\Models\User;
use Illuminate\Http\Request;

class GetJobsController extends Controller
{
    public $request;

    public function store(EmployeeJobRequest $employeeJobRequest)
    {
        $request = $employeeJobRequest->validated();


        if ($request['userId']) {
            $user = User::find($request['userId']);

            /** @var User $user */


            $job = $user->jobRequests()->create([
                'location' => $request['location'],
                'selected_job' => $request['selectedJob'],
                'age' => $request['age'],
                'gender' => $request['gender'],
                'have_work_experience' => $request['haveWorkExperience'],
                'region' => $request['region'],
                'manual_employee_region' => $request['manualEmployeeRegion'],
                'education_level' => $request['educationLevel'],
                'other_jobs_dowable' => json_encode($request['otherJobsDowable']),
                'how_to_do_job' => $request['howToDoJob'],
                'amount_willing_to_be_paid' => $request['amountWillingToBePaid'],
                'paymentSchedule' => $request['paymentSchedule'],
                'phoneNumber' => $request['phoneNumber'],
            ]);
        } else {
            $job = JobRequest::create([
                'location' => $request['location'],
                'selected_job' => $request['selectedJob'],
                'age' => $request['age'],
                'gender' => $request['gender'],
                'have_work_experience' => $request['haveWorkExperience'],
                'region' => $request['region'],
                'manual_employee_region' => $request['manualEmployeeRegion'],
                'education_level' => $request['educationLevel'],
                'other_jobs_dowable' => json_encode($request['otherJobsDowable']),
                'how_to_do_job' => $request['howToDoJob'],
                'amount_willing_to_be_paid' => $request['amountWillingToBePaid'],
                'paymentSchedule' => $request['paymentSchedule'],
                'phoneNumber' => $request['phoneNumber'],
            ]);
        }

        $jobId = $job->id;

        return response(compact('jobId'));
    }


    public function updateJobRequestId(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'jobRequestId' => 'required',
        ]);

        $jobRequest = JobRequest::find($request->jobRequestId);

        $jobRequest->update(['user_id' => $request->userId]);

        return response('', 200);
    }


    public function show(Request $request)
    {
        //selected_job, gender, age, ,region, manual_employee_region
        $request->validate([
            'age' => 'sometimes',
            'gender' => 'sometimes',
            'manualEmployeeLocation' => 'sometimes',
            'employeeLocation' => 'sometimes',
            'service' => 'sometimes',
            'location' => 'sometimes',
        ]);
        $this->request=$request;


        $employees = User::join('job_requests','job_requests.user_id','=','users.id')
        ->where('job_requests.age', $request->age)
        ->where('job_requests.gender', $request->gender)
        ->where('job_requests.selected_job', $request->service)
        ->orWhereJsonContains('job_requests.other_jobs_dowable',$request->service)
        ->where(function($query){
            $query->where('job_requests.location',operator: $this->request->location)
            ->orWhere('job_requests.region',operator: $this->request->employeeLocation)
            ->orWhere('job_requests.manual_employee_region',$this->request->employeeLocation)
            ->orWhere('job_requests.region',$this->request->manualEmployeeLocation)
            ->orWhere('job_requests.manual_employee_region',$this->request->manualEmployeeLocation)
            ->orWhere('job_requests.location',$this->request->employeeLocation)
            ->orWhere('job_requests.location',$this->request->manualEmployeeLocation);
        })
        ->select('*')
        ->paginate(10);


        return response(compact('employees'));
    }


    public function view($id){
        
        $user   = User::find($id);

        /** @var User $user */
        $jobRequest = $user->jobRequests();

        return response(compact('jobRequest'));
    }

}
