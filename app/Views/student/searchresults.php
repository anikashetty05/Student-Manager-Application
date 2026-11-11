<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="<?= base_url('styledisplay.css') ?>">
    <style>
        .menu-card { max-width: 900px; text-align: left; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; margin-bottom: 20px; }
        th, td { padding: 10px 12px; border: 1px solid #cbd5e1; text-align: center; font-size: 0.95rem; color: #334155; }
        th { background-color: #f1f5f9; color: #1e293b; font-weight: 600; }
        tr:nth-child(even) { background-color: #f8fafc; }
    </style>
</head>
<body>
    <div class="menu-card">
        <h2 style="text-align: center;">Results for "<?= esc($searchCourse) ?>"</h2>

        <?php if (!empty($students)): ?>
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
                    <td><?= esc(date('d/m/Y', strtotime($row['dob']))) ?></td>
                    <td><?= esc($row['phone_no']) ?></td>
                    <td><?= esc($row['email']) ?></td>
                    <td><?= esc($row['course']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p style="text-align: center; color: #dc2626; margin: 20px 0; font-weight: 600;">No students found for this course.</p>
        <?php endif; ?>

        <div style="margin-top: 20px; text-align: center;">
            <a href="/student/search" class="back-link" style="display: inline-block; margin-bottom: 10px;">Back to Search</a><br>
            <a href="/student" class="back-link" style="display: inline-block;">Back to Home Page</a>
        </div>
    </div>
</body>
</html>