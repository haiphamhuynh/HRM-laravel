@extends('layout-main.index')
@section('content')
    <div class="content">
        <div class='title-tt'>
            <u>Thông tin liên hệ</u>
        </div>
        <form action="/listEmployee/{{ $employee->id_employee }}" method="post" enctype="multipart/form-data"
            id="createEmployee">
            @csrf
            @method('PUT')
            {{-- <div class="file-field form-group col-md">
            <div class="mb-4">
                <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.webp"
                    class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
            </div>
            <input type="file" name="avatar" id="" class="form-control">
            color
        </div> --}}
            <div class="row" style="">
                <div class="form-group col-md-3" id="file-main" style="z-index: 1;">
                    <div class="profile-pic-div">
                        <img src="{{ asset('images/' . $employee->avatar) }}" alt="" id="photo">
                        <input type="file" id="file" name="image" class="form-control-file" style="">
                        <label for="file" id="uploadBtn">Chosee photo...</label>
                    </div>
                    @if ($errors->has('image'))
                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                    @endif
                    <label for="file" style="margin-left: 55px;margin-top:10px">Ảnh đại diện</label>
                </div>
                <div class="form-group col-md-3 padding">
                    <label for="">Mã nhân viên</label>
                    <input type="text" name="manhanvien" class="form-control" value="{{ $employee->ma_employee }}">
                    @if ($errors->has('manhanvien'))
                        <strong class="text-danger">{{ $errors->first('manhanvien') }}</strong>
                    @endif
                </div>

                <div class="form-group col-md-3 padding">
                    <label for="">Họ và tên</label>
                    <input type="text" name="hovaten" class="form-control" value="{{ $employee->full_name }}">
                    @if ($errors->has('hovaten'))
                        <strong class="text-danger">{{ $errors->first('hovaten') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3 padding">
                    <label for="">Ngày sinh</label>
                    <input type="date" name="ngaysinh" class="form-control" value="{{ $employee->date_of_birth }}">
                    @if ($errors->has('ngaysinh'))
                        <strong class="text-danger">{{ $errors->first('ngaysinh') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row row-file" style="">
                <div class="col-md-3" style="z-index: 0;">
                </div>
                <div class="form-group col-md-3 " style="">
                    <label for="">Giới tính</label>
                    <div class="form-check">
                        <input type="radio" name="rdoSex" value="1"
                            @if ($employee->gender == 1) checked @endif>Nam
                        <input type="radio" name="rdoSex" value="2"
                            @if ($employee->gender == 2) checked @endif>Nữ
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
                    @if ($errors->has('email'))
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control" value="{{ $employee->phone }}">
                    @if ($errors->has('sdt'))
                        <strong class="text-danger">{{ $errors->first('sdt') }}</strong>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Dân tộc</label>
                    <input type="text" name="dantoc" class="form-control" value="{{ $employee->ethnic }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Tôn giáo</label>
                    <input type="text" name="tongiao" class="form-control" value="{{ $employee->religion }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Quốc tịch</label>
                    <select id="inputState" name="quoctich" class="form-control form-select">
                        <option value="Viet Nam" @if ($employee->nationality == 'Viet Nam') selected @endif>Viet Nam</option>
                        <option value="America" @if ($employee->gender == 'America') selected @endif>America</option>
                        <option value="France" @if ($employee->gender == 'France') selected @endif>France</option>
                        <option value="China" @if ($employee->gender == 'China') selected @endif>China</option>
                        <option value="Korea" @if ($employee->gender == 'Korea') selected @endif>Korea</option>
                        <option value="Japan" @if ($employee->gender == 'Japan') selected @endif>Japan</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">CMND/CCCD</label>
                    <input type="text" name="cmnd" class="form-control" value="{{ $employee->cmnd }}">
                    @if ($errors->has('cmnd'))
                        <strong class="text-danger">{{ $errors->first('cmnd') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Nơi cấp</label>
                    <input type="text" name="noicap" class="form-control" value="{{ $employee->issued_by }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày cấp</label>
                    <input type="date" name="ngaycap" class="form-control" value="{{ $employee->date_range }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Người liên hệ khẩn cấp</label>
                    <input type="text" name="nguoilienhe" class="form-control" value="{{ $employee->a_relative }}">
                    @if ($errors->has('nguoilienhe'))
                        <strong class="text-danger">{{ $errors->first('nguoilienhe') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số điện thoại người liên hệ khẩn </label>
                    <input type="text" name="sdtnguoilienhe" class="form-control"
                        value="{{ $employee->phone_a_relative }}">
                    @if ($errors->has('sdtnguoilienhe'))
                        <strong class="text-danger">{{ $errors->first('sdtnguoilienhe') }}</strong>
                    @endif
                </div>
            </div>
            <div class='title-tt'>
                <u>Thông tin hợp đồng </u>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Mã hợp đồng</label>
                    <input type="text" name="mahopdong" class="form-control" value="{{ $employee->contract_code }}">
                    @if ($errors->has('mahopdong'))
                        <strong class="text-danger">{{ $errors->first('mahopdong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày kí hợp đồng</label>
                    <input type="date" name="ngaykihopdong" class="form-control"
                        value="{{ $employee->contract_signing_date }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày hiệu lực</label>
                    <input type="date" name="ngayhieuluc" class="form-control"
                        value="{{ $employee->effective_date }}">
                    @if ($errors->has('ngayhieuluc'))
                        <strong class="text-danger">{{ $errors->first('ngayhieuluc') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày hết hiệu lực</label>
                    <input type="date" name="ngayhethieuluc" class="form-control"
                        value="{{ $employee->expiration_date }}">
                    @if ($errors->has('ngayhethieuluc'))
                        <strong class="text-danger">{{ $errors->first('ngayhethieuluc') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Loại hợp đồng</label>
                    <select id="inputState" name="loaihopdong" class="form-control form-select">
                        <option value="Dài hạn" @if ($employee->type_of_contract == 'Dài hạn') selected @endif>Dài hạn</option>
                        <option value="Ngắn hạn" @if ($employee->type_of_contract == 'Ngắn hạn') selected @endif>Ngắn hạn</option>
                    </select>
                    @if ($errors->has('loaihopdong'))
                        <strong class="text-danger">{{ $errors->first('loaihopdong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Văn phòng</label>
                    <input type="text" name="vanphong" class="form-control" value="{{ $employee->office }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Trụ sở</label>
                    <input type="text" name="truso" class="form-control" value="{{ $employee->headquarters }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Cấp bậc</label>
                    <select id="inputState" name="capbac" class="form-control form-select">
                        <option value="Giám đốc" @if ($employee->rank == 'Giám đốc') selected @endif>Giám đốc</option>
                        <option value="Quản lí" @if ($employee->rank == 'Quản lí') selected @endif>Quản lí</option>
                        <option value="Trưởng phòng" @if ($employee->rank == 'Trưởng phòng') selected @endif>Trưởng phòng</option>
                        <option value="Nhân viên" @if ($employee->rank == 'Nhân viên') selected @endif>Nhân viên</option>
                    </select>
                    @if ($errors->has('capbac'))
                        <strong class="text-danger">{{ $errors->first('capbac') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Lương tổng </label>
                    <input type="text" name="luong" class="form-control" value="{{ $employee->wage }}">
                    @if ($errors->has('luong'))
                        <strong class="text-danger">{{ $errors->first('luong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Hình thức trả lương</label>
                    <select id="inputState" name="hinhthuctraluong" class="form-control form-select">
                        <option value="Thẻ ngân hàng" @if ($employee->payments == 'Thẻ ngân hàng') selected @endif>Thẻ ngân hàng</option>
                        <option value="Trực tiếp" @if ($employee->payments == 'Trực tiếp') selected @endif>Trực tiếp</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Đóng bảo hiểm</label>
                    <input type="text" name="phibaohiem" class="form-control"
                        value="{{ $employee->insurance_money }}">
                    @if ($errors->has('phibaohiem'))
                        <strong class="text-danger">{{ $errors->first('phibaohiem') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số bảo hiểm</label>
                    <input type="text" name="sbh" class="form-control" value="{{ $employee->BHYT }}">
                    @if ($errors->has('sbh'))
                        <strong class="text-danger">{{ $errors->first('sbh') }}</strong>
                    @endif
                </div>
            </div>
            <div class="form-group" style="text-align:center; margin: 20px; position: relative; left:-70px">
                <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-check"></i>
                    Update
                </button>
            </div>
        </form>
        <form action="/listEmployee/{{ $employee->id_employee }}" method="post" class="form-edit" id="form-delete">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-check"></i>
                Delete
            </button>
        </form>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p class="text-danger">
                        {{ $error }}
                    </p>
                @endforeach
            </div>
        @endif
    </div>

    {{-- <script>
        // var formElement = document.querySelector('btn-delete2');
        const $ = document.querySelector.bind(document);
        //const btn_delete = $('.btn-delete');
        $('form#form-delete').click(function(ev){ // ev khoong cho load lai trang
            ev.preventDefault();
            var _action = $(this).attr('action');
            if(confirm('Are you sure you want to delete ?')){
                $('form#form-delete').submit();
            }
        })
    </script> --}}
    <script src="{{ asset('assets/js/avatar.js') }}"></script>
@endsection
