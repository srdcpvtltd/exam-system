{{-- <form id="studentDoncumentCreateForm" enctype="multipart/form-data"  action="{{route('prospect.dashboard.student_document_create')}}" method="POST">
    @csrf --}}
    <div class="row">
        <div class="form-group col-md-1">
            #
        </div>
        <div class="form-group col-md-4">
            Name
        </div>
        <div class="form-group col-md-3">
            Document Type
        </div>
        <div class="form-group col-md-4">
            Document
        </div>
    </div>      
    <div class="row">
        @foreach (App\Models\DocumentCategory::all()  as $key => $category)
        <div class="form-group col-md-1">
            {{$key+1}}
        </div>
        <div class="form-group col-md-4">
            {{$category->name}} <span style="color:red;">@if($category->is_required) Required* @endif</span>
            <input type="hidden" name="document_category_id[]" value="{{$category->id}}" class="form-control" required >
        </div>
        <div class="form-group col-md-3">
            {{$category->file_type}}
        </div>
        <div class="form-group col-md-4">
            {{-- <input type="file"  name="{{$category->type}}" class="form-control" @if($category->is_required) required @endif > --}}

            <input type="file"  name="document[]" class="form-control" @if($category->is_required) required @endif >
        </div>
        @endforeach
    </div>   
    {{-- <div class="text-right" style="margin-top:10px;">
        <button type="button" id="back-button" class="btn btn-info">Back <i class="icon-paperplane ml-2"></i></button>
        <button type="submit" class="btn btn-primary">Next <i class="icon-paperplane ml-2"></i></button>
    </div> 
</form> --}}
