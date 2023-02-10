<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListTimeKeepingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ds_timekeeping;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = DB::table('employee')
        //     ->Join('ds_timekeeping', 'employee.ma_employee', '=', 'ds_timekeeping.ma_employee');
        // $categoryList = DB::table('employee')->get();
        // return json_encode($categoryList);
        $title = 'Quản lí chấm công';
        $timekeeping = Ds_timekeeping::join('employee', 'employee.ma_employee', '=', 'ds_timekeeping.ma_employee')
                                    ->get();
        return ListTimeKeepingResource::collection($timekeeping);
        //return response()->json(['timekeeping' => $timekeeping]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timekeeping = Ds_timekeeping::create($request->all());
        return new ListTimeKeepingResource($timekeeping);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
