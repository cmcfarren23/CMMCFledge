<?php 
    session_start(); 
    if(isset($_POST['Maintenance'])){
        $_SESSION['Maintenance'] = $_POST['Maintenance'];
        if($_SESSION['Maintenance'] != 'No')
            header("Location: ../MA/CMMCFledge_Assessment_MA_Offsite.php");
        else
            header("Location: ../MP/CMMCFledge_Assessment_MP_Intro.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../Include/CMMCFledge_Style.css">
        <link rel="icon" type="image/x-icon" href="..\..\Images\CMMCFledge_Bird.png">
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
                <div class = "assessmentTitle">Is system maintenance being performed on your system?</div>
                <div class = "assessmentSubTitle">This includes hardware, firmware, and software</div>
                <div class = "questionInstruction"><br><br>Select One of The Following</div>
                <div class = "questionRadioContainer">
                    <form method="post">
                        <label> <input type="radio" name="Maintenance" value="Yes">Yes, system maintenance is performed</label>
                        <label> <input type="radio" name="Maintenance" value="No">No, system maintenance is NOT performed</label>
                        <br>
                        <div class = "singleSubmit">
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                    <div class = "singleSubmit"><?php include '../../Include/CMMCFledge_Public_Var.php'; echo "<progress id='progress-bar' max='" . getTotalQuestions() ."'value='43'></progress>";?></div>
                </div>
            </div>
        </div>
            
        <div class = "homeFooter"> <b>NOTICE:</b> This is a student designed system. All information found within the CMMC Fledge System or related systems are for informational purposes only. 
            This is a student project and shall not be used as a substitute for professional advice. Use this system at your own risk.
        </div>


    </body>
</html>