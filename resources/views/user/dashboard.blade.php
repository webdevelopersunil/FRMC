<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">User Dashboard</h3>
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

          <!-- Blocks section start here -->
            @include('includes/block')
          <!-- Blocks section ends here -->

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Registered Complaints</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        
                      
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                <th> #Index </th>
                                <th> Complaint No. </th>
                                <th> Date of Complaint </th>
                                <th> Complaint Against </th>
                                <th> Department/Section </th>
                                <th> ONGC Work Centre </th>
                                <th> Public Detailed Status </th>
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
                                        <td>{{ $list->public_status ? $list->public_status : '---' }}</td>
                                        <td>
                                            <a href="{{ route('user.complaint.view', $list->id) }}">View</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            </table>

                            {{ $lists->links() }}



                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        
			<a class="btn btn-primary" href="/user-complaint/create"> + New Complaint</a>
			
		</div>
    
</x-app-layout>
