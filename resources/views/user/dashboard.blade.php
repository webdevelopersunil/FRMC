<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="content-wrapper">
          
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
