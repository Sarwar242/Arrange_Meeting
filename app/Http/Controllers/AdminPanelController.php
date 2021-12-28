<?php

namespace App\Http\Controllers;

use App\Models\AdminPanel;
use Illuminate\Http\Request;
use App\Models\test;
use App\Models\test1;
use DB;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function show(AdminPanel $adminPanel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminPanel $adminPanel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminPanel $adminPanel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminPanel  $adminPanel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminPanel $adminPanel)
    {
        //
    }

    public function ShowView()
    {
        return view('AdminPanel.AdminMainContentPage');


    }
    public function AddTeacherForm()
    {
        return view('AdminPanel.AddTeacherForm');
    }

    public function AddTeacher(Request $request)
    {
        $adminPanels = new AdminPanel();
        $adminPanels -> name = $request -> name;
        $adminPanels -> dept = $request -> dept;
        $adminPanels -> password = bcrypt($request -> password);
        $adminPanels -> email = $request -> email;
        $adminPanels -> contact = $request -> contact;
        $adminPanels ->save();


        return redirect('TeachersView');

        // return redirect('AdminPanel.AddTeacherForm',' Post created succesfully');

    }

    public function TeachersView()
    {
        $Getdatas = AdminPanel::orderBy('id','DESC')->get();
        return view('AdminPanel.TeachersView',compact('Getdatas'));
        // return view ('AdminPanel.TeachersView');
        // return view ('crud_show')->with('crudsArr',Crud::all());
    }

    public function DeleteTeacher(AdminPanel $AdminPanel, $id)
    {
        AdminPanel::destroy(array('id',$id));
        return redirect('TeachersView');

       // return view('AdminPanel.TeachersView');
    }

    public function EditTeacher($id)
    {
        $findData = adminPanel::find($id);
        return view('AdminPanel.EditTeacher',compact('findData'));
        // return view('AdminPanel.EditTeacher')->with('Getdatas',adminPanel::find($id));
        // return view ('crud_edit')->with('crudsArr',Crud::find($id));
    }
    public function UpdateTeacher(Request $res)
    {
        $get = adminPanel::find($res->id);
        $get->name = $res-> input('name');
        $get->dept = $res-> input('dept');
        $get->password = $res-> input('password');
        $get->email = $res-> input('email');

        $get->contact = $res-> input('contact');
        $get->save();
        return redirect('TeachersView');

    }
    public function test(Request $request)
    {
        $test = new test();
        $test1 = new test1();
        $test -> name = $request -> name;
        $test1 ->address= $request->address;
        $test1 ->school= $request -> school;

        // dd($test1->address);
    //  foreach($test1 as $value)
        // dd($test1);



        $test -> save();
        $test1 -> save();
        // $ts -> save();
    }
    public function testviewdata($id)
    {
        //  $data = test1::findOrFail($id);
         //$data = test1::all();

         $data = test1::findOrFail($id);

       //$data1=collect(test1::select('address')->get());
    //    $val = json_decode($data,true);
        // echo $data;
        //  return redirect('testviewdata',compact('data'));
        //  return view('testviewdata',['data'=>$data]);
       // return view('testviewdata', ['data'=> $data]);
        //  dd($data->address);



        return view("testviewdata",compact("data"));

    }
    public function view()
    {
        return view('test');
    }


}
