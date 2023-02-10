<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use App\Http\Requests\CreateValidationRequest;
use Illuminate\Support\Facades\DB;

class HomeEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('employee')
            ->rightJoin('ds_timekeeping', 'employee.ma_employee', '=', 'ds_timekeeping.ma_employee')
            //->select('employee.*', 'ds_timekeeping.total_time')
            //->whereNotIn('id_employee', [1, 2, 3])
            ->get();
        dd($users);
        //dd($users);


        // dd($request->path());
        // $title = 'Quản lí nhân viên';
        // $current = Carbon::now();
        // $current_time = strtotime($current);
        // $employees = Employee::cursorPaginate(8);
        // $position = $request->position;
        // $status = $request->status;
        // $key = request()->key;
        // if ($key) {
        //     if ($status == null) {
        //         if ($position == null) {
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
        //                 ->paginate(8);
        //         } else if ($position != null) {
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
        //                 ->where('rank', $position)
        //                 ->paginate(8);
        //         }
        //     } else {
        //         if ($status == 1) {
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
        //                 ->where('full_name', 'like', '%' . $key . '%')
        //                 ->where('expiration_date', '>', $current)
        //                 ->paginate(8);
        //         }
        //         if ($status == 2) {
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
        //                 ->where('expiration_date', '<', $current)
        //                 ->where('full_name', 'like', '%' . $key . '%')
        //                 ->paginate(8);
        //         }
        //     }
        // }
        // if ($position) {
        //     $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
        //         ->where('full_name', 'like', '%' . $key . '%')
        //         ->paginate(8);
        // }
        // if ($status) {
        //     switch ($status) {
        //         case '1':
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('expiration_date', '>', $current)
        //                 ->where('full_name', 'like', '%' . $key . '%')
        //                 ->paginate(8);
        //             break;
        //         case '2':
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('expiration_date', '<', $current)
        //                 ->where('full_name', 'like', '%' . $key . '%')
        //                 ->paginate(8);
        //             break;
        //     }
        // }
        // if ($position && $status) {
        //     if ($status == 1) {
        //         $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
        //             ->where('full_name', 'like', '%' . $key . '%')
        //             ->where('expiration_date', '>', $current)
        //             ->paginate(8);
        //     }
        //     if ($status == 2) {
        //         $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
        //             ->where('expiration_date', '<', $current)
        //             ->where('full_name', 'like', '%' . $key . '%')
        //             ->paginate(8);
        //     }
        // }
        // return view('list_employee', [
        //     'employees' => $employees,
        //     'title' => $title,
        //     'current_time' => $current_time
        // ]);
        // return response([
        //     'data' => $employees,
        //     'title' => $title,
        //     'current_time' => $current_time
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm nhân viên';
        return view('newemployee')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequest $request)
    {
        if ($request->image == null) {
            $generatedImageName = null;
        } else if ($request->image != null) {
            $generatedImageName = 'image' . time() . '-'
                . $request->name . '.'
                . $request->image->extension();
            $request->image->move(public_path('images'), $generatedImageName);
        }
        $employee = Employee::create([
            'ma_employee' => $request->input('manhanvien'),
            'full_name' => $request->input('hovaten'),
            'date_of_birth' => $request->input('ngaysinh'),
            'gender' => $request->input('rdoSex'),
            'avatar' => $generatedImageName,
            'email' => $request->input('email'),
            'phone' => $request->input('sdt'),
            'ethnic' => $request->input('dantoc'),
            'religion' => $request->input('tongiao'),
            'nationality' => $request->input('quoctich'),
            'cmnd' => $request->input('cmnd'),
            'issued_by' => $request->input('noicap'),
            'date_range' => $request->input('ngaycap'),
            'a_relative' => $request->input('nguoilienhe'),
            'phone_a_relative' => $request->input('sdtnguoilienhe'),
            'contract_code' => $request->input('mahopdong'),
            'contract_signing_date' => $request->input('ngaykihopdong'),
            'effective_date' => $request->input('ngayhieuluc'),
            'expiration_date' => $request->input('ngayhethieuluc'),
            'type_of_contract' => $request->input('loaihopdong'),
            'office' => $request->input('vanphong'),
            'headquarters' => $request->input('truso'),
            'rank' => $request->input('capbac'),
            'wage' => $request->input('luong'),
            'payments' => $request->input('hinhthuctraluong'),
            'insurance_money' => $request->input('phibaohiem'),
            'BHYT' => $request->input('sbh')
        ]);
        //save to Database
        $employee->save(); //insert oke
        return redirect('/listEmployee')->with('success', 'Bạn đã thêm nhân viên mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        $title = 'Thông tin nhân viên';
        return view('edit_employee',[
            'employee' => $employee,
            'title' => $title
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $employee = Employee::find($id);
        // $title = 'Thông tin nhân viên';
        // return view('edit_employee', [
        //     'employee' => $employee,
        //     'title' => $title
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {
        if ($request->image != null) {
            $generatedImageName = 'image' . time() . '-'
                . $request->name . '.'
                . $request->image->extension();
            $request->image->move(public_path('images'), $generatedImageName); // đưa ảnh vào folder images
            $newavatar = Employee::where('id_employee', $id)
                ->update([
                    'avatar' => $generatedImageName
                ]);
        }
        $employee = Employee::where('id_employee', $id)
            ->update([
                'ma_employee' => $request->input('manhanvien'),
                'full_name' => $request->input('hovaten'),
                'date_of_birth' => $request->input('ngaysinh'),
                'gender' => $request->input('rdoSex'),
                'email' => $request->input('email'),
                'phone' => $request->input('sdt'),
                'ethnic' => $request->input('dantoc'),
                'religion' => $request->input('tongiao'),
                'nationality' => $request->input('quoctich'),
                'cmnd' => $request->input('cmnd'),
                'issued_by' => $request->input('noicap'),
                'date_range' => $request->input('ngaycap'),
                'a_relative' => $request->input('nguoilienhe'),
                'phone_a_relative' => $request->input('sdtnguoilienhe'),
                'contract_code' => $request->input('mahopdong'),
                'contract_signing_date' => $request->input('ngaykihopdong'),
                'effective_date' => $request->input('ngayhieuluc'),
                'expiration_date' => $request->input('ngayhethieuluc'),
                'type_of_contract' => $request->input('loaihopdong'),
                'office' => $request->input('vanphong'),
                'headquarters' => $request->input('truso'),
                'rank' => $request->input('capbac'),
                'wage' => $request->input('luong'),
                'payments' => $request->input('hinhthuctraluong'),
                'insurance_money' => $request->input('phibaohiem'),
                'BHYT' => $request->input('sbh')
            ]);
        return redirect('/listEmployee')->with('success', 'Bạn đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/listEmployee')->with('success', 'Bạn đã xoá thành thành công');
    }
}
