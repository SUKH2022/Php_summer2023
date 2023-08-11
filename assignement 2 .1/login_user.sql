CREATE TABLE login_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    dob DATE NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE KEY,
    password VARCHAR(255) NOT NULL
);

