<?php
session_start();

?>
<html>
    <head>
        <title> Avocado Medical Centre </title>
        <link rel="stylesheet" href="format6.css">
    
    </head>
    <body style='background-image: url("Images/bg3.jpg");background-attachment: fixed;'>
    <div style="height:900;" id="container">
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
                        
                    
                    ?>">View Appointment</a></li>
                <li><a class="" href="index.php#services">Services</a></li>
                <li><a class="" href="Index.php#bmical">Calculate BMI</a></li>
                <li><a class="" href="Index.php#makeApp">Make Appointment </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="addP">
            <center>
                <form method="POSt" action="viewApp.php">
                    <center>
                        
                         <table align = 'centre' cellpadding = '2'>
                            <tr>
                                <td style="padding-top:10px" colspan="7">
                                    <center> <h3>View Appointments</h3> </center>
                                    <hr>
                                </td>
                            </tr>
                            <tr style="font-size:20px;text-shadow:1px 1px black;color:white;border-top:1px solid White;">
                                <th width="30px" style="border-right:1px solid white">Patient's TRNs</th>
                                <th style="border-right:1px solid white">Staff ID</th>
                                <th style="border-right:1px solid white">Date</th>
                                <th style="border-right:1px solid white">Reason for Visit</th>
                                <th>Status</th>
                            </tr>
                              <?php
                                      include('DB_Con.php'); 
                                    
                                      $sql = "SELECT PatientsTRN,StaffID,Date,Reason,Status FROM Appointment";
                                      $result = $conn->query($sql);
                                      if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                            $sql1 = "SELECT Name FROM Staff where StaffID='".$row["StaffID"]."' ";
                                            $result1 = $conn->query($sql1);
                                            $row1 = mysqli_fetch_array($result1);
                                            $Name=$row1['Name'];
                                            echo "<tr align='center' style='align:center;color:white;background:rgba(255,255,255,0.1);'><td>" . $row["PatientsTRN"]. "</td><td>" . $Name. "</td><td>".$row["Date"]."</td><td>"
                                            . $row["Reason"]. "</td><td>" . $row["Status"] ."</td></tr>";
                                           }
                                       } 
                                       else { echo "0 results"; }
                                       $conn->close();
                             ?>
                            <tr><td colspan="7"><hr><br></td></tr>
                            <tr>
                                <td>
                                    <input style="padding-left:10;width:150px;" type="text" name="key" placeholder="Patient TRN" value="<?php echo $_SESSION['key']; ?>"/>
                                </td> 
                                 <td>
                                    <input style="width:150px;"name="Sbtn" type="submit" value="Search and Select">  
                                </td> 
                                <td>
                                    <?php echo $_SESSION['Errkey']; ?>
                                </td>
                            </tr>
                            <tr><td colspan="7"><hr></td></tr>
                            <tr>
                                <td></td>
                                <th style="color:white;text-shadow:1px 1px black;">Selected Patient</th> 
                               
                            </tr>
                            <tr>
                                <td>
                                    <input style="padding-left:10;width:150px;" type="text" disabled name="SFname" placeholder="First Name..." value="<?php echo $_SESSION['AaFname']; ?>"/>
                                </td> 
                                <td>
                                    <input style="padding-left:10;width:150px;" type="text" disabled name="SLname" placeholder="Surname..." value="<?php echo $_SESSION['AaSname']; ?>"/>
                                </td> 
                                <td>
                                    <input style="padding-left:10;width:150px;" type="text" disabled name="SDOB" placeholder="D.O.B.." value="<?php echo $_SESSION['AaDOB']; ?>"/>
                                </td> 
                                <td width="500px;"></td>
                            </tr>
                            <tr><td colspan="7"><hr></td></tr>
                            <tr>
                                <td>
                                    <h4>Appointment Status</h4>
                                </td> 
                                <td>
                                    <?php echo $_SESSION['aerrStat']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select style="width:150px;font-family:serif; font-size:14px" name="astatus">
                                       <option value = ''>Select</option>
                                       <option value = 'Pending' <?php if($_SESSION['aStat']=='Pending'){echo "selected";}?>>Pending</option>
                                       <option value = 'Cancel'<?php if($_SESSION['aStat']=='Cancel'){echo "selected";}?>>Cancel</option>
                                       <option value = 'Complete'<?php if($_SESSION['aStat']=='Complete'){echo "selected";}?>>Complete</option>
                                    </select>
                                </td> 
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td> 
                                  <input style="width:150px;" type="reset" value="Clear"> 
                                </td>
                                <td>
                                    <input style="width:150px;" name="Bbtn" type="submit" value="Return">  
                                </td>
                                <td>
                                    <input style="width:150px;" name="Lbtn" type="submit" value="Update Status">  
                                </td>
                                    
                            </tr>
                        </table>
                    </center>
               </form>
            </center>            
        </div>
        <div style="top:900;" id="footer">
            <center>
               <p style="padding-top:2px;margin:0px">&copy; Copyright 2019. All Rights Reserved. | This website was designed by French Corp.</p>  
            </center>
        </div>
     
    </div>
    
    
    </body>
</html>