<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $primaryKey = 'id_employee';
    public $timestamps = false;
    protected $fillable = ['ma_employee','full_name','date_of_birth', 'gender', 'avatar', 'email', 'phone', 'ethnic',
    'religion', 'nationality', 'cmnd', 'issued_by', 'date_range', 'a_relative', 'phone_a_relative',
    'contract_code', 'contract_signing_date', 'effective_date', 'expiration_date', 'type_of_contract',
    'office', 'headquarters', 'rank', 'wage', 'payments', 'insurance_money', 'BHYT']; //chua ds cac truong

    public function timekeeping(){
        return $this->hasMany(Ds_timekeeping::class, 'ma_employee', 'ma_employee');
    }
}
