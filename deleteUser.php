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
                        
                    
                    ?>">Delete User</a></li>
                <li><a class="" href="index.php#services">Services</a></li>
                <li><a class="" href="Index.php#bmical">Calculate BMI</a></li>
                <li><a class="" href="Index.php#makeApp">Make Appointment </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="addP">
            <center>
                <form method="POSt" action="DeleteUserValidate.php">
                    <center>
                        
                         <table align = 'centre' cellpadding = '2'>
                            <tr>
                                <td style="padding-top:10px" colspan="5">
                                    <center> <h3>Edit User Account</h3> </center>
                                    <hr>
                                </td>
                            </tr>
                            <tr style="font-size:20px;text-shadow:1px 1px black;color:white;border-top:1px solid White;">
                                <th style="border-right:1px solid white">Staff IDs</th>
                                <th style="border-right:1px solid white">Names</th>
                                <th style="border-right:1px solid white">Emails</th>
                                <th style="border-right:1px solid white">Password</th>
                                <th>Account Type</th>
                            </tr>
                              <?php
                                      include('DB_Con.php'); 
                                      $sql = "SELECT StaffID, Name, Email, Password, Type FROM Staff";
                                      $result = $conn->query($sql);
                                      if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                            echo "<tr align='center' style='align:center;color:white;background:rgba(255,255,255,0.1);'><td>" . $row["StaffID"]. "</td><td>" . $row["Name"] . "</td><td>"
                                            . $row["Email"]. "</td><td>" . $row["Password"] . "</td><td>". $row["Type"] ."</td></tr>";
                                           }
                                       } 
                                       else { echo "0 results"; }
                                       $conn->close();
                             ?>
                            <tr><td colspan="5"><hr></td></tr>
                            <tr>
                                <td>
                                    <input type="text" name="key" placeholder="StaffID" value=""/>
                                </td> 
                                 <td>
                                    <input name="Sbtn" type="submit" value="Load Data">  
                                </td> 
                                <td>
                                    <?php echo $_SESSION['Errkey']; ?>
                                </td>
                            </tr>
                            <tr><td colspan="5"><hr></td></tr>
                            <tr>
                                <td>
                                    <h4>Name</h4>
                                </td> 
                                <td >
                                    <h4>Email Address</h4>
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <input style="width:200px;height:30px" name="name" type="text" placeholder="John.." value='<?php echo $_SESSION['name']; ?>'>
                                </td>
                                <td colspan="2">
                                    <input style="width:460px;height:30px" name="email" type="text" placeholder="abc@xmail.com.." value='<?php echo $_SESSION['email']; ?>'>
                                </td>
                                <td> <?php echo $_SESSION['errName'],$_SESSION['errEmail']; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Password</h4>
                                </td>
                                <td>
                                    <h4>Staff ID</h4>
                                </td>
                                 <td>
                                    <h4>Account Type</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="width:200px; height:30px" name="p1" type="password" placeholder="**********" value='<?php echo $_SESSION['password']; ?>'>
                                </td>
                                 <td>
                                    <input style="width:200px; height:30px" name="ID" type="text" placeholder="Med123..." value='<?php echo $_SESSION['SID']; ?>'>
                                </td>
                                <td>
                                    <select style="width:250px;font-family:serif; font-size:14px" name="type">
                                       <option value = ''>Select</option>
                                       <option value = 'Doctor' <?php if($_SESSION['type']=='Doctor'){echo "selected";}?>>Doctor (Staff)</option>
                                       <option value = 'Nurse'<?php if($_SESSION['type']=='Nurse'){echo "selected";}?>>Nurse (Staff)</option>
                                       <option value = 'Administrator'<?php if($_SESSION['type']=='Administrator'){echo "selected";}?>>Administrator</option>
                                    </select>
                                </td>
                                <td> <?php echo $_SESSION['errType'],$_SESSION['errPword'],$_SESSION['errID'] ?></td>
                            </tr>
                                <tr><td></td></tr>
                            <tr>
                            <tr>
                                <td> 
                                  <input type="reset" value="Clear"> 
                                </td>
                                <td>
                                    <input name="Bbtn" type="submit" value="Return">  
                                </td>
                                <td>
                                    <input name="Cbtn" type="submit" value="Delete User">  
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