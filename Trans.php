
<?php


$q1 = $_POST['Social_Group'];
$q2 = $_POST['Attitude'];
$q3 = $_POST['Demographic'];


if ($q3 == "Gender") {
    include 'tessaescharlesworth.github.io/Gender.html';

} elseif ($q3 == "Age") {
    include 'tessaescharlesworth.github.io/Age.html';
}
  elseif ($q3 == "Education") {
     include 'tessaescharlesworth.github.io/Education.html';
}
  elseif ($q3 == "Political_Ideology") {
     include 'tessaescharlesworth.github.io/Political_Ideology.html';
}
  else {
     include 'tessaescharlesworth.github.io/Race.html';
     
    
}
?>
 
