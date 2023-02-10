<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Illuminate\Http\Request;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Ds_timekeeping;
use Illuminate\Database\Query\Builder;

class ListTimekeepingController extends Controller
{
    public function getTimekeeping(Request $request)
    {
        $title = 'Quản lí chấm công';
        $timekeepings = Ds_timekeeping::paginate(8);
        // $position = $request->position;
        $key = $request->key;
        $month = $request->month;
        $year = $request->year;
        $time = $request->time;
        // $y = Ds_timekeeping::where('ma_employee', '22A001')->select('year')->get();
        // echo($y -> value('year'));

        // $name = Employee::find(3)->full_name;
        // dd($name);
        // $timekeepings = Ds_timekeeping::whereHas('employee');
        // dd($timekeepings);
        if (!empty($key)) {
            // $timekeepings = Ds_timekeeping::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
            //     ->paginate(8);
            // $timekeepings = Ds_timekeeping::with(['employee']);
            // $timekeepings = Ds_timekeeping::with(['employee'])->where(
            //     fn ( $query) =>
            //     $query->whereHas('employee', fn ( $query2) =>
            //     $query2->where('full_name', 'LIKE', '%' . $key . '%')->paginate(8))
            // );
            // $timekeepings = Ds_timekeeping::with(['employee'])->whereHas('empoyee', function (Builder $query) {
            //     $query->where('full_name', 'LIKE', '%' .'a' . '%')->paginate(8);
            // });
            $timekeepings = Ds_timekeeping::whereHas(
                'Employee',
                fn ($query) =>
                $query->where('full_name', 'LIKE', '%' . $key . '%')
            )->paginate(8);
            // dd($text);
        }
        if ($month) {
            $timekeepings = Ds_timekeeping::where('month', $month)->paginate(8);
        }
        if ($year) {
            $timekeepings = Ds_timekeeping::where('year', $year)->paginate(8);
        }
        if ($month && $year) {
            $timekeepings = Ds_timekeeping::where('month', $month)->where('year', $year)->paginate(8);
        }
        if ($time) {
            $timekeepings = Ds_timekeeping::orderBy('total_time', 'desc')->where('total_time', '<=', $time)->paginate(8);
        }
        if ($time && $month) {
            $timekeepings = Ds_timekeeping::orderBy('total_time', 'desc')
                ->where('total_time', '<=', $time)
                ->where('month', $month)
                ->paginate(8);
        }
        if ($time && $month && $year) {
            $timekeepings = Ds_timekeeping::orderBy('total_time', 'desc')
                ->where('total_time', '<=', $time)
                ->where('month', $month)
                ->where('year', $year)
                ->paginate(8);
        }
        // if ($key) {
        //     if ($position == null) {
        //         $timekeepings = Ds_timekeeping::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
        //             ->paginate(8);
        //     } else if ($position != null) {
        //         $timekeepings = Employee::orderBy('id_employee', 'ASC')->where('full_name', 'like', '%' . $key . '%')
        //             ->where('rank', $position)
        //             ->paginate(8);
        //     }
        // }
        // if ($position) {
        //     $timekeepings = Ds_timekeeping::orderBy('year', 'desc')->where('rank', $position)
        //         ->where('full_name', 'like', '%' . $key . '%')
        //         ->paginate(8);
        // }
        return view('list_timekeeping', [
            'timekeepings' => $timekeepings,
            'title' => $title
        ]);
    }
    public function export_csv()
    {
        return Excel::download(new ExcelExports, 'excel.xlsx');
    }

    public function import_csv()
    {
        if (request()->file != null && request()->file->extension() == 'xlsx') {
            Excel::import(new ExcelImports, request()->file('file'));
            return redirect()->back()->with('success', 'Success!!!');
        } else
            return redirect()->back()->with('error', 'Thất bại!!!');
    }
}
