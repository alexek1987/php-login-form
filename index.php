
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Sign up form</title>
  <script defer src="script.js"></script>
</head>
<body>
  <div class="form-validation-container">
    <?php
    $upper_case = " ABCDEFGHIKLMNOPQRSTVXYZ";
    $lower_case = " abcdefghiklmnopqrstvxyz";
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
              <div class='custom-alert-success'>
              <h5>Yay! 🎉 you successfully signed in to our service.</h5>
              </div>
              <script>location.href='application.php';</script>;
              ";
            } else {
              echo "
              <div class='custom-alert-warning'>
              <h5>Mmh 🤔 seems like you didn't include at least one uppercase letter, lowercase letter, digit and symbol! </h5>
              </div>
              ";
            }
          } else {
            echo "
            <div class='custom-alert-danger'>
            <h5> Oops! 😱 a problem has occurred: password must contain at least 10 characters! </h5>
            </div>
            ";
          }
        } else {
          echo "
          <div class='custom-alert-danger';>
          <h5>Oops! 😱 a problem has occurred: passwords are not identical, watch it sausage fingers! </h5>
          </div>
          ";
        }
      } else {
        echo "
        <div class='custom-alert-danger'>
        <h5>Oops! 😱 a problem has occurred: please fill in all the fields! </h5>
        </div>
        ";
      }
    } else {
      echo "
      <div class='custom-alert-danger'>
      <h5>Oops! 😱 a problem has occurred: wrong data passed. You better check yourself! </h5>
      </div>
      ";
    }
    ?>
  </div>
  <div class="page-container">
    <div class="form-container">
      <form action="" method="POST" id="form">
        <h5>Full name</h5>
        <input type="text" name="full_name" required>

        <h5>Email</h5>
        <input type="text" name="email" id="email">

        <h5>Confirm Email</h5>
        <input type="text" name="email_repeated" id="email_repeated">

        <h5>Country</h5>
        <select id="country" name="country">
          <option >Please select</option>
        </select>

        <h5>Language</h5>
        <select id="language" name="language" >
          <option >Please select</option>
        </select>

        <h5>Password</h5>
        <input type="text" name="password">

        <h5>Confirm Password</h5>
        <input type="text" name="password_repeated">

        <button type="submit" class="sign-up-button">Sign up</button>

        <div id="error"></div>
      </form>
    </div>
  </div>
</body>
</html>
