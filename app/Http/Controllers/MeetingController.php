<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminPanel;
use App\Models\Meeting;
use App\Models\Participant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Auth;
use DB;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings= Meeting::orderBy('created_at','desc')->get();
        foreach ($meetings as $meeting){
            if(\Carbon\Carbon::parse($meeting->day) < \Carbon\Carbon::today()){
                $meeting->status ='expired';
                $meeting->save();
            }

        }
        return view('meeting.index', compact('meetings'));
    }

    public function create()
    {
        $teachers = AdminPanel::select(['id','name'])->where('id','!=',auth()->id())->get();
        return view('meeting.create', compact('teachers'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'day' => 'required|string',
            'start' => 'required',
            'end' => 'required|after:start',
            'participants' => 'required|array',
        ]);
        DB::beginTransaction();
        try {
            $meeting = new Meeting;
            $meeting -> day = $request -> day;
            $meeting -> start = $request -> start;
            $meeting -> end = $request -> end;
            $meeting -> host_id = auth()->id();
            $meeting -> status = 'pending';
            $meeting -> active = 1;
            $meeting -> save();

            foreach ($request->participants as $participant_id){
                $participant = new Participant;
                $participant->meeting_id = $meeting -> id;
                $participant->teacher_id = $participant_id;
                $participant -> save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('meeting.create');
        }
        session()->flash('success', 'The new meeting has been created successfully!!');
        return redirect()->route('meeting.create');
    }
    public function edit($id) {
        $statuses = array("pending", "done", "expired", "cancelled");
        $meeting = Meeting::find($id);
        $teachers = AdminPanel::select(['id','name'])->where('id','!=',auth()->id())->get();
        return view('meeting.edit', compact(['meeting','teachers','statuses']));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'day' => 'nullable|string',
            'start' => 'nullable',
            'end' => 'nullable|after:start',
            'participants' => 'required|array',
        ]);
        $meeting = Meeting::find($id);
        $meeting -> participants() ->delete();
        DB::beginTransaction();
        try {

            if(!is_null($request -> day))
                $meeting -> day = $request -> day;

            if(!is_null($request -> start))
                $meeting -> start = $request -> start;

            if(!is_null($request -> end))
                $meeting -> end = $request -> end;


            $meeting -> status = $request -> status;
            // dd($meeting->save());
            $meeting->save();

            foreach ($request->participants as $participant_id){
                $participant = new Participant;
                $participant->meeting_id = $meeting -> id;
                $participant->teacher_id = $participant_id;
                $participant -> save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('meetings');
        }
        session()->flash('success', 'The meeting has been edited successfully!!');
        return redirect()->route('meetings');
    }
    public function delete($id) {
        $meeting = Meeting::find($id);
        $meeting ->delete();
        return redirect()->route('meetings');
    }
}
