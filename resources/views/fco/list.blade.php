<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    

      
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">FCO User</h4><br>
        
                        <div class="table-responsive">

                        <!-- Error Section Start Here 'message-block' -->
                            @include('includes/message-block')
                        <!-- Error Section Ends Here -->
                    
                        <table id="example" class="display expandable-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th> #Index </th>
                                    <th> Complaint No. </th>
                                    <th> Date of Complaint </th>
                                    <th> Complaint Against </th>
                                    <th> Department/Section </th>
                                    <th> ONGC Work Centre </th>
                                    <!-- <th>Nodel Officer</th> -->
                                    <th>Complaint Status</th>
                                    <th> Preliminary Report</th>
                                    <th> Public Detailed Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( count($lists) == 0 )
                                    <tr>
                                        <td colspan="9" >
                                            <div class="alert alert-primary text-center" role="alert">
                                                No data found
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @foreach($lists as $index => $list)
                                    <tr>
                                        <td> {{ $index + 1 }} </td>
                                        <td> {{ $list->complain_no }} </td>
                                        <td> {{ \Carbon\Carbon::parse($list->created_at)->format('d F Y') }}</td>
                                        <td> {{ $list->against_persons }} </td>
                                        <td> {{ $list->department_section }} </td>
                                        <td> {{ $list->work_centre }} </td>
                                        <td> {{ $list->complaint_status }} </td>
                                        <td>
                                            @if( isset($list->preliminaryReport->id) )
                                                <a href="{{ route('preview.file',$list->preliminaryReport->id) }}" target="_blank" class="text-primary d-block text-truncate">
                                                    View Report
                                                </a>
                                            @else
                                                <a href="#" class="text-danger d-block text-truncate">
                                                    No Report Found
                                                </a>
                                            @endif
                                        </td>

                                        <td>{{ $list->public_status ? $list->public_status : '---' }}</td>

                                        <td>
                                            <a href="{{ route('fco.complaint.view', $list->id) }}" class="btn btn-sm link-with-icon"> <i class="ti-eye "></i> </a>
                                            <a href="{{ route('fco.complaint.edit', $list->id) }}" class="btn btn-sm link-with-icon"> <i class="ti-pencil "></i> </a>
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
    <!-- content-wrapper ends -->

</x-app-layout>