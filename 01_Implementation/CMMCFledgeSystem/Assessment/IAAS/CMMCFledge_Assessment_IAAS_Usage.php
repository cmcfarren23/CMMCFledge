<?php 
    session_start(); 
    // echo $_SESSION['CMMCCertType']; // test
    if(isset($_POST['IAASUsage'])){
        $_SESSION['IAASUsage'] = $_POST['IAASUsage'];
        if($_SESSION['IAASUsage'] == 'N/A')
            header("Location: ../AC/CMMCFledge_Assessment_AC_Intro.php");
        else if($_SESSION['IAASUsage'] == 'test')
            header("Location: ../CMMCFledge_Assessment_Result.php");
        else
            header("Location: ../IAAS/CMMCFledge_Assessment_IAAS_Selection.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../Include/CMMCFledge_Style.css">
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
                <div class = "assessmentTitle">Does your organization utilize major Infrastructure as a Service (IAAS) platforms?</div>
                <!-- <div class = "assessmentSubTitle">Select One of the Following</div> -->
                <div class = "questionInstruction"><br><br>Select One of The Following</div>
                <div class = "questionRadioContainer">
                    <form method="post">
                        <label> <input type="radio" name="IAASUsage" value="solely">My systems authorization boundary exist solely within an AWS, Azure, or Google Cloud environment</label>
                        <label> <input type="radio" name="IAASUsage" value="includes">My systems authorization boundary includes an AWS, Azure, or Google Cloud environment</label>
                        <label> <input type="radio" name="IAASUsage" value="N/A">My Organization does not use AWS, Azure, or Google Cloud environments</label>
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