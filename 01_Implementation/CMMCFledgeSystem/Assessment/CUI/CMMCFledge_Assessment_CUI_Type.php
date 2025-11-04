<?php 

    session_start(); 

    if(isset($_POST['CUIType'])){
        $_SESSION['CUIType'] = $_POST['CUIType'];
        header("Location: ../CUI/CMMCFledge_Assessment_CUI_Result.php");
        exit;
    }

    function CUIType(){
        include '../../Include/DBConnect.php';
        foreach ($_SESSION['CUICat'] as $key => $value) {
            $Query_CUI_Cat = "SELECT Cat_Name FROM cui_cat WHERE idCUI_Cat = $value";
            $result = $conn->query($Query_CUI_Cat);
            if ($result->num_rows > 0) {
                    while($getCUICat = $result->fetch_assoc()){
                         echo "Because you selected $getCUICat[Cat_Name]";
                    }
                }
    
            $Query_CUI_Cat = "SELECT * FROM cui_types WHERE CUI_Cat_idCUI_Cat = $value";
            $result = $conn->query($Query_CUI_Cat );
                if ($result->num_rows > 0) {
                    while($getCUICat = $result->fetch_assoc()) {
                            $CUIType = $getCUICat['Type_Name'];
                            $CUITypeBasic = $getCUICat['Is_Basic'];
                            echo "<label> <input type='checkbox' name='CUIType[]' value=$CUITypeBasic>$CUIType</label>";
                        }
                }
            echo "<br>";
        }
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
                <div class = "assessmentTitle">Choose your CUI Types</div>
                <div class = "assessmentSubTitle">Does not have to be one of the examples provided</div>
                <div class = "questionInstruction"><br><br>Select One From The Following</div>
                <div class = "questionRadioContainer">
                    <form method="post">
                        <?php echo CUIType();?>
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