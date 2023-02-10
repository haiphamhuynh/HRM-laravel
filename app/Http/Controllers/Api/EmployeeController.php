<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        //return response()->json(["title" => $title, "current" => $current, "employee" => $employee]);
        // return EmployeeResource::collection($employee); //colection tra ve tap hop du lieu, phan trang
        // keyBy->... lap ten lam doi tuong
        return new EmployeeResource($employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'ma_employee' => 'required',
            'full_name' => 'required',
            'date_of_birth' => 'required|date|before:today',
            'avatar' => 'mimes:jpg,png,jpeg|max:5048',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'cmnd' => 'required|numeric|min:9',
            'nationality' => 'required',
            'a_relative' => 'required',
            'phone_a_relative' => 'required|numeric|min:9',
            'contract_code' => 'required',
            'effective_date' => 'required|date',
            'expiration_date' => 'required|date|after:effective_date',
            'type_of_contract' => 'required',
            'rank' => 'required',
            'wage' => 'required|numeric',
            'payments' => 'required',
            'insurance_money' => 'required|numeric',
            'BHYT' => 'required|numeric|min:9'
        ]);

        if($validator->fails()){
            return response()->json(['messenger' => $validator->messages()], 200);
        }else{
            $employee = Employee::create($request->all());
            // return new EmployeeResource($employee, 'messenger' => 'Success');
            return response()->json(['messenger' => 'Success'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $employee;
        // return new EmployeeResource($employee);
        $employee = Employee::findOrFail($id);
        // $show = new EmployeeResource($employee::find($id));
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(),[
            'ma_employee' => 'required',
            'full_name' => 'required',
            'date_of_birth' => 'required|date|before:today',
            'avatar' => 'mimes:jpg,png,jpeg|max:5048',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'cmnd' => 'required|numeric|min:9',
            'nationality' => 'required',
            'a_relative' => 'required',
            'phone_a_relative' => 'required|numeric|min:9',
            'contract_code' => 'required',
            'effective_date' => 'required|date',
            'expiration_date' => 'required|date|after:effective_date',
            'type_of_contract' => 'required',
            'rank' => 'required',
            'wage' => 'required|numeric',
            'payments' => 'required',
            'insurance_money' => 'required|numeric',
            'BHYT' => 'required|numeric|min:9'
        ]);
        if($validator->fails()){
            return response()->json(['messenger' => $validator->messages()], 200);
        }else{
            $employee->update($request->all());
            return response()->json(['messenger' => 'Success'], 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
}
