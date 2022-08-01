<head>
<meta http-equiv="refresh" content="2;url=index.html">
</head>

<?php
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		function post_captcha($user_response) {
			$fields_string = '';
			$fields = array(
				'secret' => '6LdfeJ0gAAAAAGjVArTnEp1yaVCBbYa0gDR-AJgL',
				'response' => $user_response
			);
			foreach($fields as $key=>$value)
			$fields_string .= $key . '=' . $value . '&';
			$fields_string = rtrim($fields_string, '&');

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

			$result = curl_exec($ch);
			curl_close($ch);

			return json_decode($result, true);
		}

		
		$rerres = post_captcha($_POST['g-recaptcha-response']);

		if (!$rerres['success']) {
			
			echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
			echo $rerres['error-codes'];
			
		} 
		else {
			
				if (isset($_POST['vfirstName']) && isset($_POST['vlastName'])) {
				include 'connect.php';

				function validate($data){
			
				return $data;
				}

				$vfirstName = validate($_POST['vfirstName']);
				$vlastName = validate($_POST['vlastName']);
				$vJudgesName = validate($_POST['vJudgesName']);
				$vLawyersname = validate($_POST['vLawyersname']);
				

				//--------------- chris's variables ----------------
				$address_1 = validate($_POST['address_1']);
				$city = validate($_POST['city']);
				$state_1 = validate($_POST['state_1']);
				$zip = validate($_POST['zip']);
				$county = validate($_POST['county']);
				$phone = validate($_POST['phone']);
				$email = validate($_POST['email']);
				$dob = validate($_POST['dob']);
				$reporter_gender = validate($_POST['reporter_gender']);
				$experiences = validate($_POST['experiences']);
				$experiencesEncoded = json_encode($experiences);
				$name_of_court = validate($_POST['name_of_court']);
				$county_of_court = validate($_POST['county_of_court']);
				$state_of_court = validate($_POST['state_of_court']);
				$docket_number = validate($_POST['docket_number']);
				$other_partys_attorney = validate($_POST['other_partys_attorney']);
				$attorney_for_children = validate($_POST['attorney_for_children']);
				$custody_petition = validate($_POST['custody_petition']);
				$witness_testify = validate($_POST['witness_testify']);
				$evidence = validate($_POST['evidence']);
				$evidenceEncoded = json_encode($evidence);
				$other_parent_gender = validate($_POST['other_parent_gender']);
				$alienation = validate($_POST['alienation']);
				$alienationEncoded = json_encode($alienation);
				//----------------------new variables added-------------------
				$vchildWelfare = validate($_POST['vchildWelfare']);
				$vyouinvestigatorClaim = validate($_POST['vyouinvestigatorClaim']);
				$votherparentClaim = validate($_POST['votherparentClaim']);
				$vparentalAlienation = validate($_POST['vparentalAlienation']);
				$vacceptEvidence = validate($_POST['vacceptEvidence']);
				$vcourtAcknowledge = validate($_POST['vcourtAcknowledge']);
				$vsupervisedVisitation = validate($_POST['vsupervisedVisitation']);
				$vpaysupervisedVisitation = validate($_POST['vpaysupervisedVisitation']);
				$vpaymentPrevention = validate($_POST['vpaymentPrevention']);
				$vawardedlegalCustody = validate($_POST['vawardedlegalCustody']);
				$vawardedphysicalCustody = validate($_POST['vawardedphysicalCustody']);
//

				if (empty($vlastName) || empty($vfirstName)) {
					header("Location: experience.html");
				}else {

					$sql = "INSERT INTO test(vfirstName, vlastName, address_1, city, state_1, zip, county, phone, email, dob, reporter_gender, name_of_court, county_of_court, state_of_court, vJudgesName, docket_number, vLawyersname, other_partys_attorney, attorney_for_children, custody_petition, witness_testify, other_parent_gender, vchildWelfare, vyouInvestigatorClaim, votherparentClaim,  vparentalAlienation, vacceptEvidence, vcourtAcknowledge, vsupervisedVisitation, vpaysupervisedVisitation, vpaymentpPrevention, vawardedlegalCustody, vawardedphysicalCustody) VALUES('$vfirstName', '$vlastName', '$address_1', '$city', '$state_1', '$zip', '$county' ,'$phone','$email', '$dob', '$reporter_gender', '$name_of_court', '$county_of_court', '$state_of_court', '$vJudgesName', '$docket_number', '$vLawyersname', '$other_partys_attorney', '$attorney_for_children' , '$custody_petition' , '$witness_testify' , '$other_parent_gender' , '$vchildWelfare' , '$vyouinvestigatorClaim' , '$votherparentClaim' , '$vparentalAlienation' , '$vacceptEvidence' , '$vcourtAcknowledge' , '$vsupervisedVisitation' , '$vpaysupervisedVisitation' , '$vpaymentPrevention' , '$vawardedlegalCustody' , '$vawardedphysicalCustody')";
					$res = mysqli_query($conn, $sql);
					
					foreach($experiences as $item){
					$experiencessql = "INSERT INTO test (experiences) VALUES  ('$item')";
					$res2 = mysqli_query($conn,$experiencessql);
					}
					foreach($evidence as $evidenceitem){
						$evidencesql = "INSERT INTO test (evidence) VALUES  ('$evidenceitem')";
						$res3 = mysqli_query($conn,$evidencesql);
					}

					foreach($alienation as $alienationitem){
						$alienationsql = "INSERT INTO test (alienation) VALUES  ('$alienationitem')";
						$res4 = mysqli_query($conn,$alienationsql);
					} 

					if ($res || $res2 || $res3 || $res4) {
						echo "Your message was sent successfully!";
					}else {
						echo "Your message could not be sent!";
						echo $sql . mysqli_error($conn);
						
					}
				}

			}else {
				header("Location: index.html");
			}

		
		}

	}
?>