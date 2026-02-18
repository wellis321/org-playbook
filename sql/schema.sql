-- Database schema for Organisation Playbook PHP/MySQL conversion

-- Categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Systems table
CREATE TABLE IF NOT EXISTS systems (
    id VARCHAR(100) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_category (category),
    INDEX idx_name (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- System primary users (many-to-many relationship)
CREATE TABLE IF NOT EXISTS system_primary_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    system_id VARCHAR(100) NOT NULL,
    user_type VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (system_id) REFERENCES systems(id) ON DELETE CASCADE,
    INDEX idx_system_id (system_id),
    UNIQUE KEY unique_system_user (system_id, user_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- System key entities (many-to-many relationship)
CREATE TABLE IF NOT EXISTS system_key_entities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    system_id VARCHAR(100) NOT NULL,
    entity_name VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (system_id) REFERENCES systems(id) ON DELETE CASCADE,
    INDEX idx_system_id (system_id),
    UNIQUE KEY unique_system_entity (system_id, entity_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- System integration points (many-to-many relationship)
CREATE TABLE IF NOT EXISTS system_integration_points (
    id INT AUTO_INCREMENT PRIMARY KEY,
    system_id VARCHAR(100) NOT NULL,
    integration_name VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (system_id) REFERENCES systems(id) ON DELETE CASCADE,
    INDEX idx_system_id (system_id),
    UNIQUE KEY unique_system_integration (system_id, integration_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Feedback submissions table
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feedback_type VARCHAR(50) NOT NULL,
    feedback_text TEXT NOT NULL,
    url VARCHAR(500),
    `system` VARCHAR(100),
    is_anonymous BOOLEAN DEFAULT FALSE,
    user_agent VARCHAR(500),
    screen_size VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_feedback_type (feedback_type),
    INDEX idx_system (`system`),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Admin users table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_login DATETIME,
    INDEX idx_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
