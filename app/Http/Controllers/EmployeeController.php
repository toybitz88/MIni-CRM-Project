<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Employee;
use Symfony\Component\ErrorHandler\Debug;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empData=Employee::orderByDesc('id')->get();
        return view('employee.index',['empData'=>$empData]);
       
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empData=Department::orderByDesc('id')->get();
        return view('employee.create',['empData'=>$empData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'department_id' => 'required',
            'eemail' => 'required',
            'ephone' => 'required'
        ]);

        $data = new Employee();
        $data -> first_name = $request->first_name;
        $data -> last_name = $request->last_name;
        $data -> department_id = $request->department_id;
        $data -> email = $request->eemail;
        $data -> phone = $request->ephone;
        $data->save();
        
       
        return redirect('employee/create')->with('msg','Data has been summitted');
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
        $departs=Department::orderByDesc('id')->get();
        $empData = Employee::find($id);
        return view('employee.edit')->with(['departs'=>$departs,'empData'=>$empData,]);
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'eemail' => 'required',
            'ephone' => 'required'
        ]);

        $empData = Employee::find($id);
        $empData -> department_id = $request->department_id;
        $empData -> first_name = $request->first_name;
        $empData -> last_name = $request->last_name;
        $empData -> email = $request->eemail;
        $empData -> phone = $request->ephone;
        $empData->save();
        return redirect('employee/'.$id.'/edit')->with('msg','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();
        return redirect('employee')->with('msg','Data has been deletedd');
    }
}
