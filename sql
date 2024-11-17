CREATE DATABASE project_seeking;

USE project_seeking;

CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professor_name VARCHAR(100) NOT NULL,
    project_title VARCHAR(100) NOT NULL,
    project_description TEXT NOT NULL
);
