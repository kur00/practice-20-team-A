<?php
session_start();
require 'db.php'; // データベース接続ファイル

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // ログインしているユーザーのIDを取得

// フォームデータを受け取る
$username = $_POST['username'];
$bio = $_POST['bio'];

// 画像のアップロード処理
$profile_image = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
    $target_dir = "uploads/"; // アップロード先のディレクトリ
    $target_file = $target_dir . basename($_FILES['profile_image']['name']);
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
        $profile_image = $target_file;
    }
}

// データベースにユーザー情報を更新
$sql = "UPDATE users SET username = ?, bio = ?, profile_image = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $bio, $profile_image, $user_id]);

header("Location: profile.php"); // 更新後にプロフィールページにリダイレクト
exit();
