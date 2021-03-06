      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      $sel = "SELECT * FROM add_new_exam ORDER BY id DESC";
      $query = mysqli_query($db,$sel);
      

      ?>
      <style>


.modal-body {
  overflow-x: auto;
}
      </style>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-users"></i>
               </div>
               <div class="header-title">
                  <h1>Exam List</h1>
                  <small>View Live Exam List</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Add New Exam</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="add_new_exam.php"> <i class="fa fa-plus"></i>Add New Exam
                                 </a>  
                              </div>
                           
                           </div>
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
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php 
                                    $sr = 1;
                                    while( $row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                       $examId = $row['id'];
                                       $courseId = $row['course_id'];
                                       
                                       $selExamName = mysqli_query($db,"SELECT * FROM add_course WHERE id = '$courseId'");
                                       while($getExamName = mysqli_fetch_array($selExamName,MYSQLI_BOTH))

                                       {
                                       $selTotalQuestionInsertd = mysqli_query($db,"SELECT *FROM add_questions WHERE exam_id = '$examId'");
                                       $totalQuestionInderted = mysqli_num_rows($selTotalQuestionInsertd);
                                          $totalNoOfquestion  = $row['nquestion'];
                                          $id = $row['id'];

                                 ?>
                                 <tbody>
                                    <tr>
                                       
                                       <td><?php echo $sr++;?></td>
                                       <td><?php echo $getExamName['cname'] ?></td>
                                       <td><?php echo $row['ename']; ?></td>
                                       <td><b><?php echo $totalQuestionInderted.'</b> Out Of <b> '.$row['nquestion']; ?></b></td>
                                       <td><?php echo $row['exam_time']; ?> Min</td>
                                       <td><?php echo $row['pmax']; ?></td>
                                       <td><?php echo $row['equestionm']; ?></td>
                                       <td>
                                          
                                         

                                          <?php if($row['status'] == '1')

                                          {
                                         
                                          ?>
                                             <input type="checkbox"  id="togglebtn<?php echo $row['id'] ?>"  onchange="examLivePause(<?php echo $row['id'] ?>)" data-toggle="toggle" data-on="Go Live" data-off="Go Pause" data-onstyle="success" data-offstyle="danger">

                                          <?php 
                                          
                                          }
                                          else
                                          {
                                             ?>
                                                <input type="checkbox" id="togglebtn<?php echo $row['id'] ?>"  onchange="examLivePause(<?php echo $row['id'] ?>)" data-toggle="toggle" data-on="Go Live" data-off="Go Pause" data-onstyle="success" data-offstyle="danger" checked="checked" 
                                                <?php 
                                             if($totalQuestionInderted != $row['nquestion'] || $totalQuestionInderted == 0)
                                             { 
                                                echo 'disabled';
                                                
                                             }
                                             else
                                             {
                                                
                                             }  
                                             
                                             ?>
                                                >
                                             <?php

                                            
                                          } ?>
                                          
                                    
                                       </td>
                                       <td>
                                           
                                    
                               
                                          <button type="button" onclick="editRecord(<?php echo $row['id'];?>,<?php echo $totalQuestionInderted; ?>,<?php echo $totalNoOfquestion; ?>)" id="chklive<?php echo $row['id']; ?>"  class="btn btn-add btn-sm" data-toggle="modal" ><i class="fa fa-pencil"></i></button>
                                          
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2<?php echo $row['id'] ?>"><i class="fa fa-trash-o"></i> </button>

                                          <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewQuestions<?php echo $row['id'] ?>"><i class="fa fa-eye"></i> </button> -->

                                          <a href="view_exam_questions.php?examid=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                          
                                       </td>
                                    </tr>

               <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update Exam</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" action="code.php?flag=18&uid=<?php echo $row['id']; ?>" method="post">
                                    <fieldset>
                                       <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                          <label class="control-label">Course Name:</label>
                                          <input type="hidden" name="cid" value="<?php echo $courseId; ?>" >
                                          <input type="text"   readonly value="<?php echo $getExamName['cname'] ?>" class="form-control">
                                       </div>

                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Exam Name:</label>
                                          <input type="text" name="ename" placeholder="Enter Exam Name" value="<?php echo $row['ename']; ?>" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Number of Questions:</label>
                                          <input type="number" name="nquestion" placeholder="Enter Number Of Questions" value="<?php echo $row['nquestion']; ?>" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Time</label>
                                          <select class="form-control" name="time">

                                          <option value="30" >30 Min</option>
                                          <option value="60" >60 Min</option>
                                          <option value="90" >90 Min</option>
                                          <option value="120" >120 Min</option>
                                          
                                          </select>
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Passing Max</label><br>
                                          <input type="number" name="pmax" placeholder="Enter Passing Max" value="<?php echo $row['pmax']; ?>" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Each Question Max</label>
                                          <input type="number" name="equestionm" placeholder="Enter Each Question Max" value="<?php echo $row['equestionm']; ?>" class="form-control">
                                       </div>
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                                             <input type="submit" name="submit" class="btn btn-add btn-sm"/>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>

               <div class="modal fade" id="customer2<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Questions Data </h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" action="code.php?flag=19&delid=<?php echo $row ['id']; ?>" method="post">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Questions Data</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-add btn-sm">YES</button>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
               </div>
               

               <!--show question modal-->


                              <?php 
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
             
              
               
            </section>
            <!-- /.content -->
             
         </div>
         <script>
            
            
            function examLivePause(id)
            {
               var togid = "#togglebtn"+id ;
              

               if($(togid).attr( "checked" ) == "checked")
               {
                     $(togid).removeAttr("checked");
                     $.notify("Exam Is Live", "success");
                     //  alert(1);

                     var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function(){

                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                           
                           // alert(xmlhttp.responseText);
                           
                        }
                     };
                     xmlhttp.open("GET","code.php?flag=17&status=1&id="+id  ,true);
                     xmlhttp.send(null); 

                    

                  }else{
                     
                     
                     $(togid).attr("checked","checked");
                     $.notify("Exam is Pause", "error");
                     // alert(0);
                     var xmlhttp = new XMLHttpRequest();
                     xmlhttp.onreadystatechange = function(){

                        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                           
                           // alert(xmlhttp.responseText);
                           
                        }
                     };
                     xmlhttp.open("GET","code.php?flag=17&status=0   &id="+id  ,true);
                     xmlhttp.send(null); 

                     
                  }
                  
                  }

                  function editRecord(id,totalQuestionInderted,totalNoOfquestion)
                  {
                     var editid = "togglebtn"+id;
                     var toggelButton = document.getElementById(editid);
                   
                  var totalQuestionInserted = "<?php echo $totalQuestionInderted; ?>";

                  
                     if(totalQuestionInderted == totalNoOfquestion && $(toggelButton).attr( "checked" ) != "checked")
                     {
                        swal("Error", "Please Pause Live Exam", "error");
                     }
                     else
                     {
                        $("#"+id).modal("show");
                        
                     }

                  
                  }


                  function viewRecord(id,totalQuestionInderted,totalNoOfquestion)
                  {
                     var editid = "togglebtn"+id;
                     var toggelButton = document.getElementById(editid);
                   
                  var totalQuestionInserted = "<?php echo $totalQuestionInderted; ?>";

                  
                     if(totalQuestionInderted == totalNoOfquestion && $(toggelButton).attr( "checked" ) != "checked")
                     {
                        swal("Error", "Please Pause Live Exam", "error");
                     }
                     else
                     {
                        $("#editQuestion"+id).modal("show");
                        
                     }

                  
                  }

         </script>
         

         <?php include('includes/footer.php'); ?>
        