      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      
      $sel = "SELECT * FROM add_course";
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
                  <h1>Add New Exam</h1>
                  <small>View Exam list</small>
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
                              <a class="btn btn-add " href="view_live_exam.php"> 
                              <i class="fa fa-list">&nbsp;</i>View Live Exam List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="code.php?flag=11" method="post">

                              <div class="form-group">
                                 
                                 <label>Select Course Name</label>

                                 <select class="form-control" name="cname">
                                    <?php 
                                    while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                    ?>
                                    <option><?php echo $row['cname'];?></option>
                                    <?php } ?> 
                                 </select>
                                   
                              </div>

                              <div class="form-group">
                                 <label>Exam Name</label>
                                 <input type="text" class="form-control" name="ename" placeholder="Enter Exam Name" required>
                              </div>

                                                            <div class="form-group">
                                 <label>Number of Questions</label>
                                 <input type="text" class="form-control" name="nquestion" placeholder="Enter Number of Questions" required>
                              </div>
                             <div class="form-group">
                                 
                                 <label>Select Time</label>

                                 <select class="form-control" name="time">
                                    
                                    <option>30 Min</option>
                                    <option>60 Min</option>
                                    <option>90 Min</option>
                                    <option>120 Min</option>
                                     
                                 </select>
                                   
                              </div>
                              <div class="form-group">
                                 <label>Passing Max</label>
                                 <input type="number" class="form-control" name="pmax" placeholder="Enter Passing Max" required>
                              </div>
                              <div class="form-group">
                                 <label>Each Question Max</label>
                                 <input type="number" class="form-control" name="equestionm"  placeholder="Enter Each Question Max" required>
                              </div>
                              <div class="">
                                 <input type="submit"  name="submit" class="btn btn-success"/>
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
         <?php include('includes/footer.php'); ?>