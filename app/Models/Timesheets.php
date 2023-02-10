<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheets extends Model
{
    use HasFactory;
    protected $table = 'timesheets';
    protected $primaryKey = 'id_timesheets';
    protected $fillable = ['start_time', 'end_time', 'total_working_time'];
    public $timestamps = true;
    public function employee(){
        return $this->belongsTo(Employee::class, 'foreign_key'); // map khoa phu cua bang toi employee, quan he 1:1
    }
}
