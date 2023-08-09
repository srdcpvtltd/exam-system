<div class="row">
    <div class="col-lg-2">
        @if(Auth::user()->steps > 1)
            <div class="card border-left-3 border-left-success rounded-left-0">
        @else 
            <div class="card border-left-3 {{Auth::user()->steps == 1?'border-left-info':'border-left-danger'}}  rounded-left-0">
        @endif
            <div class="card-body">
                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold">Registration</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        @if(Auth::user()->steps > 2)
            <div class="card border-left-3 border-left-success rounded-left-0">
        @else 
            <div class="card border-left-3 {{Auth::user()->steps == 2?'border-left-info':'border-left-danger'}} rounded-left-0">
        @endif
            <div class="card-body">
                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold">Basic Information</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        @if(Auth::user()->steps > 3)
            <div class="card border-left-3 border-left-success rounded-left-0">
        @else 
            <div class="card border-left-3 {{Auth::user()->steps == 3?'border-left-info':'border-left-danger'}} rounded-left-0">
        @endif
            <div class="card-body">
                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold">Academic Qualification</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        @if(Auth::user()->steps > 4)
            <div class="card border-left-3 border-left-success rounded-left-0">
        @else 
            <div class="card border-left-3 {{Auth::user()->steps == 4?'border-left-info':'border-left-danger'}} rounded-left-0">
        @endif
            <div class="card-body">
                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold">Documents Uploaded</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card border-left-3 {{Auth::user()->steps == 5?'border-left-info':'border-left-danger'}} rounded-left-0">
            <div class="card-body">
                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold">Payment Of Fees</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>