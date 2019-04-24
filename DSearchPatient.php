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
                        
                    
                    ?>">Search Patient</a></li>
                <li><a class="" href="index.php#services">Services</a></li>
                <li><a class="" href="Index.php#bmical">Calculate BMI</a></li>
                <li><a class="" href="Index.php#makeApp">Make Appointment </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="addP">
            <center>
                <form method="POSt" action="Dsp.php">
                    <center>
                        
                         <table align = 'centre' cellpadding = '2'>
                            <tr>
                                <td style="padding-top:10px" colspan="7">
                                    <center> <h3>Search Patient's Records</h3> </center>
                                    <hr>
                                </td>
                            </tr>
                            <tr style="font-size:20px;text-shadow:1px 1px black;color:white;border-top:1px solid White;">
                                <th width="30px" style="border-right:1px solid white">TRNs</th>
                                <th style="border-right:1px solid white">Names</th>
                                <th style="border-right:1px solid white">Emails</th>
                                <th style="border-right:1px solid white">Phone</th>
                                <th>Address</th>
                            </tr>
                              <?php
                                      
                                      include('DB_Con.php'); 
                                       $test=$_GET['Fnd'];
                                       if($test==1)
                                        {
                                           $_SESSION['sql'] = "SELECT PatientsTRN,FirstName,LastName,Email,TellNo,Street,City,Country FROM Patient WHERE LastName='".$_SESSION['key']."' ";
                                           $result = $conn->query($_SESSION['sql']);
                                        }
                                        else if($test==2)
                                        {
                                           $_SESSION['sql'] = "SELECT PatientsTRN,FirstName,LastName,Email,TellNo,Street,City,Country FROM Patient WHERE FirstName='".$_SESSION['key']."' ";
                                           $result = $conn->query($_SESSION['sql']);
                                        }
                                        else{
                                          $_SESSION['sql'] = "SELECT PatientsTRN,FirstName,LastName,Email,TellNo,Street,City,Country FROM Patient";
                                          $result = $conn->query($_SESSION['sql']);
                                        }
                                         
                                      
                                      
                                      if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                            echo "<tr align='center' style='align:center;color:white;background:rgba(255,255,255,0.1);'><td>" . $row["PatientsTRN"]. "</td><td>" . $row["FirstName"]." ".$row["LastName"]. "</td><td>"
                                            . $row["Email"]. "</td><td>" . $row["TellNo"] . "</td><td>". $row["Street"] .", ".$row["City"].", ". $row["Country"]."</td></tr>";
                                           }
                                       } 
                                       else { echo "0 results"; }
                                       $conn->close();
                             ?>
                            <tr><td colspan="7"><hr><br></td></tr>
                            <tr>
                                <td>
                                    <input type="text" name="key" placeholder="Patient Surname" value="<?php echo $_SESSION['Lname']; ?>"/>
                                </td> 
                                 <td>
                                    <input name="SLbtn" type="submit" value="Search Records">  
                                </td> 
                             </tr>
                             <tr>
                                 <td>
                                    <input type="text" name="key1" placeholder="Patient First name" value="<?php echo $_SESSION['Fname']; ?>"/>
                                </td> 
                                 <td>
                                    <input name="SFbtn" type="submit" value="Search Records">  
                                </td> 
                                <td>
                                    <?php echo $_SESSION['Errkey']; ?>
                                </td>
                            </tr>
                            <tr><td colspan="7"><hr></td></tr>
                            
                            <tr>
                                <td> 
                                  <input type="reset" value="Clear"> 
                                </td>
                                <td>
                                    <input name="Bbtn" type="submit" value="Return">  
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