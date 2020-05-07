      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      $sel  = "SELECT * FROM add_course";
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
                  <h1>Student Enroll for New Exam</h1>
                  <small>Some Details Submit New Enrollment Our Exam</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group"> 
                              <a class="btn btn-add " href="#"> 
                              <i></i>Please Fill This Field</a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="code.php?flag=20" method="post">
                              <div class="form-group">
                                 <label>Email ID-</label>
                                 <input type="text" class="form-control" name="email" placeholder="Enter Your Email ID-" required>
                              </div>
                              <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                              </div>
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
                                 <button class="btn btn-success">Submit</button>
                                 
                              </div>
                           </form>
                        </div>
                     </div>
               </div>
            </section>
            <!-- /.content -->
         </div>

         <!-- /.content-wrapper -->
         <?php include('includes/footer.php'); ?>