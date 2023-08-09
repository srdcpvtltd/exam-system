@extends('admin.layout.index')

@section('title')
    {{$prospect->name}}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">Addmission Form {{$prospect->studentProfile && $prospect->studentProfile->course ?'For '.$prospect->studentProfile->course->name:''}}</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-top">
                    <li class="nav-item"><a href="#top-tab1" @if(@$active_tab == 'registration') class="nav-link active" @else class="nav-link" @endif data-toggle="tab">Registration</a></li>
                    <li class="nav-item"><a href="#top-tab2" @if(@$active_tab == 'basic_information') class="nav-link active" @else class="nav-link" @endif class="nav-link" data-toggle="tab">Basic Information</a></li>
                    <li class="nav-item"><a href="#top-tab3" @if(@$active_tab == 'academic_qualification') class="nav-link active" @else class="nav-link" @endif class="nav-link" data-toggle="tab">Academic Qualification</a></li>
                    <li class="nav-item"><a href="#top-tab4" @if(@$active_tab == 'documents_uploaded') class="nav-link active" @else class="nav-link" @endif class="nav-link" data-toggle="tab">Documents Uploaded</a></li>
                    <li class="nav-item"><a href="#top-tab5" @if(@$active_tab == 'payment_of_fees') class="nav-link active" @else class="nav-link" @endif class="nav-link" data-toggle="tab">Payment Of Fees</a></li>
                </ul>

                <div class="tab-content">
                    <div @if(@$active_tab == 'registration')  class="tab-pane fade show active" @else class="tab-pane fade" @endif id="top-tab1">
                        <div class="card-body">
                            @if($prospect->studentProfile)
                                @include('admin.prospect.partials.registration')
                            @endif
                        </div>
                    </div>
                    <div  @if($active_tab == 'basic_information')  class="tab-pane fade show active" @else class="tab-pane fade" @endif id="top-tab2">
                        <div class="card-body">
                                @if($prospect->studentProfile && $prospect->studentTemparoryAddress() && $prospect->studentPermenantAddress())
                                	@include('admin.prospect.partials.basic_information')
                                @endif
                        </div>
                    </div>
                    <div @if($active_tab == 'academic_qualification')  class="tab-pane fade show active" @else class="tab-pane fade" @endif id="top-tab3">
                        	@include('admin.prospect.partials.academic_qualification')
                    </div>
                    <div @if($active_tab == 'documents_uploaded')  class="tab-pane fade show active" @else class="tab-pane fade" @endif class="tab-pane fade" id="top-tab4">
                        @include('admin.prospect.partials.documents_uploaded')
                    </div>

                    <div @if($active_tab == 'payment_of_fees')  class="tab-pane fade show active" @else class="tab-pane fade" @endif id="top-tab5">
                        @include('admin.prospect.partials.payment_of_fees')
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic layout-->

    </div>
</div>
@endsection
@section('scripts')
@endsection
