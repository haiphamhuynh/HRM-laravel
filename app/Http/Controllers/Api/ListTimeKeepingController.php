<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ds_timekeeping;
use Illuminate\Http\Request;
use App\Http\Resources\ListTimeKeepingResource;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Size;

use function PHPUnit\Framework\lessThan;

class ListTimeKeepingController extends Controller
{
    public $text;
    public function index()
    {
        $title = 'Quản lí chấm công';
        $timekeeping = Ds_timekeeping::join('employee', 'employee.ma_employee', '=', 'ds_timekeeping.ma_employee')
            ->get();
        return ListTimeKeepingResource::collection($timekeeping);
        //return response()->json(['timekeeping' => $timekeeping]);
    }


    public function getTimekeeping(Request $request)
    {
        // $timekeeping = Ds_timekeeping::create($request->all());
        // dd($timekeeping);
        // dd($this->text);
        $ds_timekeeping = Ds_timekeeping::all();
        return response()->json($ds_timekeeping);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $arr = [];
        // $arr = $request;
        //Log::debug("message".$request);
        // Logger::info([
        //     'title' => 'CHECK_OUT_SUCCESS',
        //     'content' => ''
        // ], 'USER', $request);
        // $timekeeping = Ds_timekeeping::all();
        // $timekeeping = Ds_timekeeping::create($request->input('ma_employee'), $request->input('total_time'), $request->input('month'), $request->input('year'));
        // logger('check', $request[]);

        // foreach ($request->all() as $key) {

        //     $timekeeping = Ds_timekeeping::create($request->$key);
        // }
        foreach ($request->data as $value) {
            $timekeeping =  Ds_timekeeping::create($value); //except('__rowNum__')
        }

        // $this->text = $request->all();
        $ds_timekeeping = Ds_timekeeping::all();
        return response()->json($ds_timekeeping);
        //return view('list_timekeeping');
    }
    public function listYear()
    {
        $arr = [];
        $years = Ds_timekeeping::select('year')->get();
        $unique = $years->unique('year');
        foreach ($unique as $value) {
            array_push($arr, $value);
        }
        //echo response()->json($unique);
        return response()->json(['years' => $arr]);
        // $unique->values()->all();
        //return response()->json(['year' => $unique]);
        //echo $unique;
        //echo response()->json($unique);
        // foreach ($years as $year) {
        //     for ($j = 0; $j < count($arr); $j++) {
        //         if ($year->year && $year->year !== $arr[$j]) {
        //             array_push($arr, $year->year);
        //         }
        //     }
        // }
    }
}
