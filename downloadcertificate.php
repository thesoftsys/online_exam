<?php
        session_start();
        include('includes/connection.php');
        if(empty($_SESSION["resultlastid"]))
        {
        echo "<script>location.href='taketest.php'</script>";
        }

        $selLastExam = mysqli_query($db,"SELECT *FROM exam_result WHERE id = $_SESSION[resultlastid]");
        $result = mysqli_fetch_array($selLastExam,MYSQLI_BOTH);
        $userId = $result["user_id"];
        $courseName = $result["course_name"];
        $percentage = round($result["marks_percentage"]);
        $selStudent = mysqli_query($db,"SELECT *FROM exam_student WHERE user_id = '$userId'");
        $getStudent = mysqli_fetch_array($selStudent,MYSQLI_BOTH);
        $getStudentName = $getStudent["fullname"];

		require_once __DIR__ . '/vendor/autoload.php';
	
		$html = "<head>
				
				<style type='text/css'>
					.container{
				    position:relative;
				    text-align:center;
				}

				.centered {
				    position: absolute;
				    text-align:center;
				    width:400px;
				    top: 15%;
				    left: 22%;
				    /*transform: translate(-30%, -50%); */
				}
				  
				</style>
				</head>
			
				<img src='https://preview.ibb.co/jkwJgp/exquisite_european_certificate_template_01_vector_0.jpg' alt='certification' border='0'> 
				<div class='centered'>
				<h3 >Certificate of Completion</h3>
				<span><i>This is to certify that</i></span><br><br>
				<b style='font-weight:bold'>$getStudentName</b><br><br>
				<span><i>has completed the course</i></span><br><br>
				<span style='font-weight:bold'>$courseName</span><br>
				<span>With Score of $percentage%</span>
				

		

				</div>
				";


				

					$mpdf = new \Mpdf\Mpdf();
					$mpdf->WriteHTML($html);

					//out put in browser below output function
					$mpdf->Output();
					

 ?>