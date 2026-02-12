<?php

require_once 'conn.php';

// loop through table records to display them
$data = $conn->query("SELECT * FROM tasks");

?>

<?php include_once "header.php"; ?>
<div class="container">
    <form class="form-inline" method="POST" action="insert.php">
        <div class="form-group mx-sm-3 mb-2">
            <input name="mytask" type="text" class="form-control" id="inputPassword2" placeholder="enter task">
        </div>
        <button class="btn btn-primary mb-2">Create</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $data->fetch(PDO::FETCH_OBJ)): ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><a href="delete.php?del_id=<?php echo $row->id; ?>" class="btn btn-danger">delete</a></td>
                    <td><a href="update.php?upd_id=<?php echo $row->id; ?>" class="btn btn-warning">update</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-4.0.0.slim.js"
    integrity="sha256-M+GjhMBfXikM1izMplICCTscIj5hzPCp6uDzaypxtgg=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php include_once "footer.php"; ?>