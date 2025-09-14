<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    echo htmlspecialchars($email);
}

?>

<!-- this form is vulnereable to XSS, try submitting: /%27%22/%3E%3Cscript%3Ealert('XSS Attack')%3C/script%3E  -->
<!-- to secure add htmlspecialchars to html form as well -->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email">
    </div>
</form>