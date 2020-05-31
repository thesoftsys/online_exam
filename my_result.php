<?php 
      include('includes/header.php');
      include('includes/sidebar.php');
      include('includes/connection.php');
      if($_SESSION["role"] == 1)
      {
         echo "<script>location.href='dashboard.php'</script>";
      }
      $selYourResult = mysqli_query($db,"SELECT *FROM exam_result WHERE user_id = '$_SESSION[user_id]'");
      
      

      ?>
      <style>
         
/* mobile view table */

table { 
    width: 100%; 
    table-layout: fixed;
    border-collapse: collapse; 
    margin: 0 auto;
}
/* Zebra striping */
tr:nth-of-type(odd) { 
    background: #f2f2f2; 
}
th { 
    background: #D9EDF7; 
    color: #3C4767; 
    font-weight: 600; 
}
td, th { 
    padding: 12px; 
    border: 2px solid #ccc; 
    text-align: left; 
    text-align: center
}
/*Mobile View*/
@media 
only screen and 
    (max-width: 760px){
    td, tr { 
        display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	tr {
        border: 1px solid #3c4767; 
    }
    tr + tr{
        margin-top: 1.5em;
    }
	td { 
		/* make like a "row" */
		border: none;
		border-bottom: 2px solid #eee; 
		position: relative;
		padding-left: 50%; 
        
        text-align: left; 
	}
	td:before { 
        content: attr(data-label);
        display: inline-block;
        line-height: 1.5;
	    margin-left: -100%;
        width: 100%;
		white-space: nowrap;
	}
}
      </style>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Your Result</h1>
                  <small></small>
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
                                 <h4></h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                        <div id="wrapper">
                  <table>
                     <thead>
                        <tr class="info">
                           <th>Sr.</th>
                           <th>Course Name</th>
                           <th>Exam Name</th>
                           <th>Total Question</th>
                           <th>Correct Answer</th>
                           <th>Wrong Answer</th>
                           <th>Percentage</th>
                           <th>Pass/Fail</th>
                           <th>Exam Time</th>
                           <th>Action</th>
                         </tr>

                     </thead>
                     <tbody>
                     <?php 
                                 $sr = 1;
                                 while($result = mysqli_fetch_array($selYourResult))
                                 {
                                   
                               
                                 ?>
                        <tr>
                           <td data-label="Sr"><?php echo $sr; ?></td>
                           <td data-label="Course Name"><?php echo $result["course_name"]; ?></td>
                           <td data-label="Exam Name"><?php echo $result["exam_name"]; ?></td>
                           <td data-label="Total Question"><?php echo $result["total_question"]; ?></td>
                           <td data-label="Correct Answer"><?php echo $result["correct_answer"]; ?></td>
                           <td data-label="Wrong Answer"><?php echo $result["wrong_answer"]; ?></td>
                           <td data-label="Percentage"><?php echo round($result["marks_percentage"]) ?>%</td>
                           <?php 
                                          if(round($result["marks_percentage"])>= 65)
                                          {
                                            
                                            echo '<td data-label="Pass/Fail">Pass</td>';
                                          }
                                          else
                                          {
                                             
                                             echo '<td data-label="Pass/Fail">Fail</td>';
                                          }
                                       ?>
                          
                           <td data-label="Exam Time"><?php echo $result["exam_time"]; ?></td>
                           <td data-label="Action"><a href="downloadresult.php?downloa=<?php echo $result["id"]; ?>" class="btn btn-exp btn-sm dropdown-toggle" >Download</a></td>
                        </tr>
                                 <?php  $sr++; } ?>
             
            </tbody>
          </table>
        </div>   

                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <!-- <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sr.</th>
                                       <th>Course Name</th>
                                       <th>Exam Name</th>
                                       <th>Total Question</th>
                                       <th>Correct Answer</th>
                                       <th>Wrong Answer</th>
                                       <th>Percentage</th>
                                       <th>Pass/Fail</th>
                                       <th>Exam Time</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <?php 
                                 $sr = 1;
                                 while($result = mysqli_fetch_array($selYourResult))
                                 {
                                   
                               
                                 ?>
                                 <tbody>
                                    <tr>
                                       <td><?php echo $sr; ?></td>
                                       <td><?php echo $result["course_name"]; ?></td>
                                       <td><?php echo $result["exam_name"]; ?></td>
                                       <td><?php echo $result["total_question"]; ?></td>
                                       <td><?php echo $result["correct_answer"]; ?></td>
                                       <td><?php echo $result["wrong_answer"]; ?></td>
                                       <td><?php echo round($result["marks_percentage"]) ?>%</td>
                                       <?php 
                                          if(round($result["marks_percentage"])>= 65)
                                          {
                                            echo  "<td>Pass</td>";
                                          }
                                          else
                                          {
                                             echo  "<td>Fail</td>";
                                          }
                                       ?>
                                       

                                       <td><?php echo $result["exam_time"]; ?></td>
                                       
                                       
                                       <td>
                                       <a href="downloadresult.php?downloa=<?php echo $result["id"]; ?>" class="btn btn-exp btn-sm dropdown-toggle" >Download</a>
                                       
                                       </td>
                                    </tr>
                                 </tbody>
                                 <?php 
                                 $sr++;
                                
                                 } 
                              ?>
                              </table>
                           </div> -->
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