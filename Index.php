<?php
    session_start();
?>
<html>
    <head>
        <script>
            var sections = $('section')
              , nav = $('nav')
              , nav_height = nav.outerHeight();

            $(window).on('scroll', function () {
              var cur_pos = $(this).scrollTop();

              sections.each(function() {
                var top = $(this).offset().top - nav_height,
                    bottom = top + $(this).outerHeight();

                if (cur_pos >= top && cur_pos <= bottom) {
                  nav.find('a').removeClass('active');
                  sections.removeClass('active');

                  $(this).addClass('active');
                  nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
                }
              });
            });
        </script>
    
        <title> Avocado Medical Centre </title>
        <link rel="stylesheet" href="format6.css">
        <style>
            #getStarted{
                z-index:1000px;
                color: #fff;
                cursor: pointer;
                display: block;
                left:160px;
                position: relative;
                border: 2px solid dodgerblue;
                transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
                height:120px;
                width:190px;
                font-size: 30px;
                border-radius: 6em;
                font-family: Stencil Std;
            }

            #getStarted:hover{
                border-radius: 6em;
                background-color: transparent;
                text-shadow: none;
                box-shadow: 0 0 8px 0 dodgerblue;
            }
            #getStarted:hover:before{
                bottom: 0%;
                top: auto;
                border-radius: 6em;
                height: 100%;
            }
            #getStarted:before{
                display: block;
                border-radius: 6em;
                position: absolute;
                left: 0px;
                top: 0px;
                height: 0px;
                width: 100%;
                z-index: -1;
                content: '';
                color: #000 !important;
                background: dodgerblue;
                transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
            }
        
        </style>
    
    </head>
    <body>
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
                <li><a class="" href="#services">Services</a></li>
                <li><a class="" href="#bmical">Calculate BMI</a></li>
                <li><a class="" href="#makeApp">Make Appointment </a></li>
                <li><a class="active" href="Index.php">Home</a></li>
                <li style="border-bottom: none"><img style="position:absolute; left:80; padding-bottom:3px" src="Images/logo3.png" height="65px" width="350px" > </li>
            </ul>
        </div>
        <div id="con" style="position:relative;top:220;height:500px; background: rgba(0, 0, 0, 0.3); width:100%; border-top: 0.001px solid #C0C0C0;border-bottom: 0.001px solid #C0C0C0;">
            <br><br><br>    
            <p style="z-index:1000">
                    <H4 style="font-size: 40px;color: white;padding-top: 10px;padding-bottom: -10px;margin-bottom: 0px;">
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Avocado Medical Centre's official website.
                    </H4>
                    <H2 style="font-family: serif;color: white;font-size: 25px;"> 
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Where your health is our priority. CLICK below to get started.
                    </H2>
                </p>
                <br>
                <form action="login.php">
                     <button id="getStarted">Get Started</button>
                </form>
        </div>
        <p id="bmical"></p>
        <div id="BMI">
            <div id="BMIC">
                <form id="BMIF" method="POST" action="CalBMI.php">
                    <table>
                        <tr style="border-top:1px solid silver;border-bottom:1px solid silver;background:rgba(0,0,0,0.3)">
                            <th style="font-size:50px;text-shadow:2px 2px black;color:White;" colspan="3">Calculate Your BMI</th>
                        </tr>
                        <tr>
                            <th rowspan="6"><img style="box-shadow:0 0 8px 0 whitesmoke;" height="433px" width="755px"src="Images/bmi.jpg"/></th>
                            <td>Height (in)</td>
                            <td>Weight (lbs)</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="height" placeholder="Height in Inches" value='<?php echo $_SESSION['height']; ?>'/></td>
                            <td><input type="text" name="weight" placeholder="Weight in lbs" value='<?php echo $_SESSION['weight']; ?>'/></td> 
                        </tr>
                        <tr>
                            <td>Result</td>
                            <td>Conclusion</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="result" disabled placeholder="..." value='<?php echo $_SESSION['result']; ?>'/></td>
                            <td><input style="padding-left:5;width:420px" type="text" name="result1" disabled placeholder="..." value='<?php echo $_SESSION['conclusion']; ?>'/></td>
                        </tr>
                         <tr>
                             <td></td>
                             <td><?php echo $_SESSION['Eheight'],$_SESSION['EWeight']; ?></td>
                        </tr>
                        <tr>
                            <td><input type="reset" value="Reset"></td>
                            <td><input type="Submit" name="Cbtn" value="Calculate My BMI"></td>
                        </tr>
                       
                    </table>
                </form>
             </div>
        </div>
        <p id="makeApp"></p>
        <div id="MAp">
            <center>
                <div id="MAC" style="background:rgba(255,255,255,0.3)">
                    <form style="height:330px;border:1px solid blue;box-shadow:0 0 8px 0 whitesmoke;" method="POST" action="MAp.php">
                        <table>
                            <tr style="background:rgba(0,0,0,0.5)">
                                <th style="font-family:monserrat; text-shadow:2px 2px blue;font-size:32px;color:white;" colspan="3">Book An Appointment Today !!</th>
                            </tr>
                            <tr style="background:rgba(0,0,0,0.3);font-size:26px;color:white">
                                <td style="padding-left:10;border-right:1px solid white;" rowspan="3">
                                    <p style="font-size:20px;color:white"><b>
                                        Are you registered with us and feeling ill? Felling any foriegn symtoms? Book and appointment today! come see our First class Doctors and Nurse! Dont live your life in uncertainty, Get checked today for a reasonable cost, Health Insurance (Card) accepted.
                                        </b></p>
                                </td>
                                <td>First Name</td>
                                <td><input type="text" name="fname" placeholder="John...."/></td>
                            </tr>
                            <tr style="background:rgba(0,0,0,0.3);font-size:26px;color:white">
                                <td>Last Name</td>
                                <td><input type="text" name="lname" placeholder="Brown..."/></td>
                            </tr>
                            <tr style="background:rgba(0,0,0,0.3);font-size:26px;color:white">
                                <td>Appointment Date</td>
                                <td><input type="date" name="date" placeholder="09/12/2019..."/></td>
                            </tr>
                            <tr><td></td></tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input style="box-shadow:0 0 8px 0 whitesmoke;width:250px" name="Cbtn" type="Submit" value="Book Appointment Now !!"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </center>
        </div>
        <p id="services"></p>
        <div class="services">
           <section style="border-top:1px solid silver;border-bottom:1px solid silver;background:rgba(0,0,0,0.3);width:100%;position:absolute;top:10px;">
                <center><h1>Services Offered</h1></center>
           </section>
           <section class="module">
                <!-- figure tags are used to mark up an image -->
                <figure class="small">
                    <a href="#makeApp"><img src="Images/den2.jpg" /></a>

                    <!-- figcaption is used to define a caption for a <figure> element -->
                    <figcaption class="transition opacity">
                        <a href="#makeApp">
                            <strong class="text transition title">Dentists</strong>
                            <span class="text transition desc">Here at Avocado Medical Center we provide state of the art dental services with internationally qualified dentist who guarantee first class dental services.</span>
                        </a>
                    </figcaption>
                </figure>
                
                <figure class="small">
                    <a href="#makeApp"><img height="360px" src="Images/bl.png" /></a>

                    <!-- figcaption is used to define a caption for a <figure> element -->
                    <figcaption class="transition opacity">
                        <a href="#makeApp">
                            <strong class="text transition title">Blood Test</strong>
                            <span class="text transition desc">Here at Avocado Medical Center we provide state of the art Blood analysis services with internationally qualified doctors, and the best analysis machinery, providing accurate results.</span>
                        </a>
                    </figcaption>
                </figure>
               
                <figure class="small">
                    <a href="#makeApp"><img height="360px"  src="Images/doc.png" /></a>

                    <!-- figcaption is used to define a caption for a <figure> element -->
                    <figcaption class="transition opacity">
                        <a href="#makeApp">
                            <strong class="text transition title">General Check Up</strong>
                            <span class="text transition desc">Here at Avocado Medical Center we provide the best General check-up with internationally qualified doctors and nurses who guarantee first class service</span>
                        </a>
                    </figcaption>
                </figure>
            </section>
        </div>
        <div id="footer1">
            <center>
                <p style="padding-top:2px;margin:0px">&copy; Copyright 2019. All Rights Reserved. | This website was designed by French Corp.</p>  
            </center>
        </div>
     
    </div>
    
    
    </body>
</html>