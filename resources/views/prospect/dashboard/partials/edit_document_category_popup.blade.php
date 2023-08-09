
<div id="editDocumentCategoryModal" class="modal fade">
    <div class="modal-dialog">
        <form action="{{route('prospect.dashboard.student_document_update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Document Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="document_category_id" name="document_category_id" >
                    <input type="hidden"  name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="name_of_board">Upload Document</label>
                        <input class="form-control" type="file" name="document" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>