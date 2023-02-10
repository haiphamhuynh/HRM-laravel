<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Ds_timekeeping;

class ExcelExports implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ds_timekeeping::all();
    }

    public function headings() :array {
    	return ["ma_employee", "total_time", "month", "year"];
    }
}
