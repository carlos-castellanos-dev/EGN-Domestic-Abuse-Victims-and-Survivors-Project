<?php
    $server = "localhost" ;
    $username = "root" ;
    $password = "" ;
    $dbname = "entry_form" ;
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
    $conn = new mysqli($server, $username, $password, $dbname);
    if($conn-> connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into form(
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
