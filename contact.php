<?php

$active = 'Contact';
include("header.php");

?>

<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="sample.php">Home</a>
                </li>
                <li>
                    Contact Us
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <?php

            include("sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <!-- col-md-9 Begin -->

            <div class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <center>
                        <!-- center Begin -->

                        <h2> Feel free to Contact Us</h2>

                        <p class="text-muted">
                            <!-- text-muted Begin -->

                            If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>

                        </p><!-- text-muted Finish -->

                    </center><!-- center Finish -->

                    <form action="contact.php" method="post">
                        <!-- form Begin -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Name</label>

                            <input type="text" class="form-control" name="name" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Email</label>

                            <input type="text" class="form-control" name="email" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Subject</label>

                            <input type="text" class="form-control" name="subject" required>

                        </div><!-- form-group Finish -->

                        <div class="form-group">
                            <!-- form-group Begin -->

                            <label>Message</label>

                            <textarea name="message" class="form-control"></textarea>

                        </div><!-- form-group Finish -->

                        <div class="text-center">
                            <!-- text-center Begin -->

                            <button type="submit" name="submit" class="btn btn-primary">

                                <i class="fa fa-user-md"></i> Send Message

                            </button>

                        </div><!-- text-center Finish -->

                    </form><!-- form Finish -->

                    <?php

                    if (isset($_POST['submit'])) {

                        /// Admin receives message with this ///

                        $sender_name = $_POST['name'];

                        $sender_email = $_POST['email'];

                        $sender_subject = $_POST['subject'];

                        $sender_message = $_POST['message'];

                        $receiver_email = "rheapinto30102002@gmail.com";

                        mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);
                        $insert_product = "insert into contact (sender_name,sender_email,sender_subject,sender_message) values ('$sender_name','$sender_email','$sender_subject','$sender_message')";

                        $run_product = mysqli_query($con, $insert_product);
                        /// Auto reply to sender with this ///

                        $email = $_POST['email'];

                        $subject = "Welcome to my website";

                        $msg = "Thanks for sending us message. We will reply to your message asap.";

                        $from = "rheapinto30102002@gmail.com";

                        mail($email, $subject, $msg, $from);

                        echo "<h2 align='center'> Your message has sent sucessfully </h2>";
                    }

                    ?>

                </div><!-- box-header Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("footer.php");

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>