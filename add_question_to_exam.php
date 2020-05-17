<?php 

    
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');

      extract($_GET);

    //   echo $cname;
      
      $sel = "SELECT add_new_exam.ename, add_course.cname  FROM add_course JOIN add_new_exam WHERE add_course.id = $cname";
      $query = mysqli_query($db,$sel);
      $courseAndExamName = mysqli_fetch_array($query);

      $selExamId = mysqli_query($db,"SELECT * FROM add_new_exam WHERE course_id = '$cname' AND ename = '$ename'");
      
      $examIdResult = mysqli_fetch_array($selExamId,MYSQLI_BOTH);
      
      $examId = $examIdResult['id'];
      
      $totalQuestionInThisExam = mysqli_num_rows(mysqli_query($db,"SELECT*FROM add_questions WHERE exam_id = '$examId'"));
     
  
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
                  <h1>Add Questions To Exam </h1>
                  
                  <b> <?php echo $totalQuestionInThisExam; echo " Out Of "; echo $examIdResult['nquestion'] ?> </b>
                  
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
                        <div class="row">
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                    
                                            <label>Course Name</label>
                                            <input type="text" value="<?php echo $courseAndExamName['cname'];?>" readonly class="form-control">
                                        </div>

                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Exam Name</label>
                                            <input type="text"  value="<?php echo $ename ?>" readonly class="form-control">
                                        </div>
                                   </div>

                               </div>
                              
                           <form action=""  method="POST">
                           
                               <div class="row">
                                   <div class="col-sm-12" >
                                        <div class="form-group">
                                    
                                            <label>Enter Question</label>
                                            <input type="text" required name="qus" class="form-control">
                                        </div>

                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 1</label>
                                            <input type="text" name="op1" class="form-control">
                                        </div>
                                   </div>

                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 2</label>
                                            <input type="text" name="op2"  class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 3</label>
                                            <input type="text" name="op3"  class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 4</label>
                                            <input type="text" name="op4"  class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-sm-12">
                                        
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input type="text" name="ans"  class="form-control">
                                        </div>
                                   </div>
                            
                               </div>
                                

                          
                  
                              <div class="reset-button">
                                 <input type="submit" name="submit" class="btn btn-success" value="Upload"/>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
<?php 
    if(isset($_POST['submit']))
    {
        extract($_POST);
        $loop = 0;
        $count = 0;
        $selQues = mysqli_query($db,"SELECT *FROM add_questions WHERE exam_id = '$examId' ORDER BY id ASC");
        $count = mysqli_num_rows($selQues);
        if($count == 0)
        {

        }
        else
        {
            while($row = mysqli_fetch_array($selQues))
            {
                $loop = $loop+1;
                mysqli_query($db,"UPDATE add_questions SET question_no = '$loop' WHERE id = $row[id] ");
            }
        }
        $loop = $loop+1;
        $chkexist = mysqli_query($db,"SELECT *FROM add_questions WHERE question = '$qus'");
        if(mysqli_num_rows($chkexist) > 0)
        {
            echo "adf";
        }
        else
        {
            mysqli_query($db,"INSERT INTO  add_questions(question_no,exam_id,question,option_one,option_two,option_three,option_four,right_option) VALUES('$loop','$examId','$qus','$op1','$op2','$op3','$op4','$ans')");
            
        }
     
 
      

    //  $insQus = "INSERT INTO add_questions()" 
    }
   

?>

         <?php include('includes/footer.php'); ?>