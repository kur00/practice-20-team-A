CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    profile_image VARCHAR(255) DEFAULT NULL, -- プロフィール画像のファイルパス
    bio TEXT DEFAULT NULL, -- 自己紹介
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
