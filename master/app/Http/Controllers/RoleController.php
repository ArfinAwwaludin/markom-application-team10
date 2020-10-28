<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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
        //$role = Role::paginate(5);

        $code = $request->get('code');
        $role = Role::all();

        if($code){
            $role = Role::where("code","LIKE","%$code%")->get();
        }

        return view('role.index',compact('role'));
         */
        //////////////////////////////////////////////////////////////////////////////////////

        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $role = Role::
        when($request->keyword1, function($query) use($request){
            $query->where('code','like',"%{$request->keyword1}%");
        })
        ->when($request->keyword2, function($query) use($request){
            $query->where('name','like',"%{$request->keyword2}%");
        })
        ->when($request->keyword3, function($query) use($request){
            $query->where('created_date','like',"%{$request->keyword3}%");
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
        $role = new Role([
            'code'=>$request->input('code'),
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        $role->save();
        return redirect('/role')->with('message1','Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('role.view',compact('role'));
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
        $role->code = $request->input('code');
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->save();
        return redirect('/role')->with('message2','Data Updated!');
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
// utn keperluan delete data tp pake fave icon
<!--
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
-->
*/