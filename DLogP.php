<?php
    
    session_start();
    include('DB_Con.php');
    $found=false;
    if(isset($_POST['Bbtn']))
    {
        $_SESSION['Stat']="";
        $_SESSION['AFname']="";  
        $_SESSION['ASname']="";  
        $_SESSION['ADOB']=""; 
        $_SESSION['Atrn']="";
        $_SESSION['key']="";
        $_SESSION['Adate']="";
        $_SESSION['errStat']="";
        $_SESSION['errDate']="";
        header("Location: DoctorsPortal.php");
    }
    else if(isset($_POST['Sbtn']))
    {
        $key=$_POST['key'];
        if(($key=="")||(!is_numeric($key)))
        {
            $errKey="<p style='color:red'>Invalid Patient's TRN</p>";
            $_SESSION['Errkey']=$errKey;
            header('Location: DLogPatient.php');
        }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['key']=$key;
            $query="SELECT * from Patient WHERE PatientsTRN='".$key."' ";
            $result = $conn->query($query);
            $row = mysqli_fetch_array($result);
            $_SESSION['Atrn']=$row["PatientsTRN"];  
            $_SESSION['AFname']=$row["FirstName"];  
            $_SESSION['ASname']=$row["LastName"];  
            $_SESSION['ADOB']=$row["DOB"];  
            
            if( $_SESSION['Atrn']=="")
            {
                $errKey="<p style='color:red'>Patient not found</p>";
                $_SESSION['Errkey']=$errKey;
                header('Location: DLogPatient.php');
            }
            else{
                 $found=true;
                header('Location: DLogPatient.php');
            }
            
            
            $conn->close();
         }
       
    }
    else if(isset($_POST['Lbtn']))
    {
         $key=$_POST['key'];
        if($_SESSION['Atrn']=="")
        {
            echo "<script>alert('Please select a Patient Profile');</script>";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['aerrStat']="";
            header("refresh:0; url=DLogPatient.php");
        }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['key']=$key;
        
            $Date=$_POST["Adate"];
            $Status=$_POST["status"];
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
            $test_arr  = explode('/', $Date);
            if ((checkdate($test_arr[1], $test_arr[0], $test_arr[2])) && ($Date!="")) {
                $errDate="";
            }
            else
            {
                $errChk++;
                $errDate="<p style='color:red'>Invalid Date. </p>";
            }

            $_SESSION['Stat']=$Status;
            $_SESSION['Adate']=$Date;
            $_SESSION['errStat']=$errStat;
            $_SESSION['errDate']=$errDate;

            if($errChk==0)
            {
           $query = "INSERT INTO Appointment (PatientsTRN, StaffID, Date, Status) VALUES ('".$_SESSION['Atrn']."', '".$_SESSION['CurrentUID']."', '".$Date."', '".$Status."') ";

                 if ($conn->query($query) === TRUE) {
                        echo "<script>alert('Patient Successfully Logged');</script>";
                        $_SESSION['Stat']="";
                        $_SESSION['Atrn']="";
                        $_SESSION['Adate']="";
                        $_SESSION['AFname']="";  
                        $_SESSION['ASname']="";  
                        $_SESSION['ADOB']=""; 
                        $_SESSION['key']="";
                        $_SESSION['AFname']="";  
                        $_SESSION['ASname']="";  
                        $_SESSION['ADOB']=""; 
                        $_SESSION['errStat']="";
                        $_SESSION['errDate']="";
                        header( "refresh:0; url=DLogPatient.php" );         

                    } 
                    else {
                        echo "Error: " . $query . "<br>" . $conn->error;
                    }    
            }
            else{
                header("Location: DLogPatient.php");
            }
        }
    }
?>