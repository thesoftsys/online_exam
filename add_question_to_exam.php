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
      $totalNoOfQuestion = $examIdResult['nquestion'];
      $examId = $examIdResult['id'];
      
     
     
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
                  
                  <b> <span id="questionNo">0</span> <?php echo " Out Of "; echo $examIdResult['nquestion'] ?> </b>
                  
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                        
                  <!-- Form controls -->
                  <div class="col-sm-12" >
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="view_questions.php"> 
                              <i class="fa fa-list"></i>View Questions List </a>  
                           </div>
                        </div>
                        <div class="panel-body" id="panel-body" >
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
                                            <input type="text" required name="qus" id="qus" class="form-control disableInput ">
                                        </div>

                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 1</label>
                                            <input type="text" name="op1" id="op1" required class="form-control disableInput ">
                                        </div>
                                   </div>

                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 2</label>
                                            <input type="text" name="op2" id="op2" required class="form-control disableInput ">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 3</label>
                                            <input type="text" name="op3" id="op3" required class="form-control disableInput ">
                                        </div>
                                   </div>
                                   <div class="col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Option 4</label>
                                            <input type="text" name="op4" id="op4" required class="form-control disableInput ">
                                        </div>
                                   </div>
                                   <div class="col-sm-12">
                                        
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <input type="text" name="ans" id="ans" onblur="chekAns();" required class="form-control disableInput ">
                                        </div>
                                   </div>
                            
                               </div>
                                

                          
                  
                              <div class="reset-button">
                                 <input type="submit" name="submit" id="uploadbtn" class="btn btn-success disableInput "  disabled value="Upload"/>
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
            
        }
        else
        {
            mysqli_query($db,"INSERT INTO  add_questions(question_no,exam_id,question,option_one,option_two,option_three,option_four,right_option) VALUES('$loop','$examId','$qus','$op1','$op2','$op3','$op4','$ans')");
            
        }
        
        
        

    //  $insQus = "INSERT INTO add_questions()" 
    }
    $totalInsertedQuestionInThisExam = mysqli_num_rows(mysqli_query($db,"SELECT*FROM add_questions WHERE exam_id = '$examId'"));

        echo "<script>
        document.getElementById('questionNo').innerHTML = $totalInsertedQuestionInThisExam;
        </script>";
?>

<script>
    var totalQuestionInserted = "<?php echo $totalInsertedQuestionInThisExam; ?>";
    var totalNoOfquestion = "<?php echo $totalNoOfQuestion; ?>"; 
    if(totalQuestionInserted == totalNoOfquestion)
    {
        
        
         var inputBox = document.getElementsByClassName("disableInput");
            for(var i = 0; i < inputBox.length; i++)
            {
                
                inputBox[i].setAttribute("disabled", true);
                
            }

            document.getElementById("panel-body").addEventListener("click",function(){
                $.notify("All Question Is Uploaded", "success");
            });
       
    }
    else
    {
       
        
    }
    
    function chekAns()
    {
        var qus = document.getElementById("qus").value;
        var op1 = document.getElementById("op1").value;
        var op2 = document.getElementById("op2").value;
        var op3 = document.getElementById("op3").value;
        var op4 = document.getElementById("op4").value;
        var ans = document.getElementById("ans").value;
        var uploadBtn = document.getElementById("uploadbtn");

        if( qus == "" || op1 == "" || op2 == "" || op3 == "" || op4 == "" || ans == "")
        {

            swal("Opps!", "Please Fill All Field", "error");
        }
        else
        {
            if(op1 == ans || op2 == ans || op3 == ans || op4 == ans)
                {
                    uploadBtn.removeAttribute("disabled");
                }

                else
                {
                    uploadBtn.disabled = true; 
                    swal("Opps!", "Please Enter Right Answer ", "error");
                }
        }        
    }







   
</script>

         <?php include('includes/footer.php'); ?>