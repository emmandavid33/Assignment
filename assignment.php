<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$firstnameErr = $lastnameErr = $emailErr = $phonenumberErr = "";
$firstname = $lastname = $email  = $phonenumber = $id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    if (!preg_match("/^[a-z]*$/",$firstname)) {
      $firstnameErr = "Only letters allowed";
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    if (!preg_match("/^[a-z]*$/",$lastname)) {
      $lastnameErr = "Only letters allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["phonenumber"])) {
    $phonenumber = "Phone number is required";
  } else {
    $phonenumber = test_input($_POST["phonenumber"]);
    if (!preg_match("/^[0-9]*$/",$phonenumber)) {
      $phonenumberErr = "Invalid URL";
    }    
  }
}

function test_input($data) {
  $data = trim($data);
  return $data;
}
?>

<h2>Full Stack Apprentice Assignment</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="https://webhook.site/afe7fa7d-f0ac-4087-a54b-8e58f341ef9c">  
  First Name: <input type="text" name="firstname">
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lastname">
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone Number: <input type="text" name="phonenumber">
  <span class="error">* <?php echo $phonenumberErr;?></span>
  <input type="hidden" name="id" value=<?php echo md5($email);?>>
  <br><br>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>