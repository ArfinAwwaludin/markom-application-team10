<?php

namespace App\Models;

//use DB;
//use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    //use SoftDeletes;
    use HasFactory;
    public $timestamps = false;
    protected $dates = ['created_date','updated_date'];
    protected $fillable = ['id','code','name','description'];

    /*
    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y');
    }
    */
    
    /*
    public function get_order_number()
    {
        return 'RO'.str_pad($this->id, 4, "0", STR_PAD_LEFT);
        //return $getId = DB::table('roles')->orderBy('id','DESC')->take(1)->get();
    }
    */

    /*
    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->code = Role::where('id',$model->id)->max('id')+1;
            //'RO'.str_pad($model->id, 4, "0", STR_PAD_LEFT);
        });
    }
    */
}
