-- Ejercicio 1 
-- Fue nesesario anadir columna email en clientes

DELIMITER$$
USE "mydb" $$
CREATE PROCEDURE 'crear_mail' (IN nombre varchar(45), IN dominio varchar(45), IN email varchar(90))
BEGIN
    SET email := concat(nombre, '@', dominio);
END$$
DELIMITER;

DELIMITER$$
USE "mydb" $$
CREATE DEFINER = CURRENT_USER 'mydb'.'Cliente_BEFORE_INSERT' BEFORE INSERT ON 'Cliente' FOR EACH ROW
BEGIN
    IF NEW.email is NULL THEN
        CALL crear_mail(NEW.nombre,'gmail.com', @aux);
        SET NEW.email = @aux;
    END IF;
END$$
DELIMITER;

-- Ejercicio 3

DELIMITER$$
USE "mydb" $$
CREATE DEFINER = CURRENT_USER 'mydb'.'Stock_AFTER_INSERT' AFTER INSERT ON 'Pedido' FOR EACH ROW
BEGIN
    SELECT Stock INTO @stock FROM Producto WHERE NEW.Producto = Producto;
    UPDATE Producto SET Stock = @stock - 1 WHERE NEW.Producto = Producto;
END$$
DELIMITER;