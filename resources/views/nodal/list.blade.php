<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nodal Assigned Complaints</h4>

                        <!-- Error Section Start Here 'message-block' -->
                            @include('includes/message-block')
                        <!-- Error Section Ends Here -->
                        
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
                                            <a href="{{ route('user.nodal.view', $list->id) }}">View</a> | <a href="{{ route('nodal.complaint.edit', $list->id) }}">Edit</a>
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

</x-app-layout>