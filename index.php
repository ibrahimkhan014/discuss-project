<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Discuss Project: A platform for asking and answering questions.">
   <title>Discuss Project</title>
   <?php include('./client/commonFiles.php'); ?>
</head>

<body>
   <?php
   session_start();
   include('./client/header.php');

   if (isset($_GET['signup']) && !isset($_SESSION['user']['username'])) {
      $signupPath = './client/signup.php';
      if (file_exists($signupPath)) {
         include($signupPath);
      } else {
         echo "Error: The signup page is not available.";
      }

   } else if (isset($_GET['login']) && !isset($_SESSION['user']['username'])) {
      $loginPath = './client/login.php';
      if (file_exists($loginPath)) {
         include($loginPath);
      } else {
         echo "Error: The login page is not available.";
      }

   } else if (isset($_GET['ask'])) {
      $askPath = './client/ask.php';
      if (file_exists($askPath)) {
         include($askPath);
      } else {
         echo "Error: The ask page is not available.";
      }

   } else if (isset($_GET['q-id'])) {
      $qid = intval($_GET['q-id']);
      $questionDetailsPath = './client/question-details.php';
      if (file_exists($questionDetailsPath)) {
         include($questionDetailsPath);
      } else {
         echo "Error: The question details page is not available.";
      }

   } else if (isset($_GET['c-id'])) {
      $cid = intval($_GET['c-id']);
      include('./client/questions.php');

   } else if (isset($_GET['u-id'])) {
      $uid = intval($_GET['u-id']);
      include('./client/questions.php');

   } else if (isset($_GET['latest'])) {
      include('./client/questions.php');

   } else if (isset($_GET['search'])) {
      $search = htmlspecialchars($_GET['search']);
      include('./client/questions.php');

   } else {
      include('./client/questions.php');
   }
   ?>
</body>

</html>
