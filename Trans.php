<?php


$q1 = $_POST['Social_Group'];
$q2 = $_POST['Attitude'];
$q3 = $_POST['Demographic'];


if ($q3 == "Gender") {
    include 'Gender.php';

} elseif ($q3 == "Age") {
    include 'Age.php';
}
  elseif ($q3 == "Education") {
     include 'Education.php';
}
  elseif ($q3 == "Political_Ideology") {
     include 'Political_Ideology.php';
}
  else {
     include 'Race.php';
     
    
}
?>
