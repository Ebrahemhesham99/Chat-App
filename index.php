<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="shortcut icon" href="chat-favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="wrapper">
        <section class="form sign-up">
            <header>Real time Chat App</header>
            <form action="#" enctype="multipart/form-data" >
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="fname">First name :</label>
                        <input type="text" id="fname" name="fname" placeholder="Your first name ..." required>
                    </div>
                    <div class="field input">
                        <label for="lname">Last name :</label>
                        <input type="text" id="lname" name="lname" placeholder="Your last name ..." required>
                    </div>
                </div>
                <div class="field input">
                    <label for="email">Email Address :</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="field input">
                    <label for="pass">password :</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="img">select an image</label>
                    <input type="file" id="img" name="img" required>
                </div>
                <div class="field button">
                    <input type="submit" id="submit" name="submit" value="continue to chat">
                </div>
            </form>
            <div class="link">Already signed up ?<a href="login.php" class="">Login now</a></div>
        </section>
    </div>
    <script src="js/password.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>