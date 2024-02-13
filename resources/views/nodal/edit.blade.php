<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="content-wrapper">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">Updation by Nodal Officer</h4>
                  <p class="card-description" > Detail Page </p>

                  <form class="forms-sample" action="" >

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Uploading Preliminary Report</label>
                                <input type="file" class="form-control" id="exampleInputUsername1" placeholder="file">
                            </div>
                        </div>
                    </div>
                    
                    <br><br>
                    
                    <h5 class="card-title">other related documents</h5>
                    
                    <div id="rowContainer">
                      <div class="row dub-row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Document</label>
                                  <input type="file" class="form-control" id="exampleInputUsername1" placeholder="file">
                              </div>
                          </div>
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label for="exampleInputUsername1">Additional Detail</label>
                                  <textarea name="" class="form-control" id="exampleInputUsername1" cols="30" rows="2"></textarea>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group button-here ">
                                  <label for="exampleInputUsername1">&nbsp;&nbsp;</label>
                                  <input type="button" class="form-control addRowBtn btn btn-primary" value="Add">
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
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.addRowBtn').addEventListener('click', function() {
        var row = document.querySelector('.dub-row');
        var newRow = row.cloneNode(true);
        
        // Remove the "Add" button from the cloned row
        newRow.querySelector('.addRowBtn').remove();

        var removeBtn = document.createElement('input');
        removeBtn.setAttribute('type', 'button');
        removeBtn.setAttribute('class', 'form-control removeRowBtn btn btn-danger');
        removeBtn.setAttribute('value', 'Remove');
        removeBtn.addEventListener('click', function() {
            newRow.remove();
        });

        newRow.querySelector('.button-here').appendChild(removeBtn);

        document.getElementById('rowContainer').appendChild(newRow);
    });
});

</script>


</x-app-layout>