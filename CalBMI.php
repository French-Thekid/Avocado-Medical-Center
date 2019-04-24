<?php
    session_start();

    if(isset($_POST['Cbtn']))
    {
        $height=$_POST['height'];
        $weight=$_POST['weight'];
        $errCHK=0;
        
        if( ($height=="")&&(!is_numeric($height)) ){
            $errCHK++;
            $errHeight="<p style='color:red'>Invalid Height</p>";
        }
        else{
            $errHeight="";
        }
        if(($weight=="")&&(!is_numeric($weight))){
            $errCHK++;
            $errWeight="<p style='color:red'>Invalid Weight</p>";
        }
        else{
            $errWeight="";
        }
        $_SESSION['weight']=$weight;
        $_SESSION['height']=$height;
        $_SESSION['Eheight']=$errHeight;
        $_SESSION['EWeight']=$errWeight;
        
        if($errCHK==0){
            $_SESSION['result']= ($weight/($height*$height)*703);
            
            if($_SESSION['result']>40){
                $_SESSION['conclusion']="You are very Obese, Gym recommended";
            }
            else if(($_SESSION['result']>35)&&($_SESSION['result']<40)){
                $_SESSION['conclusion']="You are severly Obese, Gym recommended";
            }
            else if(($_SESSION['result']>30)&&($_SESSION['result']<35)){
                $_SESSION['conclusion']="You are moderately Obese, Gym recommended";
            }
            else if(($_SESSION['result']>25)&&($_SESSION['result']<30)){
                $_SESSION['conclusion']="You are overweight";
            }
            else if(($_SESSION['result']>18.5)&&($_SESSION['result']<25)){
                $_SESSION['conclusion']="You are Normally Weight, Congrats your are healthy";
            }
            else if(($_SESSION['result']>16)&&($_SESSION['result']<18.5)){
                $_SESSION['conclusion']="You are Underweight";
            }
            else if(($_SESSION['result']>15)&&($_SESSION['result']<16)){
                $_SESSION['conclusion']="You are severly Underweight";
            }
            else if($_SESSION['result']<15){
                $_SESSION['conclusion']="You are very severly Underweight";
            }
            header("Location: index.php#bmical");
        }
        else
        {
            echo "<script>alert('Please enter valid numbers first');</script>";
            header("refresh:0; url=index.php#bmical");
        }
    }

?>