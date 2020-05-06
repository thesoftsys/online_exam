      <?php 
      include('includes/header.php');
      include('includes/sidebar.php');
asdfas
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
                  <h1>Add Course</h1>
                  <small>Course list</small>
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
                              <a class="btn btn-add " href="view_course.php"> 
                              <i class="fa fa-list"></i>View Course List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="code.php?flag=8" method="post">
                              <div class="form-group">
                                 <label>Course Name</label>
                                 <input type="text" class="form-control" name="cname" placeholder="Enter Course Name" required>
                              </div>
                              <div class="">
                                 <button class="btn btn-success">Add Course</button>
                                 
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