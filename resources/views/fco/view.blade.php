<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Updation by the office of FCO</h4>
                  
                  <!-- <form class="forms-sample" action="{{ route('fco.complaint.update') }}" method="post"> -->

                    <input type="hidden" value="" name="id">
                  
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Nodel Officer</label>
                              <select class="form-control form-control-lg" id="exampleFormControlSelect1" disabled name="nodal_officer">
                                <option value="Nodal Officer" selected >Nodal Officer</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Work Centre</label>
                              <select class="form-control form-control-lg" name="work_centre" id="exampleFormControlSelect1" required>
                                <option selected disabled >{{ $complain->work_centre }}</option>
                              </select>
                          </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                              <label for="exampleInputUsername1">Complaint Status</label>
                              <select disabled name="complaint_status" class="form-control form-control-lg" id="exampleFormControlSelect1" >
                                <option value="With Nodal Officer" selected disabled >{{$complain->complaint_status}}</option>
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
                        <!-- <div class="form-group">
                            <label for="exampleInputUsername1">Public</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="publicInput">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="addPublic">Add</button>
                                </div>
                            </div>
                        </div> -->
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">Public – Visible to all users</h4>
                              <ul id="public_visible">

                                  <li> .. . </li>

                              </ul>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-6">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Private – Visible to only the users associated with the office of FCO</h4>
                              <ul id="private_visible" >
                                <li> .. . </li>
                              </ul>
                            </div>
                          </div>
                      </div>
                    </div>

                    <a class="btn btn-primary mr-2" href="{{ route('fco.complaints') }}">Back</a>

                </div>
              </div>
            </div>
                    
            
            
          </div>
        </div>

</x-app-layout>