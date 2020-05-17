<?php 
          
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
         if(empty($_SESSION["exam_id"]))
         {
            echo "<script>location.href='taketest.php'</script>";
         }
         $date = date("Y-m-d H:i:s");
         $_SESSION["end_time"] = date("Y-m-d H:i:s",strtotime($date."+$_SESSION[exam_time] minutes"));
         
         



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
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
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
                                       
                                       
                                       <td><?php echo $count; ?></td>
                                       <td><?php echo $correct; ?></td>
                                       <td><?php echo $wrong; ?></td>
                                       <td><?php echo round($percentage); ?>%</td>
                                       <?php
                                     if($percentage >= 65)
                                     {
                                       
                                       
                                       ?>
                                       <td><?php echo "Pass"; ?></td>
                                     <?php
                                      }
                                      else
                                      {

                                      
                                     
                                     ?>
                                     <td><?php echo "Fail"; ?></td>

                                     <?php } ?>
                                      

                                       <td>
                                         <input type="submit" value="Download" class=" btn btn-sm btn-rounded btn-success"  >
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
         <?php
         
            if(isset($_SESSION["exam_start"]))
            {
               $date = date("y-m-d");
               mysqli_query($db,"INSERT INTO exam_result(user_id,exam_id,total_question,correct_answer,wrong_answer,exam_time,marks_percentage) VALUES('$_SESSION[user_id]','$_SESSION[exam_id]','$count','$correct','$wrong','$date','$percentage')");
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