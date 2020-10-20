<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    /*menampilkan home page awal*/
    public function home(){
        return view('home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company([
            'code' => $request->input('code'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'address'=> $request->input('address')
        ]);
        $company->save();
        return redirect('/company')->with('message1','Data Saved!');

        /* pending code
        if($request->isMethod('post')){
            $company = $request->all();

            $company = new Company;
            $company->code = $company['code'];
            $company->email = $company['email'];
            $company->phone = $company['phone'];
            $company->name = $company['name'];
            $company->address = $company['address'];

            $company->save();
            return redirect('/')->with('message1','Data Saved!');
        }
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
        $company->code = $request->input('code');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->name = $request->input('name');
        $company->address = $request->input('address');
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
