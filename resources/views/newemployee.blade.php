@extends('layout-main.index')
@section('content')
    <div class="content">
        <div class='title-tt'>
            <u>Thông tin liên hệ</u>
        </div>
        <form action="/listEmployee" method="post" id="createEmployee" enctype="multipart/form-data">
            @csrf
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
                        <img src="{{ asset('assets/img/image.jpg') }}" alt="avatar" id="photo">
                        <input type="file" id="file" name="image" class="form-control-file" style="">
                        <label for="file" id="uploadBtn">Chosee photo...</label>
                    </div>
                    <label for="file" style="margin-left: 55px;margin-top:10px">Ảnh đại diện</label>
                </div>
                <div class="form-group col-md-3 padding">
                    <label for="">Mã nhân viên</label>
                    <input type="text" name="manhanvien" class="form-control">
                    @if ($errors->has('manhanvien'))
                        <strong class="text-danger">{{ $errors->first('manhanvien') }}</strong>
                    @endif
                </div>

                <div class="form-group col-md-3 padding">
                    <label for="">Họ và tên</label>
                    <input type="text" name="hovaten" class="form-control">
                    @if ($errors->has('hovaten'))
                        <strong class="text-danger">{{ $errors->first('hovaten') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3 padding">
                    <label for="">Ngày sinh</label>
                    <input type="date" name="ngaysinh" class="form-control">
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
                        <input type="radio" name="rdoSex" value="1" checked>Nam
                        <input type="radio" name="rdoSex" value="2">Nữ
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                    @if ($errors->has('email'))
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="sdt" class="form-control">
                    @if ($errors->has('sdt'))
                        <strong class="text-danger">{{ $errors->first('sdt') }}</strong>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Dân tộc</label>
                    <input type="text" name="dantoc" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Tôn giáo</label>
                    <input type="text" name="tongiao" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Quốc tịch</label>
                    <select id="inputState" name="quoctich" class="form-control form-select">
                        <option value="" selected>Chosee...</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="America">America</option>
                        <option value="France">France</option>
                        <option value="China">China</option>
                        <option value="Korea">Korea</option>
                        <option value="Japan">Japan</option>
                    </select>
                    @if ($errors->has('quoctich'))
                        <strong class="text-danger">{{ $errors->first('quoctich') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">CMND/CCCD</label>
                    <input type="text" name="cmnd" class="form-control">
                    @if ($errors->has('cmnd'))
                        <strong class="text-danger">{{ $errors->first('cmnd') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Nơi cấp</label>
                    <input type="text" name="noicap" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày cấp</label>
                    <input type="date" name="ngaycap" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Người liên hệ khẩn cấp</label>
                    <input type="text" name="nguoilienhe" class="form-control">
                    @if ($errors->has('nguoilienhe'))
                        <strong class="text-danger">{{ $errors->first('nguoilienhe') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số điện thoại người liên hệ khẩn </label>
                    <input type="text" name="sdtnguoilienhe" class="form-control">
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
                    <input type="text" name="mahopdong" class="form-control">
                    @if ($errors->has('mahopdong'))
                        <strong class="text-danger">{{ $errors->first('mahopdong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày kí hợp đồng</label>
                    <input type="date" name="ngaykihopdong" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày hiệu lực</label>
                    <input type="date" name="ngayhieuluc" class="form-control">
                    @if ($errors->has('ngayhieuluc'))
                        <strong class="text-danger">{{ $errors->first('ngayhieuluc') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Ngày hết hiệu lực</label>
                    <input type="date" name="ngayhethieuluc" class="form-control">
                    @if ($errors->has('ngayhethieuluc'))
                        <strong class="text-danger">{{ $errors->first('ngayhethieuluc') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Loại hợp đồng</label>
                    <select id="inputState" name="loaihopdong" class="form-control form-select">
                        <option value="" selected>Choose...</option>
                        <option value="Dài hạn">Dài hạn</option>
                        <option value="Ngắn hạn">Ngắn hạn</option>
                    </select>
                    @if ($errors->has('loaihopdong'))
                        <strong class="text-danger">{{ $errors->first('loaihopdong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Văn phòng</label>
                    <input type="text" name="vanphong" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Trụ sở</label>
                    <input type="text" name="truso" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Cấp bậc</label>
                    <select id="inputState" name="capbac" class="form-control form-select">
                        <option value="" selected>Choose...</option>
                        <option value="Giám đốc">Giám đốc</option>
                        <option value="Quản lí">Quản lí</option>
                        <option value="Trưởng phòng">Trưởng phòng</option>
                        <option value="Nhân viên">Nhân viên</option>
                    </select>
                    @if ($errors->has('capbac'))
                        <strong class="text-danger">{{ $errors->first('capbac') }}</strong>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Lương tổng </label>
                    <input type="text" name="luong" class="form-control">
                    @if ($errors->has('luong'))
                        <strong class="text-danger">{{ $errors->first('luong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Hình thức trả lương</label>
                    <select id="inputState" name="hinhthuctraluong" class="form-control form-select">
                        <option value="" selected>Chosee...</option>
                        <option value="Thẻ ngân hàng" >Thẻ ngân hàng</option>
                        <option value="Trực tiếp">Trực tiếp</option>
                    </select>
                    @if ($errors->has('hinhthuctraluong'))
                        <strong class="text-danger">{{ $errors->first('hinhthuctraluong') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Đóng bảo hiểm</label>
                    <input type="text" name="phibaohiem" class="form-control">
                    @if ($errors->has('phibaohiem'))
                        <strong class="text-danger">{{ $errors->first('phibaohiem') }}</strong>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="">Số bảo hiểm</label>
                    <input type="text" name="sbh" class="form-control">
                    @if ($errors->has('sbh'))
                        <strong class="text-danger">{{ $errors->first('sbh') }}</strong>
                    @endif
                </div>
            </div>
            <div class="form-group" style="text-align:center; margin: 20px;">
                <button class="btn btn-primary" style="margin-right: 20px" type="submit">
                    <i class="fa-solid fa-check"></i>
                    Lưu
                </button>
                <button class="btn btn-primary" type="reset">
                    <i class="fa-solid fa-check"></i>
                    Làm mới
                </button>
            </div>
        </form>
        {{-- @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p class="text-danger">
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif --}}
    </div>
    <script src="{{ asset('assets/js/avatar.js') }}"></script>
@endsection
