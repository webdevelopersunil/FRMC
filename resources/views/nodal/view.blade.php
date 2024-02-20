<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

      
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Complainant Detail</h4>
                <!-- <p class="card-description" onclick="window.location=''" > otp confirmation </p> -->

                <div class="template-demo">
                    <button onclick="window.location='{{ route('nodal.complaints') }}'"  type="button" class="btn btn-primary"> Go Back </button>
                </div>
                <br>

                <form class="forms-sample" action="" method="" >
                    
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Complaint No.</label>
                              <input type="text" name="complain_no" class="form-control" readonly="TRUE" value="{{ $complain->complain_no }}" disabled id="exampleInputUsername1">
                          </div>
                      </div>
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputUsername1">Date of Complaint</label>
                          <input type="date" class="form-control" id="exampleInputUsername1">
                      </div>
                    </div> -->
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Description of Complaint</label>
                              <textarea disabled name="description" class="form-control" id="exampleInputUsername1" cols="30" rows="4">{{$complain->description}}</textarea>
                          </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputUsername1"> Department/Section </label>
                            <input type="text"  name="department_section_other" value="{{ $complain->department_section }}" id="others-show" disabled class="form-control" id="exampleInputUsername1" placeholder="Department/Section" required>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Against Whom</label>
                            <input type="text" disabled name="against_persons" class="form-control" value="{{$complain->against_persons}}" id="exampleInputUsername1" placeholder="Against Users names" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">ONGC Work Centre</label>
                            <input type="text" disabled name="against_persons" class="form-control" value="{{ $complain->work_centre }}">
                        </div>
                      </div>
                  </div>

                  <br>
                    <h4>Preliminary Report</h4>
                  <br>

                  @if( $complain->preliminaryReport != null )

                    <a href="{{ route('preview.file',$complain->preliminaryReport->id) }}" target="_blank" class="text-success d-block text-truncate"> 
                      View Preliminary Report
                    </a>

                  @else

                    <a href="#" target="_blank" class="text-success d-block text-truncate"> 
                      No preliminary report found
                    </a>

                  @endif

                  <br>
                  <br>
                    <h4>Other Related Documents</h4>
                  <br>

                  @if( count($complain->nodalAdditionalDetails) >= 1 )

                  @foreach($complain->nodalAdditionalDetails as $index => $detail)
                    <div id="rowContainer">
                      <div class="row dub-row">
                          <div class="col-md-2">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Document</label>
                                  <a href="{{ route('preview.file',$detail->file) }}" target="_blank" class="text-success d-block text-truncate"> 
                                      View Document 
                                  </a>
                              </div>
                          </div>
                          <div class="col-md-10">
                              <div class="form-group">
                                  <label for="exampleInputUsername1"> Additional Detail</label>
                                  <textarea class="form-control" disabled id="exampleInputUsername1" cols="30" rows="4">{{ $detail->description }}</textarea>
                              </div>
                          </div>
                      </div>
                    </div>
                  @endforeach

                  @else

                  <div id="rowContainer">
                      <div class="row dub-row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">No documents found</label>
                              </div>
                          </div>
                      </div>
                    </div>
                  @endif

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
</x-app-layout>