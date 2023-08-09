
<div id="addAcademicQualificationModal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('prospect.academic_qualification.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Academic Qualification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <label for="name_of_exam">Name of Examination</label>
                        <input class="form-control" type="text" name="name_of_exam" placeholder="Enter Name of Examination" required>
                    </div>
                    <div class="form-group">
                        <label for="name_of_board">Name of Board</label>
                        <input class="form-control" type="text" name="name_of_board" placeholder="Enter Name of Board" required>
                    </div>
                    <div class="form-group">
                        <label for="attended_school">School / College Last Attended</label>
                        <input class="form-control" type="text" name="attended_school" placeholder="Enter School / College Last Attended" required>
                    </div>
                    <div class="form-group">
                        <label for="passing_year">Year Of Passing</label>     
                        <select  name="passing_year" class="form-control select-search" data-fouc>
                            <option selected disabled>YYYY</option>
                            @for($year = 1980;$year <= 2023;$year++)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total_marks">Total Marks</label>
                        <input class="form-control" type="text" name="total_marks" placeholder="Enter Total Marks" required>
                    </div>
                    <div class="form-group">
                        <label for="percentage">Marks</label>
                        <input class="form-control" type="text" name="marks" placeholder="Enter Marks" required>
                    </div>
                    <div class="form-group">
                        <label for="percentage">Percentage</label>
                        <input class="form-control" type="text" name="percentage" placeholder="Enter Percentage" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>