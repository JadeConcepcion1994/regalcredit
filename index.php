<!DOCTYPE html>
<html>
   <head>
      <title>Weather App</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/styles.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   </head>
   <body>
      <div class="container container-index">
         <div class="jumbotron">
            <div class="row">
               <div class="col-md-4">
                  <h6>(Set API Keys)</h6>
                  <button type="button" data-toggle="modal" data-target="#apiModal" class="btn btn-success btn-block btn-open-api">API Keys <i class="fa-solid fa-key"></i></button>
               </div>
               <div class="col-md-4">
                  <h6>(Set Location Key)</h6>
                  <button type="button" data-toggle="modal" data-target="#locationModal" class="btn btn-warning btn-block btn-open-location"> Location Keys <i class="fa-solid fa-location-dot"></i></button>
               </div>
               <div class="col-md-4">
                  <h6>(Check Weather Forecast)</h6>
                  <a href="weather.php" class="btn btn-info btn-block">Check Weather <i class="fa-solid fa-cloud"></i></a>
               </div>
            </div>
         </div>
      </div>
      <!-- API Keys Modal -->
      <div class="modal fade" id="apiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">API Keys</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="set-api-key">
                     <div class="form-group">
                        <label>Select API Keys to be used:</label>
                        <select class="form-control" id="api_select">
                        </select>
                     </div>
                  </div>
                  <div class="add-api-key-form">
                     <div class="form-group">
                        <label>API Key</label>
                        <input type="text" class="form-control" placeholder="API" name="api_key" id="api_key">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="api_name" id="api_name">
                     </div>
                     <button type="submit" class="btn btn-success float-right btn-add-api">Add Key <i class="fa-solid fa-floppy-disk"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Location Modal -->
      <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Locations</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="set-api-key">
                     <div class="form-group">
                        <label>Select Locations to be used:</label>
                        <select class="form-control" id="location_select">
                        </select>
                     </div>
                  </div>
                  <div class="add-api-key-form">
                     <div class="form-group">
                        <label>Location Key</label>
                        <input type="text" class="form-control" placeholder="Key" name="location_key" id="location_key">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Location Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="location_name" id="location_name">
                     </div>
                     <button type="submit" class="btn btn-warning float-right btn-add-location">Add Location <i class="fa-solid fa-floppy-disk"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <!--Custom Js for AJAX call-->
      <script src="js/custom_js.js"></script>
   </body>
</html>