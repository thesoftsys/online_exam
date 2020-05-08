   <?php 
     
      // include('includes/connection.php');
      // $sel = "SELECT *FROM exam_admin";
      // $query = mysqli_query($db,$sel);
      // $rows = mysqli_fetch_array($query,MYSQLI_BOTH);
      if($_SESSION['role'] == "" )
    {
        header("Location:index.php");
    }


   ?>
 <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
            <?php 
            if( $_SESSION['role'] == 1)
            {



            ?>
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Manage Courses</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="add_course.php">Add Course</a></li>
                        <li><a href="view_course.php">View Course</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-basket"></i><span>Manage Exams</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="add_new_exam.php">Add New Exam</a></li>
                        <li><a href="view_live_exam.php">View Live Exams </a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-cart"></i><span>Manage Questions</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="add_questions.php">Add Questions to Exam</a></li>
                        <li><a href="view_questions.php">View Questions </a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-book"></i><span>Students</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="rtask.html">All Students</a></li>
                        <li><a href="atask.html">Pass Students</a></li>
                        <li><a href="atask.html">Fail Students</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-bag"></i><span>Complains</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="cpayment.html">New</a></li>
                        <li><a href="emanage.html">Pending</a></li>
                        <li><a href="ecategory.html">Resolved</a></li>
                     </ul>
                  </li>
                 
               </ul>

               <!-- This is students phase sidebar-->

               <?php } ?>


                <?php 
            if( $_SESSION['role'] == 2)
            {



            ?>
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Student Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Result</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="my_result.php">My Result</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-basket"></i><span>Test</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="taketest.php">Take Test</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-cart"></i><span>Help</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="invoice.html">Rise Ticket</a></li>
                        <li><a href="ninvoices.html">My Past Complaints</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-bag"></i><span>Enroll for New Exam</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="enroll_new_exam.php">Enroll Exam</a></li><!-- 
                        <li><a href="emanage.html">Pending</a></li>
                        <li><a href="ecategory.html">Resolved</a></li> -->
                     </ul>
                  </li>
               </ul>
               <?php } ?>
            </div>
            <!-- /.sidebar -->
         </aside>