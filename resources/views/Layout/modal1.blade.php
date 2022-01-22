
    <div class="modal" id="modal1" tabindex="-1" data-backdrop="false" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Take Attendance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('admin.attendance') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group col-sm-6 offset-sm-3">
                        <label for="day">Date</label>
                        <input type="date" name="day" class="form-control" id="day2" required>
                    </div>

                    <div class="form-group col-sm-6 offset-sm-3">
                        <label for="course">Course</label>
                        <select class="form-control selectpicker" name="course_id" id="course" required>
                            <option value="" disabled selected>Select One</option>
                            @foreach (App\Models\Course::all() as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}-{{ $course->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6 offset-sm-3">
                        <label for="department">Department</label>
                        <select class="form-control selectpicker" name="department_id" id="department" required>
                            <option value="" disabled selected>Select One</option>
                            @foreach (App\Models\Department::all() as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6 offset-sm-3">
                        <label for="batch">Batch</label>
                        <select class="form-control selectpicker" name="batch_id" id="batch" required>
                            <option value="" disabled selected>Select One</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" id="submit" class="btn btn-primary">Take</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>
