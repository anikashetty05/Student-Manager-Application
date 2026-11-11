<!DOCTYPE html>
<html>
<head>
    <title>Insert Record</title>
    <link rel="stylesheet" href="<?= base_url('styleforms.css') ?>">
</head>
<body>
    <div class="menu-card">
        <h2>Insert Record</h2>

        <form action="/student/store" method="post">
            <div class="form-group">
                <label>Register Number:</label>
                <input type="number" name="regno" required>
            </div>
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="fname" required>
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="lname" required>
            </div>
            <div class="form-group">
                <label>Date of Birth:</label>
                <input type="date" name="dob" required>
            </div>
            <div class="form-group">
                <label>Email ID:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Contact Number:</label>
                <input type="tel" name="phoneno" required>
            </div>
            <div class="form-group">
                <label>Course:</label>
                <input type="text" name="course" required>
            </div>

            <button type="submit" class="submit-btn">Add Student</button>
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