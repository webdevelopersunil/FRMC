<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    
                        <h4 class="card-title">Complaints List</h4>
                        <p class="card-description">
                            <!-- Add class <code>.table-striped</code> -->
                        </p>

                        <div class="template-demo">
                            <button onclick="window.location='{{ route('user.complaint.create') }}'"  type="button" class="btn btn-primary"> New Complaint </button>
                        </div>

                        @if($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                {{$errors->first()}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                <span class="alert-text text-white">
                                {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif


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
<!-- content-wrapper ends -->

</x-app-layout>