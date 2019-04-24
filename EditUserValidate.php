<?php
    
    session_start();
    include('DB_Con.php');
    
    if(isset($_POST['Bbtn']))
    {
        $_SESSION['SID']="";
        $_SESSION['name']="";
        $_SESSION['email']="";
        $_SESSION['password']="";
        $_SESSION['type']="";
        header("Location: adminPortal.php");
    }
    else if(isset($_POST['Sbtn']))
    {
        $key=$_POST['key'];
        if($key=="")
        {
            $errKey="<p style='color:red'>Invalid StaffID</p>";
            $_SESSION['Errkey']=$errKey;
            header('Location: EditStaff.php');
        }
        else{
            $errKey="";
            $_SESSION['Errkey']=$errKey;
            $_SESSION['key']=$key;
            $query="SELECT * from Staff WHERE StaffID='".$key."' ";
            $result = $conn->query($query);
            $row = mysqli_fetch_array($result);
            $_SESSION['SID']=$row["StaffID"];
            $_SESSION['name']=$row["Name"];
            $_SESSION['email']=$row["Email"];
            $_SESSION['password']=$row["Password"];
            $_SESSION['type']=$row["Type"];
            header('Location: EditStaff.php');
            
            $conn->close();
         }
       
    }
    else if(isset($_POST['Cbtn']))
    {
        
        $type=  $_POST['type'];
        $name=  $_POST['name'];
        $pword1=$_POST['p1'];
        $email= $_POST['email'];
        $ID=    $_POST['ID'];
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
        if($name=="")
        {
            $errChk++;
            $errName="<p style='color:red'>Enter Full Name. </p>";
        }
        else
        {
            $errName="";
        }
        if($pword1=="")
        {
             $errChk++;
             $errPword="<p style='color:red'>Invalid Password. </p>";
        }
        else{
            $errPword="";
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
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['p1']=$pword1;
        $_SESSION['ID']=$ID;
        $_SESSION['errType']=$errType;
        $_SESSION['errName']=$errName;
        $_SESSION['errEmail']=$errEmail;
        $_SESSION['errPword']=$errPword;
        $_SESSION['errID']=$errID;
        
        
        if($errChk==0)
        {
             $query = "Update Staff Set Name= '".$name."',StaffID= '".$ID."',Email='".$email."', Type= '".$type."', Password= '".$pword1."'  WHERE StaffID='".$_SESSION['SID']."' ";
            
            if ($conn->query($query) === TRUE) {
                 echo "<script>alert('User Profile Successfully Updated');</script>";
                 $_SESSION['SID']="";
                 $_SESSION['name']="";
                 $_SESSION['email']="";
                 $_SESSION['password']="";
                 $_SESSION['type']="";
                 header( "refresh:0; url=EditStaff.php");
             } 
             else {
                echo "Error: " . $query . "<br>" . $conn->error;
             }       
        }
        else
        {
            header("Location: EditStaff.php");
        }
    }
?>