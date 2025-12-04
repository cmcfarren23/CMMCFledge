<?php 
    session_start();
    function CMMCCertType(){
        foreach ($_SESSION['CUICat'] as $key => $value) {
            if(in_array('None',$_SESSION['CUICat'])){
                echo "It seems you may not contain any CUI within your system. You can go with a CMMC l1 certification";
                $_SESSION['CMMCCertType'] = 'CMMC l1';
                break;
            }else{
            foreach ($_SESSION['CUIType'] as $key => $value) { 
                if($value == 0){
                    echo "It seems you may need to evaulate at CMMC L3 </br>(CMMCFledge does not fully cover CMMC l3)</br>";
                    break;
                }
            }
            $_SESSION['CMMCCertType'] = 'CMMC l2 (C3PAO-Assessment)';
            echo "</br></br></br>Would you like to continue with an CMMC L2 (C3PAO Assessment)?</br></br>";
            break;
            }
        }

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
                <div class = "assessmentTitle"><?php echo CMMCCertType();?></div>
                <!-- <div class = "assessmentSubTitle">Select One of the Following</div> -->
                <!-- <div class = "questionInstruction"><br><br>Answer the following questions to the best of your ability</div> -->
                <div class = "questionRadioContainer">
                    <form method="post" >
                        <div class = "singleSubmit">
                            <a href ="../IAAS/CMMCFledge_Assessment_IAAS_Usage.php"><button type="button">Continue</button></a>
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