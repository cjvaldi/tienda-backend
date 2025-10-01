-- Archivo: database/seed.sql
-- Inserta datos iniciales para pruebas

-- 1. Insertar usuarios
INSERT INTO usuarios (nombre, email, password) VALUES
('Ana Pérez', 'ana@example.com', '$2a$10$EjemploDeHashParaContraseña123'),  -- Contraseña: "123456" (hasheada)
('Carlos Gómez', 'carlos@example.com', '$2a$10$EjemploDeHashParaContraseña456'); -- Contraseña: "abcdef"

-- 2. Insertar productos
INSERT INTO productos (nombre, descripcion, precio, stock) VALUES
('Camiseta Blanca', 'Algodón 100%, talla M', 19.99, 50),
('Camiseta Negra', 'Algodón orgánico, talla L', 24.99, 30),
('Camiseta Azul', 'Estampada, talla S', 22.50, 20);

-- 3. Insertar pedidos
INSERT INTO pedidos (id_usuario, total) VALUES
(1, 44.98),   -- Pedido de Ana (2 camisetas blancas)
(2, 47.49);   -- Pedido de Carlos (1 negra + 1 azul)

-- 4. Insertar detalles de pedidos
INSERT INTO detalle_pedidos (id_pedido, id_producto, cantidad, precio_unitario) VALUES
(1, 1, 2, 19.99),  -- Ana compró 2 camisetas blancas
(2, 2, 1, 24.99),  -- Carlos compró 1 camiseta negra
(2, 3, 1, 22.50);  -- Carlos compró 1 camiseta azul