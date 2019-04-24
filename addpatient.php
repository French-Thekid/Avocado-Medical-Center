<?php
session_start();

?>
<html>
    <head>
        <title> Avocado Medical Centre </title>
        <link rel="stylesheet" href="format6.css">
    
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
                
                <li><a class="" href="<?php 
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
                <li><a class="active" href="<?php 
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
                        
                    
                    ?>">Register Patients</a></li>
                <li><a class="" href="index.php#services">Services</a></li>
                <li><a class="" href="Index.php#bmical">Calculate BMI</a></li>
                <li><a class="" href="Index.php#makeApp">Make Appointment </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="addP">
            <center>
                <form method="POSt" action="addpatient_validate.php">
                    <center>
                        
                         <table align = 'centre' cellpadding = '2'>
                            <tr>
                                <td style="padding-top:10px" colspan="3">
                                    <center> <h3>Add Patient</h3> </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <center><img src="Images/AddU.png" width="120px" height="130px"> </center>
                                </td>
                            </tr>
                            <tr><td><br></td></tr>
                            <tr>
                                <td>
                                    <h4>Title</h4>
                                </td> 
                                <td>
                                    <h4>First Name</h4>
                                </td> 
                                <td>
                                    <h4>Last Name</h4>
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <select style="font-family:serif; font-size:14px" name="title">
                                       <option value = ''>Select</option>
                                       <option value = 'Ms.' <?php if($_SESSION['title']=='Ms.'){echo "selected";}?>>Ms.</option>
                                       <option value = 'Mrs.'<?php if($_SESSION['title']=='Mrs.'){echo "selected";}?>>Mrs.</option>
                                       <option value = 'Miss'<?php if($_SESSION['title']=='Miss'){echo "selected";}?>>Miss</option>
                                       <option value = 'Mr.'<?php if($_SESSION['title']=='Mr.'){echo "selected";}?>>Mr.</option>
                                       <option value = 'Sir.'<?php if($_SESSION['title']=='Sir.'){echo "selected";}?>>Sir.</option>
                                       <option value = 'Dr.'<?php if($_SESSION['title']=='Dr.'){echo "selected";}?>>Dr.</option>
                                       <option value = 'Lady'<?php if($_SESSION['title']=='Lady'){echo "selected";}?>>Lady</option>
                                       <option value = 'Lord'<?php if($_SESSION['title']=='Lord'){echo "selected";}?>>Lord</option>
                                       <option value = 'Prof.'<?php if($_SESSION['title']=='Prof.'){echo "selected";}?>>Prof.</option>
                                    </select>
                                </td> 
                                <td>
                                    <input style="width:200px;height:30px" name="fname" type="text" placeholder="John.." value='<?php echo $_SESSION['fname']; ?>'>
                                </td>
                                <td>
                                    <input style="width:200px;height:30px" name="lname" type="text" placeholder="Brown.." value='<?php echo $_SESSION['lname']; ?>'>
                                </td>
                                <td> <?php echo $_SESSION['errName'],$_SESSION['errTitle']; ?></td>
                            </tr>
                            <tr><td colspan="3"><br><br><hr><br></td></tr>
                            <tr>
                                <td>
                                    <h4>Date of Birth</h4>
                                </td>
                                <td>
                                    <h4>TRN</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="width:200px; height:30px" name="dob" type="date" placeholder="01/01/1996.." value='<?php echo $_SESSION['dob']; ?>'>
                                </td>
                                <td>
                                    <input style="width:200px; height:30px" name="trn" type="text" placeholder="213431219.." value='<?php echo $_SESSION['trn']; ?>'>
                                </td>
                                <td> <?php echo $_SESSION['errDOB'], $_SESSION['errTRN']; ?></td>
                            </tr>
                                <tr><td><br></td></tr>
                            <tr>
                            <tr>
                                    <td colspan="2"> 
                                      <input type="reset" value="Clear"> 
                                    </td>
                                <td>
                                    <input name="Cbtn" type="submit" value="Continue">  
                                </td>
                                    
                            </tr>
                        </table>
                    </center>
               </form>
            </center>            
        </div>
        <div id="footer">
            <center>
               <p style="padding-top:2px;margin:0px">&copy; Copyright 2019. All Rights Reserved. | This website was designed by French Corp.</p>  
            </center>
        </div>
     
    </div>
    
    
    </body>
</html>