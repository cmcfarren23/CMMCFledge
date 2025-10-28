<?php 
    session_start(); 
    // echo $_SESSION['CMMCCertType']; // test
    if(isset($_POST['IAASUsage'])){
        $_SESSION['IAASUsage'] = $_POST['IAASUsage'];
        if($_SESSION['IAASUsage'] == 'N/A')
            header("Location: CMMCFledge_Assessment_CUI_Cat.php");
        else if($_SESSION['IAASUsage'] == 'test')
            header("Location: CMMCFledge_Assessment_Result.php");
        else
            header("Location: CMMCFledge_Assessment_IAAS_Usage.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CMMCFledge_style.css">
    </head>

    <body>
        <div class = "homeHeader"> 
            <div class = "homeHeaderLogo">
                <a href="CMMCFledge_Home_Page.html">
                    <img src="Images\CMMCFledge_Logo.png" alt="CMMC Fledge" style="width:128px;height:128px;">
                </a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="CMMCFledge_Assessment_Start.php">Assessment</a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="CMMCFledge_Fledge_Dictionary.html">Fledge Dictionary</a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="CMMCFledge_About_Us.html">About Us</a>
            </div>
            <div class = "homeHeaderLogo"></div>
        </div>
        <div class="bodyColumnContainer">
            <div class="bodyColumnWide">
                <div class = "pageTitle">Assessment Results!</div>
                <div class = "pageSubTitle">Congratulations on Completing the Assessment!</div>
            </div>
        </div>
            
        <div class = "homeFooter"> <b>NOTICE:</b> This is a student designed system. All information found within the CMMC Fledge System or related systems are for informational purposes only. 
            This is a student project and shall not be used as a substitute for professional advice. Use this system at your own risk.
        </div>

    </body>
</html>