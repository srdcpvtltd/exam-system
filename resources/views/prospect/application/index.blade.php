
@extends('prospect.layout.index')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="card card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h6 class="font-weight-semibold mb-0 text-center">
                            Welcome To Prospect Panel!
                        </h6>
                    </div>
                </div>
            </div>
            
    </div>
</div>
@if(Auth::user()->steps == 6)
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h6 class="font-weight-semibold mb-0 text-center">
                            Your application is submitted!
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    @include('prospect.application.partials.header')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->steps == 1)
                        @if(Auth::user()->studentProfile)
                            @include('prospect.dashboard.partials.registration')
                        @else 
                            @include('prospect.dashboard.partials.new_registration')
                        @endif
                    @elseif(Auth::user()->steps == 2)
                        @if(Auth::user()->studentProfile)
                            @if(Auth::user()->studentProfile && Auth::user()->studentTemparoryAddress() && Auth::user()->studentPermenantAddress())
                                @include('prospect.dashboard.partials.basic_information')
                            @else 
                                @include('prospect.dashboard.partials.new_basic_information')
                            @endif
                        @endif
                    @elseif(Auth::user()->steps == 3)
                        @if(Auth::user()->studentAcademicQualifications->count() > 0)
                            @include('prospect.dashboard.partials.academic_qualification_update')
                        @elseif(Auth::user()->studentProfile && Auth::user()->studentTemparoryAddress() && Auth::user()->studentPermenantAddress())
                            @include('prospect.dashboard.partials.academic_qualification')
                        @endif
                    @elseif(Auth::user()->steps == 4)
                        @if(Auth::user()->studentDocuments->count() > 0)
                            @include('prospect.dashboard.partials.documents_uploaded_update')
                        @elseif(Auth::user()->studentProfile && Auth::user()->studentTemparoryAddress() && Auth::user()->studentPermenantAddress() && Auth::user()->studentAcademicQualifications->count() > 0)
                            @include('prospect.dashboard.partials.documents_uploaded')
                        @endif
                    @elseif(Auth::user()->steps == 5)
                        @include('prospect.dashboard.partials.payment_of_fees')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
@section('scripts')
@include('prospect.dashboard.partials.js')
@endsection