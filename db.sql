CREATE DATABASE FutureGuardiansInitiative;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(30) NOT NULL UNIQUE,
    country VARCHAR(20) NOT NULL,
    bio VARCHAR(100) NOT NULL,
    status VARCHAR(2) NOT NULL,
    role VARCHAR(10) NOT NULL,
    fblink VARCHAR(400) NOT NULL,
    image VARCHAR(50) NOT NULL,
    otp VARCHAR(20) NOT NULL,
    password VARCHAR(300) NOT NULL,
    registered_at DEFAULT CURRENT_TIMESTAMP,
    updated_at DEFAULT TIMESTAMP ON_UPDATE
)