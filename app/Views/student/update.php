<!DOCTYPE html>
<html>
<head>
    <title>Update Details</title>
    <link rel="stylesheet" href="<?= base_url('styleforms.css') ?>">
</head>
<body style= "background-image: linear-gradient(rgba(15, 23, 42, 0.70), rgba(15, 23, 42, 0.75)), url('https://media.istockphoto.com/id/175482113/photo/maroon-silk-texture.jpg?s=612x612&w=0&k=20&c=QeOJlS0v_7JRCfoni8XaTT0n3-X7OB1I8Q5jcuZCGRU=')">
    <div class="menu-card" style="background: rgba(213, 175, 184, 0.96);" >
        <h2>Update Details</h2>

        <form action="/student/update" method="post">
            <div class="form-group">
                <label>Register Number:</label>
                <input type="number" name="regno" required>
            </div>
            <div class="form-group">
                <label>New Email ID:</label>
                <input type="email" name="email">
            </div>
            <div class="form-group">
                <label>New Contact Number:</label>
                <input type="tel" name="phoneno">
            </div>

            <button type="submit" class="submit-btn" style="background: linear-gradient(135deg, #b180a9, #4a0435);">Update</button>
        </form>

        <a href="/student" class="back-link" style="color: #420635;" >Back to home page</a>
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