<?php 
    session_start();
     $_SESSION['CMMCCertType'] = "N/A";
     $_SESSION['IAASUsage'] = "N/A";
     $_SESSION['IAASSelect'] = "N/A";
     $_SESSION['RolesMatrix'] = "N/A";
     $_SESSION['RolesSoD'] = "N/A";
     $_SESSION['Lockout'] = "N/A";
     $_SESSION['SystemWarning'] = "N/A";
     $_SESSION['Remote'] = "N/A";
     $_SESSION['RemoteSecure'] = "N/A";
     $_SESSION['PublicComponents'] = "N/A";
     $_SESSION['TrainingGeneral'] = "N/A";
     $_SESSION['TrainingRole'] = "N/A";
     $_SESSION['TrainingInsider'] = "N/A";
     $_SESSION['TrainingLogging'] = "N/A";
     $_SESSION['RecordLogging'] = "N/A";
     $_SESSION['RecordInfoDef'] = "N/A";
     $_SESSION['RecordReview'] = "N/A";
     $_SESSION['RecordReviewChanges'] = "N/A";
     $_SESSION['LoggingTools'] = "N/A";
     $_SESSION['ConfigBaseline'] = "N/A";
     $_SESSION['Inventory'] = "N/A";
     $_SESSION['Ticketing'] = "N/A";
     $_SESSION['IDP'] = "N/A";
     $_SESSION['MultiFactor'] = "N/A";
     $_SESSION['Guest'] = "N/A";
     $_SESSION['Sanitize'] = "N/A";
     $_SESSION['BoundaryDiagram'] = "N/A";
     $_SESSION['PubSep'] = "N/A";
     $_SESSION['MalCodeProt'] = "N/A";
     $_SESSION['MalCodeScan'] = "N/A";
     $_SESSION['MalCodeScanAuto'] = "N/A";
     $_SESSION['Flaw'] = "N/A";
     $_SESSION['MalCodeUpdate'] = "N/A";

    if(isset($_POST['CMMCCertType'])){
        $_SESSION['CMMCCertType'] = $_POST['CMMCCertType'];
        if($_SESSION['CMMCCertType'] == 'N/A')
            header("Location: CUI/CMMCFledge_Assessment_CUI_Cat.php");
        else
            header("Location: IAAS/CMMCFledge_Assessment_IAAS_Usage.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Include/CMMCFledge_Style.css">
    </head>

    <body>
        <div class = "homeHeader"> 
            <div class = "homeHeaderLogo">
                <a href="..\CMMCFledge_Home_Page.html">
                    <img src="..\Images\CMMCFledge_Logo.png" alt="CMMC Fledge" style="width:128px;height:128px;">
                </a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="CMMCFledge_Assessment_Start.php">Assessment</a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="..\CMMCFledge_Fledge_Dictionary.html">Fledge Dictionary</a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="..\CMMCFledge_About_Us.html">About Us</a>
            </div>
            <div class = "homeHeaderLogo"></div>
        </div>

        <div class="bodyColumnContainer">
            <div class="bodyColumnWide">
                <div class = "assessmentTitle">What Level of CMMC Certification is your Organization Pursuing?</div>
                <div class = "assessmentSubTitle">(May be listed in current or future contracts(s))</div>
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