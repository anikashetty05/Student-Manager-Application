<!DOCTYPE html>
<html>
<head>
    <title>Search by Course</title>
    <link rel="stylesheet" href="<?= base_url('styleforms.css') ?>">
    <style>
        .menu-card { max-width: 600px; text-align: left; }
    </style>
</head>
<body style="background-image: linear-gradient(rgba(15, 23, 42, 0.45), rgba(15, 23, 42, 0.45)), url('https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Simple-Minimalist-Background-Image.jpg');">
    <div class="menu-card"  style="background: rgba(209, 221, 253, 0.96);">
        <h2 style="text-align: center;">Search by Course</h2>

        <form action="/student/search" method="get">
            <div class="form-group">
                <label>Enter Course:</label>
                <input type="text" name="course" value="<?= esc($searchCourse ?? '') ?>" required>
            </div>
            <button type="submit" class="submit-btn">Search</button>
        </form>

        <?php if (!empty($searchCourse) && !empty($students)): ?>
            <table>
                <tr>
                    <th>Register Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DOB</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Course</th>
                </tr>
                <?php foreach ($students as $row): ?>
                <tr>
                    <td><?= esc($row['id']) ?></td>
                    <td><?= esc($row['first_name']) ?></td>
                    <td><?= esc($row['last_name']) ?></td>
                    <td><?= esc($row['dob']) ?></td>
                    <td><?= esc($row['phone_no']) ?></td>
                    <td><?= esc($row['email']) ?></td>
                    <td><?= esc($row['course']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php elseif (!empty($searchCourse)): ?>
            <p style="text-align: center; color: #dc2626; margin-top: 15px;">No students found for this course.</p>
        <?php endif; ?>

        <a href="/student" class="back-link">Back to home page</a>
    </div>
</body>
</html>