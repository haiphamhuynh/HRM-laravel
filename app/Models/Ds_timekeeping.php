<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ds_timekeeping extends Model
{
    use HasFactory;
    protected $table = 'ds_timekeeping';
    //protected $primaryKey = false;
    protected $fillable = ['ma_employee', 'total_time', 'month', 'year'];
    public $timestamps = false;
    public function employee(){
        return $this->belongsTo(Employee::class, 'ma_employee', 'ma_employee'); // quan he 1 vs nhieu
    }
    // public function timesheets(){
    //     return $this->hasMany(Timesheets::class, 'id_timesheets', 'id_timesheets');
    // }
}
