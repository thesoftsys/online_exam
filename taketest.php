         <?php 

         
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
         if($_SESSION["role"] == 1)
         {
            echo "<script>location.href='dashboard.php'</script>";
         }
         $sel = "SELECT * FROM add_new_exam WHERE status = '1'";
         $query = mysqli_query($db,$sel);

         ?>
          <style>
         
         /* mobile view table */
         
         table { 
             width: 100%; 
             table-layout: fixed;
             border-collapse: collapse; 
             margin: 0 auto;
         }
         /* Zebra striping */
         tr:nth-of-type(odd) { 
             background: #f2f2f2; 
         }
         th { 
             background: #D9EDF7; 
             color: #3C4767; 
             font-weight: 600; 
         }
         td, th { 
             padding: 12px; 
             border: 2px solid #ccc; 
             text-align: left; 
             text-align: center
         }
         /*Mobile View*/
         @media 
         only screen and 
             (max-width: 760px){
             td, tr { 
                 display: block; 
            }
            
            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr { 
               position: absolute;
               top: -9999px;
               left: -9999px;
            }
            tr {
                 border: 1px solid #3c4767; 
             }
             tr + tr{
                 margin-top: 1.5em;
             }
            td { 
               /* make like a "row" */
               border: none;
               border-bottom: 2px solid #eee; 
               position: relative;
               padding-left: 50%; 
                 
                 text-align: left; 
            }
            td:before { 
                 content: attr(data-label);
                 display: inline-block;
                 line-height: 1.5;
                margin-left: -100%;
                 width: 100%;
               white-space: nowrap;
            }
         }
               </style>

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
                           
                        
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div id="wrapper">
                              <table>
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
                                 
                                 <tbody>
                                 <?php 
                                    $sr = 1;
                                    while( $row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                       $courseId = $row['course_id'];
                                       $selExamName = mysqli_query($db,"SELECT * FROM add_course WHERE id = '$courseId'");
                                       while($getExamName = mysqli_fetch_array($selExamName,MYSQLI_BOTH))
                                       {
                                          
                                     

                                 ?>
                                    <tr>
                                       
                                       <td data-label="Sr."><?php echo $sr++;?></td>
                                       <td data-label="Course Name" ><?php echo $getExamName['cname'] ?></td>
                                       <td data-label="Exam Name" ><?php echo $row['ename']; ?></td>
                                       <td data-label="Number of Questions" ><?php echo $row['nquestion']; ?></td>
                                       <td data-label="Time" ><?php echo $row['exam_time']; ?> Min</td>
                                       <td data-label="Passing Max" ><?php echo $row['pmax']; ?></td>
                                       <td data-label="Each Question Max" ><?php echo $row['equestionm']; ?></td>
                                      <?php 
                                       $chkExam = mysqli_query($db,"SELECT * FROM exam_result WHERE exam_id = $row[id] And user_id = '$_SESSION[user_id]' ");
                                       if(mysqli_num_rows($chkExam) > 0)
                                       {

                                      ?>

                                       <td data-label="Action" >
                                         <input type="submit" value="Completed" class=" btn btn-sm btn-rounded btn-success"  >
                                       </td>
                                     
                                    </tr>

                                    <?php 
                                       }
                                       else
                                       {
                                          ?>
                                           <td data-label="Action">
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