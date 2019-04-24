<?php
    session_start();
    $test=$_GET['Chk'];
    if($test==1)
    {
       session_unset();
    }
    
?>
<html>
    <head>
        <title> Avocado Medical Centre </title>
        <link rel="stylesheet" href="format6.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style='background-image: url("Images/bg3.jpg");background-attachment: fixed;'>
    <div id="container">
        <div id="nav1">
            <ul  style="font-family: serif;font-size: 14px;font-style: normal;font-weight: normal; position:relative;top:15px">
                <li>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="#" style="text-decoration: none; color: white">FAQS</a>
                </li>
                <li><a href="#" style="text-decoration: none; color: white">About</a></li>
                <li><a href="#" style="text-decoration: none; color: white">Contacts</a></li>
                <li>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
                    <a href="https://twitter.com"><img style="position: relative; top:5px"src="Images/twitter.png" height="20px" width="20px" ></a>
                </li>
                <li><a href="https://facebook.com"><img src="Images/facebook.png" height="30px" width="30px" ></a></li>
                <li><a href="https://jm.linkedin.com"><img src="Images/linkedIn.png" height="30px" width="30px" ></a></li>
                <li><a href="https://plus.google.com"><img src="Images/google.png" height="30px" width="30px" ></a></li>
                <li><a href="https://skype.com"><img src="Images/skype.png" height="30px" width="30px" ></a></li>
            </ul>
        </div>
       <div id="nav">
             <ul>
                
                <li><a class="active" href="<?php 
                            if($_SESSION["CurrentUID"]==""){
                                    echo "login.php";
                                }
                            else{
                                echo "login.php?Chk=1";
                            }
                    ?>"><?php
                        if($_SESSION["CurrentUID"]==""){
                                    echo "Log In";
                                }
                            else{
                                echo "Log Out";
                            }                    
                    ?></a></li>
                <li><a class="" href="<?php 
                            if($_SESSION["CurrentUID"]==""){
                                echo "login.php";
                            }
                            else{
                                include("DB_Con.php");
                                $query="SELECT * from Staff Where StaffID='".$_SESSION["CurrentUID"]."' ";
                                $result = $conn->query($query);
                                $row = mysqli_fetch_array($result);
                                $_SESSION['LType']=$row["Type"];  
                                if( $_SESSION['LType']=="")
                                {
                                    echo "login.php";
                                }
                                else{
                                    switch($_SESSION['LType'])
                                      {
                                        case "Administrator":
                                            echo "AdminPortal.php";
                                            break;
                                        case "Nurse":
                                            echo "NursePortal.php";
                                            break;
                                        case "Doctor":
                                             echo "DoctorsPortal.php";
                                            break;        
                                        default:
                                        echo "Error";
                                      }
                                }
                                $conn->close();
                            }
                        
                    
                    ?>">My Portal</a></li>
                <li><a class="" href="index.php#services">Services</a></li>
                <li><a class="" href="Index.php#bmical">Calculate BMI</a></li>
                <li><a class="" href="Index.php#makeApp">Make Appointment </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="log">
            <center>
                <form method="POSt" action="loginVal.php">
                    <center>
                        <img src="Images/user.png" width="200px" height="180px">
                         <table align = 'centre' cellpadding = '10'>
                            <tr>
                                <td colspan="2">
                                    <center> <h3>User login</h3> </center><?php echo $_SESSION['logLMess']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1>&nbsp;Username </h1> 
                                </td>
                                <td>
                                    <input name="Username" type="text" placeholder="John Brown...." value='<?php echo $_SESSION['uname']; ?>'>
                                    <i class = "fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1>&nbsp;Password </h1>
                                </td>
                                <td>
                                     <input name="Password" type="password" placeholder="ABC123!@#...." >
                                     <i class = "fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"> 
                                  <input type="reset" value="Clear"> 
                                  <input name="Lbtn" type="submit" value="Log In">  
                                </td>
                            </tr>
                        </table>
                    </center>
               </form>
            </center>
            
            
        </div>
        <div style="margin:0px;position: absolute; top:490px;left:930px;"> <?php echo $_SESSION['logUEMess']; ?></div>
        <div style="margin:0px;position: absolute; top:450px;left:710px;"> <?php echo $_SESSION['logU_PEMess']; ?></div>
        <div style="margin:0px;position: absolute; top:570px;left:930px;"> <?php echo $_SESSION['logPEMess']; ?></div>
        <div id="footer">
            <center>
                <p style="padding-top:2px;margin:0px">&copy; Copyright 2019. All Rights Reserved. | This website was designed by French Corp.</p>  
            </center>
        </div>
     
    </div>
    
    
    </body>
</html>