<?php 
    include '../Include/DBConnect.php';
    session_start(); 
    foreach ($_SESSION as $key => $value) { //test
        echo "$key : $value<br>";
    }

    function PickOutput(){
        if($_SESSION['CMMCCertType'] == 'CMMC l1')
            echo CMMCL1Report();
        else
            echo CMMCL2Report();
    }


    function CMMCL1Report(){
        include '../Include/DBConnect.php';
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) = 'B'";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultTextBlock'>$ControlName</div>";
                switch ($ControlID){
                    case "B.1.I":
                        echo B1I();
                        break;
                    case "B.1.II":
                        echo B1II();
                        break;
                    case "B.1.III":
                        echo B1III();
                        break;
                    case "B.1.IV":
                        echo B1IV();
                        break;
                    case "B.1.V":
                        echo B1V();
                        break;
                    case "B.1.VI":
                        echo B1VI();
                        break;
                    case "B.1.VII":
                        echo B1VII();
                        break;
                    case "B.1.VIII":
                        echo B1VIII();
                        break;
                    case "B.1.IX":
                        echo B1IX();
                        break;
                    case "B.1.X":
                        echo B1X();
                        break;
                    case "B.1.XI":
                        echo B1XI();
                        break;
                    case "B.1.XII":
                        echo B1XII();
                        break;
                    case "B.1.XIII":
                        echo B1XIII();
                        break;
                    case "B.1.XIV":
                        echo B1XIV();
                        break;
                    case "B.1.XV":
                        echo B1XV();
                        break;
                }
            }
        }
    }
    function B1I(){

    }
    function B1II(){
        
    }
    function B1III(){

    }
    function B1IV(){
        
    }
    function B1V(){
        
    }
    function B1VI(){

    }
    function B1VII(){
        
    }
    function B1VIII(){

    }
    function B1IX(){
        
    }
    function B1X(){
        
    }
    function B1XI(){

    }
    function B1XII(){
        
    }
    function B1XIII(){

    }
    function B1XIV(){
        
    }
    function B1XV(){
        
    }
    function CMMCL2Report(){

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
                <a href ="..\CMMCFledge_Assessment_Start.php">Assessment</a>
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
                <div class = "pageTitle">Assessment Results!</div>
                <div class = "pageSubTitle">Congratulations on Completing the Assessment!</div>
                <div class = "pageSubTitle">For your upcoming <?php echo $_SESSION['CMMCCertType'];?> assessment you may need to look into:</div>
                <?php echo PickOutput();?>
            </div>
        </div>
            
        <div class = "homeFooter"> <b>NOTICE:</b> This is a student designed system. All information found within the CMMC Fledge System or related systems are for informational purposes only. 
            This is a student project and shall not be used as a substitute for professional advice. Use this system at your own risk.
        </div>

    </body>
</html>