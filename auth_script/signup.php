<?php
/**
 * Created by PhpStorm.
 * User: oluwapelumi
 * Date: 4/29/18
 * Time: 5:52 PM
 */
$firstnameError = "";
$lastnameError = "";
$usernameError = "";
$emailError = "";
$nationalityError = "";
$stateError = "";
$phoneError = "";
$passwordError = "";
$confirmPasswordError = "";


if(isset($_POST['submit']) && isset($_FILES["file"]["type"])){

    //Data Sanitization and Validation
    if($_POST['firstname'] != ""){
        $_POST['firstname'] = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        if ($_POST['firstname'] == ""){
            $lastnameError = "<span class='invalid'>Please enter your firstname.</span>";
        }
    }

        //Data Sanitization and Validation
    if($_POST['lastname'] != ""){
        $_POST['lastname'] = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        if ($_POST['lastname'] == ""){
            $lastnameError = "<span class='invalid'>Please enter your lastname.</span>";
        }
    }

    //Data Sanitization and Validation
    if($_POST['username'] != ""){
        $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        if ($_POST['username'] == ""){
            $usernameError = "<span class='invalid'>Please enter your username.</span>";
        }
    }

    // email
    if($_POST['email'] != ""){
        $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        if ($_POST['email'] == ""){
            $emailError = "<span class='invalid'>Please enter a email.</span>";
        }
    }

    // nationality
    if($_POST['nationality'] != ""){
        $_POST['nationality'] = filter_var($_POST['nationality'], FILTER_SANITIZE_STRING);
        if ($_POST['nationality'] == ""){
            $nationalityError = "<span class='invalid'>Please choose your nationality.</span>";
        }
    }

    // state
    if($_POST['state'] != ""){
        $_POST['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
        if ($_POST['state'] == ""){
            $stateError = "<span class='invalid'>Please choose your city.</span>";
        }
    }

    // password
    if($_POST['password'] != ""){
        $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if ($_POST['password'] == ""){
            $passwordError = "<span class='invalid'>Please enter a password.</span>";
        }
    }

    // confirm_password
    if($_POST['confirm_password'] != ""){
        $_POST['confirm_password'] = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
        if ($_POST['confirm_password'] == ""){
            $confirmPasswordError = "<span class='invalid'>Please enter a password.</span>";
        }

        if ($_POST['confirm_password'] != $_POST['password']) {
            $confirmPasswordError = "<span class='invalid'>Password mismatch, please enter the same password.</span>";
        }
    }

    // valid phone number
    if($_POST['phone'] != ""){
        $_POST['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        if($_POST['phone'] == ""){
            $phoneError = "<span class='invalid'>Please enter a valid phone number</span>";
        }
    }

    //Insert Data into users_data Database
    if ($firstnameError == "" && $lastnameError == "" && $usernameError == ""
        && $emailError == "" && $nationalityError == ""
        && $stateError == "" && $phoneError == ""
        && $passwordError == "" && $confirmPasswordError == "") {

        //Insert user's Data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $phonenumber = $_POST['phone'];
        $email = $_POST['email'];
        $nationality = $_POST['nationality'];
        $city = $_POST['state'];
        $password = $_POST['password'];

        $intern_data = array(':firstname' => $firstname,
            ':lastname' => $lastname,
            ':username' => $username,
            ':phonenumber' => $phonenumber,
            ':email' => $email,
            ':nationality' => $nationality,
            ':city' => $city,
            ':password' => $password
        );

        var_dump('I got here');
        die;

        $query = 'INSERT INTO users_data ( firstname,lastname, username, phonenumber, email, nationality, city, password)
              VALUES (
                  :firstname,
                  :lastname,
                  :username,
                  :phonenumber,
                  :email,
                  :nationality,
                  :city,
                  :password
              );';

        try {
            $q = $connection->prepare($query);
            if ($q->execute($intern_data) == true) {
                $success = true;
            };
        } catch (PDOException $e) {
            throw $e;
        }

    }
}