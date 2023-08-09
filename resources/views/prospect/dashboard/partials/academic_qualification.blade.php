{{-- <form id="studentQualificationCreateForm" action="{{route('prospect.dashboard.student_qualification_create')}}" method="POST">
    @csrf --}}
    <div class="row">
        <div class="form-group col-12  text-right">
            <button type="button" class="btn btn-success add-more-fields">Add More Fields</button>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-1">
            
        </div>
        <div class="form-group col-md-2">
            Name of Examination
        </div>
        <div class="form-group col-md-2">
            Name of Board
        </div>
        <div class="form-group col-md-2">
            School / College Last Attended
        </div>
        <div class="form-group col-md-1">
            Year Of Passing
        </div>
        <div class="form-group col-md-1">
            Total Marks
        </div>
        <div class="form-group col-md-1">
            Marks
        </div>
        <div class="form-group col-md-1">
            Percentage
        </div>
    </div>      
    <div class="row">
        <div class="form-group col-md-1">
        </div>
        <div class="form-group col-md-2">
            <input type="text" name="name_of_exam[]" class="form-control" required >
        </div>
        <div class="form-group col-md-2">
            <input type="text" name="name_of_board[]" class="form-control" required >
        </div>
        <div class="form-group col-md-2">
            <input type="text" name="attended_school[]" class="form-control" required >
        </div>
        <div class="form-group col-md-1">
            <input type="text" name="passing_year[]" class="form-control" required >
        </div>
        <div class="form-group col-md-1">
            <input type="text" name="total_marks[]" class="form-control" value="0" required>

        </div>
        <div class="form-group col-md-1">
            <input type="text" name="marks[]" class="form-control" required >
        </div>
        <div class="form-group col-md-1">
            <input type="text" name="percentage[]" class="form-control" required value="">
        </div>
    </div>  
    <div id="academic_qualification_fields">
        
    </div>    
    {{-- <div class="text-right" style="margin-top:10px;">
        <button type="button" id="back-button" class="btn btn-info">Back <i class="icon-paperplane ml-2"></i></button>
        <button type="submit" class="btn btn-primary">Next <i class="icon-paperplane ml-2"></i></button>
    </div> 
</form> --}}