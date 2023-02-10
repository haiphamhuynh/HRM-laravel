<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'manhanvien' => 'required',
            'hovaten' => 'required',
            'ngaysinh' => 'required|date|before:today',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'email' => 'required|email',
            'sdt' => 'required|numeric|min:9',
            'cmnd' => 'required|numeric|min:9',
            'quoctich' => 'required',
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
        ];
    }

    public function messages()
    {
        return [
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
        ];
    }
}
