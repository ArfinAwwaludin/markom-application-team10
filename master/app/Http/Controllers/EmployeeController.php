<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$employee = Employee::paginate(5);
        //return view('employee.index',compact('employee'));

        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $employee = Employee::
        when($request->keyword1, function($query) use($request){
            $query->where('employee_number','like',"%{$request->keyword1}%");
        })
        ->when($request->keyword2, function($query) use($request){
            $query->where('first_name','like',"%{$request->keyword2}%");
        })
        ->when($request->keyword3, function($query) use($request){
            $query->where('m_company_id','like',"%{$request->keyword3}%");
        })
        ->when($request->keyword4, function($query) use($request){
            $query->whereDate('created_date', Carbon::parse($request->keyword4)->format('Y-m-d'));
        })
        ->when($request->keyword5, function($query) use($request){
            $query->where('created_by','like',"%{$request->keyword5}%");
        })->paginate($request->limit ?? 5);

        $employee->appends($request->only('keyword1','limit'));
        $employee->appends($request->only('keyword2','limit'));
        $employee->appends($request->only('keyword3','limit'));
        $employee->appends($request->only('keyword4','limit'));
        $employee->appends($request->only('keyword5','limit'));

        return view('employee.index',compact('employee'));
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
            'employee_number'=> 'required|unique:employees',
            'first_name'=> 'required',
            'm_company_id' => 'required',
            'email' => 'email',
        ]);

        $employee = new Employee();
        $employee->employee_number = $request->employee_number;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->m_company_id = $request->m_company_id;
        $employee->email = $request->email;
        $employee->save();
        return redirect('/employee')->with('message1','Data Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.view',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',compact('employee'));
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
        $employee = Employee::find($id);
        $this->validate($request, [
            'employee_number'=> 'required|unique:employees',
            'first_name'=> 'required',
            'm_company_id' => 'required',
            'email' => 'email',
        ]);
        $employee->employee_number = $request->employee_number;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->m_company_id = $request->m_company_id;
        $employee->email = $request->email;
        $employee->save();
        return redirect('/employee')->with('message2','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employee')->with('message3','Data Deleted!');
    }
}
