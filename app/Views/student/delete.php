<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
    <link rel="stylesheet" href="<?= base_url('styleforms.css') ?>">
</head>
<body style= "background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDqCsgIWhtCwlkdofZKs3ILRfNZprieJ4gAE95LVAa4uefm9IdX5-U4q3q&s=10');">
    <div class="menu-card" style="background: rgba(205, 217, 255, 0.96);" >
        <h2>Delete Student Record</h2>

        <form action="/student/delete" method="post">
            <div class="form-group">
                <label>Register Number:</label>
                <input type="number" name="regno" required>
            </div>

            <button type="submit" class="submit-btn" style="background: linear-gradient(135deg, #dc2626, #991b1b);">Delete</button>
        </form>

        <a href="/student" class="back-link">Back to home page</a>
    </div>
</body>
</html>
<?php if (isset($message)): ?>
    <?php 
        $isError = strpos($message, 'Error') !== false; 
    ?>
    <div class="popup-toast <?= $isError ? 'error' : '' ?>" id="successPopup">
        <?= esc($message) ?>
    </div>
<?php endif; ?>

<script src="<?= base_url('popup.js') ?>"></script>