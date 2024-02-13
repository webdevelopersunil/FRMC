<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    

      
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">FCO User</h4>
            
                        <!-- <p class="card-description">
                            Add class <code>.table-striped</code>
                        </p> -->
                        <!-- <div class="template-demo">
                            <button onclick="window.location=''"  type="button" class="btn btn-primary"> Register Complainant </button>
                        </div> -->

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
                                    <th>Nodel Officer</th> 
                                    <th>Work Location</th> 
                                    <th>Complaint Status</th> 
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
                                    <td> Nodel Officer </td> 
                                    <td> Work Location </td> 
                                    <td> Complaint Status </td>
                                    <td>
                                        <a href="{{ route('fco.complaint.edit') }}">Edit</a> | View
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
    <!-- content-wrapper ends -->

</x-app-layout>