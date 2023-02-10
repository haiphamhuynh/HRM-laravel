<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Termwind\Components\Dd;

class ListEmployeeController extends Controller
{
    public function getList(Request $request)
    {
        $title = 'Quản lí nhân viên';
        $current = Carbon::now();
        $current_time = strtotime($current);
        $employees = Employee::paginate(8);
        $position = $request->position;
        $status = $request->status;
        $key = request()->key;
        if ($key) {
            if ($status == null) {
                if ($position == null) {
                    $employees = Employee::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
                        ->paginate(8);
                } else if ($position != null) {
                    $employees = Employee::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
                        ->where('rank', $position)
                        ->paginate(8);
                }
            } else {
                if ($status == 1) {
                    $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
                        ->where('full_name', 'like', '%' . $key . '%')
                        ->where('expiration_date', '>', $current)
                        ->paginate(8);
                }
                if ($status == 2) {
                    $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
                        ->where('expiration_date', '<', $current)
                        ->where('full_name', 'like', '%' . $key . '%')
                        ->paginate(8);
                }
            }
        }
        if ($position) {
            $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
                ->where('full_name', 'like', '%' . $key . '%')
                ->paginate(8);
        }
        if ($status) {
            switch ($status) {
                case '1':
                    $employees = Employee::orderBy('id_employee', 'ASC')->where('expiration_date', '>', $current)
                        ->where('full_name', 'like', '%' . $key . '%')
                        ->paginate(8);
                    break;
                case '2':
                    $employees = Employee::orderBy('id_employee', 'ASC')->where('expiration_date', '<', $current)
                        ->where('full_name', 'like', '%' . $key . '%')
                        ->paginate(8);
                    break;
            }
        }
        if ($position && $status) {
            if ($status == 1) {
                $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
                    ->where('full_name', 'like', '%' . $key . '%')
                    ->where('expiration_date', '>', $current)
                    ->paginate(8);
            }
            if ($status == 2) {
                $employees = Employee::orderBy('id_employee', 'ASC')->where('rank', $position)
                    ->where('expiration_date', '<', $current)
                    ->where('full_name', 'like', '%' . $key . '%')
                    ->paginate(8);
            }
        }

        // if ($request->status) {
        //     $status = $request->status;
        //     switch ($status) {
        //         case '1':
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('expiration_date', '>', $current)->paginate(3);
        //             break;
        //         case '2':
        //             $employees = Employee::orderBy('id_employee', 'ASC')->where('expiration_date', '<', $current)->paginate(3);
        //             break;
        //     }
        // }
        // $employees = Employee::where('id_employee', '=', '3')
        //                         ->select('expiration_date')
        //                         ->get();
        // dd($employees);
        // dd($current);
        // $employees_time = strtotime($employees);
        // if($employees_time > $current_time){
        //     echo 'con han';
        // }else{
        //     echo 'het han', $employees_time ;
        // }
        // dd($employees_time);
        return view('list_employee', [
            'employees' => $employees,
            'title' => $title,
            'current_time' => $current_time
        ]);
    }
    public function getEditEmployee($id)
    {
        $employee = Employee::find($id);
        $title = 'Thông tin nhân viên';
        return view('edit_employee', [
            'employee' => $employee,
            'title' => $title
        ]);
    }
    public function putEditEmployee(Request $request, $id)
    {
        $request->validate(
            [
                'manhanvien' => 'required',
                'hovaten' => 'required',
                'ngaysinh' => 'required|date|before:today',
                'image' => 'mimes:jpg,png,jpeg|max:5048',
                'email' => 'required|email',
                'sdt' => 'required|numeric|min:9',
                'cmnd' => 'required|numeric|min:9',
                'nguoilienhe' => 'required',
                'sdtnguoilienhe' => 'required|numeric|min:9',
                'mahopdong' => 'required',
                'ngayhieuluc' => 'required|date',
                'ngayhethieuluc' => 'required|date|after:ngayhieuluc',
                'capbac' => 'required',
                'luong' => 'required|numeric',
                'phibaohiem' => 'required|numeric',
                'sbh' => 'required|numeric|min:9'
            ],
            [
                'manhanvien.required' => 'Bạn chưa nhập mã nhân viên!!',
                'hovaten.required' => 'Bạn chưa nhập tên!!',
                'ngaysinh.required' => 'Bạn chưa nhập ngày sinh!!',
                'ngaysinh.before' => 'Bạn nhập ngày sinh chưa đúng!!',
                'image.mimes' => 'Định dạng ảnh chưa đúng!!',
                'image.max' => 'Dung lượng ảnh chưa đúng!!',
                'email.required' => 'Bạn chưa nhập email!!',
                'email.email' => 'Bạn nhập email chưa đúng!!',
                'sdt.required' => 'Bạn chưa nhập số điện thoại!!',
                'sdt.numeric' => 'Bạn nhập số điện thoại chưa đúng!!',
                'sdt.min' => 'Bạn nhập số điện thoại chưa đúng!!',
                'cmnd.required' => 'Bạn chưa nhập CMND/CCCD!!',
                'cmnd.numeric' => 'Bạn nhập CMND/CCCD chưa đúng!!',
                'cmnd.min' => 'Bạn nhập CMND/CCCD chưa đúng!!',
                'nguoilienhe.required' => 'Bạn chưa nhập người liên lạc khẩn!!',
                'sdtnguoilienhe.required' => 'Bạn chưa nhập số điện thoại liên lạc khẩn!!',
                'sdtnguoilienhe.numeric' => 'Bạn nhập số điện thoại liên lạc khẩn chưa đúng!!',
                'sdtnguoilienhe.min' => 'Bạn nhập số điện thoại liên lạc khẩn chưa đúng!!',
                'mahopdong.required' => 'Bạn chưa nhập mã hợp đồng!!',
                'ngayhieuluc.required' => 'Bạn chưa nhập ngày hiệu lực hợp đồng!!',
                'ngayhieuluc.after_or_equal' => 'Bạn nhập ngày hiệu lực hợp đồng chưa đúng!!',
                'ngayhethieuluc.required' => 'Bạn chưa ngày hết hiệu lực!!',
                'ngayhethieuluc.after' => 'Bạn nhập ngày hết hiệu lực chưa đúng!!',
                'capbac.required' => 'Bạn chưa nhập cấp bậc!!',
                'luong.required' => 'Bạn chưa nhập lương!!',
                'luong.numeric' => 'Bạn nhập lương chưa đúng!!',
                'phibaohiem.required' => 'Bạn chưa nhập phí bảo hiểm!!',
                'phibaohiem.numeric' => 'Bạn nhập phí bảo hiểm chưa đúng!!',
                'sbh.required' => 'Bạn chưa nhập số bảo hiểm!!',
                'sbh.numeric' => 'Bạn nhập số bảo hiểm chưa đúng!!',
                'sbh.min' => 'Bạn nhập số bảo hiểm chưa đúng!!'
            ]
        );
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
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/listEmployee')->with('success', 'Bạn đã xoá thành thành công');
    }
}
