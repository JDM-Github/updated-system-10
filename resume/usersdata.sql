USE lecheria_db;
DROP TABLE IF EXISTS resume;
DROP TABLE IF EXISTS skills;

CREATE TABLE resume (
    user_id INT,
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email_address VARCHAR(100) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    birth_date DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    address VARCHAR(255) NOT NULL,
    objectives TEXT NOT NULL,
    speciality VARCHAR(100) NOT NULL,
    skills TEXT NOT NULL,
    program_course VARCHAR(100) NOT NULL,
    educ_attainment VARCHAR(100) NOT NULL,
    status ENUM('Employed', 'Unemployed', 'Student', 'Other') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE skills (
    skill_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    skill_name VARCHAR(255) NOT NULL
);
