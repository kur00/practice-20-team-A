<?php
session_start();
require 'db.php'; // データベース接続ファイル

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// ユーザー情報をデータベースから取得
$sql = "SELECT username, bio, profile_image FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "ユーザー情報が見つかりません。";
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール</title>
</head>
<body>
    <h1>プロフィール</h1>
    <p><strong>ユーザー名:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    <p><strong>自己紹介:</strong> <?php echo nl2br(htmlspecialchars($user['bio'])); ?></p>
    
    <?php if ($user['profile_image']): ?>
        <p><strong>プロフィール画像:</strong><br>
            <img src="<?php echo htmlspecialchars($user['profile_image']); ?>" alt="プロフィール画像" width="200">
        </p>
    <?php else: ?>
        <p>プロフィール画像は設定されていません。</p>
    <?php endif; ?>

    <p><a href="profile_edit.php">プロフィールを編集</a></p>
</body>
</html>
