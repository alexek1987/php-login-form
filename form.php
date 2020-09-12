
<link rel="stylesheet" href="style.css">

<?php
  $upper_case = "ABCDEFGHIKLMNOPQRSTVXYZ";
  $lower_case = "abcdefghiklmnopqrstvxyz";
  $digit = " 1234567890";
  $special_characters = " !?@#$%^&*.+=-";

  if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['email_repeated']) && isset($_POST['country']) && isset($_POST['language']) && isset($_POST['password']) && isset($_POST['password_repeated'])) {
    if(!empty($_POST['full_name']) || !empty($_POST['email']) || !empty($_POST['email_repeated']) || !empty($_POST['country']) || !empty($_POST['language']) || !empty($_POST['password']) || !empty($_POST['password_repeated'])) {
      $password = $_POST['password'];
      $password_repeated = $_POST['password_repeated'];
      if ($password == $password_repeated) {
        if(strlen($password) >= 10) {
          $upper_case_score = 0;
          $lower_case_score = 0;
          $digit_score = 0;
          $special_characters_score = 0;
          for($i = 0; $i<strlen($password); $i++) {
            if(strpos($upper_case, $password[$i]) == true) {
              $upper_case_score++;
            }
            if(strpos($lower_case, $password[$i]) == true) {
              $lower_case_score++;
            }
            if(strpos($digit, $password[$i]) == true) {
              $digit_score++;
            }
            if(strpos($special_characters, $password[$i]) == true) {
              $special_characters_score++;
            }
          }
          if($upper_case_score !=0 && $lower_case_score !=0 && $digit_score !=0 && $special_characters_score !=0) {
            echo "
            <div class=custom-alert-success>
              <h5>Yay! 🎉 you successfully signed in to our service.</h5>
            </div>
            ";
          } else {
            echo "
            <div class=custom-alert-warning>
              <h5>Mmh 🤔 seems like you didn't include at least one uppercase letter, lowercase letter, digit and symbol</h5>
            </div>
            ";
          }
        } else {
          echo "
          <div class=custom-alert-danger>
            <h5> Oops! 😱 a problem has occurred: Password must contain at least 10 characters</h5>
           </div>
          ";
        }
      } else {
        echo "
        <div class=custom-alert-danger>
          <h5>Oops! 😱 a problem has occurred: Passwords are not identical, watch it sausage fin </h5>
        </div>
        ";
      }
    } else {
      echo "
      <div class=custom-alert-danger>
        <h5>Oops! 😱 a problem has occurred: Please fill in all the fields </h5>
      </div>
      ";
    }
  } else {
    echo "
    <div class=custom-alert-danger>
      <h5>Oops! 😱 a problem has occurred: Wrong data passed. </h5>
    </div>
    ";
  }
 ?>