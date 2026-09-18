CREATE DATABASE IF NOT EXISTS automarket
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE automarket;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(12,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    tipo ENUM('auto','repuesto') NOT NULL,
    imagen VARCHAR(255) DEFAULT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    total DECIMAL(12,2) NOT NULL,
    estado VARCHAR(30) DEFAULT 'pendiente',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE pedido_detalles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(12,2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

INSERT INTO productos (nombre, descripcion, precio, stock, tipo) VALUES
('Toyota Corolla 2022', 'Sedán usado en excelente estado.', 18500000, 1, 'auto'),
('Ford Ranger 2023', 'Pick-up doble cabina.', 29500000, 1, 'auto'),
('Volkswagen Golf 2021', 'Hatchback con buen equipamiento.', 21000000, 1, 'auto'),
('Pastillas de freno delanteras', 'Juego de pastillas para freno delantero.', 45000, 15, 'repuesto'),
('Batería 12V 75Ah', 'Batería para vehículos medianos y grandes.', 180000, 10, 'repuesto'),
('Filtro de aceite', 'Filtro de aceite para motor.', 12000, 30, 'repuesto');
