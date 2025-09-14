<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
      method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email">
        <button type="submit">Submit</button> 
    </div>
</form>