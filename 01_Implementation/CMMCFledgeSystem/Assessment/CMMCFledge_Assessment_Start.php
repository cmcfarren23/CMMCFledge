<?php 
    session_start();
     $_SESSION['CMMCCertType'] = "CMMC l2 (C3PAO-Assessment)";
     $_SESSION['IAASUsage'] = "N/A";
     $_SESSION['IAASSelect'] = "N/A";
     $_SESSION['RolesMatrix'] = "N/A";
     $_SESSION['RolesSoD'] = "N/A";
     $_SESSION['Lockout'] = "N/A";
     $_SESSION['SystemWarning'] = "N/A";
     $_SESSION['Remote'] = "N/A";
     $_SESSION['RemoteSecure'] = "N/A";
     $_SESSION['PublicComponents'] = "N/A";
     $_SESSION['RemovableDevices'] = "N/A";
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
     $_SESSION['Whitelist'] = "N/A";
     $_SESSION['LeastFunc'] = "N/A";
     $_SESSION['IDP'] = "N/A";
     $_SESSION['MultiFactor'] = "N/A";
     $_SESSION['PasswordPolicy'] = "N/A";
     $_SESSION['IDReuse'] = "N/A";
     $_SESSION['Guest'] = "N/A";
     $_SESSION['Sanitize'] = "N/A";
     $_SESSION['Maintenance'] = "N/A";
     $_SESSION['Paper'] = "N/A";
     $_SESSION['Offsite'] = "N/A";
     $_SESSION['BoundaryDiagram'] = "N/A";
     $_SESSION['PubSep'] = "N/A";
     $_SESSION['MalCodeProt'] = "N/A";
     $_SESSION['MalCodeScan'] = "N/A";
     $_SESSION['MalCodeScanAuto'] = "N/A";
     $_SESSION['Flaw'] = "N/A";
     $_SESSION['MalCodeUpdate'] = "N/A";
     $_SESSION['IRP'] = "N/A";
     $_SESSION['IRReporting'] = "N/A";
     $_SESSION['Tabletop'] = "N/A";



?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../Include/CMMCFledge_Style.css">
        <link rel="icon" type="image/x-icon" href="..\Images\CMMCFledge_Bird.png">
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
                <div class = "assessmentTitle">Are you ready to begin the assessment?</div>
                <div class = "assessmentStartText"><br>This assessment may take up to 20 minutes to complete</div>
                <div class = "assessmentStartText"><br>The progress bar may provide an rough estimate for completion</div><br>
                <div class = "singleSubmit"><?php include '../Include/CMMCFledge_Public_Var.php'; echo "<progress id='progress-bar' max='" . getTotalQuestions() ."'value='25'></progress>";?></div>
                <div class = "assessmentStartText"><br>If you see any unfamiliar terminology, please refer to the Fledge Dictionary</div><br>
                <div class = "assessmentStartText"><br><br>Please answer all questions to the best of your ability to get accurate results!<br><br></div>
                    <form method="post" >
                        <div class = "singleSubmit">
                            <a href ="CMMCFledge_Assessment_Cert_Selection.php"><button type="button">Continue</button></a>
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