      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      $sel = "SELECT * FROM add_course";
      $query = mysqli_query($db,$sel);
      
      

      ?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Add Questions</h1>
                  <small>View Questions list</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                        
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="view_questions.php"> 
                              <i class="fa fa-list"></i>View Questions List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="add_question_to_exam.php"  method="GET">
                              <div class="form-group">
                                 
                                 <label>Select Course</label>

                                 <select id="courseName" class="form-control" name="cname" onchange="selectCourse()" >
                                 <option value="none" selected disabled hidden>Select Course</option> 
                                    <?php 
                                    while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                    ?>
                                    <option value="<?php echo $row['id'];?>" ><?php echo $row['cname'];?></option>
                                    <?php } ?> 
                                 </select>
                                   
                              </div>

                               <div class="form-group"  >
                                 <label>Select Exam</label>
                                 <select class="form-control" name="ename" id="examName">
                                    
                                   
                                   
                                 </select>
                              </div>
                  
                              <div class="reset-button">
                                 <button class="btn btn-success">Process</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->


         <script>
            function selectCourse()
            {
               var xmlhttp = new XMLHttpRequest();
               var courseId = document.getElementById("courseName").value;
               
               xmlhttp.open("GET","forajax/getExam.php?courseId="+courseId,false);
               xmlhttp.send(null);
               
              
               var examName = document.getElementById("examName").innerHTML=xmlhttp.responseText;
            }
         </script>
         </div>
         <!-- /.content-wrapper -->
         <?php include('includes/footer.php'); ?>