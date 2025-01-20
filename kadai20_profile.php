<?php
session_start();
// ユーザーがログインしているか確認
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール編集</title>
</head>
<body>
    <h1>プロフィール編集</h1>
    <form action="update_profile.php" method="POST" enctype="multipart/form-data">
        <div>
            <label for="username">ユーザー名:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
        </div>

        <div>
            <label for="bio">自己紹介:</label>
            <textarea name="bio" id="bio" rows="4"><?php echo htmlspecialchars($bio); ?></textarea>
        </div>

        <div>
            <label for="profile_image">プロフィール画像:</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>

        <button type="submit">更新する</button>
    </form>
</body>
</html>
