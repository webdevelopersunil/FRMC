<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">New Complaint</h4>
                
                <!-- Error Section Start Here 'message-block' -->
                    @include('includes/message-block')
                <!-- Error Section Ends Here -->

                <form class="forms-sample" action="{{ route('user.complaint.store') }}" method="post" enctype="multipart/form-data"> 

                    @csrf

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Complaint No.</label>
                              <input type="text" name="complain_no" class="form-control" readonly="TRUE" value="{{$complainNo}}" id="exampleInputUsername1" required >
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Description of Complaint</label>
                              <textarea name="description" class="form-control" id="exampleInputUsername1" required cols="30" rows="4">Description of Complaint</textarea>
                          </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputUsername1">ONGC Work Centre</label>
                            <select class="form-control form-control-lg" name="work_centre" id="exampleFormControlSelect1" required>
                                <option selected disabled >Please Select</option>
                                <option value="Delhi" >Delhi</option>
                                <option value="Dehradun" >Dehradun</option>
                                <option value="Mumbai" >Mumbai</option>
                                <option value="Ahmedabad" >Ahmedabad</option>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Department/Section</label>
                            <select onchange="toggleOtherInput()" name="department_section" class="form-control form-control-lg" id="departmentSelect" required>
                              <option selected disabled >Please Select</option>
                              <option value="Department 1" >Department 1</option>
                              <option value="Department 2" >Department 2</option>
                              <option value="Department 3" >Department 3</option>
                              <option value="Department 4" >Department 4</option>
                              <option value="Others" >Others</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputUsername1"> Department (If clicked Others) </label>
                            <input type="text" name="department_section_other" id="others-show" disabled class="form-control" id="exampleInputUsername1" placeholder="Department/Section" required>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Against Whom</label>
                            <input type="text" name="against_persons" class="form-control" value="user 1, User 2" id="exampleInputUsername1" placeholder="Against Users names" required>
                        </div>
                      </div>
                  </div>

                  <br>

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

                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a class="btn btn-light" href="{{ route('user.complaints') }}">Cancel</a>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->


      <script>
        
        function toggleOtherInput() {
            var selectElement = document.getElementById("departmentSelect");
            var otherInput = document.getElementById("others-show");
            if (selectElement.value === "Others") {
                otherInput.disabled = false;
            } else {
                otherInput.disabled = true;
            }
        }
// Need to remove
        document.addEventListener('DOMContentLoaded', function() {
          document.querySelector('.addRowBtn').addEventListener('click', function() {
              var row = document.querySelector('.dub-row');
              var newRow = row.cloneNode(true);
              
              // Remove the "Add" button from the cloned row
              newRow.querySelector('.addRowBtn').remove();

              var removeBtn = document.createElement('input');
              removeBtn.setAttribute('type', 'button');
              removeBtn.setAttribute('class', 'form-control removeRowBtn btn btn-danger');
              removeBtn.setAttribute('value', 'Remove');
              removeBtn.addEventListener('click', function() {
                  newRow.remove();
              });

              newRow.querySelector('.button-here').appendChild(removeBtn);

              document.getElementById('rowContainer').appendChild(newRow);
          });
        });

    </script>


</x-app-layout>