 <!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>CRM Admin panel</title>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
         <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <!-- <div class="back-link">
                <a href="index-2.html" class="btn btn-add">Back to Dashboard</a>
            </div> -->
            <div class="container-center lg">
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Students Register Form</h3>
                                <small><strong>Please enter your data to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="code.php?flag=3" id="loginForm" novalidate method="post">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Fullname</label>
                                    <input type="text" value="" class="form-control" name="fullname">
                                    <span class="help-block small">Your Fullname to app</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email Address</label>
                                    <input type="email" value="" id="email" class="form-control" name="email">
                                    <span class="help-block small">Your address email to contact</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" value="" id="pass" class="form-control" name="password">
                                    <span class="help-block small">Please enter your pasword</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirm Password</label>
                                    <input type="password" value="" id="cpass" onblur="chkpass()" class="form-control" name="confirm_password">
                                    <span class="help-block small">Please enter confirm pasword</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Mobile</label>
                                    <input type="number" value="" id="mobile" class="form-control" name="mobile">
                                    <span class="help-block small">Your address email to contact</span>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-warning" id="reg" >Register</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function chkpass()
            {
                var pass = document.getElementById("pass").value;
                var cpass = document.getElementById("cpass").value;
                var regbtn = document.getElementById("reg");
                if(pass == cpass)
                {
                  regbtn.disabled = false;
                }
                else
                {
                    alert("Password Not Match");
                    regbtn.disabled = true;
                }
               
            }
        </script>
    </body>

</html> 