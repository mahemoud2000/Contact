    <?php 
            // Check if user coming from A Request

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Assign Variables
                $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
                $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
                // Creating  Array of Errors

/* Print All Variables in Page

                echo $user. '<br>';
                echo $mail. '<br>';
                echo $cell. '<br>';
                echo $msg. '<br>';

*/
            $formErrors = array();

                if (strlen($user) <= 3) {
                    $formErrors[] = 'Username Must be Larger Than <strong>3</strong> Characters';
                }

                if (strlen($msg) < 10) {   
                    $formErrors[] = 'Meesage Can\'t be Less Than <strong>10</strong> Characters';
                }

                // If No Errors Send The Email [mail(To, Subject, Message, Headers, Parameters)]

                $headers = 'Form' . $mail . '\r\n';
                $myEmail = 'mahemoudabouelsaoud@gmail.com';
                $subject = 'Contact Form';
                if (empty($formErrors)) {

                    mail($myEmail, $subject, $msg, $headers);
                }
            }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contact.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Contact</title>
</head>

<body>
<!-- Start Form -->
<div class="container">

            <h1 class="text-center">Contact Me</h1>

            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                    <?php if (! empty($formErrors)) { ?>

                        <div class="alert alert-danger alert-dismissible" role="start">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php
                                        foreach($formErrors as $error) {
                                            echo $error . '<br />';
                                        }
                                ?>
                        </div>
                            <?php }?>

                    <div class="form-group">
                        <input class="form-control username" type="text" name="username" placeholder="Type Your Username"
                            value="<?php if (isset($user)) {echo $user;}?>" />

                            <i class="fa fa-user"></i>

                            <span class="asterisx">*</span>

                            <div class="alert alert-danger custom-alert">
                            Username Must be Larger Than <strong>3</strong> Characters
                            </div>
                    </div>

                    <div class="form-group">

                            <input class="email form-control" type="email" name="email" placeholder="Please Type a Valid Email"
                            value="<?php if (isset($mail)) {echo $mail;}?>">

                            <i class="fa fa-home"></i>

                            <span class="asterisx">*</span>
                        
                            <div class="alert alert-danger custom-alert">
                            Email Cant't Be <strong>Empty</strong>
                            </div>
                    </div>

                    <div class="form-group">

                            <input class="form-control cell-phone" type="text" name="cellphone" placeholder="Type Your cell Phone"
                            value="<?php if (isset($cell)) {echo $cell;}?>">

                            <i class="fa fa-phone fa-fw"></i>
                            
                            <span class="asterisx">*</span>

                            <div class="alert alert-danger custom-alert">
                            Your Phone Must Be Larger Than <strong>11</strong> Characters
                            </div>
                    </div>

                    <div class="form-group">
                            <textarea class="message form-control" name="message" placeholder="Your Message"><?php if (isset($msg)) {echo $msg;}?></textarea>
                        
                            <span class="asterisx">*</span>
                            
                            <div class="alert alert-danger custom-alert">
                                Message Can't Be Less Than <strong>10</strong>Characters
                            </div>
                    </div>

                    <input class="btn btn-success " type="submit" value="Send Message">
                    <i class="fa fa-send fa-fw send-icone"></i>
            </form>
</div>
<!-- End Form -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>