<?php session_start() ?>

<?php if (isset($_SESSION['user'])) : ?>
    <p>Welcome <?= $_SESSION['user'] ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['roles'])) : ?>
    <p>Current roles:</p>
    <ul>
        <?php foreach ($_SESSION['roles'] as $role): ?>
            <li><?= $role ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>