<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ListEmployeeResource as EmployeeResource;
use App\Models\Employee;

class ListEmployeeController extends Controller
{
    public function index(){
        $employee = Employee::all();
        return EmployeeResource::collection($employee);
    }
    public function listRank(){
        $arr = [];
        $listRank = Employee::select('rank')->get();
        $unique = $listRank->unique('rank');
        foreach ($unique as $value) {
            array_push($arr, $value);
        }
        return response()-> json($arr);
    }
    public function listStatus(){

    }
    public function listSearch(){
    }
}
