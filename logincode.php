<?php
session_start();
include('db.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $run = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email' AND `password`='$pass' AND `category` ='Admin'");

    if (mysqli_num_rows($run) > 0) {
        // echo "login";
        foreach ($run as $data) {
            $id = $data['user_id'];
            $fname = $data['firstname'];
            $lname = $data['lastname'];
            $email = $data['email'];
            $contact = $data['contact'];
            $pass = $data['password'];
            $category = $data['category'];
            $status = $data['status'];
        }
        $_SESSION['login'] = true;
        $_SESSION['Admin'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $id,
            'firstname' => $fname,
            'lastname' => $lname,
            'email' => $email,
            'contact' => $contact,
            'password' => $pass,
            'category' => $category,
            'status' => $status,
        ];
        // echo $_SESSION['auth_user']['Name'];
        header("location: admin/index.php");
    } else {
        $run = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email' AND `password`='$pass' AND `category` ='Teacher'");

        if (mysqli_num_rows($run) > 0) {
            // echo "login";
            foreach ($run as $data) {
                $id = $data['user_id'];
                $fname = $data['firstname'];
                $lname = $data['lastname'];
                $email = $data['email'];
                $contact = $data['contact'];
                $pass = $data['password'];
                $category = $data['category'];
                $status = $data['status'];
                $subject = $data['subject'];
            }
            $_SESSION['login'] = true;
            $_SESSION['Teacher'] = 'true';
            $_SESSION['auth_user'] = [
                'user_id' => $id,
                'firstname' => $fname,
                'lastname' => $lname,
                'email' => $email,
                'contact' => $contact,
                'password' => $pass,
                'category' => $category,
                'status' => $status,
                'subject' => $subject,
            ];
            // echo $_SESSION['auth_user']['Name'];
            header("location: admin/index.php");
        } else {
            $run = mysqli_query($con, "SELECT * FROM student WHERE `email`='$email' AND `pass`='$pass' AND `category` ='Student'");
    
        if (mysqli_num_rows($run) > 0) {
                // echo "login";
                foreach ($run as $data) {
                    $id = $data['id'];
                    $name = $data['name'];
                    $email = $data['email'];
                    $contact = $data['contact'];
                    $pass = $data['pass'];
                    $category = $data['category'];
                    $age = $data['age'];
                    $class = $data['class'];
                    $teach_id = $data['teacher_id'];
                }
                $_SESSION['login'] = true;
                $_SESSION['Student'] = 'true';
                $_SESSION['auth_user'] = [
                    'id' => $id,
                    'name' => $fname,
                    'email' => $email,
                    'contact' => $contact,
                    'pass' => $pass,
                    'category' => $category,
                    'age' => $age,
                    'class' => $class,
                    'teacher_id' => $teach_id,
            ];
                header("location: admin/index.php");
            } else {
                $run = mysqli_query($con, "SELECT * FROM parent WHERE `email`='$email' AND `password`='$pass' AND `category` ='Parents'");
        
            if (mysqli_num_rows($run) > 0) {
                    foreach ($run as $data) {
                        $id = $data['id'];
                        $fname = $data['firstname'];
                        $lname = $data['lastname'];
                        $email = $data['email'];
                        $contact = $data['contact'];
                        $pass = $data['password'];
                        $category = $data['category'];
                        $status = $data['status'];
                        $student_id = $data['student_id'];
                    }
                    $_SESSION['login'] = true;
                    $_SESSION['Parents'] = 'true';
                    $_SESSION['auth_user'] = [
                        'id' => $id,
                        'firstname' => $fname,
                        'lastname' => $lname,
                        'email' => $email,
                        'contact' => $contact,
                        'password' => $pass,
                        'category' => $category,
                        'status' => $status,
                        'student_id' => $student_id,
                ];
                    header("location: admin/index.php");
        }
        else{
            $_SESSION['errormsg'] = "Invalid Email or Password";
            header("location: login.php");
        }
    }
}
    }
}