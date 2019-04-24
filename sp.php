<?php
    
    session_start();
    include('DB_Con.php');
    
    if(isset($_POST['Bbtn']))
    {
        $_SESSION['Errkey']="";
        $_SESSION['Lname']="";
        $_SESSION['Fname']="";
        $_SESSION['key']="";
        header("Location: NursePortal.php");
    }
    else if(isset($_POST['SLbtn']))
    {
        $_SESSION['NSearch']="LAST";
        $key=$_POST['key'];
        $_SESSION['Lname']=$key;
        $_SESSION['Fname']="";
            if(($key=="")||(is_numeric($key)))
            {
                echo "<script>alert('Please enter first/Last name');</script>";
                $_SESSION['Errkey']=$errKey;
                 header("refresh:0; url=SearchPatients.php");
            }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['key']=$key;
            $_SESSION['sql'] = "SELECT PatientsTRN,FirstName,LastName,Email,TellNo,Street,City,Country FROM Patient WHERE LastName='".$_SESSION['key']."' ";
            $result = $conn->query($_SESSION['sql']);
            $row = mysqli_fetch_array($result);
            $_SESSION['e']=$row["Email"];

            
            if( $_SESSION['e']=="")
            {
                $_SESSION['test']=="NO";
                $errKey="<p style='color:red'>User not found</p>";
                $_SESSION['Errkey']=$errKey;
                header('Location: SearchPatients.php');
            }
            else{
                $errKey="";
                $_SESSION['Errkey']=$errKey;
                $_SESSION['test']=="YES";
                header('Location: SearchPatients.php?Fnd=1');
            }
         }
       
    }
    else if(isset($_POST['SFbtn']))
        {
            $_SESSION['NSearch']="First";
            $key=$_POST['key1'];
            $_SESSION['Fname']=$key;
             $_SESSION['Lname']="";
            if(($key=="")||(is_numeric($key)))
            {
                echo "<script>alert('Please enter first/Last name');</script>";
                $_SESSION['Errkey']=$errKey;
                 header("refresh:0; url=SearchPatients.php");
            }
            else{
                $errKey="";
                $_SESSION['Errkey']=$errKey;
                $_SESSION['key']=$key;
                $_SESSION['sql'] = "SELECT PatientsTRN,FirstName,LastName,Email,TellNo,Street,City,Country FROM Patient WHERE FirstName='".$_SESSION['key']."' ";
                $result = $conn->query($_SESSION['sql']);
                $row = mysqli_fetch_array($result);
                $_SESSION['e']=$row["Email"];


                if( $_SESSION['e']=="")
                {
                    $_SESSION['test']=="NO";
                    $errKey="<p style='color:red'>User not found</p>";
                    $_SESSION['Errkey']=$errKey;
                    header('Location: SearchPatients.php');
                }
                else{
                    $errKey="";
                    $_SESSION['Errkey']=$errKey;
                    $_SESSION['test']=="YES";
                    header('Location: SearchPatients.php?Fnd=2');
                }
             }

        }
$conn->close();
?>