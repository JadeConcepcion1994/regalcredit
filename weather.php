<!DOCTYPE html>
<html>
   <head>
      <title>Weather App</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="css/styles.css">
   </head>
   <body>
      <section>
         <a href="index.php" class="float-left back-to-home"><i class="fa-solid fa-house"></i> Back to Home</a>
         <div class="container py-5">
            
               <div class="main-text-wrap">
                  <i class="fa-solid fa-circle-exclamation float-right"></i>
                  <div class="main-text">
                     
                  </div>
               </div>
               
               <div class="location-statement">
                  Hello, <span class="location-name"></span>!
               </div>
            <div class="row h-100">
               <div class="col-md-4">
                  <div class="card" style="">
                     <div class="card-body p-4">
                        <div class="d-flex">
                           <h6 class="flex-grow-1 date-1"></h6>
                        </div>
                        <div class="d-flex flex-column text-center mt-5 mb-4">
                           <h6 class="display-4 mb-0 font-weight-bold"> <span class="c1-value"></span>°<span class="c1-unit"></span> </h6>
                           <span class="small c1-phrase"></span>
                        </div>
                        <div class="d-flex align-items-center">
                           <div class="flex-grow-1">
                           </div>
                           <div>
                              <img class="c1-icon"
                                 width="100px">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body p-4">
                        <div class="d-flex">
                           <h6 class="flex-grow-1 date-2"></h6>
                        </div>
                        <div class="d-flex flex-column text-center mt-5 mb-4">
                           <h6 class="display-4 mb-0 font-weight-bold"> <span class="c2-value"></span>°<span class="c2-unit"> </h6>
                           <span class="small c2-phrase"></span>
                        </div>
                        <div class="d-flex align-items-center">
                           <div class="flex-grow-1">
                           </div>
                           <div>
                              <img class="c2-icon"
                                 width="100px">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     <div class="card-body p-4">
                        <div class="d-flex">
                           <h6 class="flex-grow-1 date-3"></h6>
                        </div>
                        <div class="d-flex flex-column text-center mt-5 mb-4">
                           <h6 class="display-4 mb-0 font-weight-bold"> <span class="c3-value"></span>°<span class="c3-unit"> </h6>
                           <span class="small c3-phrase"></span>
                        </div>
                        <div class="d-flex align-items-center">
                           <div class="flex-grow-1">
                           </div>
                           <div>
                              <img class="c3-icon"
                                 width="100px">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">API Keys</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <p> 
                     <span class="text-danger">Error!</span>
                     Please set a working API Key to continue.
                  </p>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <!--Custom Js for AJAX call-->
      <script src="js/custom_js.js"></script>
   </body>
</html>