<?php
    
    session_start();

    if(isset($_POST['Bbtn']))
    {
          $_SESSION['type']="";
          $_SESSION['fname']="";
          $_SESSION['lname']="";
          $_SESSION['email']="";
          $_SESSION['Ap1']="";
          $_SESSION['p2']="";
          $_SESSION['StID']="";
          $_SESSION['errType']="";
          $_SESSION['errName']="";
          $_SESSION['errEmail']="";
          $_SESSION['errPword']="";
          $_SESSION['errID']="";
        header("Location: adminPortal.php");
    }
    else if(isset($_POST['Cbtn']))
    {
        
        $type=  $_POST['type'];
        $fname= $_POST['fname'];
        $lname= $_POST['lname'];
        $pword1=$_POST['p1'];
        $pword2=$_POST['p2'];
        $email= $_POST['email'];
        $ID=    $_POST['ID'];
        $name=$fname;
        $name.=" ";
        $name.=$lname;
        $errChk=0;
         if($ID=="")
        {
            $errChk++;
            $errID="<p style='color:red'>Enter Staff ID. </p>";
        }
        else
        {
            $errID="";
        }
        if($type=="")
        {
            $errChk++;
            $errType="<p style='color:red'>Select a Type. </p>";
        }
        else
        {
            $errType="";
        }
        if(($fname=="")||($lname=="")||(!ctype_alpha($fname))||(!ctype_alpha($lname)))
        {
            $errChk++;
            $errName="<p style='color:red'>Invalid Name. </p>";
        }
        else
        {
            $errName="";
        }
//        if($pword1==$pword2)
//        {
//            $errPword="";
//        }
//        else{
//            $errChk++;
//            $errPword="<p style='color:red'>Please ensure both Password match. </p>";
//        }
//        
        if((($pword1=="")||($pword2==""))||((strlen($pword1)<5)||(strlen($pword2)<5)))
        {
             $errChk++;
             $errPword="<p style='color:red'>Invalid Password. Ensure it is greater than 5 characters long </p>";
        }
        else{
            if($pword1==$pword2)
            {
                $errPword="";
            }
            else{
                $errChk++;
                $errPword="<p style='color:red'>Please ensure both Password match. </p>";
            }
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errChk++;
            $errEmail="<p style='color:red'>Invaid Email</p>";
        }
        else
        {
            $errEmail="";
        }
        
        $_SESSION['type']=$type;
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['email']=$email;
        $_SESSION['Ap1']=$pword1;
        $_SESSION['p2']=$pword2;
        $_SESSION['StID']=$ID;
        $_SESSION['errType']=$errType;
        $_SESSION['errName']=$errName;
        $_SESSION['errEmail']=$errEmail;
        $_SESSION['errPword']=$errPword;
        $_SESSION['errID']=$errID;
        
        
        if($errChk==0)
        {
            include('DB_Con.php');
            
            $query = " INSERT INTO Staff (StaffID, Name, Email, Password, Type) VALUES ('".$ID."', '".$name."', '".$email."', '".$pword1."', '".$type."') ";
            if ($conn->query($query) === TRUE) {
                    echo "<script>alert('User Successfully added to System');</script>";
                    $_SESSION['type']="";
                    $_SESSION['fname']="";
                    $_SESSION['lname']="";
                    $_SESSION['email']="";
                    $_SESSION['Ap1']="";
                    $_SESSION['p2']="";
                    $_SESSION['StID']="";
                    $_SESSION['errType']="";
                    $_SESSION['errName']="";
                    $_SESSION['errEmail']="";
                    $_SESSION['errPword']="";
                    $_SESSION['errID']="";
                    header( "refresh:0; url=addUser.php");
             } 
             else {
                echo "Error: " . $query . "<br>" . $conn->error;
             }   
        }
        else
        {
            header("Location: addUser.php");
        }
    }
?>