@extends('layout-main.index')
@section('content')
    <div class="content">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                    aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <strong>Thông báo!</strong> {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                    aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <strong>Thông báo!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="main-list">
            <div class="title-nv">
                <b>Nhân viên</b>
            </div>
            <form action="" class="form-inline">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="form1" name="key" class="form-control" placeholder="search..." />
                        {{-- <label class="form-label" for="form1">Search</label> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <div class="main-dropdown">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Chức vụ
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['position' => 'Giám đốc']) }}">Giám đốc</a></li>
                        <li><a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['position' => 'Quản lí']) }}">Quản lí</a></li>
                        <li><a class="dropdown-item"
                                href="{{ request()->fullUrlWithQuery(['position' => 'Nhân viên']) }}">Nhân viên</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Tình trạng
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['status' => 1]) }}">Đang làm</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['status' => 2]) }}">Đã nghỉ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="btn-them">
                <a class="btn btn-primary" href="/listEmployee/create" role="button">Thêm</a>
            </div>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Tình trạng</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <a href="/listEmployee/{{ $employee->id_employee }}">
                        <tr class="click-block">
                            <th scope="row">{{ $employee->id_employee }}</th>
                            <td><a href="/listEmployee/{{ $employee->id_employee }}">{{ $employee->ma_employee }}</a>
                            </td>
                            <td><a href="/listEmployee/{{ $employee->id_employee }}">{{ $employee->full_name }}</a></td>
                            <td><a href="/listEmployee/{{ $employee->id_employee }}">{{ $employee->email }}</a>
                            </td>
                            <td><a href="/listEmployee/{{ $employee->id_employee }}">{{ $employee->phone }}</a></td>
                            <td><a href="/listEmployee/{{ $employee->id_employee }}">{{ $employee->rank }}</a></td>
                            <td>
                                @if (strtotime($employee->expiration_date) > $current_time)
                                    <span class="badge rounded-pill bg-success"><a
                                            href="/listEmployee/{{ $employee->id_employee }}">Đang làm</a></span>
                                @else
                                    <span class="badge rounded-pill bg-danger"><a
                                            href="/listEmployee/{{ $employee->id_employee }}">Đã nghĩ</a></span>
                                @endif
                            </td>
                        </tr>
                    </a>
                @endforeach

            </tbody>
        </table>
        <div class="" style="margin-left:40%">
            {{ $employees->appends(request()->all())->links() }}
        </div>
    </div>
@endsection
