<?php
session_start();
include("../common/db.php");
print_r($_POST);

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $address = $_POST['address'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $user = $conn->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES (NULL, ?, ?, ?, ?)");
    $user->bind_param("ssss", $username, $email, $hashed_password, $address);
    
    $result = $user->execute();
    if ($result) {
        $_SESSION["user"] = [
            "username" => $username,
            "email" => $email,
            "user_id" => $user->insert_id
        ];
        header("Location: /discuss");
        exit;
    } else {
        echo "New user is not registered";
    }

} elseif (isset($_POST['login'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_regenerate_id(true);
            $_SESSION["user"] = [
                "username" => $row['username'],
                "email" => $email,
                "user_id" => $row['id']
            ];
            header("Location: /discuss");
            exit;
        } else {
            echo "Invalid login credentials.";
        }
    } else {
        echo "Invalid login credentials.";
    }

} elseif (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: /discuss");
    exit;

} elseif (isset($_POST["answer"])) {
    $answer = $_POST['answer'];
    $question_id = intval($_POST['question_id']);
    $user_id = $_SESSION['user']['user_id'];

    if ($answer && $question_id && $user_id) {
        $query = $conn->prepare("INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) VALUES (NULL, ?, ?, ?)");
        $query->bind_param('sii', $answer, $question_id, $user_id);

        $result = $query->execute();
        if ($result) {
            header("Location: /discuss?q-id=$question_id");
            exit;
        } else {
            echo "Answer submission failed.";
        }
    } else {
        echo "Please provide all required fields.";
    }

} elseif (isset($_POST["ask"])) {
    $question_title = $_POST['title'];
    $question_description = $_POST['description'];
    $user_id = $_SESSION['user']['user_id'];

    if ($question_title && $question_description && $user_id) {
        $query = $conn->prepare("INSERT INTO `questions` (`id`, `title`, `description`, `user_id`) VALUES (NULL, ?, ?, ?)");
        $query->bind_param('ssi', $question_title, $question_description, $user_id);

        $result = $query->execute();
        if ($result) {
            header("Location: /discuss");
            exit;
        } else {
            echo "Question submission failed.";
        }
    } else {
        echo "Please fill in all fields.";
    }

} elseif (isset($_GET["delete"])) {
    $qid = intval($_GET["delete"]);
    $query = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $query->bind_param('i', $qid);
    $result = $query->execute();
    if ($result) {
        header("Location: /discuss");
        exit;
    } else {
        echo "Question deletion failed.";
    }
}
?>
