<!DOCTYPE html>
<html>
<head>
    <title>Student Management Menu</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>
    <div class="menu-card">
        <h2>Student Management: Menu</h2>
        <?php if (session()->getFlashdata('message')): ?>
            <p style="color: green;"><?= session()->getFlashdata('message') ?></p>
        <?php endif; ?>
        <ul>
            <li class="card"><a href="/student/register">Insert Student Record</a></li>            
            <li class="card"><a href="/student/update">Update Details</a></li>
            <li class="card"><a href="/student/delete">Delete Student Record</a></li>
            <li class="card"><a href="/student/search">Search by Course</a></li>
            <li class="card"><a href="/student/display">Display All</a></li>
        </ul>
    </div>
</body>
</html>

