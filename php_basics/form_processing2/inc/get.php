<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>Please choose your preferred method of contact:</div>
    <?php foreach ($contacts as $key => $value) : ?>
        <!-- we have access to $contacts defined in index.php -->
        <div>
            <input 
                type="radio" 
                name="contact" 
                id="contact_<?php echo $key ?>" 
                value="<?php echo $key ?>" 
            />
            <label for="contact_<?php echo $key ?>"><?php echo $value ?></label>
        </div>
    <?php endforeach ?>

    <div>
        <label for="color">Background Color:</label>
        <select name="color" id="color">
            <option value="">--- Choose a color ---</option>
            <option value="red">Red</option>
            <option value="green" selected>Green</option>
            <option value="blue">Blue</option>
        </select>
    </div>

    <div>
        <small class="error"><?php echo $errors['contact'] ?? '' ?></small>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>