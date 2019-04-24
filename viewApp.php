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
        $_SESSION['errStat']="";
        $_SESSION['Errkey']="";
        $_SESSION['aStat']="";
        $_SESSION['aerrStat']="";
        $_SESSION['key']="";
        header("Location: NursePortal.php");
    }
    else if(isset($_POST['Sbtn']))
    {
        $key=$_POST['key'];
        if(($key=="")||(!is_numeric($key)))
        {
            $errKey="<p style='color:red'>Invalid Patient's TRN</p>";
            $_SESSION['Errkey']=$errKey;
            header('Location: ViewAppointment.php');
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
                header('Location: ViewAppointment.php');
            }
            else{
                header('Location: ViewAppointment.php');
            }
            
            
            $conn->close();
         }
       
    }
    else if(isset($_POST['Lbtn']))
    {
        $Status=$_POST["astatus"];
        $errChk=0;
        $key=$_POST['key'];
        if( $_SESSION['Aatrn']=="")
        {
            $_SESSION['Errkey']=$errKey;
            $_SESSION['aerrStat']="";
            echo "<script>alert('Please select a Patient Profile');</script>";
            header( "refresh:0; url=ViewAppointment.php");
        }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            if($Status=="")
            {
                $errChk++;
                $errStat="<p style='color:red'>Invalid Status. </p>";
            }
            else
            {
                $errStat="";
            }
            $_SESSION['aStat']=$Status;
            $_SESSION['aerrStat']=$errStat;

            if($errChk==0)
            {
               $query = "Update Appointment Set Status='".$Status."'  WHERE PatientsTRN='".$_SESSION['Aatrn']."' ";

                if ($conn->query($query) === TRUE) {
                     echo "<script>alert('Appointment Successfully Updated');</script>";
                        $_SESSION['Stat']="";
                        $_SESSION['AaFname']="";  
                        $_SESSION['AaSname']="";  
                        $_SESSION['AaDOB']=""; 
                        $_SESSION['Aatrn']="";
                        $_SESSION['errStat']="";
                        $_SESSION['Errkey']="";
                        $_SESSION['aStat']="";
                        $_SESSION['aerrStat']="";
                        $_SESSION['key']="";
                     header( "refresh:0; url=ViewAppointment.php" );    
                 } 
                 else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                 }    
            }
            else{
                header("Location: ViewAppointment.php");
            }
        }
    }
?>