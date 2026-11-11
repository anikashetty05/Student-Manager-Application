<!DOCTYPE html>
<html>
<head>
    <title>Display All Records</title>
    <link rel="stylesheet" href="<?= base_url('styledisplay.css') ?>">
    <style>
        .menu-card { max-width: 900px; text-align: left; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; margin-bottom: 20px; table-layout: fixed; }
        th, td { padding: 10px 12px; border: 1px solid #cbd5e1; text-align: center; font-size: 0.95rem; color: #334155; }
        th { background-color: #f1f5f9; color: #1e293b; font-weight: 600; }
        tr:nth-child(even) { background-color: #f8fafc; }
        
        /* Make Register Number compact and give Email column ample width */
        th:nth-child(1), td:nth-child(1) { width: 85px; }
        th:nth-child(6), td:nth-child(6) { width: 200px; white-space: normal; word-break: break-all; }
    </style>
</head>
<body>
    <div class="menu-card">
        <h2>Student Records</h2>
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
        <a href="/student" class="back-link">Back to home page</a>
    </div>
</body>
</html>