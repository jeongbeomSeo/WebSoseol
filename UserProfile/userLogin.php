<?php
  $con = mysqli_connect('miminishin.cafe24.com','miminishin','s7731731','miminishin');
  $userID = $_POST['userID'];
  $userPassword = $_POST['userPassword'];
  $sql = "SELECT * FROM USERPROFILE WHERE userID = '$userID' ";
  $result = mysqli_query($con,$sql);

  $row = mysqli_fetch_array($result);

  if($userID == $row[0] && password_verify($userPassword,$row[1])) {
    session_start();
    $_SESSION['userID'] = $userID;
    echo '<script>alert("로그인 성공");location.replace("../index.php");</script>';
  }
  else {
    echo '<script>alert("아이디나 비밀번호가 일치하지 않습니다.");location.replace("userLogin.html");</script>';
  }
 ?>
