      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      $selPassStudent = mysqli_query($db,"SELECT *FROM exam_result WHERE ROUND(marks_percentage) >= 65");
      
      

      ?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Pass Students</h1>
                  <small>All Pass Students</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Projects time -->
                  <!-- <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Running Tasks Duration</h4>
                           </div>
                        </div>
                        <div class="panel-body text-center">
                           <h4 class="timing">05 Hours, 30 Minutes, 00 Seconds</h4>
                        </div>
                     </div>
                  </div> -->
                  <!-- running time -->
                  <div class="col-sm-12 col-md-12">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Pass Students</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Download</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                                 
                                 
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
                                    <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
                              <br><br>
                           </div>

                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr.</th>
                                       <th>Student Name</th>
                                       <th>Student Id</th>
                                       <th>Course Name</th>
                                       <th>Exam Name</th>
                                       <th>Percentage</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php 
                                 $sr = 1;
                                 while($result = mysqli_fetch_array($selPassStudent))
                                 {
                                    $user_id = $result["user_id"];
                                    $exam_id = $result["exam_id"];
                                    $selStudent = mysqli_query($db,"SELECT *FROM exam_student WHERE user_id = '$user_id'");
                                    while($getStudent = mysqli_fetch_array($selStudent,MYSQLI_BOTH))
                                    {
                               
                                 ?>
                                 <tbody>
                                    <tr>
                                       <td>1</td>
                                       <td><?php echo $getStudent["fullname"]; ?></td>
                                       <td><?php echo $result["user_id"]; ?></td>
                                       <td><?php echo $result["course_name"]; ?></td>
                                       <td><?php echo $result["exam_name"]; ?></td>
                                       <td><?php echo round($result["marks_percentage"]) ?>%</td>
                                       
                                       
                                       <td>
                                       
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                 </tbody>
                                 <?php 
                                 $sr++;
                                          
                                       
                                    }
                                 } 
                              ?>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              
               
               <!-- /.modal -->
               <!-- delete user Modal2 -->
               <div class="modal fade" id="delt" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete task</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete task</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <button type="submit" class="btn btn-success btn-sm">YES</button>
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
            </section>
            <!-- /.content -->
         </div>
       <?php include('includes/footer.php'); ?>