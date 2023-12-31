<?php require_once 'Includes/header.php' ?>
<?php require_once 'Includes/nav.php' ?>

<!-- This code was obtained from the NCC L5DC DW assignment that was written by me, Zainab Ismail Patel, P00186466 -->
<?php
    if(isset($_POST['contactbtn']))
    {
        // Saving data entered in form to database
        $email = $_POST['email_add'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $sql="INSERT INTO contact_messages (Email, `Subject`, `Message`) VALUES(?,?,?)";
        $statement = $connection->prepare($sql);
        $statement->bind_param("sss",$email,$subject,$message);
        $statement->execute();
    }
?>

<div class="contact">
        <br>
        <div class="form-container form contact_margin">
    <div class="text-center ">
        <h1>We would love to hear from you!</h1>
            
        <hr class="hr">
        <br>
    </div>
    <form action="Contact.php" method="post" class=""> 
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control length" id="email" placeholder="name@example.com" name="email_add">
        </div>
        <br>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control length" id="subject" placeholder="Please enter the subject of your feedback" name="subject">
        </div>
        <br>
        <div class="form-group">
            <label for="message">Give us your feedback</label>
            <textarea class="form-control length" id="message" rows="3" name="message"></textarea>
        </div>
        <br>
        <br>
        <input type="submit" value="Submit" class="btn btn-user btn-dark btn-center" name="contactbtn">
        <br>
    </form>
    </div>
    <br>
    </div>
</div>

<?php require_once 'Includes/footer.php' ?>