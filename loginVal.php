<?php

    session_start();

    if(isset($_POST["Lbtn"]))
    {
        include('DB_Con.php');  
        $Uname=$_POST["Username"];
        $Password=$_POST["Password"];
        $_SESSION['uname']=$Uname;
        $_SESSION['pword']=$Password;
        
        $logErr=0;
        
        if(($Uname=="") || ($Password == ""))
        {
            $logErr++;
            echo "<script>alert('Ensure All Fields are filled');</script>";
            $logU_PEMess= "";
            $_SESSION['logU_PEMess']=$logU_PEMess;
            $_SESSION['logUEMess']=$logLMess;
            header("Refresh:0; url=login.php");
        }
        else {
            $logLMess= "";//Empty field Checker
            $_SESSION['logUEMess']=$logLMess;
            
            $query="SELECT * from Staff";
            $result = $conn->query($query);
            $check=false;
            $type="";
            while( ($row = mysqli_fetch_array($result)) && ($check==false) )
            {
               if((($row["Email"] == $Uname)||($row["StaffID"] == $Uname)) && ($row["Password"] == $Password))
                {
                    $type=$row["Type"];
                    $_SESSION["CurrentUID"]=$row["StaffID"];
                    $check=true;//true if user is found
                }
            }//end While
            
            if($check==false)//if user is not found
            {
               $logU_PEMess="<p style='color:red'>User not found</p>";
               $_SESSION['logU_PEMess']=$logU_PEMess;
               header("Location: login.php");
            }
            else {
                $logU_PEMess= "";
                $_SESSION['uname']="";
                switch($type)
                  {
                    case "Administrator":
                        header("Location: AdminPortal.php");
                        break;
                    case "Nurse":
                        header("Location: NursePortal.php");
                        break;
                    case "Doctor":
                         header("Location: DoctorsPortal.php");
                        break;        
                    default:
                    echo "Error";
                  }
            }
            $conn->close();
       }
    }

?>