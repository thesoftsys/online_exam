      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      $sel = "SELECT * FROM add_new_exam";
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
                              <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars">&nbsp;</i>Download Exam</button>
                              <ul class="dropdown-menu exp-drop" role="menu">
                               
                                 <li>
                                    <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                                    <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                                 </li>
                              </ul>
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

                                 ?>
                                 <tbody>
                                    <tr>
                                       
                                       <td><?php echo $sr++;?></td>
                                       <td><?php echo $row['cname']; ?></td>
                                       <td><?php echo $row['ename']; ?></td>
                                       <td><?php echo $row['nquestion']; ?></td>
                                       <td><?php echo $row['exam_time']; ?></td>
                                       <td><?php echo $row['pmax']; ?></td>
                                       <td><?php echo $row['equestionm']; ?></td>
                                       <td>
                                          <span class="label-warning label label-default">

                                          <?php if($row['status'] == '1')

                                          {
                                          echo "<a href='code.php?flag=17&status=0&id=$row[id]'>Pause</a>";
                                          }
                                          else
                                          {
                                          echo "<a href='code.php?flag=17&status=1&id=$row[id]'>Live</a>";
                                          } ?></span>
                                       </td>
                                       <td>
                                          <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-trash-o"></i> </button>
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
                                 <form class="form-horizontal" action="code.php?flag=18&id=<?php echo $row['id']; ?>" method="post">
                                    <fieldset>
                                       <!-- Text input-->
                                    <div class="col-md-6 form-group">
                                          <label class="control-label">Course Name:</label>
                                          <input type="text" name="ename" placeholder="Enter Exam Name" value="<?php echo $row['cname']; ?>" class="form-control">
                                       </div>

                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Exam Name:</label>
                                          <input type="text" name="ccode" placeholder="Enter Course Name" value="<?php echo $row['ename']; ?>" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Number of Questions:</label>
                                          <input type="number" name="nquestion" placeholder="Enter Number of Course" value="<?php echo $row['nquestion']; ?>" class="form-control">
                                       </div>
                                       <!-- Text input-->
                                       <div class="col-md-6 form-group">
                                          <label class="control-label">Time</label>
                                          <input type="time" class="form-control" name="time" value="<?php echo $row['time']; ?>">
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
                                             <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                             <button type="submit" class="btn btn-add btn-sm">Save Change</button>
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

                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- customer Modal1 -->
               <?php 
               $sel = "SELECT * FROM add_new_exam";
               $query = mysqli_query($db,$sel);
               $row = mysqli_fetch_array($query,MYSQLI_BOTH);
               ?>
              
               
            </section>
            <!-- /.content -->
             <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                           <h3><i class="fa fa-user m-r-5"></i> Delete Questions Data</h3>
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
         </div>

         <?php include('includes/footer.php'); ?>
        