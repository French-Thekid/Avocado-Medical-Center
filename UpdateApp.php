<?php
    
    session_start();
    include('DB_Con.php');
    
    if(isset($_POST['Bbtn']))
    {
        $_SESSION['Stat']="";
        $_SESSION['AaFname']="";  
        $_SESSION['AaSname']="";  
        $_SESSION['AaDOB']=""; 
        $_SESSION['Aatrn']="";
        $_SESSION['aerrStat']="";
        $_SESSION['aReason']="";
        $_SESSION['aStat']="";
        $_SESSION['Errkey']="";
        $_SESSION['errReason']="";
        header("Location: DoctorsPortal.php");
    }
    else if(isset($_POST['Sbtn']))
    {
        $key=$_POST['key'];
        if($key=="")
        {
            $errKey="<p style='color:red'>Invalid Patient's TRN</p>";
            $_SESSION['Errkey']=$errKey;
            header('Location: AppointmentMod.php');
        }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['key']=$key;
            $query="SELECT * from Appointment WHERE PatientsTRN='".$key."' ";
            $result = $conn->query($query);
            $row = mysqli_fetch_array($result);
            $_SESSION['Aatrn']=$row["PatientsTRN"];  
            $_SESSION['aStat']=$row["Status"];  
            $_SESSION['aReason']=$row["Reason"]; 
            
            $query="SELECT * from Patient WHERE PatientsTRN='".$key."' ";
            $result1 = $conn->query($query);
            $row1 = mysqli_fetch_array($result1);
            
            
            $_SESSION['AaFname']=$row1["FirstName"];  
            $_SESSION['AaSname']=$row1["LastName"];  
            $_SESSION['AaDOB']=$row1["DOB"];  
            
            if( $_SESSION['Aatrn']=="")
            {
                $errKey="<p style='color:red'>Patient not found</p>";
                $_SESSION['Errkey']=$errKey;
                header('Location: AppointmentMod.php');
            }
            else{
                header('Location: AppointmentMod.php');
            }
            $conn->close();
         }
       
    }
    else if(isset($_POST['Lbtn']))
    {
        if($_SESSION['Aatrn']=="")
        {
            echo "<script>alert('Please select a Patient Profile');</script>";
            header( "refresh:0; url=AppointmentMod.php");
        }
        else{
            $Status=$_POST["astatus"];
            $reason=$_POST["reason"];
            $errChk=0;
            if($Status=="")
            {
                $errChk++;
                $errStat="<p style='color:red'>Invalid Status. </p>";
            }
            else
            {
                $errStat="";
            }
            if($reason=="")
            {
                $errChk++;
                $errReason="<p style='color:red'>Invalid Reason. </p>";
            }
            else
            {
                $errReason="";
            }
            $_SESSION['aStat']=$Status;
            $_SESSION['aReason']=$reason;
            $_SESSION['errReason']=$errReason;
            $_SESSION['aerrStat']=$errStat;

            if($errChk==0)
            {
               $query = "Update Appointment Set Status='".$Status."',Reason='".$reason."'  WHERE PatientsTRN='".$_SESSION['Aatrn']."' ";

                if ($conn->query($query) === TRUE) {
                     echo "<script>alert('Appointment Successfully Updated');</script>";
                        $_SESSION['aStat']="";
                        $_SESSION['AaFname']="";  
                        $_SESSION['AaSname']=""; 
                        $_SESSION['aReason']="";
                        $_SESSION['AaDOB']=""; 
                        $_SESSION['Aatrn']="";
                        $_SESSION['aerrStat']="";
                        $_SESSION['errReason']="";
                    header( "refresh:0; url=AppointmentMod.php");
                 } 
                 else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                 }    
            }
            else{
                header("Location: AppointmentMod.php");
            }
        }
        
    }
?>