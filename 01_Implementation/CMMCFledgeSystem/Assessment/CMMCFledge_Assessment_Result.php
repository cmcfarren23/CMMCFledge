<?php 
    include '../Include/DBConnect.php';
    session_start(); 
    // foreach ($_SESSION as $key => $value) { //test
    //     echo "$key : $value<br>";
    // }

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
                echo "<div class='resultFamilyBox'>";
                echo "<div class='resultFamilyName'>$ControlName</div>";
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
                echo "</div>";
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
            echo "<div class='assessmentResultTextBlock'>This control is easily met through a major ID provider such as EntraID, Okta, or Auth0</div>";  
            echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank'>EntraID</a></br>";
            echo "<a href='https://www.okta.com/' target='_blank'>Okta</a></br>";
            echo "<a href='https://auth0.com/' target='_blank'>Auth0</a></br>";
            echo "<div class='assessmentResultTextBlock'>or this control can be met within proper management of Active Directory (Windows) or Kerberos (Linux; may require additional technical knowledge)</div>";  
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
                echo "<a href='https://cloud.google.com/security/compliance/cmmc' target='_blank' >Google Shared Responsibility Model!</a>";
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
        if($_SESSION['PubSep'] == 'Yes'){
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
            echo "<div class='assessmentResultTextBlock'>This control is easily met through flaw monitoring tools</div>";  
            echo "<a href='https://www.datadoghq.com/' target='_blank' >DataDog</a></br>";
            echo "<a href='https://www.microsoft.com/en-us/security/business/siem-and-xdr/microsoft-sentinel' target='_blank' >Microsoft Sentinel</a></br>";
            echo "<a href='https://www.splunk.com/' target='_blank' >Splunk</a></br>";
            echo "<div class='assessmentResultTextBlock'>This can be paired with XDR tools or your response teams to meet this control. Start by defining time frames! (This is best done by criticality of the flaw)</div>";  
        }else
           echo "<div class='assessmentResultTextBlock'>You likely have this control covered due to your defined remedation polcies and practices!</div>";   
    }
    function B1XIII(){
        include '../Include/DBConnect.php';
        if($_SESSION['MalCodeProt'] != 'Yes' && $_SESSION['MalCodeUpdate'] != 'Yes' ){
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
        echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have adequate Malicious code scanning mechanisms</div>";    
    }
    function B1XIV(){
        include '../Include/DBConnect.php';
        if($_SESSION['MalCodeProt'] != 'Yes' && $_SESSION['BoundaryDiagram'] != 'Yes'){
            echo "<div class='assessmentResultTextBlock'>Based on your answers regarding Malicious Code Scanning and boundary Diagrams you may not meet this control. This control is looking for:</div>";    
            $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = 'B.1.XIV'";
            $result = $conn->query($Query_Controls_Assessments );
            if ($result->num_rows > 0) {
                while($getCMMCAssessment = $result->fetch_assoc()) {
                    $assessmentText = $getCMMCAssessment['Assessment_Text'];
                    echo "<div class='controlAssessmentTextBlock'>$assessmentText</div>";
                }
            }
            echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malicious Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
            echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
            echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
            echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
        }else
        echo "<div class='assessmentResultTextBlock'>You likely have this control covered because you have adequate Malicious code scanning mechanisms along with identify point within your boundary diagrams</div>";          
    }
    function B1XV(){
        include '../Include/DBConnect.php';
        if(($_SESSION['MalCodeProt'] != 'Yes' && (($_SESSION['MalCodeScan'] != 'Yes') || $_SESSION['MalCodeScanAuto'] != 'Yes'))){
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
        echo L2AC();
        echo L2AT();
        echo L2AU();
        echo L2CM();
        echo L2IA();
        echo L2IR();
        echo L2MA();
        echo L2MP();
        echo L2PS();
        echo L2PE();
        echo L2RA();
        echo L2CA();
        echo L2SC();
        echo L2SI();
        echo "</br><div class='pageSubTitle'>Additional resources for your journey!</div></br>";
        echo "<a href='https://dodcio.defense.gov/CMMC/about/' target='_blank' >DoD CMMC About Page</a></br>";
        echo "<a href='https://dodcio.defense.gov/Portals/0/Documents/CMMC/ScopingGuideL2v2.pdf' target='_blank'>L2 Scoping Guidance (Unsure whats in your Authorization Boundary?)</a></br>";
        echo "<a href='https://dodcio.defense.gov/Portals/0/Documents/CMMC/AssessmentGuideL2v2.pdf' target='_blank'>CMMC L2 Assessment Objectives</a></br></br>";
    }

    function assessmentObj($ControlID){
        include '../Include/DBConnect.php';
        echo "<div class='assessmentResultTextBlockL2'>You may not be passing this control, this control's assessment objectives are:</div></br>";
        $Query_Controls_Assessments = "SELECT * FROM control_assessments WHERE CMMC_Controls_Control_ID = '$ControlID'";
        $resultInner = $conn->query($Query_Controls_Assessments);
        if ($resultInner->num_rows > 0) {
            while($getCMMCAssessment = $resultInner->fetch_assoc()) {
                $assessmentText = $getCMMCAssessment['Assessment_Text'];
                echo "<div class='controlAssessmentTextBlockL2'>• $assessmentText</div>";
            }
        }
        echo "</br><div class='assessmentResultTextBlockL2'>Potential Next Steps:</div></br>";
    }

    function L2AC(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Access Control (AC)▾</div></summary>";
        
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'AC' ORDER BY right(Control_ID, 2)";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.1.1') && ($_SESSION['IDP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>This control is easily met through a major ID provider such as EntraID, Okta, or Auth0</div>";  
                    echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank'>EntraID</a></br>";
                    echo "<a href='https://www.okta.com/' target='_blank'>Okta</a></br>";
                    echo "<a href='https://auth0.com/' target='_blank'>Auth0</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>or this control can be met within proper management of Active Directory (Windows) or Kerberos (Linux; may require additional technical knowledge)</div>";  
                    echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html/system-level_authentication_guide/configuring_a_kerberos_5_server' target='_blank'>Kerberos Set-up</a></br>";
                }
                else if(($ControlID == 'L2-3.1.2') && ($_SESSION['IDP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>This control is easily met through a major ID provider such as EntraID, Okta, or Auth0.</div>";  
                    echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank'>EntraID</a></br>";
                    echo "<a href='https://www.okta.com/' target='_blank'>Okta</a></br>";
                    echo "<a href='https://auth0.com/' target='_blank'>Auth0</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>or this control can be met within proper management of Active Directory (Windows) or Kerberos (Linux; may require additional technical knowledge).</div>";  
                    echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html/system-level_authentication_guide/configuring_a_kerberos_5_server' target='_blank'>Kerberos Set-up</a></br>";
                }
                else if(($ControlID == 'L2-3.1.3') && ($_SESSION['BoundaryDiagram'] != 'Yes')){ 
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define how CUI can be transmitted and to where. 
                    It may be recommended to label CUI zones and flow within your Boundary diagram. 
                    Only Roles listed in your roles & responsibilities matrix that should access and transmit CUI, should be allowed to do so. Write these zones into policy.
                    </div>"; 
                }
                else if(($ControlID == 'L2-3.1.4') && ($_SESSION['RolesSoD'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Create and define Roles & Responsibilities. Verify that these responsibilities enforce Separation of Duties best practice. 
                    Upon defining these roles, enforce it within your system and restrict access to resources accordingly.</div>";  
                }
                else if(($ControlID == 'L2-3.1.5') && ($_SESSION['RolesSoD'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define privileged accounts, non-privileged accounts, and security functions. Verify that these responsibilities enforce Least Privilege. 
                    Upon defining these roles, enforce them within your system and restrict access to resources accordingly.</div>";  
                }
                else if(($ControlID == 'L2-3.1.6') && ($_SESSION['RolesSoD'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define privileged accounts, non-privileged accounts, and security functions. Verify that these responsibilities enforce Least Privilege. 
                    Upon defining these roles, enforce them within your system and restrict access to resources accordingly.</div>";  
                }
                else if(($ControlID == 'L2-3.1.7') && ($_SESSION['RolesSoD'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define privileged accounts, non-privileged accounts, and security functions. Verify that these responsibilities enforce Least Privilege. 
                    Upon defining these roles, enforce them within your system and restrict access to resources accordingly. Verify that these actions are logged.</div>";  
                }
                else if(($ControlID == 'L2-3.1.8') && ($_SESSION['Lockout'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define and implement max logon attempts for your system. 
                    Recommended: A max of three (3) consecutive logon attempts within a fifteen (15) minute timeframe.</div>";  
                }
                else if(($ControlID == 'L2-3.1.9') && ($_SESSION['SystemWarning'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define and implement a System Use notification or Banner. This notice should follow guidelines as outlined in AC.L2-3.1.9 Further Discussion</br></br>
                        The legal notification should meet all applicable requirements. At a minimum, the notice
                        should inform the user that:</div>
                        <div class='controlAssessmentTextBlockL2'>
                        • information system usage may be monitored or recorded, and is subject to audit;</br>
                        • unauthorized use of the information systems is prohibited;</br>
                        • unauthorized use is subject to criminal and civil penalties;</br>
                        • use of the information system affirms consent to monitoring and recording;</br>
                        • the information system contains CUI with specific requirements imposed by the
                        Department of Defense; and</br>
                        • use of the information system may be subject to other specified requirements associated
                        with certain types of CUI such as Export Controlled information. 
                    </div>";  
                }
                else if(($ControlID == 'L2-3.1.10') && ($_SESSION['Lockout'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define and implement Session locks after a defined period of inactivity. Additionally, when locking the session use a screen save to 
                    block information (This is standard within windows devices). Recommended: Session lockout should be initiated after fifteen (15) minutes
                    or upon user request.
                    </div>";  
                }
                else if(($ControlID == 'L2-3.1.11') && ($_SESSION['Lockout'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define and implement Session termination after a defined action. 
                    These actions typically involve time of day restrictions or inactivity thresholds. Set up a policy surrounding this item and implement it.
                    </div>";  
                }
                else if(($ControlID == 'L2-3.1.12') && ($_SESSION['RemoteSecure'] != 'Yes')){
                    assessmentObj($ControlID);
                    if($_SESSION['Remote'] == 'No'){
                        echo "<div class='assessmentResultTextBlockL2'>Due to your selection of 'No' at the Remote Session question, this control is not applicable to your system</div>";      
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Define authorized remote sessions (RDP, VPNs, etc.). 
                        Enforce restrictions upon who can access them (Authorized users) ensure that authentication is required and that these sessions are monitored.
                        </div>";  
                        if($_SESSION['IAASUsage'] == 'solely' || $_SESSION['IAASUsage'] == 'includes'){
                            echo "<div class='assessmentResultTextBlockL2'>Based on your IAAS selection here is a guide on Remote Monitoring</div>"; 
                            if($_SESSION['IAASSelect'] == 'AWS'){
                                echo "<a href='https://aws.amazon.com/what-is/remote-monitoring-and-management/' target='_blank'>AWS Remote Monitoring</a></br>";
                            }
                            if($_SESSION['IAASSelect'] == 'Azure'){
                                echo "<a href='https://learn.microsoft.com/en-us/azure/azure-monitor/' target='_blank'>Azure Monitor</a></br>";
                            }
                            if($_SESSION['IAASSelect'] == 'Google'){
                                echo "<a href='https://docs.cloud.google.com/monitoring/docs/monitoring-overview' target='_blank'>Google Monitoring</a></br>";
                            }
                        }
                    }
                }
                else if(($ControlID == 'L2-3.1.13') && ($_SESSION['RemoteSecure'] != 'Yes')){
                    assessmentObj($ControlID);
                    if($_SESSION['Remote'] == 'No'){
                        echo "<div class='assessmentResultTextBlockL2'>Due to your selection of 'No' at the Remote Session question, this control is not applicable to your system</div>";      
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Define cryptographic modules in use with remote sessions (RDP, VPNs, etc.).</div></br>";  
                        if($_SESSION['IAASUsage'] == 'solely' || $_SESSION['IAASUsage'] == 'includes'){
                            echo "<div class='assessmentResultTextBlockL2'>Utilization of major IAAS services usually allow the use of their cryptographic modules 
                            verify that they meet FIPS 140 standards. View your IAAS offerings:</div>"; 
                            if($_SESSION['IAASSelect'] == 'AWS'){
                                echo "<a href='https://aws.amazon.com/cloudhsm/' target='_blank'>AWS HSM</a></br>";
                            }
                            if($_SESSION['IAASSelect'] == 'Azure'){
                                echo "<a href='https://learn.microsoft.com/en-us/azure/cloud-hsm/overview' target='_blank'>Azure HSM</a></br>";
                            }
                            if($_SESSION['IAASSelect'] == 'Google'){
                                echo "<a href='https://docs.cloud.google.com/kms/docs/hsm' target='_blank'>Google HSM</a></br>";
                            }
                        }
                    }
                }
                else if(($ControlID == 'L2-3.1.14') && ($_SESSION['Remote'] != 'Yes' && $_SESSION['BoundaryDiagram'] != 'Yes')  ){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Identify gateways that transmit data. Verify that all network is routed through those managed control points.
                    </div>";  
                }
                else if(($ControlID == 'L2-3.1.15') && ($_SESSION['RolesSoD'] != 'Yes')  ){ //FIXME
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Remote privileged commands should be defined for use. 
                    Individuals with access to these commands should be labeled within your roles & responsibilities matrix.
                    </div>";  
                }
                else if(($ControlID == 'L2-3.1.16')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'solely'){
                        echo "<div class='assessmentResultTextBlockL2'>Your Authorization boundary exists solely within your IAAS Provider this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Identify wireless access points and enforce WPA2/WPA3 standards for connection
                        </div>";  
                    }
                }
                else if(($ControlID == 'L2-3.1.17')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'solely'){
                        echo "<div class='assessmentResultTextBlockL2'>Your Authorization boundary exists solely within your IAAS Provider, this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Identify wireless access points and enforce WPA2/WPA3 standards for connection
                        </div>";  
                    }
                }
                else if(($ControlID == 'L2-3.1.18')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'solely'){
                        echo "<div class='assessmentResultTextBlockL2'>Your Authorization boundary exists solely within your IAAS Provider this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Identify mobile devices that may process, store, transmit CUI, authorize these connections and monitor them. 
                        Here are some Mobile Device Management (MDM) soultions
                        </div>"; 
                        echo "<a href='https://learn.microsoft.com/en-us/windows/client-management/mdm-overview' target='_blank' >Microsoft MDM overviwew</a></br>";
                        echo "<a href='https://www.ibm.com/products/maas360/government' target='_blank' >Microsoft MDM overviwew</a></br>";
                    }
                }
                else if(($ControlID == 'L2-3.1.19')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'solely'){
                        echo "<div class='assessmentResultTextBlockL2'>Your Authorization boundary exists solely within your IAAS Provider, this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Identify mobile devices that may process, store, transmit CUI, authorize these connections and monitor them. 
                        Here are some Mobile Device Management (MDM) soultions
                        </div>"; 
                        echo "<a href='https://learn.microsoft.com/en-us/windows/client-management/mdm-overview' target='_blank' >Microsoft MDM overviwew</a></br>";
                        echo "<a href='https://www.ibm.com/products/maas360/government' target='_blank' >IBM MDM overviwew</a></br>";

                    }
                }
                else if(($ControlID == 'L2-3.1.20') && ($_SESSION['BoundaryDiagram'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>To start with this control, create a boundary Diagram. FedRAMP has some great documentation on this that would apply to CMMC as well</div>";  
                    echo "<a href='https://www.fedramp.gov/resources/documents/CSP_A_FedRAMP_Authorization_Boundary_Guidance_Draft_For_Public_Comment%20_V3.0.docx' target='_blank' >FedRAMP Boundary Diagram Guidelines (Will download .Docx)</a></br>";
                }
                else if(($ControlID == 'L2-3.1.21')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'solely'){
                        echo "<div class='assessmentResultTextBlockL2'>Your Authorization boundary exists solely within your IAAS Provider, this control is not applicable
                        </div>";  
                    }else if ($_SESSION['RemovableDevices'] != 'special'){
                        echo "<div class='assessmentResultTextBlockL2'>You do not utilize removable devices,this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Create policies surrounding the use of removable devices that contain CUI. Recommended: Heavily restrict external use of removable devices, 
                        this can create risk for your organization. Stick to least functionality principles and only mandate what is required for the system to function.
                        </div>"; 
                    }
                }
                else if(($ControlID == 'L2-3.1.22')){
                    assessmentObj($ControlID);
                    if($_SESSION['RemovableDevices'] == 'No'){
                        echo "<div class='assessmentResultTextBlockL2'>Your system does not contain Public components this control is not applicable</div>";    
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Define who oversees posting public content (This can be defined in your Roles & Responsibilities documentation). 
                        Update and review posted content regularly to verify that no CUI is posted. This control mostly falls under policy implementation. 
                        </div>"; 
                    }
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";      
            }
        }
        echo "</div></details>";
    }

    function L2AT(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Awareness and Training (AT)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'AT' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.2.1') && ($_SESSION['TrainingGeneral'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>It may be best to look toward external training solutions for general training. KnowBe4 is popular option</div>";
                    echo "<a href='https://training.knowbe4.com/app/modstore/public?lang=&od=Desc&op=tran&sui=34&toi=135&wasl=true' target='_blank' >KnowBe4 Modules</a>";
                    echo "<div class='assessmentResultTextBlockL2'>Due to training that is needed to accommodate your specific CUI policies, it may be wise to create your own training that follows the objectives above. 
                    Try to incorporate free resources posted by the DoD or NIST where possible</div>";
                    echo "<a href='https://securityawareness.dcsa.mil/cui/index.html' target='_blank' >DoD CUI Training Module</a></br>";
                    echo "<a href='https://www.defensesbirsttr.mil/Portals/122/Documents/CUI%20Training/CUI_Training_Template_Presentation_012722.pdf?ver=eRufxQuzNvFyUquMcWW6JQ%3D%3D' target='_blank' >DoD CUI Training Guide</a></br>";
                    echo "<a href='https://www.archives.gov/cui/training.html' target='_blank' >NIST CUI Training Archive</a></br>";
                }
                else if(($ControlID == 'L2-3.2.2') && ($_SESSION['TrainingRole'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Ensure that additional training is done at the Role level. This makes sure that each role is aware of what they are responsible for.</div></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Due to training that is needed to accommodate your specific CUI policies, it may be wise to create your own training that follows the objectives above. 
                    Try to incorporate free resources posted by the DoD or NIST where possible</div>";
                    echo "<a href='https://securityawareness.dcsa.mil/cui/index.html' target='_blank' >DoD CUI Training Module</a></br>";
                    echo "<a href='https://www.defensesbirsttr.mil/Portals/122/Documents/CUI%20Training/CUI_Training_Template_Presentation_012722.pdf?ver=eRufxQuzNvFyUquMcWW6JQ%3D%3D' target='_blank' >DoD CUI Training Guide</a></br>";
                    echo "<a href='https://www.archives.gov/cui/training.html' target='_blank' >NIST CUI Training Archive</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>To verify that each role can adequately carry out their tasks, perform training exercises such as 
                    tabletops, walk-throughs, or other simulations</div>";
                }
                else if(($ControlID == 'L2-3.2.3') && ($_SESSION['TrainingInsider'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that your training package includes information on insider threats. 
                    Here is a training module that may be useful to incorporate into your training</div></br>";
                    echo "<a href='https://securityawareness.dcsa.mil/cui/index.html' target='_blank' >DoD Insider Threat Training Module</a></br>";

                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";      
            }
        }
        echo "</div></details>";
    }

    function L2AU(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Audit and Accountability (AU)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'AU' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.3.1') && ($_SESSION['RecordLogging'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>It is recommended to have a SIEM tool that conducts logging within your system. 
                    Once that is configured make sure you keep track of what events are being logged and what is within each record: See the Following for SIEM recommendations</div>";
                    echo "<a href='https://www.crowdstrike.com/en-us/platform/next-gen-siem/' target='_blank' >CrowdStrike</a></br>";
                    echo "<a href='https://www.datadoghq.com/product/cloud-siem/' target='_blank' >DataDog</a></br>";
                    echo "<a href='https://www.splunk.com/en_us/products/enterprise-security-essentials.html' target='_blank' >Splunk</a></br>";
                    echo "<a href='https://wazuh.com/blog/wazuh-for-cmmc-compliance/' target='_blank' >Wazuh</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Note: When considering purchasing these products verify that you are receiving the FedRAMP Moderate or CMMC certified version</div>";
                }
                else if(($ControlID == 'L2-3.3.2') && ($_SESSION['RecordInfoID'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that within audit records your organization records who performed the action</div>";
                }
                else if(($ControlID == 'L2-3.3.3') && ($_SESSION['RecordReview'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Create a policy surrounding when to review logged events. 
                    Recommend: Do this weekly if possible. If your organization has fewer resources, monthly reviews may be acceptable. Assign roles to this task and update your logging metrics accordingly</div>";
                }
                else if(($ControlID == 'L2-3.3.4') && ($_SESSION['RecordReviewChanges'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Within your SIEM or logging system set up alerts for logging failures. This is standard across SIEM tools. Refer to guides for your SIEM to set this up. 
                    Many have integrations to alert via Email, Microsoft Teams, Slack, or other team communication applications. Verify that these alerts are set up to alert the specified roles to review audit logging failures.</div>";
                }
                else if(($ControlID == 'L2-3.3.5') && ($_SESSION['RecordReview'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define a process for reviewing audit logs and correlating with other mechanisms within your system. Develop a plan of action to follow If suspicious activity is detected. 
                    Break it down into who it needs to be notified (internal and external) and what process to follow. Start with an initial investigation and then, if needed, move on to IRP procedures.</div>";
                }
                else if(($ControlID == 'L2-3.3.6') && ($_SESSION['RecordLogging'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Most modern SIEMs are able to produce on-demand analysis view 3.3.1 recommendation for SIEMs</div>";
                }
                else if(($ControlID == 'L2-3.3.7')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'solely'){
                        echo "<div class='assessmentResultTextBlockL2'>Your IAAS provider likely points to Stratum 1 time servers</div>";
                    }else
                        echo "<div class='assessmentResultTextBlockL2'>Verify that your devices within your Authorizaiton Boundary align with NIST Stratum 1 Time Servers (Liekly already the case)</div>";
                    echo "<a href='https://www.cbtnuggets.com/blog/technology/networking/what-is-ntp-stratum' target='_blank' >What are Time Server Stratums</a></br>";
                }
                else if(($ControlID == 'L2-3.3.8') && ($_SESSION['LoggingTools'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Make logging tools and mechanisms only available to those who need to access them. 
                    Make this a subset of privileged users and define them in your Roles & Responsibilities documentation.</div>";
                }
                else if(($ControlID == 'L2-3.3.9') && ($_SESSION['LoggingTools'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Make logging tools and mechanisms only available to those who need to access them. 
                    Make this a subset of privileged users and define them in your Roles & Responsibilities documentation.</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";  
            }
        }
        echo "</div></details>";
    }

    function L2CM(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Configuration Management (CM)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'CM' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.4.1') && ($_SESSION['ConfigBaseline'] != 'Yes' || $_SESSION['Inventory'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Please verify that your system includes a system baseline and a system inventory. 
                    System baselines can be managed through Infrastructure as Code (IaC) files and software. The most notable example is Terraform:</div>";
                    echo "<a href='https://developer.hashicorp.com/terraform' target='_blank' >Terraform</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>System inventories must be a comprehensive list of all devices, software, 
                    and technologies within your environment. Please keep these up to date.</div>";
                }
                else if(($ControlID == 'L2-3.4.2') && ($_SESSION['ConfigBaseline'] != 'Yes' ||  $_SESSION['IDP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Please verify that all access to configuration settings and processes are only accessible by those with authorization.
                    Utilize the principle of least privilege as necessary.</div>";
                }
                else if(($ControlID == 'L2-3.4.3') && ($_SESSION['Ticketing'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>This control is most done through change management tickets. 
                    Tickets allow your organization to track, review, approve, and keep a log of and changes to the system.</div>";
                    echo "<a href='https://www.atlassian.com/software/jira' target='_blank' >Jira</a></br>";
                    echo "<a href='https://www.servicenow.com/' target='_blank' >ServiceNow</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Note: When considering purchasing these products verify that you are receiving the FedRAMP Moderate or CMMC certified version</div>";
                }
                else if(($ControlID == 'L2-3.4.4')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that your organization takes account of the security impact of any and all changes to the system.</div>";
                }
                else if(($ControlID == 'L2-3.4.5') && ($_SESSION['ConfigBaseline'] != 'Yes' ||  $_SESSION['IDP'] != 'Yes')){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] == 'Yes'){
                        echo "<div class='assessmentResultTextBlockL2'>Physical access restrictions to your system is covered by your IAAS provider.</div>";
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Please verify that physical access to your systems are restricted to only those with authorization 
                        (Badge readers, key cards, Security, Etc.)</div>";
                    }
                    echo "<div class='assessmentResultTextBlockL2'>Verify that only those with authorization have access to logical systems involving change management. 
                    Enforce this using Role-Based Access Control mechanisms and verify that authorizations are documented with your Roles & Responsibilities matrix.</div>";
                }
                else if(($ControlID == 'L2-3.4.6') && ($_SESSION['LeastFunc'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>The system must be designed in a way to follow the principle of Least Functionality. 
                    The system should not include components that are not necessary to its performance or security posture.</div>";
                }
                else if(($ControlID == 'L2-3.4.7') && ($_SESSION['LeastFunc'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define functionalities for all parts of the system. Identify use of essential and non-essential items as described above. 
                    Document these uses and keep the document up to date during configuration management reviews. This should be a part of your organization's configuration management policy.</div>";
                }
                else if(($ControlID == 'L2-3.4.8') && ($_SESSION['Whitelist'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Specify whether your system utilizes a blacklist (Allow all; Deny by exception) or whitelist (Deny all; Allow by exception) 
                    for software. Employ this using device management techniques for your operating systems.</div>";
                    echo "<a href='https://learn.microsoft.com/en-us/windows/security/application-security/application-control/app-control-for-business/applocker/applocker-overview' target='_blank' >Windows Applocker</a></br>";
                    echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html-single/selinux_users_and_administrators_guide/index' target='_blank' >SELinux</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Additional NIST guidance can be found below:</div>";
                    echo "<a href='https://nvlpubs.nist.gov/nistpubs/SpecialPublications/NIST.SP.800-167.pdf' target='_blank' >NIST Whitelisting Guide</a></br>";
                }
                else if(($ControlID == 'L2-3.4.9') && ($_SESSION['Whitelist'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Specify whether your system utilizes a blacklist (Allow all; Deny by exception) or whitelist (Deny all; Allow by exception) 
                    for software. Employ this using device management techniques for your operating systems. Verify that any software is monitored and is defined within your AU policies.</div>";
                    echo "<a href='https://learn.microsoft.com/en-us/windows/security/application-security/application-control/app-control-for-business/applocker/applocker-overview' target='_blank' >Windows Applocker</a></br>";
                    echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html-single/selinux_users_and_administrators_guide/index' target='_blank' >SELinux</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Additional NIST guidance can be found below:</div>";
                    echo "<a href='https://nvlpubs.nist.gov/nistpubs/SpecialPublications/NIST.SP.800-167.pdf' target='_blank' >NIST Whitelisting Guide</a></br>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";      
            }
        }
        echo "</div></details>";
    }

    function L2IA(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Identification and Authentication (IA)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'IA' ORDER BY right(Control_ID, 2)";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.5.1') && ($_SESSION['IDP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>This control is easily met through a major ID provider such as EntraID, Okta, or Auth0</div>";  
                    echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank'>EntraID</a></br>";
                    echo "<a href='https://www.okta.com/' target='_blank'>Okta</a></br>";
                    echo "<a href='https://auth0.com/' target='_blank'>Auth0</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>or this control can be met within proper management of Active Directory (Windows) or Kerberos (Linux; may require additional technical knowledge)</div>";  
                    echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html/system-level_authentication_guide/configuring_a_kerberos_5_server' target='_blank'>Kerberos Set-up</a></br>";
                }
                else if(($ControlID == 'L2-3.5.2') && ($_SESSION['IDP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>This control is easily met through a major ID provider such as EntraID, Okta, or Auth0</div>";  
                    echo "<a href='https://www.microsoft.com/en-us/security/business/identity-access/microsoft-entra-id' target='_blank'>EntraID</a></br>";
                    echo "<a href='https://www.okta.com/' target='_blank'>Okta</a></br>";
                    echo "<a href='https://auth0.com/' target='_blank'>Auth0</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>or this control can be met within proper management of Active Directory (Windows) or Kerberos (Linux; may require additional technical knowledge)</div>";  
                    echo "<a href='https://docs.redhat.com/en/documentation/red_hat_enterprise_linux/7/html/system-level_authentication_guide/configuring_a_kerberos_5_server' target='_blank'>Kerberos Set-up</a></br>";
                }
                else if(($ControlID == 'L2-3.5.3') && ($_SESSION['MultiFactor'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Implement multifactor authentications for all types of accounts. Recommended MFA providers listed below:</div>";  
                    echo "<a href='http://microsoft.com/en-us/security/mobile-authenticator-app' target='_blank'>Microsoft Authenticator</a></br>";
                    echo "<a href='https://www.okta.com/products/adaptive-multi-factor-authentication/' target='_blank'>Okta MFA</a></br>";
                    echo "<a href='https://duo.com/product/multi-factor-authentication-mfa' target='_blank'>Cisco DUO</a></br>";
                }
                else if(($ControlID == 'L2-3.5.4') && ($_SESSION['MultiFactor'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Implement multifactor authentications for all types of accounts. Recommended MFA providers listed below:</div>";  
                    echo "<a href='http://microsoft.com/en-us/security/mobile-authenticator-app' target='_blank'>Microsoft Authenticator</a></br>";
                    echo "<a href='https://www.okta.com/products/adaptive-multi-factor-authentication/' target='_blank'>Okta MFA</a></br>";
                    echo "<a href='https://duo.com/product/multi-factor-authentication-mfa' target='_blank'>Cisco DUO</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>All these MFA offerings can provide replay-resistant authentication mechanisms. 
                    Please refer to section B.4.2 for additional guidance on what counts as replay-resistance methods.</div>";
                    echo "<a href='https://pages.nist.gov/800-63-3-Implementation-Resources/63B/Authenticators/' target='_blank'>NIST Authenticators</a></br>";
                }
                else if(($ControlID == 'L2-3.5.5') && ($_SESSION['IDReuse'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Recommended: Identifiers should never be reused or deleted. Move inactive users into a “disabled” status. 
                    Users should be moved into the “disabled” upon request (due to termination or transfer) or after an inactivity period of ninety (90) days. This should be written into your organizational policies surrounding accounts and access.</div>";  
                }
                else if(($ControlID == 'L2-3.5.6') && ($_SESSION['IDReuse'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Recommended: Identifiers should never be reused or deleted. Move inactive users into a “disabled” status. 
                    Users should be moved into the “disabled” upon request (due to termination or transfer) or after an inactivity period of ninety (90) days. This should be written into your organizational policies surrounding accounts and access.</div>";  
                }
                else if(($ControlID == 'L2-3.5.7') && ($_SESSION['PasswordPolicy'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define password policies to fit your system needs and implement them upon account creation. An example can be seen below:</div>";  
                    echo "<div class='controlAssessmentTextBlockL2'>Password Length: 8+ Characters</br>
                    Must Include: At least one (1) special character; At least one (1) uppercase alphanumeric character; At least one (1) lowercase alphanumeric character</br>
                    Character Change: At least one (1) character</br>
                    Password History: Cannot be one (1) of the last fifteen (15) passwords</br>
                    </div>";
                }
                else if(($ControlID == 'L2-3.5.8') && ($_SESSION['PasswordPolicy'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Define password policies to fit your system needs and implement them upon account creation. An example can be seen below:</div>";  
                    echo "<div class='controlAssessmentTextBlockL2'>Password Length: 8+ Characters</br>
                    Must Include: At least one (1) special character; At least one (1) uppercase alphanumeric character; At least one (1) lowercase alphanumeric character</br>
                    Character Change: At least one (1) character</br>
                    Password History: Cannot be one (1) of the last fifteen (15) passwords</br>
                    </div>";
                }
                else if(($ControlID == 'L2-3.5.9')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that upon the use of a temporary password a user is prompted to change to a permanent 
                    password that follows your organizational password requirements.</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";
            }
        }
        echo "</div></details>";
    }

    function L2IR(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Incident Response (IR)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'IR' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.6.1') && ($_SESSION['IRP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Try to build an Incident Response Plan (IRP) that is tailored to your system and meets the above controls. Due to the complexity of this task, it is recommended to utilize guides and resources, or even a 3rd-party to build out a full IRP. Here are some resources to get started</div>";
                    echo "<a href='https://www.cisa.gov/sites/default/files/publications/Incident-Response-Plan-Basics_508c.pdf' target='_blank' >CISA IRP Basics</a></br>";
                    echo "<a href='https://www.crowdstrike.com/en-us/cybersecurity-101/incident-response/incident-response-steps/' target='_blank' >CrowdStrke IRP Frameworks and Steps</a></br>";
                    echo "<a href='https://www.paloaltonetworks.com/cyberpedia/incident-response-plan' target='_blank' >Palo Alto: What is an IRP?</a></br>";
                }
                else if(($ControlID == 'L2-3.6.2') && ($_SESSION['IRReporting'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that within your system's Incident Response plan that roles, individuals, and authority contact as established.
                    Keep track of all incidents (Ticketing system).</div>";
                }
                else if(($ControlID == 'L2-3.6.3') && ($_SESSION['Tabletop'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Test your systems incident response procedures at least annually. 
                    This is mostly done through tabletop, walkthrough, or simulation exercises. Here are few resources to get you started:</div>";
                    echo "<a href='https://www.cisa.gov/sites/default/files/publications/Cybersecurity-Tabletop-Exercise-Tips_508c.pdf' target='_blank' >CISA: Tabletop Exercises Tips</a></br>";
                    echo "<a href='https://www.cisa.gov/resources-tools/services/cisa-tabletop-exercise-packages' target='_blank' >CISA: Tabletop Exercises</a></br>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";
            }
        }
        echo "</div></details>";
    }

    function L2MA(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Maintenance (MA)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'MA' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.7.1') && ($_SESSION['Maintenance'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Maintenance should be performed regularly. 
                    Please keep track of any firmware, hardware of software updates, patches, or fixes</div>";
                }
                else if(($ControlID == 'L2-3.7.2') && ($_SESSION['IAASUsage'] != 'Solely') && ($_SESSION['RolesMatrix'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Utilize the principle of least privilege. 
                    All tools, techniques, mechanisms, and personnel are controlled (logically and physically). 
                    Utilize access permission and card readers to restrict access.</div>";
                }
                else if(($ControlID == 'L2-3.7.3') && ($_SESSION['Offsite'] == 'Yes' && $_SESSION['IAASUsage'] != 'Solely')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Before leaving your facility, verify that all CUI is removed. Utilize drive wiper such as:</div>";
                    echo "<a href='https://dban.org/' target='_blank' >DBaN</a></br>";  
                }
                else if(($ControlID == 'L2-3.7.4') && ($_SESSION['MalCodeScan'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All unknown diagnostic and test programs should be checked for malicious code. 
                    See scanning for more information.</div>";
                }
                else if(($ControlID == 'L2-3.7.5') && (($_SESSION['MultiFactor'] != 'Yes') || ($_SESSION['RemoteSecure'] != 'Yes')) ){
                    assessmentObj($ControlID);
                    if($_SESSION['MultiFactor'] != 'Yes'){
                        echo "<div class='assessmentResultTextBlockL2'>Verify all remote sessions utilize MFA. See IA for more information</div>";
                    }
                    if($_SESSION['RemoteSecure'] != 'Yes'){
                        echo "<div class='assessmentResultTextBlockL2'>All remote sessions should terminate after inactivity. See AC for more information</div>";
                    }
                }
                else if(($ControlID == 'L2-3.7.6') && (($_SESSION['IAASUsage'] != 'Soley') || ($_SESSION['RecordLogging'] != 'Yes'))){
                    assessmentObj($ControlID);
                    if($_SESSION['IAASUsage'] != 'Soley'){
                        echo "<div class='assessmentResultTextBlockL2'>Escort all visitors including those contracted to perform maintenance activities</div>";
                    }
                    if($_SESSION['RecordLogging'] != 'Yes'){
                        echo "<div class='assessmentResultTextBlockL2'>Every action should be monitored during remote sessions. 
                        This includes guest maintenance personnel. See AU for more information on logging.</div>";
                    }
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";
            }
        }
        echo "</div></details>";
    }

    function L2MP(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Media Protection (MP)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'MP' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.8.1') && ($_SESSION['IAASUsage'] != 'Solely')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>It is recommended to physically lock up devices within your systems authorization boundary. 
                    Additionally, only allow access to authorized individuals.</div>";
                    if($_SESSION['Paper'] != 'No'){
                        echo "<div class='assessmentResultTextBlockL2'>Verify that all printed media is kept in secure areas.</div>";
                    }
                }
                else if(($ControlID == 'L2-3.8.2') && (($_SESSION['IAASUsage'] != 'Solely' && $_SESSION['RolesMatrix'] != 'Yes'))){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Utilize the principle of least privilege. 
                    Only those with need to access CUI on system media should use it. Document this in your roles and responsibilities matrix</div>";
                }
                else if(($ControlID == 'L2-3.8.3') && ($_SESSION['IAASUsage'] != 'Solely' && $_SESSION['Sanitize'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlock'>Verify that all devices are wiped before reuse or disposal. 
                    This control is easily met through popular drive wipers such as Darik's Boot and Nuke (DBaN).</div>";  
                    echo "<a href='https://dban.org/' target='_blank' >DBaN</a></br>";  
                }
                else if(($ControlID == 'L2-3.8.4')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Any and all CUI must be marked. Follow these guides for proper marking of CUI:</div>";
                    echo "<a href='https://www.archives.gov/files/cui/20161206-cui-marking-handbook-v1-1.pdf' target='_blank' >National archives CUI Handbook</a></br>";  
                    echo "<a href='https://www.archives.gov/cui/additional-tools' target='_blank' >CUI archives</a></br>";  
                    if($_SESSION['IAASUsage'] != 'Solely'){
                        echo "<div class='assessmentResultTextBlockL2'>If media containing CUI leaves the system authorization boundary keep a custody record of all transportation</div>";
                    }
                }
                else if(($ControlID == 'L2-3.8.5') && ($_SESSION['SecureRest'] != 'Solely')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>If media containing CUI leaves the system authorization boundary keep a custody record of all transportation</div>";
                }
                else if(($ControlID == 'L2-3.8.6') && ($_SESSION['SecureRest'] != 'Solely')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>If media containing CUI leaves the system authorization boundary keep a custody record of all transportation</div>";
                }
                else if(($ControlID == 'L2-3.8.7')){
                    assessmentObj($ControlID);
                    if ($_SESSION['RemovableDevices'] != 'special'){
                        echo "<div class='assessmentResultTextBlockL2'>You do not utilize removable devices,this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Create policies surrounding the use of removable devices that contain CUI. Recommended: Heavily restrict external use of removable devices, 
                        this can create risk for your organization. Stick to least functionality principles and only mandate what is required for the system to function.
                        </div>"; 
                    }
                }
                else if(($ControlID == 'L2-3.8.8')){
                    assessmentObj($ControlID);
                    if ($_SESSION['RemovableDevices'] != 'special'){
                        echo "<div class='assessmentResultTextBlockL2'>You do not utilize shared media,this control is not applicable
                        </div>";  
                    }else{
                        echo "<div class='assessmentResultTextBlockL2'>Create policies surrounding the use of removable devices that contain CUI. Recommended: Heavily restrict external use of removable devices, 
                        this can create risk for your organization. Stick to least functionality principles and only mandate what is required for the system to function.
                        </div>"; 
                    }
                }
                else if(($ControlID == 'L2-3.8.9') && ($_SESSION['IAASUsage'] != 'Solely')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Backup CUI must be protected physically and logically. 
                    This includes securing access to the physical data storage device and utilizing NIST 140 cryptographic methods. 
                    Access should only be given to roles that need access, always follow principles of least privilege.</div>";  
                    echo "<a href='https://www.cisa.gov/sites/default/files/publications/data_backup_options.pdf' target='_blank' >CISA 3-2-1 Recommendation</a></br>";  
                    echo "<div class='assessmentResultTextBlockL2'>Note: If your backup is hosted within a cloud service, this control should be inherited, 
                    verify this by viewing your service agreement(s) with your data backup cloud provider</div>";  
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";
            }
        }
        echo "</div></details>";
    }

    function L2PS(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Personnel Security (PS)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'PS' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.9.1') && ($_SESSION['Screening'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>It is important to screen personnel according to your organization’s policies. 
                    Additionally, some authoring parties have specific requirements (i.e. U.S residents only)</div></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Your organization’s HR department likely already uses employee screening mechanisms, 
                    verify that employees are being screened for everything that is outlined</div>";
                }
                else if(($ControlID == 'L2-3.9.2') && ($_SESSION['Termination'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>In the case of employee termination all accounts associated with that user need to be disabled.
                    This process should be documented along with timelines of when the accounts are deactivated. </br> </br>Recommended: Accounts should be disabled by the end of the employee's last day,
                    Any equipment given to that employee should be remotely locked at the end of the employee's last day and returned or shipped for return within the week.</div>";

                    echo "</br><div class='assessmentResultTextBlockL2'>Write this into a policy and enact it when this occurs. 
                    (It may be best to create a ticket template for this, if possible)</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed</div>";
            }
        }
        echo "</div></details>";
    }

    function L2PE(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Physical Protection (PE)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'PE' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.10.1') && ($_SESSION['PhysicalAccess'] != 'Yes')){ // no PE related var can be set if IAASusage == 'solely'
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All doors, cabinets, lockboxes, server racks, etc. 
                    should be locked and only accessible to those with access.</div>";
                }
                else if(($ControlID == 'L2-3.10.2') && ($_SESSION['PhysicalAccess'] != 'Yes') && ($_SESSION['PhysicalMonitor'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All doors, cabinets, lockboxes, server racks, etc. 
                    should be locked and only accessible to those with access.</div></br>";
                    echo "<div class='assessmentResultTextBlockL2'>These areas should be monitored 24/7 by surveillance cameras. 
                    Camera records should be kept for an organizationally defined period. Recommended three (3) months.</div>";
                }
                else if(($ControlID == 'L2-3.10.3') && ($_SESSION['PhysicalGuest'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Visitors should be escorted at all times by an authorized staff member.</div>";
                }
                else if(($ControlID == 'L2-3.10.4') && ($_SESSION['PhysicalLogs'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Sign-in logs and access card logs should be kept for the same time as your logical authorization logs.
                    Verify that these logs are included in your logging retention policies.</div>";
                }
                else if(($ControlID == 'L2-3.10.5') && ($_SESSION['PhysicalAccess'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All doors, cabinets, lockboxes, server racks, etc. 
                    should be locked and only accessible to those with access. All of these must be accounted for and reviewed at least annually.</div>";
                }
                else if(($ControlID == 'L2-3.10.6') && ($_SESSION['AltSite'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>An alternate site must be configured in case of emergenices. 
                    It must meet the same controls as the main site.</div></br>";
                    echo "<div class='assessmentResultTextBlockL2'>For small businesses it is highly recommended to use IAAS for this reason. IAAS services have automatic backup sites,
                    making this control entirely inherited.</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed.</div>";
            }
        }
        echo "</div></details>";
    }

    function L2RA(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Risk Assessment (RA)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'RA' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.11.1') && ($_SESSION['RiskAssessment'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Risk management can look very different from organization to organization to is 
                    best to create your own policy for risk assessments. Reviews addressing risk management should happen at least monthly. Here are some resources to get you started:</div>";
                    echo "<a href='https://nvlpubs.nist.gov/nistpubs/Legacy/SP/nistspecialpublication800-30r1.pdf' target='_blank' >NIST Risk Assessments</a></br>";  
                    echo "<a href='https://www.cisa.gov/sites/default/files/c3vp/crr_resources_guides/CRR_Resource_Guide-RM.pdf' target='_blank' >CISA Risk Management Guide</a></br>";  
                }
                else if(($ControlID == 'L2-3.11.2') && ($_SESSION['VulnScan'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Vulnerability scans should be performed on all applications and organizational systems, at a defined frequency. 
                    Recommended: at least weekly</div>";
                    echo "<a href='https://nvlpubs.nist.gov/nistpubs/Legacy/SP/nistspecialpublication800-30r1.pdf' target='_blank' >Qualys Vulnerability Management</a></br>"; 
                    echo "<a href='https://www.tenable.com/products/vulnerability-management' target='_blank' >Tenable Vulnerability Management</a></br>"; 
                    echo "<a href='https://www.lansweeper.com/lp/vulnerability-assessment/' target='_blank' >Lansweeper (local host)</a></br>"; 
                }
                else if(($ControlID == 'L2-3.11.3') && ($_SESSION['VulnRemedy'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Recommended: Every vulnerability should be tracked within the vulnerability scanning platform or in a ticket.
                    Verify that all vulnerabilities are addressed at risk assessment sessions, and are completed in that timeframe established</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed.</div>";
            }
        }
        echo "</div></details>";
    }

    function L2CA(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>Security Assessment (CA)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'CA' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                // if(($ControlID == 'L2-3.12.1')){ //CMMC l2 reassess controls every three years, they will always pass this control, this just needs to be written up in their SSP
                //     assessmentObj($ControlID);
                // }
                if(($ControlID == 'L2-3.12.2') && ($_SESSION['POAM'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>To track vulnerabilities a POA&M must be kept. It is recommended to follow FedRAMP’s guidance on this</div>";
                    echo "<a href='https://www.fedramp.gov/resources/documents/rev4/REV_4_FedRAMP-POAM-Template.xlsm' target='_blank' >FedRAMP POA&M Template (Will Download)</a></br>"; 
                }
                else if(($ControlID == 'L2-3.12.3') && ($_SESSION['ControlAssessment'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All security controls must be monitored on a regular basis. 
                    This usually occurs during POA&M reviews or during preparation for reassessment. 
                    Controls must match what your organization is currently doing, and some may require fine tuning. 
                    This control and its severity varies from organization to organization</div>";
                }
                else if(($ControlID == 'L2-3.12.4') && ($_SESSION['SSP'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Your SSP must be updated and approved by the applicable authorities. 
                    Creation of an SSP is outside the scope of CMMC Fledge. 
                    It is recommended that you reach out to a 3rd party if you are not sure about the implementation of an SSP.</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed.</div>";
            }
        }
        echo "</div></details>";
    }

    function L2SC(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>System and Communications Protection (SC)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'SC' ORDER BY right(Control_ID, 2)";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.13.1') && ($_SESSION['BoundaryDiagram'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlock'>FedRAMP, though not CMMC, has great guidance on what to add within a boundary diagram! (FedRAMP is far more strict than CMMC)</div>";  
                    echo "<a href='https://www.fedramp.gov/resources/documents/CSP_A_FedRAMP_Authorization_Boundary_Guidance_Draft_For_Public_Comment%20_V3.0.docx' target='_blank' >FedRAMP Boundary Diagram Guidelines (Will download .Docx)</a>";  
                }
                else if(($ControlID == 'L2-3.13.2') && ($_SESSION['LeastFunc'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Architectural designs and software development should be done in a way that promotes security. This mostly pertains to the principle of least functionality. 
                    These less your system can do, generally, the smaller the attack surface.</div>";
                }
                else if(($ControlID == 'L2-3.13.3') && ($_SESSION['RolesSoD'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Create and define Roles & Responsibilities. Verify that these responsibilities enforce Separation of Duties best practice. 
                    Upon defining these roles, enforce it within your system and restrict access to resources accordingly.</div>";
                }
                else if(($ControlID == 'L2-3.13.4') && ($_SESSION['IAASUsage'] == 'Solely')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All components should be logically separated from the rest of the system (VLANs)</div>";
                }
                else if(($ControlID == 'L2-3.13.5') && ($_SESSION['PubSep'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All publicly access accessible components should be logically separated from the rest of the system (VLANs)</div>";
                }
                else if(($ControlID == 'L2-3.13.6') && ($_SESSION['LeastFunc'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>As a part of the least functionality principle only communications in use should be allowed. 
                    Create a whitelist and write a Deny all accept by exception policy.</div>";
                }
                else if(($ControlID == 'L2-3.13.7')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Split tunneling should not be allowed. This can be fixed with VPNs</div>";
                }
                else if(($ControlID == 'L2-3.13.8') && ($_SESSION['SecureTransit'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All data in transit should be secure by FIPS-140 cryptographic modules. 
                    View the Fledge dictionary for more information on FIPS-140</div>";
                }
                else if(($ControlID == 'L2-3.13.9') && ($_SESSION['RemoteSecure'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that all network connections can be timed out after a certain period or other defined cutoffs. 
                    Recommended: After fifteen (15) minutes of inactivity require reauthentication; after one (1) hour of inactivity terminate the session; or when prompted by the user.</div>";
                }
                else if(($ControlID == 'L2-3.13.10')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Verify that all cryptographic keys are securely stored within your environment, here are some resources:</div>";
                    echo "<a href='https://nvlpubs.nist.gov/nistpubs/SpecialPublications/NIST.SP.800-175Br1.pdf' target='_blank' >NIST Crypto Standards</a></br>"; 
                    echo "<a href='https://nvlpubs.nist.gov/nistpubs/SpecialPublications/NIST.SP.800-57pt1r5.pdf' target='_blank' >NIST Key Management</a></br>"; 
                }
                else if(($ControlID == 'L2-3.13.11') && ($_SESSION['SecureTransit'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All data in transit should be secure by FIPS-140 cryptographic modules. 
                    View the Fledge dictionary for more information on FIPS-140</div>";
                }
                else if(($ControlID == 'L2-3.13.12')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>To avoid extensive questioning on the use of collaborative computing devices, the CMMC Fledge assessment did not cover this control. 
                    It is recommended that you determine if your system contains collaborative computing devices. These include, cameras, microphones, keyboards, mice, etc.</div>";
                }
                else if(($ControlID == 'L2-3.13.13') && ($_SESSION['LoggingTools'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Mobile devices and mobile codes should be controlled and monitored, 
                    implement system logging functionality for mobile code and control its access. This should be written into your access control, and logging policies.</div>";
                }
                else if(($ControlID == 'L2-3.13.14') && ($_SESSION['LoggingTools'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>VoIP should be controlled and monitored, 
                    implement system logging functionality for VoIP and control its access. This should be written into your access control, and logging policies</div>";
                }
                else if(($ControlID == 'L2-3.13.15') && ($_SESSION['SecureTransit'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All data in transit should be secure by FIPS-140 cryptographic modules. 
                    View the Fledge dictionary for more information on FIPS-140</div>";
                }
                else if(($ControlID == 'L2-3.13.16') && ($_SESSION['SecureRest'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>All data at rest should be secure by FIPS-140 cryptographic modules. 
                    View the Fledge dictionary for more information on FIPS-140</div>";
                }
                else
                    echo "<div class='assessmentResultTextBlockL2'>You likely have this control covered. No Action Needed.</div>";
            }
        }
        echo "</div></details>";
    }

    function L2SI(){
        include '../Include/DBConnect.php';
        echo "<div class='resultFamilyBox'>";
        echo "<details><summary><div class='resultFamilyNameL2'>System and Information Integrity (SI)▾</div></summary>";
        $Query_CMMC_Controls = "SELECT * FROM cmmc_controls WHERE LEFT(Control_ID, 1) != 'B' && Control_Family = 'SI' ORDER BY Control_ID";
        $result = $conn->query($Query_CMMC_Controls );
        if ($result->num_rows > 0) {
            while($getCMMCControl = $result->fetch_assoc()) {
                $ControlName = $getCMMCControl['Control_Name'];
                $ControlID = $getCMMCControl['Control_ID'];
                echo "<div class='resultControlNameL2'>" . ltrim($ControlID,'L2-') . " - $ControlName</div>";
                if(($ControlID == 'L2-3.14.1') && ($_SESSION['Flaw'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlock'>This control is easily met through flaw monitoring tools</div>";  
                    echo "<a href='https://www.datadoghq.com/' target='_blank' >DataDog</a></br>";
                    echo "<a href='https://www.microsoft.com/en-us/security/business/siem-and-xdr/microsoft-sentinel' target='_blank' >Microsoft Sentinel</a></br>";
                    echo "<a href='https://www.splunk.com/' target='_blank' >Splunk</a></br>";
                    echo "<div class='assessmentResultTextBlock'>This can be paired with XDR tools or your response teams to meet this control. Start by defining time frames! (This is best done by criticality of the flaw)</div>";
                }
                else if(($ControlID == 'L2-3.14.2') && ($_SESSION['MalCodeProt'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malicious Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
                    echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
                    echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
                    echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
                }
                else if(($ControlID == 'L2-3.14.3') && ($_SESSION['SecurityAdvisory'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>Security alerts are extremely important to stay informed within the world of security. 
                    It is important to be notified when security alerts are disseminated. Most of these security alerts can be integrated within your flaw remediation tools. 
                    Some of these advisories are:</div>";
                    echo "<a href='https://nvd.nist.gov/' target='_blank' >NIST</a></br>";
                    echo "<a href='https://msrc.microsoft.com/update-guide' target='_blank' >Microsoft</a></br>";
                    echo "<a href='https://access.redhat.com/security/security-updates/' target='_blank' >Redhat</a></br>";
                    echo "<a href='https://www.debian.org/security/' target='_blank' >Debian</a></br>";
                    echo "<a href='https://www.cisa.gov/news-events/cybersecurity-advisories' target='_blank' >CISA</a></br>";
                }
                else if(($ControlID == 'L2-3.14.4') && ($_SESSION['MalCodeUpdate'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malicious Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
                    echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
                    echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
                    echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
                }
                else if(($ControlID == 'L2-3.14.5') && ($_SESSION['MalCodeScanAuto'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlock'>This control is easily met through an major Malicious Code Scanner Platform such as Qualys, PaloAlto, or CrowdStrike</div>";  
                    echo "<a href='https://www.qualys.com/enterprise-trurisk-platform/' target='_blank' >Qualys</a></br>";
                    echo "<a href='https://www.paloaltonetworks.com/' target='_blank' >PaloAlto</a></br>";
                    echo "<a href='https://www.crowdstrike.com/en-us/' target='_blank' >CrowdStrike</a></br>";
                }
                else if(($ControlID == 'L2-3.14.6') && ($_SESSION['RecordLogging'] != 'Yes')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>It is recommend to have a SIEM tool that conducts logging within your system. 
                    Once that is configured make sure you keep track of what events are being logged and what is within each record: See the Following for SIEM recommendations</div>";
                    echo "<a href='https://www.crowdstrike.com/en-us/platform/next-gen-siem/' target='_blank' >CrowdStrike</a></br>";
                    echo "<a href='https://www.datadoghq.com/product/cloud-siem/' target='_blank' >DataDog</a></br>";
                    echo "<a href='https://www.splunk.com/en_us/products/enterprise-security-essentials.html' target='_blank' >Splunk</a></br>";
                    echo "<a href='https://wazuh.com/blog/wazuh-for-cmmc-compliance/' target='_blank' >Wazuh</a></br>";
                    echo "<div class='assessmentResultTextBlockL2'>Note: When considering purchasing these products verify that you are receiving the FedRAMP Moderate or CMMC certified version</div>";
                }
                else if(($ControlID == 'L2-3.14.7')){
                    assessmentObj($ControlID);
                    echo "<div class='assessmentResultTextBlockL2'>This control is primarily policy. Create an Acceptable Use policy, or Rules of Behavior policy
                    and define the difference between authorized and unauthorized use of the system</div>";
                }
            }
        }
        echo "</div></details>";
    }
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
                <div class = "pageTitle">Assessment Results!</div>
                <div class = "pageSubTitle">Congratulations on Completing the Assessment!</div>
                <div class = "pageSubTitle">For your upcoming <?php echo $_SESSION['CMMCCertType'];?> assessment you may need to look into:</div>
                <?php echo PickOutput();?>
                </br>
            </div>
        </div>
            
        <div class = "homeFooter"> <b>NOTICE:</b> This is a student designed system. All information found within the CMMC Fledge System or related systems are for informational purposes only. 
            This is a student project and shall not be used as a substitute for professional advice. Use this system at your own risk.
        </div>

    </body>
</html>