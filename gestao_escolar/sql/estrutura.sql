CREATE DATABASE IF NOT EXISTS gestao_escolar;
USE gestao_escolar;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin', 'professor', 'aluno') NOT NULL
);

INSERT INTO usuarios (usuario, senha, tipo) VALUES
('admin',    '$2y$10$ExAmPlEhAsHfOrAdMiN1234567890123456789012', 'admin'),
('professor','$2y$10$ExAmPlEhAsHfOrPrOf1234567890123456789012', 'professor'),
('aluno',    '$2y$10$ExAmPlEhAsHfOrAlUn1234567890123456789012', 'aluno');
