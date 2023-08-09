<div class="row" id="remove-{{$key}}">
    <input type="hidden" name="qualification_id[]" value="">
    <div class="form-group col-md-1">
        <button type="button"  class="btn btn-sm btn-danger" onclick="removeFields('{{ @$key }}')">Remove</button>
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