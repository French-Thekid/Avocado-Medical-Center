<?php
     session_start();

    if (isset($_POST["Ebtn"]))
    {
        header("Location: addpatient.php");
    }
    else if (isset($_POST["Sbtn"]))
    {
        /*Writing to file*/
        $Patientfile = fopen("patientdata.txt", "w") or die("Unable to open file!");
        fwrite($Patientfile, "Name:             ");
        fwrite($Patientfile, $_SESSION['title']);
        fwrite($Patientfile, " ");
        fwrite($Patientfile, $_SESSION['fname']);
        fwrite($Patientfile, " ");
        fwrite($Patientfile, $_SESSION['lname']);
        fwrite($Patientfile, "\n");
        fwrite($Patientfile, "Date of Birth:    ");
        fwrite($Patientfile, $_SESSION['dob']);
        fwrite($Patientfile, "\n");
        fwrite($Patientfile, "TRN:              ");
        fwrite($Patientfile, $_SESSION['trn']);
        fwrite($Patientfile, "\n");
        fwrite($Patientfile, "Address:          ");
        fwrite($Patientfile, $_SESSION['street']);
        fwrite($Patientfile, ", ");
        fwrite($Patientfile, $_SESSION['district']);
        fwrite($Patientfile, "\n                  ");
        fwrite($Patientfile, $_SESSION['city']);
        fwrite($Patientfile, " ");
        fwrite($Patientfile, $_SESSION['country']);
        fwrite($Patientfile, "\n");
        fwrite($Patientfile, "Email address:    ");
        fwrite($Patientfile, $_SESSION['email']);
        fwrite($Patientfile, "\n");
        fwrite($Patientfile, "Telephone number: ");
        fwrite($Patientfile, $_SESSION['phone']);
        fwrite($Patientfile, "\n");
        fwrite($Patientfile, "------------------------------------------------------------------------------------------");
        fwrite($Patientfile, "\n\n");
        
        fclose($Patientfile);
        
        session_unset();
        
        header("Location: login.php");
    }

?>