<?php require "flowers.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Danh sách các loài hoa</title>

</head>
<body>
<a href="admin.php">Vào trang quản trị</a>
<h1>  14 Loại Hoa Tuyệt Đẹp – Xuân Hè </h1>

<div>
<?php foreach ($flowers as $f): ?>
    <div>
        <img src="images/<?= $f['image'] ?>" alt="">
        <div class="name"><?= $f['name'] ?></div>
        <p><?= $f['desc'] ?></p>
    </div>
<?php endforeach; ?>
</div>



</body>
</html>
