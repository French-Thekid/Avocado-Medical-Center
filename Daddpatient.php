<?php
    session_start();

    if(isset($_POST['Bbtn']))
    {
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
          header("Location: DoctorsPortal.php");
    }
    else if(isset($_POST['Cbtn']))
    {
        $_SESSION['uname']="";
        $_SESSION['pword']="";
        
        $title=$_POST['title'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $dob=$_POST['dob'];
        $trn=$_POST['trn'];
        
        $errChk=0;
        if($title=="")
        {
            $errChk++;
            $errTitle="<p style='color:red'>Select a Title. </p>";
        }
        else
        {
            $errTitle="";
        }
        if(($fname=="")||($lname=="")||(!ctype_alpha($fname))||(!ctype_alpha($lname)))
        {
            $errChk++;
            $errName="<p style='color:red'>Enter Valid Full Name. </p>";
        }
        else
        {
            $errName="";
        }
        
        $test_arr  = explode('/', $dob);
        if ((checkdate($test_arr[1], $test_arr[0], $test_arr[2])) && ($dob!="")) {
             $errDOB="";
        }
        else{
            $errChk++;
            $errDOB="<p style='color:red'>Invalid D.O.B. </p>";
         }
        
        if(($trn!="")&&(is_numeric($trn))&&(strlen($trn)==9))
        {
            $errTrn="";
        }
        else
        {
            $errChk++;
            $errTrn="<p style='color:red'>Invalid TRN. </p>";
        }
        
        $_SESSION['title']=$title;
        $_SESSION['fname']=$fname;
        $_SESSION['lname']=$lname;
        $_SESSION['dob']=$dob;
        $_SESSION['trn']=$trn;
        $_SESSION['errTitle']=$errTitle;
        $_SESSION['errName']=$errName;
        $_SESSION['errDOB']=$errDOB;
        $_SESSION['errTRN']=$errTrn;
        
        if($errChk==0)
        {
            header("Location: Daddpatient22.php");
        }
        else
        {
            header("Location: DregisterPatient.php");
        }
    
        
    }

?>