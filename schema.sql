CREATE DATABASE IF NOT EXISTS heaven_marriage;
USE heaven_marriage;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    is_premium BOOLEAN DEFAULT FALSE,
    status VARCHAR(50) DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Profiles table
CREATE TABLE IF NOT EXISTS profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    phone VARCHAR(20),
    gender ENUM('Male', 'Female') NOT NULL,
    date_of_birth DATE,
    city VARCHAR(100),
    bio TEXT,
    religion VARCHAR(50),
    caste VARCHAR(50),
    mother_tongue VARCHAR(50),
    marital_status ENUM('Single', 'Divorced', 'Widowed', 'Separated') DEFAULT 'Single',
    education VARCHAR(100),
    occupation VARCHAR(100),
    height VARCHAR(20),
    country VARCHAR(50) DEFAULT 'Pakistan',
    income VARCHAR(50),
    family_details TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Photos table
CREATE TABLE IF NOT EXISTS photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    original_path VARCHAR(255) NOT NULL,
    blurred_path VARCHAR(255) NOT NULL,
    is_primary BOOLEAN DEFAULT FALSE,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Contact Messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    subject VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Settings table for dynamic content (Admin controlled)
CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(50) UNIQUE,
    setting_value TEXT
);

-- Insert default admin (password: admin123)
-- Hash: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
INSERT IGNORE INTO users (name, email, password, role, status) 
VALUES ('Super Admin', 'ibraheemtahir0rs@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'approved');

INSERT IGNORE INTO settings (setting_key, setting_value) VALUES 
('whatsapp_number', '+923084742715'),
('site_title', 'Heaven Marriage'),
('hero_title', 'Find Your Perfect Match'),
('hero_subtitle', 'Trusted by Millions');
