      <?php 
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
         $sel = "SELECT * FROM exam_admin";
         $query = mysqli_query($db,$sel);
         $row = mysqli_fetch_array($query,MYSQLI_BOTH);
         
      ?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon"><i class="fa fa-user-circle-o"></i></div>
               <div class="header-title">
                  <h1>Profile</h1>
                  <small>Show user data in clear profile design</small>
               </div>
            </section>
            <!-- Main content -->
             <div class="login-wrapper">
            <div class="container-center">
            <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Admin Profile</h3>
                                <small><strong>Please Chnage Your User Id and Password.</strong></small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                        <form action="code.php?flag=13&did=<?php echo $row ['id']; ?>" novalidate method="POST">
                            <div class="form-group">
                                <label class="control-label" >Username</label>
                                <input type="email" placeholder="example@gmail.com"  required=""  name="email"  value="<?php echo $row['email']; ?>" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" name="password" value="<?php echo $row['password']; ?>" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div>
                                <button class="btn btn-add">Change</button>
                            </div>
                        </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php include('includes/footer.php'); ?>