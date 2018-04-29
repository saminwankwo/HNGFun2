<?php
/**
 * Created by PhpStorm.
 * User: oluwapelumi
 * Date: 4/29/18
 * Time: 5:52 PM
 */

require 'db.php';

$fullnameError = "";
$username = "";
$emailError = "";
$nationalityError = "";
$cityError = "";
$phoneError = "";
$passwordError = "";


if(isset($_POST['submit']) && isset($_FILES["file"]["type"])){

    //Data Sanitization and Validation
    if($_POST['fullname'] != ""){
        $_POST['fullname'] = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
        if ($_POST['fullname'] == ""){
            $fullnameError = "<span class='invalid'>Please enter your fullname.</span>";
        }
    }

    // username
    if($_POST['username'] != ""){
        $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        if ($_POST['username'] == ""){
            $usernameError = "<span class='invalid'>Please enter a username.</span>";
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

    // city
    if($_POST['city'] != ""){
        $_POST['city'] = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        if ($_POST['city'] == ""){
            $cityError = "<span class='invalid'>Please choose your city.</span>";
        }
    }// password
    if($_POST['password'] != ""){
        $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if ($_POST['password'] == ""){
            $passwordError = "<span class='invalid'>Please enter a password.</span>";
        }
    }

    // valid phone number
    if($_POST['phonenumber'] != ""){
        $_POST['phonenumber'] = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
        if($_POST['phonenumber'] == ""){
            $phoneError = "<span class='invalid'>Please enter a valid phone number</span>";
        }
    }

    //Insert Data into users_data Database
    if ($fullnameError == "" && $usernameError == ""
        && $emailError == "" && $nationalityError == ""
        && $cityError == "" && $phoneError == ""
        && $passwordError == "") {


        //Insert user's Data
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $nationality = $_POST['nationality'];
        $city = $_POST['city'];
        $password = $_POST['password'];

        $intern_data = array(':fullname' => $fullname,
            ':username' => $username,
            ':phonenumber' => $phonenumber,
            ':email' => $email,
            ':nationality' => $nationality,
            ':city' => $city,
            ':password' => $password
        );

        $query = 'INSERT INTO users_data ( fullname, username, phonenumber, email, nationality, city, password)
              VALUES (
                  :fullname,
                  :username,
                  :phonenumber,
                  :email,
                  :nationality,
                  :city,
                  :password
              );';

        try {
            $q = $conn->prepare($query);
            if ($q->execute($intern_data) == true) {
                $success = true;
            };
        } catch (PDOException $e) {
            throw $e;
        }

    }
}