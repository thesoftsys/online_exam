<?php
	include('includes/connection.php');

	$flag = $_REQUEST['flag'];
	switch($flag) {
		
		case 1:
			//Login for exam_admin
			extract($_POST);

            
            $sel = "SELECT * FROM exam_admin WHERE email = '$email' AND password = '$password'";
            $res = mysqli_query($db,$sel);
            $row = mysqli_fetch_array($res,MYSQLI_BOTH);

            if(mysqli_num_rows($res)>0)
            {
                 
               
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $row['password'];
                $_SESSION['role'] = $row['role'];
                





                echo "<script>alert('Login Successfully');location.href='dashboard.php'</script>";
            }
            else{
                echo "<script>alert('Somthing went wrong');location.href='index.php'</script>";
            }
		

		break;

		case 2:
		//Exam Admin Logout Code Here and session expire;

			session_start();		
			session_unset();
			session_destroy();
			header('location:index.php');


		break;

		case 3:
				extract($_POST);
				// $randno = rand(1000,9999);
				$seleStudent = "SELECT *FROM exam_student";
				$studentQuery = mysqli_query($db,$seleStudent);
				$countStudent = mysqli_num_rows($studentQuery);

				

				$user_id = "DCST".($countStudent+1);

				
				$otp = rand(1000,9999);
				$ins = "INSERT INTO exam_student(fullname,email,password,mobile,user_id,otp) VALUES('$fullname','$email','$password','$mobile','$user_id','$otp')";
				$query = mysqli_query($db,$ins);
				if($query)
				{

					session_start();
					$_SESSION['lastid'] =  mysqli_insert_id($db);
					
					
					echo "<script>alert('Registration Successfully');location.href='otp.php'</script>";
				}

				case 4:


				session_start();
				$lastid = $_SESSION['lastid'];
				$otp =$_POST['otp'];

				$verify = "SELECT * FROM exam_student WHERE id = '$lastid' AND otp = '$otp'";
				$verifyQuery = mysqli_query($db,$verify);
				if(mysqli_num_rows($verifyQuery) > 0)
				{
					$rows = mysqli_fetch_array($verifyQuery,MYSQLI_BOTH);
					$userid = $rows['user_id'];
					$password = $rows['password'];

					$insertLoginDetail = "INSERT INTO student_login(user_id,password) VALUES('$userid','$password')";
					mysqli_query($db,$insertLoginDetail);
					unset($_SESSION['lastid']);

					echo "<script>alert('Otp Verify Successfully. Please Login in your Account');location.href='studentlogin.php'</script>";

				}


				


				break;
		break;

			case 5:

			//Student Login Code Here

			extract($_POST);

            
            $sel = "SELECT * FROM student_login WHERE user_id = '$user_id' AND password = '$password'";
            $res = mysqli_query($db,$sel);
            $row = mysqli_fetch_array($res,MYSQLI_BOTH);

            if(mysqli_num_rows($res)>0)
            {
                 
               
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['password'] = $row['password'];
                $_SESSION['role'] = $row['role'];


                echo "<script>alert('Login Successfully');location.href='dashboard.php'</script>";
            }
            else{
                echo "<script>alert('Somthing went wrong');location.href='studentlogin.php'</script>";
            }
		
				 
			break;

			case 6:

			session_start();		
			session_unset();
			session_destroy();
			header('location:studentlogin.php');


		break;

		case 7:
				//this is use for only students verification resend otp
				echo "ok";
		break;

		case 8:
				//Admin(Teacher) Add Course
				extract($_POST);
				
				if(mysqli_num_rows(mysqli_query($db,"SELECT *FROM add_course WHERE cname = '$cname'")) > 0)
				{
					echo "<script>alert('Course Alredy Exist'); location.href='add_course.php'</script>";
				}
				else
				{

				$ins = "INSERT INTO add_course (cname) VALUES('$cname')";
				$query = mysqli_query($db,$ins);
				if($query)
				{
					echo "<script>alert('Course Added Successfully');location.href='view_course.php'</script>";
				}
			}
		break;

		case 9:
				//Update  Courses Admin
				extract($_POST);
				$id = $_REQUEST['id'];
				$sel = "SELECT * FROM add_course WHERE id = '$id'";
				$query = mysqli_query($db,$sel);
				$row = mysqli_fetch_array($query,MYSQLI_BOTH);

				$update = "UPDATE add_course SET cname = '$cname' WHERE id = '$id' ";
				$query= mysqli_query($db,$update);

				if($query)
				{

				echo "<script>alert('Our Course Successfully Updated');location.href='view_course.php'</script>";
				}
				
		break;

		case 10:
				//Delete Admin Upload Courses;
				
			$delid = $_REQUEST['delid'];
    		$sel = "SELECT * FROM add_course WHERE id= '$delid'";
    		$selquery = mysqli_query($db,$sel);
    		$row = mysqli_fetch_array($selquery,MYSQLI_BOTH);

    		$del = "DELETE FROM add_course WHERE id='$delid'";
    		$query =mysqli_query($db,$del);
    		if($query)
    		{
    			
    			header("Location:view_course.php");
    		}
		break;

		case 11:
				//Admin Manage Exam (Add New Exam) Insert Data in add_new_exam table;
				extract($_POST);
				$getExamId = mysqli_query($db,"SELECT * FROM add_course WHERE id = '$cid'");
				$examId = mysqli_fetch_array($getExamId);
				$result = $examId['id'];
				
				

				if(isset($_POST['submit']))
				{	
					if(mysqli_num_rows(mysqli_query($db,"SELECT *FROM add_new_exam WHERE course_id = '$cid' AND ename = '$ename' ")) > 0)
					{
						echo "<script>alert('Exam Name And Course Name  Exist');location.href='add_new_exam.php'</script>";
					}
				else
				{
				
					$ins = "INSERT INTO add_new_exam (course_id,ename,nquestion,exam_time,pmax,equestionm) VALUES('$result','$ename','$nquestion','$time','$pmax','$equestionm')";
					$query = mysqli_query($db,$ins);
					if($query)
					{
						echo "<script>alert('New Exam Added Successfully');location.href='view_live_exam.php'</script>";
					}
				}


				}
				
				
		break;

		case 12:
			//Delete Admin Upload Courses;

			$delid = $_REQUEST['delid'];

    		$sel = "SELECT * FROM add_new_exam WHERE id= '$delid'";
    		$selquery = mysqli_query($db,$sel);
    		$row = mysqli_fetch_array($selquery,MYSQLI_BOTH);

    		$del = "DELETE FROM add_new_exam WHERE id='$delid'";
    		$query =mysqli_query($db,$del);
    		if($query)
    		{
    			
    			header("Location:view_live_exam.php");
    		}
		break;

		case 13:
				//Admin profile code here;
				extract($_POST);
				$did = $_REQUEST['did'];
				$sel = "SELECT * FROM exam_admin WHERE id='$did'";
				$selquery = mysqli_query($db,$sel);
				$row = mysqli_fetch_array($selquery,MYSQLI_BOTH);
				$update = "UPDATE exam_admin SET email = '$email', password= '$password' WHERE id = '$did' ";
				$query= mysqli_query($db,$update);

				if($query)
				{

				echo "<script>alert('Admin Update Successfully');location.href='index.php'</script>";
				}

		break;

		case 14:
				//Admin Add Questions  upload add_new_exam 
			
			extract($_POST);

			$selectExamId = mysqli_query($db,"SELECT *FROM add_new_exam WHERE cname = '$cname' AND ename = '$ename'");
			$result = mysqli_fetch_array($selectExamId,MYSQLI_BOTH);
			
			$ins = "INSERT INTO add_questions (cname,ename,question,option_one,option_two,option_three,option_four,right_option) VALUES('$cname','$ename','$question','$option_one','$option_two','$option_three','$option_four','$right_option')";
			$query = mysqli_query($db,$ins);
			if($query)
			{
			echo "<script>alert('New Questions Added Successfully');location.href='view_questions.php'</script>";
			}

			case 15:
					//Admin Update add_new_exam;
				extract($_POST);
				$uid = $_REQUEST['uid'];
				

				$update = "UPDATE add_questions SET  question= '$question', option_one = '$option_one', option_two = '$option_two', option_three = '$option_three', option_four = '$option_four', right_option = '$right_option' WHERE id = '$uid' ";
				$query= mysqli_query($db,$update);

				if($query)
				{

				echo "<script>alert('View Questions List Updated Successfully');location.href='view_questions.php'</script>";
				}
			break;

		case 16:
			$delid = $_REQUEST['delid'];
		
    		$del = "DELETE FROM add_questions WHERE id='$delid'";
    		$query =mysqli_query($db,$del);
    		if($query)
    		{
    			
    			header("Location:view_questions.php");
    		}
			
		break;

		case 17:
					//Exam Pause and live code;
		$status =  $_REQUEST['status'];
		$id= $_REQUEST['id'];

		$updateStatus = mysqli_query($db,"UPDATE add_new_exam SET status = $status WHERE id = '$id'");

			header('location:view_live_exam.php');
		break;

		case 18:
				//Admin update view live exam
				extract($_POST);
				$uid = $_REQUEST['uid'];
				if(isset($submit))
				{
					if(mysqli_num_rows(mysqli_query($db,"SELECT *FROM add_new_exam WHERE course_id = '$cid' AND ename = '$ename'"))>0)
					{
						echo "<script>alert('Course And Exam Name Exist');location.href='view_live_exam.php'</script>";
					}
					else
					{
						$update = "UPDATE add_new_exam SET ename= '$ename', nquestion = '$nquestion', exam_time = '$time', pmax = '$pmax', equestionm = '$equestionm' WHERE id = '$uid' ";
						$query= mysqli_query($db,$update);

						if($query)
						{

							echo "<script>alert('Live Exam Successfully Updated');location.href='view_live_exam.php'</script>";
						}
					}
				
				}

				
		break;

		case 19:	
		//Admin Delete view live exam
		
		$delid = $_REQUEST['delid'];
		$sel = "SELECT * FROM add_new_exam WHERE id= '$delid'";
		$selquery = mysqli_query($db,$sel);
		$row = mysqli_fetch_array($selquery,MYSQLI_BOTH);

		$del = "DELETE FROM add_new_exam WHERE id='$delid'";
		$query =mysqli_query($db,$del);
		if($query)
		{

		header("Location:view_live_exam.php");
		}

		break;


			/*Student Panal code start now*/

		case 20:
		//Admin Insert Enroll For New Exam Code
			extract($_POST);
			$ins = "INSERT INTO student_enroll (email,password,cname) VALUES('$email','$password','$cname')";
			$query = mysqli_query($db,$ins);
			if($query)
			{
			echo "<script>alert('Your Request Successfully Submited');location.href='enroll_new_exam.php'</script>";
			}
				
		break;
	}
	

?>