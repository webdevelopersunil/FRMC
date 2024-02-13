<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Updation by the office of FCO</h4>
                  
                  <form class="forms-sample" action="" >
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Nodel Officer</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>Officers 1</option>
                                <option>Officers 2</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Work Location</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>Location 1</option>
                                <option>Location 2</option>
                              </select>
                          </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Complaint Status</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>With Nodal Officer</option>
                                <option>With FCO</option>
                                <option>Under FRMC deliberations for Closure/Investigation</option>
                                <option>Under Investigation</option>
                                <option value="">Fraud Not Established after FRMC Deliberation</option>
                                
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Work Centre</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>Centre 1</option>
                                <option>Centre 2</option>
                              </select>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Withdrawn – to be ignored</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option>YES</option>
                                <option>NO</option>
                              </select>
                          </div>
                        </div>
                    </div>

                    
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
                    <button class="btn btn-light">Cancel</button>

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