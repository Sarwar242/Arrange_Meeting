<?php

namespace App\Http\Controllers;

use App\Models\UserPanel;
use App\Models\AdminPanel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function ShowTeacherTableForMeeting()
    {
        // $data = AdminPanel::all();
        $data = DB::table('admin_Panels')
        -> orderBy('id', 'desc')
        -> get();
        return view('Userpanel.ShowTeacherTable',compact('data'));

    //  return view ('Userpanel.ShowTeacherTable')->with('crudsArr',AdminPanel::all());

    //     $data = new AdminPanel::orderBy('id','DESC')->get();
    }

    public function index()
    {
        //
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
     * @param  \App\Models\UserPanel  $userPanel
     * @return \Illuminate\Http\Response
     */
    public function show(UserPanel $userPanel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPanel  $userPanel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPanel $userPanel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPanel  $userPanel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPanel $userPanel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPanel  $userPanel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPanel $userPanel)
    {
        //
    }
    public function ShowTeacherTableViewForMeeting()
    {
        return view('Userpanel.ShowTeacherTable');
    }
    public function MessageService()
    {
        return view('Userpanel.MessageService');
    }
    public function ArrangeMeeting()
    {
        return view('Userpanel.ArrangeMeeting');
    }
}
