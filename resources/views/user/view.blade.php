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

                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-primary" href="{{ route('user.complaints') }}"> Go Back</a>
                </div>

                <br>

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

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputUsername1">ONGC Work Centre</label>
                          <input type="text" disabled name="against_persons" class="form-control" value="{{ $complain->work_centre }}">
                      </div>
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
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Against Whom</label>
                            <input type="text" disabled name="against_persons" class="form-control" value="{{$complain->against_persons}}" id="exampleInputUsername1" placeholder="Against Users names" required>
                        </div>
                      </div>
                  </div>


                  <br>
                  <!-- Additional Input -->
                  <h4>Additional Details</h4>
                  <br>
                  
                  @foreach($userAdditionalDetails as $index => $detail)
                    <div id="rowContainer">
                      <div class="row dub-row">
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Document</label>
                                  <input type="file" class="form-control" name="" value="" id="exampleInputUsername1" placeholder="file">
                              </div>
                          </div>
                          <div class="col-md-9">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Additional Detail</label>
                                  <textarea name="additional_detail[]" class="form-control" id="exampleInputUsername1" cols="30" rows="2"></textarea>
                              </div>
                          </div>
                      </div>
                    </div>

                  @endforeach

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
</x-app-layout>