<!DOCTYPE html>
<html>
<head>
    <title>Contact Orion</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <img id="background" src="images/orion-nebula_2000x2000.jpg" alt="" />
    <?php include "navigation_menu-main.html"; ?>
    <div class="spacer-100"></div>
    <?php
        if(isset($_POST["submit"])) {
            //set up variables for easier code readability
            $name = $_POST["name"];
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            $errorMessage = "Invalid characters entered in your:<br />";
            $emailMessage = "Form details from personal website:\n\n";
            $wrongEmail = "";
            $wrongOther = "";

            //set up string checks
            $emailCheck = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
            $stringCheck = "/^[A-Za-z .'-?!$,:()\n\r]+$/";

            //check inputs
            if(!preg_match($stringCheck, $name)) {
                $errorMessage .= "<br />Name";
                $wrongOther = "TRUE";
            }
            if(!preg_match($emailCheck, $email)) {
                $errorMessage .= "<br />Email Address";
                $wrongEmail = "TRUE";
            }
            if(!preg_match($stringCheck, $subject)) {
                $errorMessage .= "<br />Subject Line";
                $wrongOther = "TRUE";
            }
            if(!preg_match($stringCheck, $message)) {
                $errorMessage .= "<br />Message";
                $wrongOther = "TRUE";
            }

            //if there are any errors, list them and show form with current info
            if(strlen($errorMessage) > strlen("Invalid characters entered in your:<br />")) {
                $errorMessage .= "<br />";
                if($wrongEmail == "TRUE") {
                    $errorMessage .= "<br />In your email address please only use  . _ % - @";
                }
                if($wrongOther == "TRUE") {
                    $errorMessage .= "<br />In your name, subject, and message please only use   ' - ? ! $ ( ) . : ; < >";
                }
                ?>
                <div class="content">
                    <div class="center">
                        <h1 class="thin-border" id="large">Contact Me</h1>
                    </div>
                </div>
                <div class="content-reactive">
                    <?php echo "<div style = 'font: 16px Arial;'>" . $errorMessage . "</div>"; ?>
                </div>
                <div class="content">
                    <form action="contact.php" method="POST" class="contact">
                        <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required><br />
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required><br />
                        <input type="text" name="subject" placeholder="Subject" value="<?php echo $subject; ?>" required><br />
                        <textarea name="message" placeholder="Message" required><?php echo $message; ?></textarea>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
                <?php
            //if there were not any errors, submit email and show thank you
            } else {

                //clean string function
                function cleanString($string) {
                    $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                    return str_replace($bad,"",$string);
                }

                //apply clean string to email
                $emailMessage .= "Name: " . cleanString($name) . "\n";
                $emailMessage .= "Email: " . cleanString($email) . "\n";
                $emailMessage .= "Subject: " . cleanString($subject) . "\n";
                $emailMessage .= "Message: " . cleanString($message) . "\n";

                //create email headers for mail function
                $headers = "From: " . $email . "\r\n" . "Reply-To: " . $email . "\r\n" . "X-Mailer: PHP/" . phpversion();
                mail("jared.orion.selcoe@gmail.com", $subject, $message, $headers);

                //show thank you message
                ?>
                <div class="content">
                    <div class="center">
                        <h1 class="thin-border" id="large">Thanks for reaching out!</h1>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="content">
                <div class="center">
                    <h1 class="thin-border" id="large">Contact Me</h1>
                </div>
            </div>
            <div class="content-reactive">
                <form action="contact.php" method="POST" class="contact">
                    <input type="text" name="name" placeholder="Name" required><br />
                    <input type="email" name="email" placeholder="Email" required><br />
                    <input type="text" name="subject" placeholder="Subject" required><br />
                    <textarea name="message" placeholder="Message" required></textarea>
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        <?php } ?>
    <a class="button-link" href="https://www.linkedin.com/pub/jared-selcoe/33/26a/ab3" target="_blank">
        <div class="content-reactive">
            <div class="center">
                <img src="images/linkedin.png" width="100px" height="100px" alt="Jared's LinkedIn" />
            </div>
        </div>
    </a>
