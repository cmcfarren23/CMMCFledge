<?php 
    session_start(); 
    if(isset($_POST['RecordLogging'])){
        $_SESSION['RecordLogging'] = $_POST['RecordLogging'];
        if($_SESSION['RecordLogging'] == 'No')
            header("Location: ../CM/CMMCFledge_Assessment_CM_Intro.php");
        else
            header("Location: ../AU/CMMCFledge_Assessment_AU_Record_Info.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../Include/CMMCFledge_style.css">
    </head>

    <body>
        <div class = "homeHeader"> 
            <div class = "homeHeaderLogo">
                <a href="..\..\CMMCFledge_Home_Page.html">
                    <img src="..\..\Images\CMMCFledge_Logo.png" alt="CMMC Fledge" style="width:128px;height:128px;">
                </a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="..\CMMCFledge_Assessment_Start.php">Assessment</a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="..\..\CMMCFledge_Fledge_Dictionary.html">Fledge Dictionary</a>
            </div>
            <div class = "homeHeaderDiv">
                <a href ="..\..\CMMCFledge_About_Us.html">About Us</a>
            </div>
            <div class = "homeHeaderLogo"></div>
        </div>

        <div class="bodyColumnContainer">
            <div class="bodyColumnWide">
                <div class = "assessmentTitle">Does your organization define events to be logged and log those events that occur within the system?</div>
                <div class = "assessmentSubTitle">(Event types that are logged MUST be specified  by your organization)</div>
                <div class = "questionInstruction"><br><br>Select One of The Following</div>
                <div class = "questionRadioContainer">
                    <form method="post">
                        <label> <input type="radio" name="RecordLogging" value="Yes">Yes, system events are logged as defined by the organization</label>
                        <label> <input type="radio" name="RecordLogging" value="YesExecptDef">No, system events are NOT defined</label>
                        <label> <input type="radio" name="RecordLogging" value="No">No, system events are NOT logged</label>
                        <label> <input type="radio" name="RecordLogging" value="No">No, system events are NOT logged or defined</label>
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