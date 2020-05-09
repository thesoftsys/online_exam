      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      $sel = "SELECT * FROM add_questions";
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
                  <h1>View Questions List</h1>
                  <small>View Live Questions List</small>
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
                                 <h4>Add New Questions</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="add_questions.php"> <i class="fa fa-plus"></i>Add New Question
                                 </a>  
                              </div>

                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                           </div>
                           <br><br>        
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr</th>
                                       <th>Course Name</th>
                                       <th>Exam Name</th>
                                       <th>Enter Question</th>
                                       <th>Option One</th>
                                       <th>Option Two</th>
                                       <th>Option Three</th>
                                       <th>Option Four</th>
                                       <th>Right Option</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $sr = 1;
                                    while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                       $examId = $row['exam_id'];
                                       $selExam = mysqli_query($db,"SELECT *FROM add_new_exam WHERE id ='$examId'");
                                       while($getExam = mysqli_fetch_array($selExam,MYSQLI_BOTH))
                                       {
                                          $courseId = $getExam['course_id'];
                                          $selCourse = mysqli_query($db,"SELECT *FROM add_course WHERE id = '$courseId'");
                                          while($getCourse = mysqli_fetch_array($selCourse,MYSQLI_BOTH))
                                          {

                                    ?>
                                 
                                    <tr>
                                       <td><?php echo $sr; ?></td>
                                       <td><?php echo $getCourse['cname'] ?></td>
                                       <td><?php echo $getExam['ename']; ?></td>
                                       <td><?php echo $row['question']; ?></td>
                                       <td><?php echo $row['option_one']; ?></td>
                                       <td><?php echo $row['option_two']; ?></td>
                                       <td><?php echo $row['option_three']; ?></td>
                                       <td><?php echo $row['option_four']; ?></td>
                                       <td><?php echo $row['right_option']; ?></td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#<?php echo $row ['id'];?>"><i class="fa fa-pencil"></i></b
                                             utton>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2<?php echo $row['id'] ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>


               <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Update Questions</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" action="code.php?flag=15&uid=<?php echo $row['id']; ?>" method="post">
                                    <fieldset>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Course Name:</label>
                                          <input type="text" value="<?php echo $getCourse['cname'] ?>" readonly  class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Exam Name:</label>
                                          <input type="text" value="<?php echo $getExam['ename'] ?>" readonly class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Enter Question:</label>
                                          <input type="text" value="<?php echo $row['question']; ?>" name ="question" placeholder="Enter Question" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Option One</label>
                                          <input type="text" value="<?php echo $row['option_one']; ?> " name ="option_one" placeholder="Option One" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Option Two</label>
                                          <input type="text" value="<?php echo $row['option_two']; ?>" name ="option_two" placeholder="Option Two" class="form-control">
                                       </div>
                                        <div class="col-md-6 form-group">
                                          <label class="control-label">Option Three</label>
                                          <input type="text" name ="option_three" value="<?php echo $row['option_three']; ?>" class="form-control">
                                       </div>
                                        <div class="col-md-6 form-group">
                                          <label class="control-label">Option Four</label>
                                          <input type="text" name ="option_four" value="<?php echo $row['option_four']; ?>" class="form-control">
                                       </div>
                                        <div class="col-md-6 form-group">
                                          <label class="control-label">Right Option</label>
                                          <input type="text" name ="right_option" value="<?php echo $row['right_option']; ?>" class="form-control">
                                       </div>

                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" data-dismiss="modal"  class="btn btn-danger btn-sm">Cancel</button>
                                             <button type="submit" class="btn btn-add btn-sm">Update</button>
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
                <!-- /.modal -->
               <!-- Modal -->    
               <!-- Customer Modal2 -->
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
                                 <form class="form-horizontal" action="code.php?flag=16&delid=<?php echo $row ['id']; ?>" method="post">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete Questions Data  </label>
                                          <div class="pull-right">
                                             <button type="button" data-dismiss="modal"  class="btn btn-danger btn-sm">NO</button>
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
               <!-- /.modal -->
               
                                    <?php 
                                    $sr++;
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

            


              
            </section>
            <!-- /.content -->
         </div>

         <?php include('includes/footer.php'); ?>
        