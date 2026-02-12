<?php

require_once 'conn.php';

if (isset($_GET['upd_id'])) {
    $id = $_GET['upd_id'];
    $data = $conn->query("SELECT * FROM tasks WHERE id='$id'");
    $row = $data->fetch(PDO::FETCH_OBJ);
}

if (isset($_POST['submit'])) {
    $task = $_POST['mytask'];
    $update = $conn->prepare("UPDATE tasks SET name = :name WHERE id = $id");
    $update->execute([':name' => $task]);
    header("location: index.php");
}

?>


<form class="form-inline" method="POST" action="update.php?upd_id=<?php echo $id; ?>">
    <div class="form-group mx-sm-3 mb-2">
        <input name="mytask" type="text" class="form-control" id="inputPassword2" placeholder="enter task" value="<?php echo $row->name; ?>">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="Update">
</form>