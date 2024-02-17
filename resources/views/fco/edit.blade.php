<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Updation by the office of FCO</h4>

                  <!-- Error Section Start Here 'message-block' -->
                    @include('includes/message-block')
                  <!-- Error Section Ends Here -->
                  
                  <form class="forms-sample" action="{{ route('fco.complaint.update') }}" method="post">

                      @csrf
                    <input type="hidden" value="{{$list_id}}" name="id">
                  
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Nodel Officer</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="nodal_officer">
                                <option value="Nodal Officer" selected >Nodal Officer</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Work Centre</label>
                              <select class="form-control form-control-lg" name="work_centre" id="exampleFormControlSelect1" required>
                                <option selected disabled >Please Select</option>  
                                <option value="Delhi" {{ $complain->work_centre == "Delhi" ? 'selected' : '' }}>Delhi</option>
                                <option value="Dehradun" {{ $complain->work_centre == "Dehradun" ? 'selected' : '' }} >Dehradun</option>
                                <option value="Mumbai"{{ $complain->work_centre == "Mumbai" ? 'selected' : '' }} >Mumbai</option>
                                <option value="Ahmedabad" {{ $complain->work_centre == "Ahmedabad" ? 'selected' : '' }} >Ahmedabad</option>
                              </select>
                          </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Complaint Status</label>
                              <select name="complaint_status" class="form-control form-control-lg" id="exampleFormControlSelect1" >
                                <option {{ $complain->complaint_status == "With Nodal Officer" ? 'selected' : '' }} value="With Nodal Officer" >With Nodal Officer</option>
                                <option {{ $complain->complaint_status == "With FCO" ? 'selected' : '' }} value="With FCO" >With FCO</option>
                                <option {{ $complain->complaint_status == "Under FRMC deliberations for Closure/Investigation" ? 'selected' : '' }} value="Under FRMC deliberations for Closure/Investigation" >Under FRMC deliberations for Closure/Investigation</option>
                                <option {{ $complain->complaint_status == "Under Investigation" ? 'selected' : '' }} value="Under Investigation" >Under Investigation</option>
                                <option {{ $complain->complaint_status == "Fraud Not Established after FRMC Deliberation" ? 'selected' : '' }} value="Fraud Not Established after FRMC Deliberation">Fraud Not Established after FRMC Deliberation</option>
                                <option {{ $complain->complaint_status == "Fraud Established after FRMC Deliberation" ? 'selected' : '' }} value="Fraud Established after FRMC Deliberation">Fraud Established after FRMC Deliberation</option>
                                <option {{ $complain->complaint_status == "Fraud Established after FRMC Deliberationas" ? 'selected' : '' }} value="Fraud Established after FRMC Deliberationas">Fraud Established after FRMC Deliberationas</option>
                                <option {{ $complain->complaint_status == "Withdrawn – to be ignored" ? 'selected' : '' }} value="Withdrawn – to be ignored">Withdrawn – to be ignored</option>
                              </select>
                          </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Withdrawn – to be ignored</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>YES</option>
                                <option>NO</option>
                              </select>
                          </div>
                        </div>
                    </div> -->

                    
                    <br> <br>
                    <h5 class="card-title">Updation by the office of FCO</h5>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Public</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="publicInput">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="addPublic">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Public – Visible to all users</h4>
                              <ul id="public_visible">
                                  <li>Lorem ipsum dolor sit amet <a href="#" style="color:red; text-align:right;" class="removeItem">X</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Private</label>
                              <div class="input-group">
                                  <input type="text" class="form-control" id="privateInput" >
                                  <div class="input-group-append">
                                      <button type="button" onclick class="btn btn-primary" id="addPrivate" >Add</button>
                                  </div>
                              </div>
                          </div>
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Private – Visible to only the users associated with the office of FCO</h4>
                              <ul id="private_visible" >
                                <li>Lorem ipsum dolor sit amet</li>
                              </ul>
                            </div>
                          </div>
                      </div>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('fco.complaints') }}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
                    
            
            
          </div>
        </div>



<script>
    document.getElementById("addPublic").addEventListener("click", function() {

        var publicInputValue = document.getElementById("publicInput").value;
        if(publicInputValue!=''){
          var privateVisibleList = document.getElementById("public_visible");
          var newListItem = document.createElement("li");
          
          newListItem.innerHTML = publicInputValue + ' <a href="#" style="color:red; text-align:right;" class="removeItem">X</a>';
          privateVisibleList.appendChild(newListItem);
        }
    });
    // Add event listener to dynamically created "X" links
    document.getElementById("public_visible").addEventListener("click", function(event) {
        if (event.target.classList.contains("removeItem")) {
            event.preventDefault(); // Prevent the default behavior of the link
            event.target.parentElement.remove(); // Remove the list item containing the "X" link
        }
    });


    document.getElementById("addPrivate").addEventListener("click", function() {

    var publicInputValue = document.getElementById("privateInput").value;
    if(publicInputValue!=''){
      var privateVisibleList = document.getElementById("private_visible");
      var newListItem = document.createElement("li");
      
      newListItem.innerHTML = publicInputValue + ' <a href="#" style="color:red; text-align:right;" class="removeItem">X</a>';
      privateVisibleList.appendChild(newListItem);
    }
    });
    // Add event listener to dynamically created "X" links
    document.getElementById("private_visible").addEventListener("click", function(event) {
    if (event.target.classList.contains("removeItem")) {
        event.preventDefault(); // Prevent the default behavior of the link
        event.target.parentElement.remove(); // Remove the list item containing the "X" link
    }
    });

</script>
</x-app-layout>