<x-app-layout>
    <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />
    
        
  <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">FCO Officer Dashboard</h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Complaint</p>
                      <p class="fs-30 mb-2">{{ $total }}</p>
                      <p>--</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4"> --- </p>
                      <p class="fs-30 mb-2">-</p>
                      <p>--</p>
                    </div>
                  </div>
                </div>
              
                <div class="col-md-3 mb-4  stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">--</p>
                      <p class="fs-30 mb-2">--</p>
                      <p>--</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">--</p>
                      <p class="fs-30 mb-2">--</p>
                      <p>--</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Complaints</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th> #Index </th>
                              <th> Complaint No. </th>
                              <th> Date of Complaint </th>
                              <th> Complaint Against </th>
                              <th> Department/Section </th>
                              <th> ONGC Work Centre </th>
                              <th>Nodel Officer</th>
                              <th>Complaint Status</th>
                              <th> Action </th>
                            </tr>
                          </thead>

                          <tbody>
                                @foreach($lists as $index => $list)
                                  <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td> {{ $list->complain_no }} </td>
                                    <td> {{ \Carbon\Carbon::parse($list->created_at)->format('d F Y') }}</td>
                                    <td> {{ $list->against_persons }} </td>
                                    <td> {{ $list->department_section }} </td>
                                    <td> {{ $list->work_centre }} </td>
                                    <td> Nodel Officer </td>
                                    <td> Complaint Status </td>
                                    <td>
                                    <a href="{{ route('fco.complaint.view', $list->id) }}">View</a> | <a href="{{ route('fco.complaint.edit', $list->id) }}">Edit</a>
                                    </td>
                                  </tr>
                              @endforeach
                          </tbody>

                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- content-wrapper ends -->  
    
</x-app-layout>
