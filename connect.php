<?php
    $vfirstName = $_POST['vfirstName'];
    $vlastName = $_POST['vlastName'];
    $vEmail = $_POST['vEmail'];
    $vNumber = $_POST['vNumber'];
    $cpfirstName = $_POST['cpfirstName'];
    $cplastName = $_POST['cplastName'];
    $cpEmail = $_POST['cpEmail'];
    $cpNumber = $_POST['cpNumber'];
    $date = $_POST['date'];
    $listName = $_POST['listName'];
    $experience = $_POST['experience'];
    $outcome = $_POST['outcome'];
    $other = $_POST['other'];

    //Database Connection
    $conn = new mysqli('ls-3ddf96afc758a0f6cdeaa24ce90edcf1d293a292.cdmnpinl6gyw.us-east-1.rds.amazonaws.com','dbmasteruser','VDG+}8WMuM+[KM5TBNEJyVN98hSJ1R)Z','dbmaster')
    if($conn-> connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into submission(
        vfirstName,
        vlastName,
        vEmail,
        vNumber,
        cpfirstName,
        cplastName,
        cpEmail,
        cpNumber,
        date,
        listName,
        experience,
        outcome,
        other)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisssiissss",$vfirstName, $vlastName, $vEmail, $vNumber, $cpfirstName,             $cplastName, $cpEmail, $cpNumber, $date, $listName, $experience, $outcome, $other);
        $stmt->execute();
        echo "Submission Succesful...";
        $stmt->close();
        $conn->close();
    }
        

?>