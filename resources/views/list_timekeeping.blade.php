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
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger alert-dismissible">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </p>
                @endforeach
            </div>
        @endif
        <div class="main-list">
            <div class="title-nv">
                <b>Danh sách chấm công <i style="font-size:30px" class="fa-solid fa-fingerprint"></i></b>
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
                {{-- <div class="dropdown">
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
                </div> --}}
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Số giờ làm
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['time' => 200]) }}">>200h<</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['time' => 210]) }}">>210h<</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['time' => 220]) }}">>220h<</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Tháng
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 1]) }}">1</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 2]) }}">2</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 3]) }}">3</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 4]) }}">4</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 5]) }}">5</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 6]) }}">6</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 7]) }}">7</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 8]) }}">8</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 9]) }}">9</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 10]) }}">10</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 11]) }}">11</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['month' => 12]) }}">12</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Năm
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['year' => 2020]) }}">2020</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['year' => 2021]) }}">2021</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['year' => 2022]) }}">2022</a>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="export-csv" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="btn btn-success" type="submit" value="Export file excel" name="export_csv">
            </form>
        </div>

        <table class="table table-success table-striped table-hover">
            <thead>
                <tr class="click-block-title">
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Tên Nhân viên</th>
                    <th scope="col">Tháng</th>
                    <th scope="col">Năm</th>
                    <th scope="col">Số giờ làm/tháng</th>
                    <th scope="col">Chức vụ</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($timekeepings as $timekeeping)
                    <tr class="click-block-qlcc">
                        <td><a>{{ $timekeeping->ma_employee }}</a></td>
                        <td><a>{{ $timekeeping->employee->full_name }}</a></td>
                        <td><a>{{ $timekeeping->month }}</a></td>
                        <td><a>{{ $timekeeping->year }}</a></td>
                        <td><a>{{ $timekeeping->total_time }}</a></td>
                        <td><a>{{ $timekeeping->employee->rank }}</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="" style="margin-left:40%">
            {{ $timekeepings->appends(request()->all())->links() }}
        </div>

        <form action="import-csv" method="POST" enctype="multipart/form-data" style="margin-bottom:15px;">
            @csrf
            <input type="file" name="file" accept=".xlsx"><br><br>
            <input class="btn btn-warning" type="submit" value="Import file excel" name="import_csv">
        </form>

    </div>
@endsection
