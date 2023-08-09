<div class="row">
    <div class="col-md-12">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Document</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\DocumentCategory::all()  as $key => $category)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @if($category->document())                 
                            <a href="{{route('prospect.dashboard.download_document',$category->document()->id)}}" target="_blank" class="nav-link">
                                <i class="icon-download"></i>
                                Download Document
                            </a>
                        @else 
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        <button data-toggle="modal" data-target="#editDocumentCategoryModal" 
                            id="{{$category->id}}" class="edit-document-btn btn btn-primary">{{$category->document()?'Edit':'Upload'}}</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>