<?php 
    session_start(); 
    if(isset($_POST['CMMCCertType'])){
        $_SESSION['CMMCCertType'] = $_POST['CMMCCertType'];
        if($_SESSION['CMMCCertType'] == 'N/A')
            header("Location: CMMCFledge_Assessment_CUI_Cat.php");
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
                <div class = "assessmentTitle">What Level of CMMC Certification is your Organization Pursuing?</div>
                <div class = "assessmentSubTitle">(May be listed in current of future contracts(s))</div>
                <div class = "questionInstruction"><br><br>Select One of The Following</div>
                <div class = "questionRadioContainer">
                    <form method="post">
                        <label> <input type="radio" name="CMMCCertType" value="CMMC l1">CMMC l1<br></label>
                        <label> <input type="radio" name="CMMCCertType" value="CMMC l2 (Self-Assessment)">CMMC l2 (Self-Assessment)<br></label>
                        <label> <input type="radio" name="CMMCCertType" value="CMMC l2 (C3PAO-Assessment)">CMMC l2 (C3PAO-Assessment)<br></label>
                        <label> <input type="radio" name="CMMCCertType" value="N/A">Not Sure</label>
                        <br>
                        <div class = "singleSubmit">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            
        <div class = "homeFooter"> <b>NOTICE:</b> This is a student designed system. All information found within the CMMC Fledge System or related systems are for informational purposes only. 
            This is a student project and shall not be used as a substitute for professional advice. Use this system at your own risk.
        </div>


    </body>
</html>