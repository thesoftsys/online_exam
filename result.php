<?php 
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
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
                                echo "<br>"; echo "<br>";
                                echo "<center>";
                                echo $count;
                                echo "<br>";
                                echo $correct;
                                echo "<br>";
                                echo $wrong;
                                echo "<center>";
                            
                            ?>



                        <!--<div class="table-responsive">
                              
                           </div> -->
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
            }

         ?>
     

       <?php include('includes/footer.php'); ?>