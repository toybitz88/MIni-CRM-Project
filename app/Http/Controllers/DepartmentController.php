<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Department::orderByDesc('id')->get();
        return view('department.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'cname' => 'required',
            'cemail' => 'required',
            'clogo' => 'required|image:jpg,png,gif',
            'cwebsite' => 'required'
        ]); 

        $logo = $request ->file('clogo');
        $renameLogo = time().$logo->getClientOriginalExtension();
        $desc = public_path('/logo');
        $logo -> move($desc , $renameLogo);


        $data = new Department();
        $data -> cname = $request->cname;
        $data -> cemail = $request->cemail;
        $data -> clogo = $renameLogo;
        $data -> cwebsite = $request->cwebsite;
        $data->save();
        
        return redirect('depart/create')->with('msg','Data has been summitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('department.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Department::find($id)->first();
        // // dd($data);
        // return view('department.edit',['data'=> $data]);
        // dd($car);
        $data = Department::find($id);
        return view('department.edit')->with('data', $data);
       
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
        $data = Department::find($id);
        $request->validate([
            'cname' => 'required',
            'cemail' => 'required',
            'clogo' => 'required|image:jpg,png,gif',
            'cwebsite' => 'required'
        ]); 

        // $data = Department::where('id', $id)-> update([
        //     'cname' => $request->input('cname'),
        //     'cmail' => $request->input('email'),
        //     'cwebsite' => $request->input('cwebsite')
        // ]);
        // return redirect('/depart')->with('msg','Data has been updated');
        
        $logoDestination = '/logo/'.$data->clogo;
        if ($request->hasFile('clogo')){
            File::delete($logoDestination);
        }
        $logo = $request ->file('clogo');
        $renameLogo = time().$logo->getClientOriginalExtension();
        $desc = public_path('/logo');
        $logo -> move($desc , $renameLogo);

        $data -> cname = $request->cname;
        $data -> cemail = $request->cemail;
        $data -> clogo = $renameLogo;
        $data -> cwebsite = $request->cwebsite;
        $data->save();
        return redirect('depart/'.$id.'/edit')->with('msg','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id',$id)->delete();

        return redirect('depart')->with('msg','Data has been deleted');
        // $data = Department::find($id)->first();
        // $data->delete();
        // return redirect('/depart');

    }
}
