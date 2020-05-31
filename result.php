<?php 
          
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
         if(empty($_SESSION["exam_id"]))
         {
            echo "<script>location.href='taketest.php'</script>";
         }
         if($_SESSION["role"] == 1)
         {
            echo "<script>location.href='dashboard.php'</script>";
         }
         $date = date("Y-m-d H:i:s");
         $_SESSION["end_time"] = date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
        
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
                  <h1>Your Exam Result </h1>
               </div>
               <div>
               <h4 class="timing" style="display: block;" ></h4>
               </div>
                
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body" >

                            <?php 

                            
                                $correct = 0;
                                $wrong = 0;
                                
                                if(isset($_SESSION["answer"]))
                                {

                                    for($i=1; $i<=sizeof($_SESSION["answer"]); $i++)
                                    {
                                        $answer = "";
                                        $res = mysqli_query($db,"SELECT *FROM add_questions WHERE exam_id = '$_SESSION[exam_id]' && question_no = '$i' ");
                                        while($row = mysqli_fetch_array($res))
                                        {
                                            $answer = $row["right_option"];
                                        }
                                        if(isset($_SESSION["answer"][$i]))
                                        {
                                             if($answer == $_SESSION["answer"][$i])
                                             {
                                                $correct = $correct+1;
                                             }
                                             else
                                             {
                                                $wrong = $wrong+1;
                                             }
                                        }
                                        else
                                        {
                                           $wrong = $wrong+1;
                                        }
                                    }
                                }

                                $count = 0;
                                $res = mysqli_query($db,"SELECT *FROM add_questions WHERE exam_id = '$_SESSION[exam_id]'");
                                $count = mysqli_num_rows($res);
                                $wrong = $count-$correct;

                                $selExam = mysqli_query($db,"SELECT *FROM add_new_exam WHERE id = '$_SESSION[exam_id]' ");
                                $row = mysqli_fetch_array($selExam,MYSQLI_BOTH);
                                $totalMarks = $count * $row['equestionm'];
                                $totalobtainedmarks = $correct*$row['equestionm'];
                                $percentage = $totalobtainedmarks*100/$totalMarks;

                                $selCourse = mysqli_query($db,"SELECT *FROM add_course WHERE id = '$row[course_id]' ");
                                $getCourse = mysqli_fetch_array($selCourse,MYSQLI_BOTH);

                              //   echo "<br>"; echo "<br>";
                              //   echo "<center>";
                              //   echo "Total Ques ".$count;
                              //   echo "<br>";
                              //   echo "Coreect ans ".$correct;
                              //   echo "<br>";
                              //   echo "Wrong ANs ".$wrong;
                              //   echo "<center>";
                              //   echo "<br>";
                              //   echo round($percentage)."%";
                              //   echo "<br>";

                              //   if($percentage >= 65)
                              //   {
                              //      echo "pass";
                              //   }
                              //   else
                              //   {
                              //       echo "fail";
                              //   }
                               
                            
                            ?>



                        <!--<div class="table-responsive">
                              
                           </div> -->
                           <div>
                              <table>
                                 <thead>
                                    <tr class="info">
                                       
                                       <th>Total Questions</th>
                                       <th>Correct Answer</th>
                                       <th>Wrong Answer</th>
                                       <th>Percentage</th>
                                       <th>Pass/Fail</th>
                                       <th>Download Certificate</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       
                                       
                                       <td data-label="Total Questions" >&nbsp;&nbsp;&nbsp;<?php echo $count; ?></td>
                                       <td data-label="Correct Answer" >&nbsp;&nbsp;&nbsp;<?php echo $correct; ?></td>
                                       <td data-label="Wrong Answer" >&nbsp;&nbsp;&nbsp;<?php echo $wrong; ?></td>
                                       <td data-label="Percentage" >&nbsp;&nbsp;&nbsp;<?php echo round($percentage); ?>%</td>
                                       <?php
                                     if($percentage >= 65)
                                     {
                                       
                                       
                                       ?>
                                       <td data-label="Pass/Fail" >&nbsp;&nbsp;&nbsp;<?php echo "Pass"; ?></td>
                                     <?php
                                      }
                                      else
                                      {

                                      
                                     
                                     ?>
                                     <td data-label="Pass/Fail" >&nbsp;&nbsp;&nbsp;<?php echo "Fail"; ?></td>

                                     <?php } ?>
                                     <?php
         
                                          if(isset($_SESSION["exam_start"]))
                                          {
                                             $date = date("y-m-d");
                                             mysqli_query($db,"INSERT INTO exam_result(user_id,exam_id,course_name,exam_name,total_question,correct_answer,wrong_answer,exam_time,marks_percentage) VALUES('$_SESSION[user_id]','$_SESSION[exam_id]','$getCourse[cname]','$row[ename]','$count','$correct','$wrong','$date','$percentage')");
                                             $_SESSION['resultlastid'] = mysqli_insert_id($db);
                                          }
                                          
                                          if(isset($_SESSION["exam_start"]))
                                          {
                                          
                                             
                                             unset($_SESSION["exam_start"]);
                                             
                                             ?>
                                             <script>
                                                window.location.href = window.location.href;
                                             </script>
                                             <?php
                                          }

                                         ?>

                                       <td data-label="Download Certificate" >&nbsp;&nbsp;&nbsp;
                                          

                                          <a href="downloadcertificate.php?downloadid=<?php echo $_SESSION['resultlastid']; ?>" class=" btn btn-sm btn-rounded btn-success">Download</a>
                                         

                                         
                                       </td>
                                     
                                    </tr>

                                             

                                    
                                       
                                     
                                 
                                          
                                 </tbody>
                              </table>
                           </div>
                        </div>

                     </div>
                     
                  </div>

                  
               </div>
               <!-- customer Modal1 -->
            
              
               
            </section>
            <!-- /.content -->
         </div>
         
         
      <!-- <script>
            window.history.pushState({page: 1}, "", "");

         window.onpopstate = function(event) {
            if(event){
               window.location.href = 'taketest.php';
               // Code to handle back button or prevent from navigation
            }
         }
      </script> -->
     <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>

       <?php include('includes/footer.php'); ?>