-- Ejercicio 2
DELIMITER$$
USE "mydb" $$
CREATE DEFINER = CURRENT_USER 'mydb'.'ViviendaUnica_AFTER_INSERT' BEFORE INSERT ON 'Vivienda' FOR EACH ROW
BEGIN
    IF ((NEW.Propietario IS NOT NULL) && (NEW.idVivienda IS NOT NULL)) THEN
        SIGNAL SQLSTATE 'ERROR' SET MESSAGE_TEXT = 'Vivienda Ocupada';
    END IF;
END$$
DELIMITER;
