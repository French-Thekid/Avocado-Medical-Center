<?php
    session_start();
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
                
                <li><a class="" href="login.php?Chk=1">Log Out </a></li>
                <li><a class="active" href="#">Add Patients</a></li>
                <li><a class="" href="#">Our Doctors</a></li>
                <li><a class="" href="#">Department</a></li>
                <li><a class="" href="#">Features </a></li>
                <li><a class="" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="addP">
            <center>
                <form method="POSt" action="write.php">
                    <center>
                        
                         <table align = 'centre' cellpadding = '2'>
                            <tr>
                                <td style="padding-top:10px" colspan="3">
                                    <center> <h3>Overview</h3> </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <center><img src="Images/logo3.png" width="220px" height="130px"> </center>
                                </td>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <tr>
                                <td>
                                    <h4>Name:</h4>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['title']," ",$_SESSION['fname']," ",$_SESSION['lname']; ?></h4>
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <h4>Date of Birth:</h4>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['dob'];  ?></h4>
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <h4>TRN:</h4>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['trn'];  ?></h4>
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <h4>Address:</h4>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['street'],",&nbsp;&nbsp;&nbsp;",$_SESSION['district']; ?></h4>
                                </td> 
                            </tr>
                             <tr>
                                <td>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['city'],",&nbsp;&nbsp;&nbsp;",$_SESSION['country'],"."; ?></h4>
                                </td> 
                            </tr>
                            <tr>
                                <td>
                                    <h4>Email Address:</h4>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['email']; ?></h4>
                                </td> 
                            </tr>
                             <tr>
                                <td>
                                     <h4>Telephone Number:</h4>
                                </td> 
                                <td>
                                    <h4><?php echo $_SESSION['phone']; ?></h4>
                                </td> 
                            </tr>
                             
                            <tr>
                                <td>
                                    <input name="Ebtn" type="submit" value="Review/Edit">  
                                </td>
                                <td>
                                    <input name="Sbtn" type="submit" value="Submit">  
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