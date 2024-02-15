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
                    <button onclick="window.location='{{ route('user.complaints') }}'"  type="button" class="btn btn-primary"> Go Back </button>
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
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Department/Section</label>
                            <select disabled onchange="toggleOtherInput()" name="department_section" class="form-control form-control-lg" id="departmentSelect" required>
                              <option selected disabled >Please Select</option>
                              <option value="Department 1" >Department 1</option>
                              <option value="Department 2" >Department 2</option>
                              <option value="Department 3" >Department 3</option>
                              <option value="Department 4" >Department 4</option>
                              <option value="Others" >Others</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1"> Department/Section </label>
                            <input type="text"  name="department_section_other" id="others-show" disabled class="form-control" id="exampleInputUsername1" placeholder="Department/Section" required>
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
                            <select class="form-control form-control-lg" name="work_centre" id="exampleFormControlSelect1" required>
                                <option selected disabled >Please Select</option>
                                <option value="Centre 1" >ONGC Work Centre 1</option>
                                <option value="Centre 2" >ONGC Work Centre 2</option>
                                <option value="Centre 3" >ONGC Work Centre 3</option>
                                <option value="Centre 4" >ONGC Work Centre 4</option>
                            </select>
                        </div>
                      </div>
                  </div>

                  <!-- Additional Input -->

                  <div id="rowContainer">
                    <div class="row dub-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Document</label>
                                <input type="file" class="form-control" name="document[]" id="exampleInputUsername1" placeholder="file">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Additional Detail</label>
                                <textarea name="additional_detail[]" class="form-control" id="exampleInputUsername1" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group button-here ">
                                <label for="exampleInputUsername1">&nbsp;&nbsp;</label>
                                <input type="button" class="form-control addRowBtn btn btn-primary" value="Add">
                            </div>
                        </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
</x-app-layout>