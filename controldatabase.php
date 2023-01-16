<?php
    session_start();
    require "connection.php";
    $errors = array();

    $msgx="";

    //REGISTER//
    if(isset($_POST['register']))
    {
        $msgx="";
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password1']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['password2']);

        if($password != $cpassword)
        {
            $errors['password'] = "Confirm password not matched!";
            $msgx="Confirm password not matched!";
        }

        $email_check = 'SELECT * From account WHERE email="'.$email.'"';
        $res_check = mysqli_query($conn, $email_check);
        $num_of_row = mysqli_num_rows($res_check);

        date_default_timezone_set("ASIA/DHAKA");
        $current_date = date('Y-m-d H:i:s');

        if($num_of_row > 0)
        {
            $errors['email'] = "This Email already REGISTER";
        }

        if(count($errors) == 0)
        {
            $xpassword = password_hash($password, PASSWORD_BCRYPT);
            $verificationCode = rand(999999, 111111);
            $status = 0;

            $sqla= "INSERT INTO account (username,email,password,code,status,created_date,updated_date)
            VALUES('".$username."', '".$email."', '".$xpassword."', '".$verificationCode."', '".$status."', '".$current_date."', '".$current_date."')";
            $check= mysqli_query($conn, $sqla);

            if($check)
            {
                header('location: Account.php');
                $msgx="Successfully REGISTER";
            }
            else
            {
                $errors['db-error'] = "Failed by inserting data into database!";
                $msgx="Something Wrong";
            }
        }
    }


    //LOGIN//
    if(isset($_POST['login']))
    {
        $lusername = mysqli_real_escape_string($conn, $_POST['log_username']);
        $lemail = mysqli_real_escape_string($conn, $_POST['log_email']);
        $lpassword = mysqli_real_escape_string($conn, $_POST['log_password']);

        $sqlb= "SELECT * FROM account WHERE email = '".$lemail."'";
        $res = mysqli_query($conn, $sqlb);

        if(mysqli_num_rows($res) > 0)
        {
            $fetch = mysqli_fetch_assoc($res);
            $fetch_password = $fetch['password'];
            if(password_verify($lpassword, $fetch_password))
            {
                $_SESSION['username'] = $lusername;
                $_SESSION['email'] = $lemail;
                $_SESSION['password'] = $lpassword;

                $row=mysqli_fetch_array($res);
                $_SESSION['created_date'] = $row['created_date'];
                $_SESSION['update_date'] = $row['update_date'];
                header('location: Profile.php');
            }
            else
            {
                $errors['email'] = "Incorrect email or password!";
                $msgx="Incorrect Email or Password";
            }
        }
        else
        {
            $errors['email'] = "You're not yet a member! Please REGISTER!!";
            $msgx="You're not yet a member! Please REGISTER!!";
        }
    }


?>