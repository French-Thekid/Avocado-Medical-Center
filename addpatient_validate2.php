<?php
    
    session_start();

    if(isset($_POST['Bbtn']))
    {
        header("Location: RegisterPatient.php");
    }
    else if(isset($_POST['Sbtn']))
    {
        
        $street=$_POST['street'];
        $district=$_POST['district'];
        $city=$_POST['city'];
        $country=$_POST['country'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
             
        $errChk=0;
        if(($street=="")||($district=="")||($city=="")||($country==""))
        {
            $errChk++;
            $errAddress="<p style='color:red'>Check all Address fields</p>";
        }
        else
        {
            $errAddress="";
        }
        if($email=="")
        {
            $errChk++;
            $errEmail="<p style='color:red'>Invaid Email</p>";
        }
        else
        {
            $errEmail="";
        }
        if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',$phone))
        {
            $errChk++;
            $errPhone="<p style='color:red'>Invaid Telephone</p>";
        }
        else
        {
            $errPhone="";
        }
        
        $_SESSION['street']=$street;
        $_SESSION['district']=$district;
        $_SESSION['city']=$city;
        $_SESSION['country']=$country;
        $_SESSION['email']=$email;
        $_SESSION['phone']=$phone;
        
        $_SESSION['errAddress']=$errAddress;
        $_SESSION['errEmail']=$errEmail;
        $_SESSION['errPhone']=$errPhone;
        
        
        if($errChk==0)
        {
            include('DB_Con.php');
            
            $query = " INSERT INTO Patient (PatientsTRN, Title, FirstName, LastName, DOB,TellNo,Email,Street,City,Country) VALUES ('".$_SESSION['trn']."', '".$_SESSION['title']."', '".$_SESSION['fname']."', '".$_SESSION['lname']."', '".$_SESSION['dob']."', '".$_SESSION['phone']."','".$_SESSION['email']."','".$_SESSION['street']."','".$_SESSION['city']."','".$_SESSION['country']."') ";
            
            if ($conn->query($query) === TRUE) {
                    echo "<script>alert('User Successfully added to System');</script>";
                      $_SESSION['type']="";
                      $_SESSION['fname']="";
                      $_SESSION['lname']="";
                      $_SESSION['email']="";
                      $_SESSION['Ap1']="";
                      $_SESSION['title']="";
                      $_SESSION['p2']="";
                      $_SESSION['StID']="";
                      $_SESSION['dob']="";
                      $_SESSION['trn']="";
                      $_SESSION['street']="";
                      $_SESSION['district']="";
                      $_SESSION['city']="";
                      $_SESSION['country']="";
                      $_SESSION['phone']="";
                      $_SESSION['errType']="";
                      $_SESSION['errName']="";
                      $_SESSION['errEmail']="";
                      $_SESSION['errPword']="";
                      $_SESSION['errID']="";
                      $_SESSION['errTitle']="";
                      $_SESSION['errDOB']="";
                      $_SESSION['errTRN']="";
                      $_SESSION['errAddress']="";
                      $_SESSION['phone']="";
                    header( "refresh:0; url=RegisterPatient.php");          
             } 
             else {
                echo "Error: " . $query . "<br>" . $conn->error;
             }
        }
        else
        {
            header("Location: addpatient2.php");
        }
        
    }

?>