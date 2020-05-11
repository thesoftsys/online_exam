         <?php 
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
         
         ?>

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Running Exam </h1>
               </div>
               <div>
               <h4 class="timing" id="countdowntimer" style="display: block;" ></h4>
               </div>
                
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           
                           <br>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
            
              
               
            </section>
            <!-- /.content -->
         </div>

         <script>
             setInterval(function(){
                timer();
             },1000);
           function timer()
            {
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                    if(xmlhttp.responseText == "00:00:01")
                    {
                        window.location="result.php";
                    }
                    
                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

                  }
               };
               xmlhttp.open("GET","forajax/load_timer.php",true);
               xmlhttp.send(null); 
            }


            function set_exam_type_session(exam_id)
            {
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                     window.location = "exam_dashboard.php"

                  }
               };
               xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_id="+exam_id,true);
               xmlhttp.send(null); 
            }
         </script>
                           

       <?php include('includes/footer.php'); ?>