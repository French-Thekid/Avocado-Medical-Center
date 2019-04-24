<?php
    session_start();
    include("DB_Con.php");
    if(isset($_POST['Cbtn']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $date=$_POST['date'];
        $errCHK=0;
        
        if($fname!=""){
            $errfname="";
        }
        else{
            $errCHK++;
            $errfname="<p style='color:red'>Invalid First Name</p>";
        }
        if($lname!=""){
            $errlname="";
        }
        else{
            $errCHK++;
            $errlname="<p style='color:red'>Invalid Last Name</p>";
        }
        $test_arr  = explode('/', $date);
        if ((checkdate($test_arr[1], $test_arr[0], $test_arr[2])) && ($date!="")) {
             $errDate="";
        }
        else{
            $errChk++;
            $errDate="<p style='color:red'>Invalid Date. </p>";
         }
        $_SESSION['lname']=$lname;
        $_SESSION['fname']=$fname;
        $_SESSION['date']=$date;
        $_SESSION['Efname']=$errfname;
        $_SESSION['Elname']=$errlname;
        $_SESSION['Edate']=$errDate;
        if($errCHK==0){
            
            $query="Select * from Patient";
            $result = $conn->query($query);
            $check=false;
            $trn="";
            $Stat="Pending";
            while( ($row = mysqli_fetch_array($result)) && ($check==false) )
            {
               if(($row["FirstName"] == $fname)&&($row["LastName"] == $lname))
                {
                    $trn=$row["PatientsTRN"];
                    $check=true;//true if user is found
                }
            }//end While
            if($check==true){
                $query = "INSERT INTO Appointment (PatientsTRN, StaffID, Date, Status) VALUES ('".$trn."', 'None', '".$date."', '".$Stat."') ";
            
                if ($conn->query($query) === TRUE) {
                    echo "<script>alert('Your Appointment has been successfully booked, we look forward to seeing you on the ".$date."');</script>";
                    $_SESSION['type']="";
                    $_SESSION['lname']="";
                    $_SESSION['fname']="";
                    $_SESSION['Efname']="";
                    $_SESSION['Elname']="";
                    $_SESSION['Edate']="";
                    header( "refresh:0; url=index.php#makeApp");
                }
            }
            else{
                echo "<script>alert('Please Come in and Register, then you will be able to book an appointment online');</script>";
                header( "refresh:0; url=index.php#makeApp");
            }
        }
        else
        {
             echo "<script>alert('Please enter valid Information first');</script>";
             header("refresh:0; url=index.php#makeApp");
        }
    }

?>