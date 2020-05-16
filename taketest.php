         <?php 

         
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
         $sel = "SELECT * FROM add_new_exam WHERE status = '1'";
         $query = mysqli_query($db,$sel);

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
                <h4 class="timing">Take Exam And Improve Your Skill</h4>
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
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr.</th>
                                       <th>Course Name</th>
                                       <th>Exam Name</th>
                                       <th>Number of Questions</th>
                                       <th>Time</th>
                                       <th>Passing Max</th>
                                       <th>Each Question Max</th>
                                     
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php 
                                    $sr = 1;
                                    while( $row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                       $courseId = $row['course_id'];
                                       $selExamName = mysqli_query($db,"SELECT * FROM add_course WHERE id = '$courseId'");
                                       while($getExamName = mysqli_fetch_array($selExamName,MYSQLI_BOTH))
                                       {
                                          
                                     

                                 ?>
                                 <tbody>
                                    <tr>
                                       
                                       <td><?php echo $sr++;?></td>
                                       <td><?php echo $getExamName['cname'] ?></td>
                                       <td><?php echo $row['ename']; ?></td>
                                       <td><?php echo $row['nquestion']; ?></td>
                                       <td><?php echo $row['exam_time']; ?> Min</td>
                                       <td><?php echo $row['pmax']; ?></td>
                                       <td><?php echo $row['equestionm']; ?></td>
                                      <?php 
                                       $chkExam = mysqli_query($db,"SELECT * FROM exam_result WHERE exam_id = $row[id]");
                                       if(mysqli_num_rows($chkExam) > 0)
                                       {

                                      ?>

                                       <td>
                                         <input type="submit" value="Completed" class=" btn btn-sm btn-rounded btn-success"  >
                                       </td>
                                     
                                    </tr>

                                             

                                    <?php 
                                       }
                                       else
                                       {
                                          ?>
                                           <td>
                                         <input type="submit" value="Take Exam" class=" btn btn-sm btn-rounded btn-primary" onclick="set_exam_type_session(<?php echo $row['id'] ?>);"  >
                                       </td>
                                     
                                    </tr>
                                          <?php
                                       }
                                    }
                                 } 
                                 
                                 ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
              <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>
              
               
            </section>
            <!-- /.content -->
         </div>

         <script>
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