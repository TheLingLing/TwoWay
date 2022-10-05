<?php
if(isset($_POST['email']) && $_POST['url'] == '') {
    $email_to = "info@twowaydogwalking.com";
    $email_subject = "Two Way Website Contact Form";
    $email_from = $_POST['email']; // required
    $fullname = $_POST['fullname']; // required
    $message = $_POST['message']; // not required

    function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
    }

    $email_message = "Form details below.\n\n";
    $email_message .= "Name: ".clean_string($fullname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($email_to, $email_subject, $email_message, $headers);
?>
  <!-- include your own success html here -->
    <body>
        
        <center>
            <img src="img/navbarnt.png" class="nav-img" id="nav-img-00" alt="Image" style="margin-top: 150px;">
            <div class="feedback" style="border-radius:15px; background-color:#005bbb; color: #ffd500; width:500px; padding:75px 50px; margin-top: 20px; font-family: 'Helvetica', sans-serif; font-size: 25px;">Thank you for your message. We'll get back to you as soon as possible.</div>
        </center>
    </body>
    <script>
    setTimeout(function() { location.replace("index.html")},5000);
    </script>
<?php
}
?>