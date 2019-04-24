<?php
    
    session_start();
    include('DB_Con.php');
    
    if(isset($_POST['Bbtn']))
    {
        $_SESSION['Pemail']="";
        $_SESSION['Ppassword']="";
        $_SESSION['Pphone']="";
        $_SESSION['Pstreet']="";
        $_SESSION['Pcity']="";
        $_SESSION['key']="";
        $_SESSION['Pcountry']="";
        $_SESSION['errPemail']="";
        $_SESSION['errPphone']="";
        $_SESSION['errPstreet']="";
        $_SESSION['errPcity']="";
        $_SESSION['errPcountry']="";
        $_SESSION['Errkey']="";
        header("Location: NursePortal.php");
    }
    else if(isset($_POST['Sbtn']))
    {
        $key=$_POST['key'];
        if(($key=="")||(!is_numeric($key)))
        {
            $errKey="<p style='color:red'>Invalid StaffID</p>";
            $_SESSION['Errkey']=$errKey;
            header('Location: EditPro.php');
        }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['key']=$key;
            $query="SELECT * from Patient WHERE PatientsTRN='".$key."' ";
            $result = $conn->query($query);
            $row = mysqli_fetch_array($result);
            $_SESSION['Pemail']=$row["Email"];
            $_SESSION['Ppassword']="";
            $_SESSION['Pphone']=$row["TellNo"];
            $_SESSION['Pstreet']=$row["Street"];
            $_SESSION['Pcity']=$row["City"];
            $_SESSION['Pcountry']=$row["Country"];
            
            if( $_SESSION['Pemail']=="")
            {
                $errKey="<p style='color:red'>User not found</p>";
                $_SESSION['Errkey']=$errKey;
                 header('Location: EditPro.php');
            }
            else{
                header('Location: EditPro.php');
            }
            
            
            $conn->close();
         }
       
    }
    else if(isset($_POST['CPbtn']))
    {
        
         $pword=  $_POST['pword'];
         $errChk=0;
         if(($pword=="")||(strlen($pword)<5))
            {
                $errChk++;
                $errPword="<p style='color:red'>Invalid Password. Ensure it is greater than 5 characters long </p>";
            }
            else
            {
                $errPword=="";
            }
            $_SESSION['pword']=$pword;
            $_SESSION['errPword']=$errPword;
            if($errChk==0)
            {
                 $query = "Update Staff Set Password= '".$pword."'  WHERE StaffID='".$_SESSION['CurrentUID']."' ";

                if ($conn->query($query) === TRUE) {
                      echo "<script>alert('Password Successfully Updated');</script>";
                      $_SESSION['pword']="";
                      $_SESSION['errPword']="";
                      header("refresh:0; url=EditPro.php");
                 } 
                 else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                 }       
            }
            else
            {
                header("Location: EditPro.php");
            }
    }
    else if(isset($_POST['Cbtn']))
    {
        if( $_SESSION['Pemail']=="")
            {
                echo "<script>alert('Please select a user First');</script>";
                $_SESSION['Errkey']=$errKey;
                header("refresh:0; url=EditPro.php");
            }
            else{
                $street=  $_POST['street'];
                $phone=   $_POST['phone'];
                $pword=   $_POST['password'];
                $email=   $_POST['email'];
                $city=    $_POST['city'];
                $country= $_POST['country'];
                $errChk=0;
                if($street=="")
                {
                    $errChk++;
                    $errPStreet="<p style='color:red'>Invalid Street. </p>";
                }
                else
                {
                    $errPStreet="";
                }
                if($phone=="")
                {
                    $errChk++;
                    $errPphone="<p style='color:red'>Invalid Phone. </p>";
                }
                else
                {
                    $errPphone="";
                }
                if($city=="")
                {
                     $errChk++;
                     $errPcity="<p style='color:red'>Invalid City. </p>";
                }
                else{
                    $errPcity="";
                }
                if($country=="")
                {
                     $errChk++;
                     $errPcountry="<p style='color:red'>Invalid Country. </p>";
                }
                else{
                    $errPcountry="";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errChk++;
                    $errPemail="<p style='color:red'>Invaid Email</p>";
                }
                else
                {
                    $errPemail="";
                }

                $_SESSION['Pemail']=$email;
                $_SESSION['Ppassword']=$pword;
                $_SESSION['Pphone']=$phone;
                $_SESSION['Pstreet']=$street;
                $_SESSION['Pcity']=$city;
                $_SESSION['Pcountry']=$country;
                $_SESSION['errPemail']=$errPemail;
                $_SESSION['errPphone']=$errPphone;
                $_SESSION['errPstreet']=$errPStreet;
                $_SESSION['errPcity']=$errPcity;
                $_SESSION['errPcountry']=$errPcountry;


                if($errChk==0)
                {
                     $query = "Update Patient Set Email= '".$email."',TellNo= '".$phone."',Street='".$street."', City= '".$city."', Country= '".$country."'  WHERE PatientsTRN='".$_SESSION['key']."' ";

                    if ($conn->query($query) === TRUE) {
                          echo "<script>alert('Patient Profile Successfully Updated');</script>";
                          $_SESSION['Pemail']="";
                          $_SESSION['Ppassword']="";
                          $_SESSION['Pphone']="";
                          $_SESSION['Pstreet']="";
                          $_SESSION['Pcity']="";
                          $_SESSION['Pemail']="";
                          $_SESSION['key']="";
                          $_SESSION['Pcountry']="";
                          $_SESSION['errPemail']="";
                          $_SESSION['Errkey']="";
                          $_SESSION['errPphone']="";
                          $_SESSION['errPstreet']="";
                          $_SESSION['errPcity']="";
                          $_SESSION['errPcountry']="";
                          header("refresh:0; url=EditPro.php");
                     } 
                     else {
                        echo "Error: " . $query . "<br>" . $conn->error;
                     }       
                }
                else
                {
                    header("Location: EditPro.php");
                }
            }
        }
?>