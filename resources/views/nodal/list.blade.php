<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nodal Assigned Complaints</h4>
                        
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
                                    <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td> 1 </td>
                                    <td> CM001NO65 </td>
                                    <td> 02-Feb-2024 </td>
                                    <td> User1, User2 </td>
                                    <td> Department/Section 1 </td>
                                    <td> ONGC Centre Noida </td>
                                    <td>
                                        <a href="{{ route('nodal.complaint.edit') }}">Edit</a> | View
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>