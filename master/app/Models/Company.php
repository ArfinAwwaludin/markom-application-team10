<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['code','email','phone','name','address'];

    public function employee()
    {
        $this->hasMany(Employee::class);
        //$this->hasMany('App\Models\Employee');
    }

    /*
    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $user = User::id();
           $model->created_by = $user->name;
           $model->updated_by = $user->name;
       });
       static::updating(function($model)
       {
           $user = User::id();
           $model->updated_by = $user->name;
       });
   }
   */
}
