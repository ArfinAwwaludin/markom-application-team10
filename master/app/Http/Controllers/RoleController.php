<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        $role = Role::paginate(5);
        return view('role.index',compact('role'));
         */
        //////////////////////////////////////////////////////////////////////////////////////

        $this->validate($request, [
            'limit' => 'integer',
        ]);

        //$role2 = Role::whereDate('created_date','2020-10-30')->get();

        $role = Role::
        when($request->keyword1, function($query) use($request){
            $query->where('code','like',"%{$request->keyword1}%");
        })
        ->when($request->keyword2, function($query) use($request){
            $query->where('name','like',"%{$request->keyword2}%");
        })
        ->when($request->keyword3, function($query) use($request){
            $query->whereDate('created_date', Carbon::parse($request->keyword3)->format('Y-m-d'));
        })
        ->when($request->keyword4, function($query) use($request){
            $query->where('created_by','like',"%{$request->keyword4}%");
        })->paginate($request->limit ?? 5);

        $role->appends($request->only('keyword1','limit'));
        $role->appends($request->only('keyword2','limit'));
        $role->appends($request->only('keyword3','limit'));
        $role->appends($request->only('keyword4','limit'));

        return view('role.index',compact('role'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* example
        $order = new Order;
        $order->user_id = Auth()->id();
        $latestOrder = App\Order::orderBy('created_at','DESC')->first();
        $order->order_nr = '#'.str_pad($latestOrder->id + 1, 8, "0", STR_PAD_LEFT);
        $order->save();
        */
        ///////////////////////////////////
        /*works but not properly when first input
        $role = new Role();
        $role->id = Auth()->id();
        $latestId = Role::orderBy('id')->first();
        $role->code = 'RO'.str_pad($latestId->id + 1, 4, "0", STR_PAD_LEFT);
        ///////////////////////////////////
        $name = 'Laravel';
        $email = 'mail@laravel.web.id';

        $user = \App\User::whereEmail($email)->whereName($name)->first();

        if (! empty($user)) {
        $user = \App\User::create([
            'name' => $name,
            'email' => $email,
        ]);
        }
        return $user;
        */
        ///////////////////////////////////
        /*
        $role = new Role();
        //ngambil value id
        $role->id = Auth()->id();
        //deklarasi var dgn value RO0001
        $code_first = 'RO0001';
        //ngambil value id trus diassign ke $code_value
        $code_value = Role::orderBy('id','desc')->first();
        //if else utk input row pertama kalo id nya masih kosong/belum ada
        if (! empty($code_value)) {
        $code_value = Role::create([
            'code' => $code_first,
            'name' => $name,
            'description' => $description
        ]);
        }
        else{
            //$role->code = $request->code;
            $role->code = 'RO'.str_pad($code_value->id + 1, 4, "0", STR_PAD_LEFT);
            $role->name = $request->name;
            $role->description = $request->description;
        }
        //return $code_value;
        */
        /////////////////////////////////// VERSI BENER ///////////////////////
        /*
        $role = new Role();
        //$role->id = Auth()->id();
        //$role1 = Role::orderBy('id','desc')->first();
        //$role->code = 'RO'.str_pad($role1->id + 1, 4, "0", STR_PAD_LEFT);
        //$role->code = 'RO'.str_pad($code_value->id + 1, 4, "0", STR_PAD_LEFT);
        $role->code = $request->code;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect('/role')->with('message1','Data Saved!');
        */
        //////////////////////////////////////////////////////////
        
        //$role = new Role();
        //$role->id = Auth()->id();

        //MULAI NGUBAH2
        //$code_first_value = 'RO0001';
        
        //bikin variabel dulu nilai awalnya 1
        //trus baru ketika mau bikin code cek dulu pake sembarang field misal id kosong
        //maka isikan si field code ini pake nilai awal yg = 1
        //terus baru deh lanjut kalo si id gak kosong tinggal nilai var awal +1
        
        $this->validate($request, [
            'name'=>'required|alpha|unique:roles',
            'description'=>'required'
        ]);

        $row = Role::count();
        //$latestId = Role::orderBy('id')->first();
        if($row == 0){
            $role = new Role();
            $role->code = 'RO0001';
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();
            return redirect('/role')->with('message1','Data Saved!');
        }
        else{
            $role = new Role();
            $role->id = Auth()->id();
            $latestId = Role::orderBy('id','desc')->first();
            $role->code = 'RO'.str_pad($latestId->id + 1, 4, "0", STR_PAD_LEFT);
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();
            return redirect('/role')->with('message1','Data Saved!');
        }
        
        //////////////////////////////////////////////////////////
        //$role = new Role();
        //$role->name = $request->name;
        //$role->description = $request->description;
        //$role->save();
        //return redirect('/role')->with('message1','Data Saved!');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $this->validate($request, [
            'name'=>'required|alpha',
            'description'=>'required'
        ]);
        //$role->code = $request->input('code');
        //$role->name = $request->input('name');
        //$role->description = $request->input('description');
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect('/role')->with('message2','Data Updated !');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/role')->with('message3','Data Deleted!');
    }
}

/*
// utk keperluan delete data tp pake fave icon
<form action="{{url("role/{$rol->id}")}}" method="post"
	id="delete-form-{{$rol->id}}" style="display: none;">
	@csrf
	@method('DELETE')
</form>

<a  
	href="{{url("role/{$rol->id}")}}"
	onclick="event.preventDefault();
	document.getElementById('delete-form-{{$rol->id}}').submit();">
	<i class="fa fa-trash" style="color:black"></i>
</a>
*/