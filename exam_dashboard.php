         <?php 
     
         
         include('includes/header.php');
         include('includes/sidebar.php');
         include('includes/connection.php');
        
         
         ?>

         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-bar-chart-o"></i>
               </div>
               <div class="header-title">
                  <h1>Running Exam </h1>
               </div>
               <div>
               <h4 class="timing" id="countdowntimer" style="display: block;" ></h4>
               </div>
                
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div style="float: left;" >
                              <h3 id="current_que" ></h3>
                           </div>
                           
                            <div style="float: left;"  >
                            <h3>/</h3>
                           </div>
                            <div style="float: left"  >
                            <h3 id="total_que" > </h3>
                           </div>
                        </div>
                        <div class="panel-body" id="load_questions" >
<!--                         
                           <div class="table-responsive">
                              
                           </div> -->
                        </div>

                           <div class="text-center">
                           
                           <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();"> &nbsp;
                           <input type="button" id="examover" class="btn btn-success" value="Next" onclick="load_next();"> 
                           </div>
                           <br>
                       
                        


                     </div>
                     
                  </div>

                  
               </div>
               <!-- customer Modal1 -->
            
              
               
            </section>
            <!-- /.content -->
         </div>

         <script>
            var totalQue;


             setInterval(function(){
                timer();
             },1000);
             
           function timer()
            {
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                    if(xmlhttp.responseText == "00:00:01")
                    {
                        window.location="result.php";
                    }
                    
                    document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

                  }
               };
               xmlhttp.open("GET","forajax/load_timer.php",true);
               xmlhttp.send(null); 
            }

            
            function set_exam_type_session(exam_id)
            {
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                     window.location = "exam_dashboard.php"

                  }
               };
               xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_id="+exam_id,true);
               xmlhttp.send(null); 
            }

            function load_total_que()
            {
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                    document.getElementById("total_que").innerHTML = xmlhttp.responseText;
                    totalQue = xmlhttp.responseText;
                     
                  }
               };
               xmlhttp.open("GET","forajax/load_total_que.php",true);
               xmlhttp.send(null); 

            }

            

            var questionno = "1";

            load_questions(questionno);
            function load_questions(questionno)
            {
               document.getElementById("current_que").innerHTML=questionno;
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                    if(xmlhttp.responseText == "over")
                    {
                        window.location("result.php");
                    }
                    else
                    {
                        document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                        load_total_que();
                        if(totalQue == questionno)
                           {
                              document.getElementById("examover").value = "Submit";
                           
                           }
                           else
                           {
                              document.getElementById("examover").value = "Next";
                           }
                    }
                     
                  }
               };
               xmlhttp.open("GET","forajax/load_questions.php?questionsno="+questionno,true);
               xmlhttp.send(null); 
            }
            

            function radioclick(radiovalue,questionno)
            {
               
               var xmlhttp = new XMLHttpRequest();
               xmlhttp.onreadystatechange = function(){

                  if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                  {
                     
                    
                     
                  }
               };
               xmlhttp.open("GET","forajax/save_answer_in_session.php?questionno="+questionno+"&value1="+radiovalue,true);
               xmlhttp.send(null); 

            }
            

            function load_previous()
            {
               if(questionno == "1")
               {
                  load_questions(questionno);
               }
               else
               {
                  questionno = eval(questionno)-1;
                  load_questions(questionno);
               }
            }

            function load_next()
            {
               if(totalQue == questionno)
               {
                 
                  window.location.href="result.php";
               }
               else
               {
                  questionno = eval(questionno)+1;
                  load_questions(questionno);
               }
               // questionno = eval(questionno)+1;
               //    load_questions(questionno);
                  
               
            }
         </script>

         <?php
              if(empty($_SESSION["exam_start"]))
               {
                  echo "<script>location.href='taketest.php'</script>";
               }
         
         ?>



       <?php include('includes/footer.php'); ?>