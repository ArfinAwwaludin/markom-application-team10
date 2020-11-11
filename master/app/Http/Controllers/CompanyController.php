<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use App\Observers\RecordFingerPrintObserver;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$company = Company::paginate(5);
        //return view('company.index',compact('company'));

        $this->validate($request, [
            'limit' => 'integer',
        ]);

        //$role2 = Role::whereDate('created_date','2020-10-30')->get();

        $company = Company::
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

        $company->appends($request->only('keyword1','limit'));
        $company->appends($request->only('keyword2','limit'));
        $company->appends($request->only('keyword3','limit'));
        $company->appends($request->only('keyword4','limit'));

        return view('company.index',compact('company'));
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
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'numeric',
            'name'=>'required|unique:companies',
        ]);

        $row = Company::count();
        if($row == 0){
            $company = new Company();
            $company->code = 'CP0001';
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->name = $request->name;
            $company->address = $request->address;
            $company->save();
            return redirect('/company')->with('message1','Data Saved!');
        }
        else{
            $company = new Company();
            $company->id = Auth()->id();
            $latestId = Company::orderBy('id','desc')->first();
            $company->code = 'CP'.str_pad($latestId->id + 1, 4, "0", STR_PAD_LEFT);
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->name = $request->name;
            $company->address = $request->address;
            $company->save();
            return redirect('/company')->with('message1','Data Saved!');
        }

        /*
        $company = new Company([
            'code' => $request->input('code'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'address'=> $request->input('address')
        ]);
        $company->save();
        return redirect('/company')->with('message1','Data Saved!');
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $company = Company::find($id);
        return view('company.edit',compact('company'));   
        

        /* pending code
        if($request -> isMethod('post')){
            $company = $request->all();
            dd($company);
        }
        */
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
        $company = Company::find($id);
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'numeric',
            'name'=>'required',
        ]);
        //$company->code = $request->code;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->save();
        return redirect('/company')->with('message2','Data Updated!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/company')->with('message3','Data Deleted!');
    }
}
