CREATE TABLE agencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    address TEXT,
    logo VARCHAR(255),
    plan ENUM('basic','premium') DEFAULT 'basic',
    expiration DATE,
    whatsapp VARCHAR(20),
    active TINYINT DEFAULT 1
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin_platform','admin_agence','employe_agence') NOT NULL DEFAULT 'employe_agence',
    agency_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    cin VARCHAR(255),
    driving_license VARCHAR(255),
    agency_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(255),
    plate VARCHAR(50),
    price_per_day DECIMAL(10,2),
    photo VARCHAR(255),
    insurance_exp DATE,
    technical_exp DATE,
    agency_id INT
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT,
    client_id INT,
    start_date DATE,
    end_date DATE,
    price DECIMAL(10,2) DEFAULT 0,
    real_return DATE,
    status ENUM('en attente','validée','terminée','annulée') DEFAULT 'en attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO agencies (name, email, address, plan, whatsapp) VALUES
('Agence Demo','demo@example.com','1 rue de Paris','premium','+33123456789');

INSERT INTO users (email, password, role, agency_id) VALUES
('admin@platform.com', '$2y$12$bm2O3VJQonOF4ZtPmgk8CuSbUEUFvwJDr1KjtX/fpVZmU1QUKZ79W', 'admin_platform', NULL),
('agence@demo.com', '$2y$12$bm2O3VJQonOF4ZtPmgk8CuSbUEUFvwJDr1KjtX/fpVZmU1QUKZ79W', 'admin_agence', 1);
