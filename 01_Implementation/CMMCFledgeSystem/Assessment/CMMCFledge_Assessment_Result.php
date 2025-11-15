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
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) = 'B' ORDER BY Control_Family";
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
        echo "</br><div class='pageSubTitle'>Additional resources for your journey!</div></br>";
        echo "<a href='https://dodcio.defense.gov/CMMC/about/' target='_blank' >DoD CMMC About Page</a></br>";
        echo "<a href='https://dodcio.defense.gov/Portals/0/Documents/CMMC/ScopingGuideL1v2.pdf' target='_blank'>L1 Scoping Guidance (Unsure whats in your Authorization Boundary?)</a></br>";
        echo "<a href='https://dodcio.defense.gov/Portals/0/Documents/CMMC/AssessmentGuideL1v2.pdf' target='_blank'>CMMC L1 Assessment Objectives</a></br></br>";
    }
    function B1I(){
        include '../Include/DBConnect.php';
        if($_SESSION['IDP'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems you may not have identifed users within the system. This control is looking for:</div>";  
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.I'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through an major ID provider such as EntraID, Okta, or Auth0</div>";  
            echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank'>EntraID</a></br>";
            echo "<a href='https://www.okta.com/' target='_blank'>Okta</a></br>";
            echo "<a href='https://auth0.com/' target='_blank'>Auth0</a></br>";
            echo "<div class='assessmentResultTextBlock'>or this control can be met within proper management of Active Directory (Windows) </br>or Kerberos (Linux; may require additonal technical knowdledge)</div>";  
            echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html/system-level_authentication_guide/configuring_a_kerberos_5_server' target='_blank'>Kerberos Set-up</a></br>";
        }else
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have a major IDP provider!</div>";   
    }
    
    function B1II(){
        include '../Include/DBConnect.php';
        echo "<div class='assessmentResultTextBlock'>You met this control, quickly verify. This control is looking for:</div>";  
        $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.II'";
        $result = $conn->query($Query_Controls_Assessments );
        if ($result->num_rows > 0) {
            while($getCMMCAssessment = $result->fetch_assoc()) {
                $assessmentText = $getCMMCAssessment['Assessment_Text'];
                echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
            }
        }
        if($_SESSION['IDP'] == 'Yes' || $_SESSION['RolesMatrix'] == 'Yes')    
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have a major IDP provider or R&R Matrix!</div>";  
    }
    function B1III(){
        include '../Include/DBConnect.php';
        if($_SESSION['BoundaryDiagram'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems you dont have a boundary diagram. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.III'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            } 
            echo "<div class='assessmentResultTextBlock'>FedRAMP, though not CMMC, has great guidance on what to add within a boundary diagram! (FedRAMP is far more strict than CMMC)</div>";  
            echo "<a href='https://www.fedramp.gov/resources/documents/CSP_A_FedRAMP_Authorization_Boundary_Guidance_Draft_For_Public_Comment%20_V3.0.docx' target='_blank' >FedRAMP Boundary Diagram Guidelines (Will download .Docx)</a>";  
        }else
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have put in the work and created a boundary diagram!</div>";  
    }
    function B1IV(){
        include '../Include/DBConnect.php';
        if($_SESSION['PublicComponents'] != 'No'){
            echo "<div class='assessmentResultTextBlock'>It seems you may have public componets, verify that:</div>"; 
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.IV'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }     
        }else 
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you stated that you have no public facing components, This control can be written as non-applicable</div>"; 
    }
    function B1V(){
        include '../Include/DBConnect.php';
        if($_SESSION['RolesMatrix'] != 'Yes' && $_SESSION['IDP'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems the system does NOT have a Roles & Responsibilities matrix and there is no Major IDP selected, verify that:</div>"; 
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.V'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }    
            echo "<div class='assessmentResultTextBlock'>Building a R&R Matrix is Easy! It requires nothing special, It cant be as simple as an excel sheet that lists responsibilites tied withi each role in your system</br> View AUTHENTICATION [FCI DATA] for IDP information</div>"; 
        }else 
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you stated that have a Roles & Responsibilities matrix and a Major IDP</div>"; 
    }
    function B1VI(){
        include '../Include/DBConnect.php';
        if($_SESSION['IDP'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems you may not have identifed users within the system. This control is looking for:</div>";  
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.VI'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through an major ID provider such as EntraID, Okta, or Auth0</div>";  
            echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank' >EntraID</a></br>";
            echo "<a href='https://www.okta.com/' target='_blank' >Okta</a></br>";
            echo "<a href='https://auth0.com/' target='_blank' >Auth0</a></br>";
            echo "<div class='assessmentResultTextBlock'>or this control can be met within proper management of Active Directory (Windows) </br>or Kerberos (Linux; may require additonal technical knowdledge)</div>";  
            echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html/system-level_authentication_guide/configuring_a_kerberos_5_server' target='_blank' >Kerberos Set-up</a></br>";
        }else
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have a major IDP provider!</div>";   
    }
    function B1VII(){
        include '../Include/DBConnect.php';
            if($_SESSION['IAASUsage'] != 'solely' || $_SESSION['Sanitize'] == 'No'){
            echo "<div class='assessmentResultTextBlock'>It seems you may not santize media before reuse or destruction. This control is looking for:</div>"; 
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.VII'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through popular drive wipers such as Darik's Boot and Nuke (DBaN)</div>";  
            echo "<a href='https://dban.org/' target='_blank' >DBaN</a></br>";  
        }else  
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because either because you snaitze all your media before reuse, or your system soley exists within".$_SESSION['IAASSelect']."!</div>";   
    }
    function B1VIII(){
        if($_SESSION['IAASUsage'] != 'solely'){
            include '../Include/DBConnect.php';
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.VIII'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
        }else{
            echo "<div class='assessmentResultTextBlock'>Based on your utilization of ".$_SESSION['IAASSelect'].", this control is covered!</div>";
            if($_SESSION['IAASSelect'] == 'AWS'){
                echo "<div class='assessmentResultTextBlock'>Check out an AWS guide for best practices on how to set up your current environment to verify that you can inherit this control!</div>";
                echo "<a href='https://docs.aws.amazon.com/config/latest/developerguide/operational-best-practices-for-cmmc_2.0_level_1.html' target='_blank' >AWS Config best Practices! (l1)</a></br>";
                echo "<a href='https://docs.aws.amazon.com/pdfs/config/latest/developerguide/config-dg.pdf#operational-best-practices-for-cmmc_2.0_level_2' target='_blank' >AWS Config best Practices! (l2)</a>";
                echo "<div class='assessmentResultTextBlock'>Check out an the AWS language on their shared responsibility</div>";
                echo "<a href='https://aws.amazon.com/compliance/shared-responsibility-model/ ' target='_blank' >AWS Shared Responsibility Model!</a>";
            }
            if($_SESSION['IAASSelect'] == 'Azure'){
                echo "<div class='assessmentResultTextBlock'>Check out Azures support for CMMC</div>";
                echo "<a href='https://learn.microsoft.com/en-us/entra/standards/configure-cmmc-level-1-controls' target='_blank' >Azure Config best Practices! (l1)</a></br>";
                echo "<div class='assessmentResultTextBlock'>Check out an the Azure placemat to see how your resources stack up for CMMC</div>";
                echo "<a href='https://www.microsoft.com/en-us/download/details.aspx?id=102536' target='_blank' >AWS Placemat! (l2)</a>";
            }
            if($_SESSION['IAASSelect'] == 'Google'){
                echo "<div class='assessmentResultTextBlock'>Check out the Google language on their shared responsibility</div>";
                echo "<a href='https://cloud.google.com/security/compliance/cmmc  ' target='_blank' >Google Shared Responsibility Model!</a>";
            }
        }
    }
    function B1IX(){
        if($_SESSION['IAASUsage'] != 'solely'){
            include '../Include/DBConnect.php';
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.IX'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
        }else{
            echo "<div class='assessmentResultTextBlock'>Based on your utilization of ".$_SESSION['IAASSelect'].", this control is covered!</div>";
            if($_SESSION['IAASSelect'] == 'AWS'){
                echo "<div class='assessmentResultTextBlock'>Check out an AWS guide for best practices on how to set up your current environment to verify that you can inherit this control!</div>";
                echo "<a href='https://docs.aws.amazon.com/config/latest/developerguide/operational-best-practices-for-cmmc_2.0_level_1.html' target='_blank' >AWS Config best Practices! (l1)</a></br>";
                echo "<a href='https://docs.aws.amazon.com/pdfs/config/latest/developerguide/config-dg.pdf#operational-best-practices-for-cmmc_2.0_level_2' target='_blank' >AWS Config best Practices! (l2)</a>";
                echo "<div class='assessmentResultTextBlock'>Check out an the AWS language on their shared responsibility</div>";
                echo "<a href='https://aws.amazon.com/compliance/shared-responsibility-model/ ' target='_blank' >AWS Shared Responsibility Model! (l2)</a>";
            }
            if($_SESSION['IAASSelect'] == 'Azure'){
                echo "<div class='assessmentResultTextBlock'>Check out Azures support for CMMC</div>";
                echo "<a href='https://learn.microsoft.com/en-us/entra/standards/configure-cmmc-level-1-controls' target='_blank' >Azure Config best Practices! (l1)</a></br>";
                echo "<div class='assessmentResultTextBlock'>Check out an the Azure placemat to see how your resources stack up for CMMC</div>";
                echo "<a href='https://www.microsoft.com/en-us/download/details.aspx?id=102536' target='_blank' >AWS Placemat! (l2)</a>";
            }
            if($_SESSION['IAASSelect'] == 'Google'){
                echo "<div class='assessmentResultTextBlock'>Check out the Google language on their shared responsibility</div>";
                echo "<a href='https://cloud.google.com/security/compliance/cmmc' target='_blank' >Google Shared Responsibility Model! (l2)</a>";
            }
        }  
    }
    function B1X(){
        include '../Include/DBConnect.php';
        if($_SESSION['BoundaryDiagram'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems you dont have a boundary diagram. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.X'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            } 
            echo "<div class='assessmentResultTextBlock'>FedRAMP, though not CMMC, has great guidance on what to add within a boundary diagram! (FedRAMP is far more strict than CMMC)</div>";  
            echo "<a href='https://www.fedramp.gov/resources/documents/CSP_A_FedRAMP_Authorization_Boundary_Guidance_Draft_For_Public_Comment%20_V3.0.docx' target='_blank' >FedRAMP Boundary Diagram Guidelines (Will download .Docx)</a>";  
        }else
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have put in the work and created a boundary diagram!</div>";    
    }
    function B1XI(){
        include '../Include/DBConnect.php';
        if($_SESSION['PubSep'] != 'Yes' && $_SESSION['PubSep'] == 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems you don't have a public component separation. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.XI'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            } 
            echo "<div class='assessmentResultTextBlock'>Make sure you have a Boundary Diagram (View BOUNDARY PROTECTION [FCI DATA])</div>";
            echo "<div class='assessmentResultTextBlock'>This control is relatively simple, you got this! logically separate your public components utilize built in IAAS VLAN features</div>";    
        }else
            echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have put in the work and logically separated your public components!</div>";     
    }
    function B1XII(){
        include '../Include/DBConnect.php';
        if($_SESSION['Flaw'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>It seems system flaws are NOT identified, reported, and corrected within organizational defined time frames. This control is looking for:</div>";   
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.XII'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through a flaw monitoring tools</div>";  
            echo "<a href='https://www.datadoghq.com/' target='_blank' >DataDog</a></br>";
            echo "<a href='https://www.microsoft.com/en-us/security/business/siem-and-xdr/microsoft-sentinel' target='_blank' >Microsoft Sentinel</a></br>";
            echo "<a href='https://www.splunk.com/' target='_blank' >Splunk</a></br>";
            echo "<div class='assessmentResultTextBlock'>This can be paired with XDR tools or your response teams to meet this control. Start by defining time frames! (This is best done by criticality of the flaw)</div>";  
        }else
           echo "<div class='assessmentResultTextBlock'>You likely have this control covered due to your defined remedation polcies and practices!</div>";   
    }
    function B1XIII(){
        include '../Include/DBConnect.php';
        if($_SESSION['MalCodeProt'] = 'No' && $_SESSION['MalCodeUpdate'] == 'No' ){
            echo "<div class='assessmentResultTextBlock'>Based on your answers regarding Malicious Code Scanning you may not meet this control. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.XIV'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malcoius Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
            echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
            echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
            echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
        }else
        echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have adequate malicious code scanning mechanisms</div>";    
    }
    function B1XIV(){
        include '../Include/DBConnect.php';
        if($_SESSION['MalCodeProt'] = 'No' && $_SESSION['BoundaryDiagram'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>Based on your answers regarding Malicious Code Scanning and boundary Diagrams you may not meet this control. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.XIV'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malcoius Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
            echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
            echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
            echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
        }else
        echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have adequate malicious code scanning mechanisms along with identify point within your boundary diagrams</div>";          
    }
    function B1XV(){
        include '../Include/DBConnect.php';
        if($_SESSION['MalCodeProt'] = 'No' && ($_SESSION['MalCodeScan'] == 'No' || $_SESSION['MalCodeScanAuto'] == 'No')){
            echo "<div class='assessmentResultTextBlock'>Based on your answers regarding Malicious Code Scanning you may not meet this control. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.XV'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malcoius Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
            echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
            echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
            echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
        }else
        echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have adequate malicious code scanning mechanisms</div>";   
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