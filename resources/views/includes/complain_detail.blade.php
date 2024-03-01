<div class="col-md-12 grid-margin stretch-card" >
    <div class="card">

    <div class="row text-center">
        <div class="col-md-12">
            <div class="card-body" style="border-bottom: 1px solid blue;" >
                <h4 class="card-title"  > Complaint Detail </h4>
            </div>
        </div>
    </div>
    
    <div class="row text-center">

        <div class="col-md-3">
            <div class="card-body">
                <h4 class="card-title"> Complaint Number </h4>
                <label style="font-weight:700" >{{ $complain->complain_no }}</label>
            </div>
        </div>
        <div class="col-md-3">
        <div class="card-body">
            <h4 class="card-title"> Department/Section </h4>
            <label class="card-description"> {{ $complain->department_section }} </p>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card-body">
            <h4 class="card-title"> ONGC Work Centre </h4>
            <p class="card-description"> {{ $complain->work_centre }} </p>
        </div>
        </div>
        <div class="col-md-3">
            <div class="card-body">
                <h4 class="card-title"> Against Whom </h4>
                <p class="card-description">{{$complain->against_persons}}</p>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-12">
            <div class="card-body">
                <h4 class="card-title">Description of Complaint</h4>
                <p class="card-description" id="complaintDescription">
                    {{ Str::limit($complain->description, 70) }}
                </p>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 ">
            <h4 class="card-title">Document</h4>
        </div>
        <div class="col-md-8 ">
            <h4 class="card-title">Document Description</h4>
        </div>
    </div>

    @if( count($complain->userAdditionalDetails) >= 1 )
        @foreach($complain->userAdditionalDetails as $index => $detail)

            <div class="row text-center">
                <div class="col-md-4 ">
                    <div class="card-body">
                        <a href="{{ route('preview.file',$detail->file->id) }}" target="_blank" class="text-success d-block text-truncate"> 
                        <span> #{{$index+1}}</span>  View Document
                        </a>
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="card-body">
                        <p class="card-description">{{$detail->description}}</p>
                    </div>
                </div>
            </div>

        @endforeach
    @else
        <div class="row text-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="alert alert-primary" role="alert">
                    No Documents Found
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    @endif
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="showMoreModal" tabindex="-1" role="dialog" aria-labelledby="showMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showMoreModalLabel">Full Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  ">
                <p>{{ $complain->description }}</p>
            </div>
        </div>
    </div>
</div>