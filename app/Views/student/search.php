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
        
        <a href="/student" class="back-link">Back to home page</a>
    </div>
</body>
</html>