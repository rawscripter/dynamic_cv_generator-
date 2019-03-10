<?php 
require_once('app/init.php');


// print_r($_POST);

// basic info
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];


// profile 
$profile_title = $_POST['profile_title'];
$profile_des = $_POST['profile_des'];


// //skills
$skill = $_POST['skills'];
$skills = json_encode($skill);


// experience
$exp['ex_company'] = $_POST['ex_company'];
$exp['ex_deg'] = $_POST['ex_deg'];
$exp['ex_start'] = $_POST['ex_start'];
$exp['ex_end'] = $_POST['ex_end'];
$exp['ex_job_des'] = $_POST['ex_job_des'];

$experience = json_encode($exp);





// education info
$edu['deg'] = $_POST['edu_deg'];
$edu['edu_inst'] = $_POST['edu_inst'];
$edu['edu_group'] = $_POST['edu_group'];
$edu['edu_gpa'] = $_POST['edu_gpa'];
$edu['edu_start'] = $_POST['edu_start'];
$edu['edu_end'] = $_POST['edu_end'];

$education = json_encode($edu);


$sql = "INSERT INTO `cv_genarator`(`first_name`, `last_name`, `gender`, `email`, `phone`, `profile_title`, `profile_des`, `skills`, `experience`, `education`) VALUES (:first_name,:last_name,:gender,:email,:phone,:profile_title,:profile_des,:skills,:experience,:education)";
$sth = $pdo->prepare($sql);
$sth->bindParam('first_name',$first_name);
$sth->bindParam('last_name',$last_name);
$sth->bindParam('gender',$gender);
$sth->bindParam('email',$email);
$sth->bindParam('phone',$phone);
$sth->bindParam('profile_title',$profile_title);
$sth->bindParam('profile_des',$profile_des);
$sth->bindParam('skills',$skills);
$sth->bindParam('experience',$experience);
$sth->bindParam('education',$education);
$sth->execute();
$id =  $pdo->lastInsertId();


$page = 'cv/index.php?cv='.$id;

header("location: $page");



?>

