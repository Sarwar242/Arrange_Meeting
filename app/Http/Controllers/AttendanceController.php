<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\Department;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attendances=Attendance::all();
        return view('attendance.all', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toggle(Request $request)
    {
        $attendance=StudentAttendance::find($request->id);
        if (!is_null($attendance)) {
            if ($attendance->present) {
                $attendance->present=0;
            }else {
                $attendance->present=1;
            }
        }
        $attendance->save();
        return json_encode([
            'success'=>true,
            'message'=> "The status changed!",
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->isMethod('get')) {
            $this->validate($request,[
                'attendance_id' => 'required',
            ]);
            $attd= Attendance::find($request->attendance_id);
            $attendances=StudentAttendance::where('attendance_id', $attd->id)->get();

            if (empty($attd) || empty($attendances)) {
                abort(403);
            }
            return view('attendance.index', compact(['attendances','attd']));
        }
        $this->validate($request,[
            'day' => 'required',
            'batch_id' => 'required',
            'department_id' => 'required',
            'course_id' => 'required',
        ]);
        // $day= Carbon::today();
        $attd= Attendance::where('batch_id',$request->batch_id)->where('course_id',$request->course_id)->whereDate('day',$request->day)->first();
        if(empty($attd)){
            $attd= new Attendance;
            $attd->day = $request->day;
            $attd->department_id = $request->department_id;
            $attd->batch_id = $request->batch_id;
            $attd->course_id = $request->course_id;
            $attd->save();
            $students=Student::where('batch_id',$request->batch_id)->get();
            foreach ($students as $student){
                DB::table('student_attendance')->insert([
                    'student_id' => $student->id,
                    'attendance_id' => $attd->id,
                ]);
            }
            $attendances=StudentAttendance::where('attendance_id', $attd->id)->get();
            return view('attendance.index', compact(['attendances','attd']));
        }else{
            $attendances=StudentAttendance::where('attendance_id', $attd->id)->get();
            return view('attendance.index', compact(['attendances','attd']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name' => 'required|string',
            'session' => 'required',
            'roll' => 'nullable',
            'batch_id' => 'nullable',
            'email' => 'nullable|email',
            'address' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $attendance = Attendance::find($id);
            $attendance -> name = $request -> name;
            $attendance -> roll = $request -> roll;
            $attendance -> session = $request -> session;
            $attendance -> email = $request -> email;
            $attendance -> address = $request -> address;
            $attendance -> batch_id = $request -> batch_id;
            if(!is_null($request -> batch_id)){
                $batch = Batch::find($request -> batch_id);
                $attendance -> department_id = $batch -> department_id;
            }
            $attendance -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('failed', 'Something went wrong!!');
            return redirect()->route('admin.attendance.edit',$id);
        }
        session()->flash('success', 'The Attendance has been updated successfully!!');
        return redirect()->route('admin.attendances');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        $attendance ->delete();
        session()->flash('success', 'The Attendance has been deleted successfully!!');
        return redirect()->route('admin.attendances');
    }
}
