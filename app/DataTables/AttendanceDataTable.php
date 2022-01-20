<?php

namespace App\DataTables;

use App\Models\StudentAttendance;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\HtmlString;
use Carbon\Carbon;
use PDF;

class AttendanceDataTable extends DataTable
{
    public function ajax()
    {
        return datatables()
            ->eloquent($this->query())
            ->addIndexColumn()
            ->editColumn('updated_at', function($data){
                if(!is_null($data->updated_at)){
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d-m-Y h:i A');
                    return $formatedDate;
                }
                return "N/A";
            })
            ->editColumn('present', function($data){
                if($data->present==1){
                    return new HtmlString("<span class='text-success'>Yes</span>");
                }
                return new HtmlString("<span class='text-danger'>No</span>");;
            })
            ->skipPaging()
            ->make(true);
    }
    public function dataTable($data)
    {
        return datatables()
                ->addIndexColumn()
                ->editColumn('updated_at', function($data){
                    if(!is_null($data->updated_at)){
                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d-m-Y h:i A');
                        return $formatedDate;
                    }
                    return "N/A";
                })
                ->editColumn('present', function($data){
                    if($data->present==1){
                        return new HtmlString("<span class='text-success'>Yes</span>");
                    }
                    return new HtmlString("<span class='text-danger'>No</span>");;
                })
                ->skipPaging()
                ->parameters([
                    'buttons' => ['excel'],
                ])
                ->make(true);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AttendanceDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        info(json_encode($this));
        return StudentAttendance::join('students', 'student_attendance.student_id', '=', 'students.id')
                ->select(['students.name', 'students.roll', 'students.session', 'student_attendance.updated_at', 'student_attendance.present'])
                ->where('student_attendance.attendance_id',$this->id);

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dataTable')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('roll'),
            Column::make('session'),
            Column::make('updated_at'),
            Column::make('present'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Attendance_' . date('YmdHis');
    }
}
