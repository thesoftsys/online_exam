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
                  <h1>Add Questions</h1>
                  <small>View Questions list</small>
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
                              <a class="btn btn-add " href="view_questions.php"> 
                              <i class="fa fa-list"></i>View Questions List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="code.php?flag=14"  method="POST">
                              <div class="form-group">
                                 
                                 <label>Select Course</label>

                                 <select class="form-control" name="cname">
                                    <?php 
                                    while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                    ?>
                                    <option><?php echo $row['cname'];?></option>
                                    <?php } ?> 
                                 </select>
                                   
                              </div>

                           <?php
                           $sel = "SELECT * FROM add_new_exam";
                           $query = mysqli_query($db,$sel);
                           ?>
                             
                               <div class="form-group">
                                 <label>Select Exam</label>
                                 <select class="form-control" name="ename">
                                    <?php 
                                    while($row = mysqli_fetch_array($query,MYSQLI_BOTH))
                                    {
                                    ?>
                                    <option><?php echo $row['ename'];?></option>
                                    <?php } ?> 
                                 </select>
                              </div>
                              <br>
                                <div class="form-group" style="text-align: center;">
                                 <label>{-Proceed to Add Question-}</label>
                               </div>

                              <div class="form-group">
                                 <label>Enter Question</label>
                                 <input type="text" class="form-control" name="question" placeholder="Enter Question" required>
                              </div>
                              <div class="form-group">
                                 <label>Option One</label>
                                 <input type="text" class="form-control" name="option_one" placeholder="Enter Option One" required>
                              </div>
                              <div class="form-group">
                                 <label>Option Two</label>
                                 <input type="text" class="form-control" name="option_two" placeholder="Enter Option Two" required>
                              </div>
                              <div class="form-group">
                                 <label>Option Thre</label>
                                 <input type="text" class="form-control" name="option_three"  placeholder="Enter Option Three" required>
                              </div>

                              <div class="form-group">
                                 <label>Option Four</label>
                                 <input type="text" class="form-control" name="option_four"  placeholder="Enter Option Four" required>
                              </div>

                              <div class="form-group">
                                 <label>Rigth Option</label>
                                 <input type="text" class="form-control" name="right_option" placeholder="Enter Right Option" required>
                              </div>
                              <div class="reset-button">
                                 <button class="btn btn-success">Save</button>
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