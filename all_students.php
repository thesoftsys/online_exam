      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');

      $selAllStudent = mysqli_query($db,"SELECT *FROM exam_student");


      ?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>All Students</h1>
                  <small>All Registered Student</small>
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
                                 <h4>All Students</h4>
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
                                       <th>Full Name</th>
                                       <th>Email</th>
                                       <th>Mobile No</th>
                                       <th>User Id</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php
                                 $sr = 1;
                                    while($student = mysqli_fetch_array($selAllStudent))
                                    {

                                    
                                 
                                 ?>
                                 <tbody>
                                    <tr>
                                       <td><?php echo $sr; ?></td>
                                       <td><?php echo $student["fullname"] ?></td>
                                       <td><?php echo $student["email"] ?></td>
                                       <td><?php echo $student["mobile"] ?></td>
                                       <td><?php echo $student["user_id"] ?></td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update<?php echo $student["id"] ?>"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt<?php echo $student["id"] ?>"><i class="fa fa-trash-o"></i> </button>
                                       </td>
                                    </tr>
                                 </tbody>

               <div class="modal fade" id="update<?php echo $student["id"] ?>" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-plus m-r-5"></i> Update Info</h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" method="POST" action="code.php?flag=22&id=<?php echo $student["id"] ?>" >
                                    <fieldset>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Student Name</label>
                                          <input type="text" placeholder="Student Name" value="<?php echo $student["fullname"] ?>" name="fullname" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Email</label>
                                          <input type="email" placeholder="Email" value="<?php echo $student["email"] ?>" name="email" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Mobile</label>
                                          <input type="number" placeholder="Mobile" value="<?php echo $student["mobile"] ?>" name="mobile" class="form-control">
                                       </div>
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">User Id</label>
                                          <input type="text" value="<?php echo $student["user_id"] ?>" readonly class="form-control">
                                       </div>
                                    
                                       <div class="col-md-12 form-group user-form-group">
                                          <div class="pull-right">
                                             <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>
                                             <input type="submit" name="submit" class="btn btn-add btn-sm" value="Update" />
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
               <div class="modal fade" id="delt<?php echo $student["id"] ?>" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete task  </h3>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal" method="POST" action="code.php?flag=23&delid=<?php echo $student["id"] ?>">
                                    <fieldset>
                                       <div class="col-md-12 form-group user-form-group">
                                          <label class="control-label">Delete task</label>
                                          <div class="pull-right">
                                             <button type="button" class="btn btn-danger btn-sm">NO</button>
                                             <input type="submit" name="submit" value="Yes" class="btn btn-success btn-sm"/>
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


                                    <?php 
                                       $sr++;
                                       }
                                  ?>

                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           
               <!-- Modal1 -->
               
               <!-- /.modal -->
               <!-- delete user Modal2 -->
               
               <!-- /.modal -->
            </section>
            <!-- /.content -->
         </div>
       <?php include('includes/footer.php'); ?>