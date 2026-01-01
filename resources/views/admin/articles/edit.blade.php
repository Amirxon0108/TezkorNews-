<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="box">
    <h2>Edit Post</h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" value="Old Title">

        <label>Description</label>
        <textarea>Old description...</textarea>

        <label>Status</label>
        <select>
            <option selected>Active</option>
            <option>Inactive</option>
        </select>

        <label>Change Image</label>
        <input type="file">

        <button class="btn-edit">Update</button>
    </form>
</div>

</body>
</html>
