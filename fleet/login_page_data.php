<?php
// Always start this first
session_start();
include("database_info.php");

// LOGIN USER
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if (!empty($username) && !empty($password)) 
  {

    $password = base64_encode($password);

    $query = "SELECT * FROM users WHERE username='$username' AND passwords='$password'";

    $results = mysqli_query($con, $query);

    $count = mysqli_num_rows($results);

    while ($row = mysqli_fetch_array($results)) 
    {

      $userId = $row['userId'];

      $username = $row['username'];

      $userType = $row['userType'];

      $lastDateSignedIn = $row['lastDateSignedIn'];
      
    }


    if ($count > 0) 
    {
      
      $_SESSION['username'] = $username;
      $_SESSION['userId'] = $userId;
      $_SESSION['lastDateSignedIn'] = $lastDateSignedIn;
      $uname = $_SESSION['username'];
      $_SESSION['success'] = "You are now logged in";
        
      if ($userType == 'district') 
      {
        
        if($password != 'MTIzNDU2')
        {         
          $dateSignedIn = date("F j, Y");
          $insert = "UPDATE users SET lastDateSignedIn = '$dateSignedIn' WHERE userId = '$userId'";
          $results = mysqli_query($con, $insert);
          header('location: district/dashboard.php');
        }
        else
        {
          header('location: district/change_default_password.php');
        }
      }  
      else if ($userType == 'branch') 
      {
        if($password != 'MTIzNDU2')
        {
          $dateSignedIn = date("F j, Y");
          $insert = "UPDATE users SET lastDateSignedIn = '$dateSignedIn' WHERE userId = '$userId'";
          $results = mysqli_query($con, $insert);
          header('location: branch/dashboard.php'); 
        }
        else
        {
          header('location: branch/change_default_password.php');
        }
      }
      elseif ($userType == 'IBD') 
      {
          $dateSignedIn = date("F j, Y");
          $insert = "UPDATE users SET lastDateSignedIn = '$dateSignedIn' WHERE userId = '$userId'";
          $results = mysqli_query($con, $insert);
          header('location: IBD/dashboard.php');
      } 
      elseif ($userType == 'Admin1') 
      {
          $dateSignedIn = date("F j, Y");
          $insert = "UPDATE users SET lastDateSignedIn = '$dateSignedIn' WHERE userId = '$userId'";
          $results = mysqli_query($con, $insert);
          header('location: admin/dashboard.php');
      } 
      else 
      {
        header('location: index.php?general_error=Username or Password Incor!');
      } 
    } 
    else 
    {
      header('location: index.php?general_error=Username or Password Incorrect!');
    } 
  }
else
{
  if(empty($username))
  {
    header('location: index.php?username_error=Username Required!');
  }
  elseif(empty($password))
  {
    header('location: index.php?password_error=Password Required!');
  }
  else{
    header('location: index.php?general_error=Username or Password Required!');
  }

}
}