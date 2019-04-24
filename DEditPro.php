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
                        
                    
                    ?>">Edit Profile</a></li>
                <li><a class="" href="index.php#services">Services</a></li>
                <li><a class="" href="Index.php#bmical">Calculate BMI</a></li>
                <li><a class="" href="Index.php#makeApp">Make Appointment </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div style="height:670px;" id="addP">
            <center>
                <form method="POSt" action="DUACCT.php">
                    <center>
                        
                         <table align = 'centre' cellpadding = '2'>
                            <tr>
                                <td style="padding-top:10px" colspan="7">
                                    <center> <h3>Edit Patient's Profile</h3> </center>
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
                                      $sql = "SELECT PatientsTRN,FirstName,LastName,Email,TellNo,Street,City,Country FROM Patient";
                                      $result = $conn->query($sql);
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
                                    <input style="padding-left:10;height:40px;width:150px;" type="text" name="key" placeholder="Patient TRN" value=""/>
                                </td> 
                                 <td>
                                    <input style="width:100px;" name="Sbtn" type="submit" value="Load Data">  
                                </td> 
                                <td>
                                    <?php echo $_SESSION['Errkey']; ?>
                                </td>
                            </tr>
                            <tr><td colspan="7"><hr></td></tr>
                            <tr>
                                <td >
                                    <h4>Email Address</h4>
                                </td> 
                                <td></td>
                                <td>
                                    <h4>Telephone Number</h4>
                                </td> 
                                <td></td>
                                <td style="border-left:1px solid white;">
                                    <center><h4>Change My Password</h4></center>
                                </td> 
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input style="width:380px;height:30px" name="email" type="text" placeholder="abc@xmail.com.." value='<?php echo $_SESSION['Pemail']; ?>'>
                                </td>
                                <td>
                                    <input style="width:200px;height:30px" name="phone" type="text" placeholder="(876) 123-4567.." value='<?php echo $_SESSION['Pphone']; ?>'>
                                </td>
                                <td></td>
                                <td style="border-left:1px solid white;">
                                    <center> <input style="width:200px;height:30px" name="pword" type="password" placeholder="ABCabc123.." value='<?php
                                        include("DB_Con.php");
                                                        $query="SELECT * from Staff Where StaffID='".$_SESSION["CurrentUID"]."' ";
                                                        $result = $conn->query($query);
                                                        $row = mysqli_fetch_array($result);
                                                        $_SESSION['CP']=$row["Password"];  
                                                        echo $_SESSION['CP'];
                                        ?>'></center>
                                </td>
                                <td> <?php echo $_SESSION['errPphone'],$_SESSION['errPemail'],$_SESSION['errPword']; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Street</h4>
                                </td>
                                <td></td>
                                <td>
                                    <h4>City</h4>
                                </td>
                                 <td>
                                    <h4>Country</h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input style="width:380px;height:30px" name="street" type="text" placeholder="5 Kings street..." value='<?php echo $_SESSION['Pstreet']; ?>'>
                                </td>
                                 <td>
                                    <input style="width:200px; height:30px" name="city" type="text" placeholder="Chester..." value='<?php echo $_SESSION['Pcity']; ?>'>
                                </td>
                                <td>
                                    <input style="width:200px; height:30px" name="country" type="password" placeholder="Jamaica..." 
                                           value='<?php echo $_SESSION['Pcountry']; ?>'>
                                </td>
                                <td> <?php echo $_SESSION['errPstreet'],$_SESSION['errPcity'],$_SESSION['errPcountry'] ?></td>
                            </tr>
                                <tr><td><br></td></tr>
                            <tr>
                            <tr>
                                <td></td>
                                <td> 
                                  <input type="reset" value="Clear"> 
                                </td>
                                <td>
                                    <input name="Bbtn" type="submit" value="Return">  
                                </td>
                                <td>
                                    <input name="Cbtn" type="submit" value="Update Patient's Profile">  
                                </td>
                                 <td style="border-left:1px solid white;">
                                   <center><input name="CPbtn" type="submit" value="Change My Password"> </center>  
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