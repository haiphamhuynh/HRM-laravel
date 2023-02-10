<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Ds_timekeeping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExcelImports implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */

    public function headingRow() : int
    {
        return 1; // bỏ qua phần tiêu đề của bảng
    }

    public function model(array $row)
    {
        // $date = intval($row['start_day']);
        // $date1 = intval($row['end_day']);
        //\Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        // 'birthday' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birthday'] ?? $row['ngay_sinh'])->format('Y-m-d')
        // PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dateFromExcel)
        // 'start_day' => Carbon::instance(Date::excelToDateTimeObject($row['start_day']))
        // 'end_day' => Carbon::instance(Date::excelToDateTimeObject($row['end_day']))
        return new Ds_timekeeping([
            'ma_employee' => $row['ma_employee'],
            'total_time' => $row['total_time'],
            'month' => $row['month'],
            'year' => $row['year'],
        ]);
    }
    public function rules(): array
    {
        // $year = Carbon::now()->year;
        return [
            '*.ma_employee' => ['required'],
            '*.total_time' => ['required', 'numeric'],
            '*.month' => ['required', 'numeric', 'max:12'],
            '*.year' => ['required', 'numeric']
        ];
    }
}
