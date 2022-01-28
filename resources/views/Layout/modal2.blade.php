
    <div class="modal" id="modal2" tabindex="-1" data-backdrop="false" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('admin.question.store',$quiz->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group col-sm-8 offset-sm-1">
                        <label for="question">Question</label>
                        <textarea name="question" id="question" cols="40" rows="8" required></textarea>
                    </div>
                    <div class="form-group col-sm-8 offset-sm-1">
                       <input type="text" name="option1" placeholder="option 1" required>
                    </div>

                    <div class="form-group col-sm-8 offset-sm-1">
                       <input type="text" name="option2" placeholder="option 2" required>
                    </div>

                    <div class="form-group col-sm-8 offset-sm-1">
                       <input type="text" name="option3" placeholder="option 3">
                    </div>

                    <div class="form-group col-sm-8 offset-sm-1">
                       <input type="text" name="option4" placeholder="option 4">
                    </div>

                    <div class="form-group col-sm-8 offset-sm-1">
                       <input type="text" name="option5" placeholder="option 5">
                    </div>

                    <div class="form-group col-sm-8 offset-sm-1">
                        <label for="correct">Correct Option</label>
                        <select class="form-control selectpicker" name="correct" id="correct" required>
                            <option value="" disabled selected>Select One</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                            <option value="option5">Option 5</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" id="submit" class="btn btn-primary">Set</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>
