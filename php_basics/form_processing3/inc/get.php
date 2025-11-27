<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="colors">Background Color:</label>
        <select name="colors[]" id="colors" multiple>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="purple">Purple</option>
            <option value="magenta">Magenta</option>
            <option value="cyan">Cyan</option>
        </select>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>