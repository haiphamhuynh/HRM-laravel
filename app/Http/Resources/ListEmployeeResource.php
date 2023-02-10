<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ListTimeKeepingResource;
use App\Models\Ds_timekeeping;
use Carbon\Carbon;

class ListEmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    // public $preserveKeys = true; // lay ten lam doi tuong
    public static $wrap = 'employee'; // xac dinh khoa chinh thay vi data
    // public $collects = Member::class;
    public function toArray($request)
    {
        $title = 'Quản lí nhân viên';
        $current = Carbon::now();
        $current_time = strtotime($current);

        // return parent::toArray($request);
        return [
            // 'data' => $this->collection,
            'id_employee' => $this->id_employee,
            'ma_employee' => $this->ma_employee,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'rank' => $this->rank,
            'status' => strtotime($this->expiration_date) > $current_time,
            //'posts' => Ds_timekeeping::collection($this->ma_employee),
            // 'posts' => Post::collection($this->whenLoaded('posts')),
            // 'posts_count' => $this->whenCounted('full_name'),
            // 'content' => $this->when($this->id_employee < 5, function(){
            //     return 'admin';
            // }),

            // $this -> mergeWhen($this->id_employee < 7,[
            //     'content' => $this->email,
            //     'sdt' => $this->phone
            // ])
            // mergeWhen hop nhieu thuoc tinh

            // 'ma_employee' => ListTimeKeepingResource::collection($this->whenLoaded('ma_employee')),
            // whenLoaded moi qun he co dieu kien
        ];
        // return [
        //     'data' => $this->collection,
        //     'response' => [
        //         'status' => 'success',
        //         'code' => 200
        //     ],
        // ];
    }
}
