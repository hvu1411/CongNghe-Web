<?php require "flowers.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản trị</title>
<style>
    th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
    th { background: #f2f2f2; }
    img { width: 120px; }
</style>
</head>
<body>
<a href="xem.php">Về lại trang chủ</a>
<h1>Trang Quản Trị</h1>

<h2>Thêm</h2>

<form class="add-form" method="POST" enctype="multipart/form-data">
    <label>Tên:</label>
    <input type="text" name="name" required><br><br>

    <label>Mô tả:</label>
    <input type="text" name="desc" required><br><br>

    <label>Ảnh:</label>
    <input type="file" name="image" required><br><br>

    <button type="submit">Thêm</button>
</form>

<h2>Danh sách hoa</h2>
<table>
<tr>
    <th>#</th>
    <th>Ảnh</th>
    <th>Tên hoa</th>
    <th>Mô tả</th>
    <th>Chức năng</th>
</tr>

<?php foreach ($flowers as $i => $f): ?>
<tr>
    <td><?= $i+1 ?></td>
    <td><img src="images/<?= $f['image'] ?>"></td>
    <td><?= $f['name'] ?></td>
    <td><?= $f['desc'] ?></td>
    <td class="actions">
        <button>Sửa</button>
        <button>Xóa</button>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>
