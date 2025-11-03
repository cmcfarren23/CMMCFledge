<?php 
    session_start(); 
    if(isset($_POST['BoundaryDiagram'])){
        $_SESSION['BoundaryDiagram'] = $_POST['BoundaryDiagram'];
        if($_SESSION['PublicComponents'] == "Yes"){
            header("Location: ../SC/CMMCFledge_Assessment_SC_Public_Sep.php");
        }else{
            header("Location: ../SI/CMMCFledge_Assessment_SI_Intro.php");
        }
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
                <div class = "assessmentTitle">Does your organization maitain an active system boundary diagram for the system?</div>
                <!-- <div class = "assessmentSubTitle">Does not have to be one of the examples provided</div> -->
                <div class = "questionInstruction"><br><br>Select One of The Following</div>
                <div class = "questionRadioContainer">
                    <form method="post">
                        <label> <input type="radio" name="BoundaryDiagram" value="Yes">Yes, a system boundary diagram is maintained</label>
                        <label> <input type="radio" name="BoundaryDiagram" value="No">No, a system boundary diagram exists but is not being maintained</label>
                        <label> <input type="radio" name="BoundaryDiagram" value="No">No, a system boundary diagram does NOT exist</label>
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