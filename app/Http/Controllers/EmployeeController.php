<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getEmployee()
    {
        $title = 'Thêm nhân viên';
        return view('newemployee')->with('title', $title);
    }
    public function postEmployee(Request $request)
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
                'quoctich'=> 'required',
                'nguoilienhe' => 'required',
                'sdtnguoilienhe' => 'required|numeric|min:9',
                'mahopdong' => 'required',
                'ngayhieuluc' => 'required|date',
                'ngayhethieuluc' => 'required|date|after:ngayhieuluc',
                'loaihopdong' => 'required',
                'capbac' => 'required',
                'luong' => 'required|numeric',
                'hinhthuctraluong' => 'required',
                'phibaohiem' => 'required|numeric',
                'sbh' => 'required|numeric|min:9'
            ],
            [
                'manhanvien.required' => 'Bạn chưa nhập mã nhân viên!!',
                'hovaten.required' => 'Bạn chưa nhập tên!!',
                'ngaysinh.required' => 'Bạn chưa nhập ngày sinh!!',
                'ngaysinh.before' => 'Bạn nhập ngày sinh chưa đúng!!',
                'avatar.nimes' => 'Định dạng ảnh chưa đúng!!',
                'avatar.max' => 'Dung lượng ảnh chưa đúng!!',
                'email.required' => 'Bạn chưa nhập email!!',
                'email.email' => 'Bạn nhập email chưa đúng!!',
                'sdt.required' => 'Bạn chưa nhập số điện thoại!!',
                'sdt.numeric' => 'Bạn nhập số điện thoại chưa đúng!!',
                'sdt.min' => 'Bạn nhập số điện thoại chưa đúng!!',
                'cmnd.required' => 'Bạn chưa nhập CMND/CCCD!!',
                'cmnd.numeric' => 'Bạn nhập CMND/CCCD chưa đúng!!',
                'cmnd.min' => 'Bạn nhập CMND/CCCD chưa đúng!!',
                'quoctich.required' => 'Vui lòng chọn quốc gia!!',
                'nguoilienhe.required' => 'Bạn chưa nhập người liên lạc khẩn!!',
                'sdtnguoilienhe.required' => 'Bạn chưa nhập số điện thoại liên lạc khẩn!!',
                'sdtnguoilienhe.numeric' => 'Bạn nhập số điện thoại liên lạc khẩn chưa đúng!!',
                'sdtnguoilienhe.min' => 'Bạn nhập số điện thoại liên lạc khẩn chưa đúng!!',
                'mahopdong.required' => 'Bạn chưa nhập mã hợp đồng!!',
                'ngayhieuluc.required' => 'Bạn chưa nhập ngày hiệu lực hợp đồng!!',
                'ngayhieuluc.after_or_equal' => 'Bạn nhập ngày hiệu lực hợp đồng chưa đúng!!',
                'ngayhethieuluc.required' => 'Bạn chưa ngày hết hiệu lực!!',
                'ngayhethieuluc.after' => 'Bạn nhập ngày hết hiệu lực chưa đúng!!',
                'loaihopdong.required' => 'Vui lòng chọn hợp đồng!!',
                'capbac.required' => 'Vui lòng chọn cấp bậc!!',
                'luong.required' => 'Bạn chưa nhập lương!!',
                'luong.numeric' => 'Bạn nhập lương chưa đúng!!',
                'hinhthuctraluong.required' => 'Vui lòng chọn hình thức trả lương!!',
                'phibaohiem.required' => 'Bạn chưa nhập phí bảo hiểm!!',
                'phibaohiem.numeric' => 'Bạn nhập phí bảo hiểm chưa đúng!!',
                'sbh.required' => 'Bạn chưa nhập số bảo hiểm!!',
                'sbh.numeric' => 'Bạn nhập số bảo hiểm chưa đúng!!',
                'sbh.min' => 'Bạn nhập số bảo hiểm chưa đúng!!'
            ]
        );
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
}
