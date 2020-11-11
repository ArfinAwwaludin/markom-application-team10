<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['employee_number','first_name','last_name','m_company_id','email'];

    public function company()
    {
        return $this->belongsTo(Company::class);
        //return $this->belongsTo('App\Models\Company');
    }
}
