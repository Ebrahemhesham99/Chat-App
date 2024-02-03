<?php
session_start();
include_once "configuration.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);
if (!empty($_POST['fname'] && $_POST['lname'] && $_POST['email'] && $_POST['pass'])) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "Select email FROM users WHERE email = '{$email}' ");
        if (mysqli_num_rows($sql) > 0) { //check if email already exists
            echo "$email you have entered is already exists !  ";
        } else {
            if (isset($_FILES['img'])) {
                $img_name = $_FILES['img']['name']; //getting user uploaded image name
                $img_tmp = $_FILES['img']['tmp_name']; //this temporary name is used 
                //explode image and get the extension of the image 
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $extension = ['jpg', 'png', 'jpeg']; // the extensions of image expected from user 
                if (in_array($img_ext, $extension) === true) {
                    $time = time();
                    $new_image_name =  $time . $img_name ; 
                    /*
                time used for rename user img folder with current time so that 
                all the images will have unique names .....
                */
                    if (move_uploaded_file($img_tmp, "../images/user_img/".$new_image_name)) {
                        $status = "Active now"; // once user sign up the status will be changed to active now
                        $random_id =rand($time,10000000);
                        //insert the data the user has logged in the form into the database
                        $sql_2 = mysqli_query($conn,"INSERT INTO `users`(`unique_id`,`fname`,`lname`,`email`,`password`,
                        `img`,`status`)
                        VALUES ('{$random_id}','{$fname}','{$lname}','{$email}',
                        '{$password}','{$new_image_name}',
                        '{$status}')");
                        if($sql_2){
                            $sql_3 = mysqli_query($conn , "SELECT *  FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql_3)>0){
                                $row = mysqli_fetch_assoc($sql_3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                            else{
                                echo "something went wrong !";
                            }
                        }
                    }
                } else {
                    echo "please select an image extension from 'jpg,jpeg or png'";
                }
            } else {
                echo "please select an image file ";
            }
        }
    } else {
        echo "$email is not a valid email address";
    }
} else {
    echo "Error: All inputs must be filled";
}
