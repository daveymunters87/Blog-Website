-- Dropt database als hij bestaat
DROP DATABASE IF EXISTS blog_platform;
-- Maakt de database
CREATE DATABASE blog_platform;

-- Gebruik de database
USE blog_platform;

-- Maakt de table voor de users
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT 0
);

INSERT INTO users (username, email, password, is_admin) 
VALUES ('admin', 'TestAdmin@gmail.com', '$2y$10$hX4g54Q23s.kyeBmvl2oI.i0An0GVW9Y.mkGAmqZF1QVLQomNZfWe', 1);

-- Maakt de table voor de posts
CREATE TABLE IF NOT EXISTS posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    tags VARCHAR(255),
    image_url VARCHAR(255),
    author_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);