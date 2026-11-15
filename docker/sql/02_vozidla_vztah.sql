CREATE TABLE IF NOT EXISTS vozidla (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    znacka VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    rok_vyroby INT NOT NULL,
    ecv VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO vozidla (znacka, model, rok_vyroby, ecv)
SELECT 'Škoda', 'Octavia', 2018, 'CA783BH'
WHERE NOT EXISTS (SELECT 1 FROM vozidla);

ALTER TABLE servisne_zaznamy ADD COLUMN IF NOT EXISTS vozidlo_id INT NULL;
UPDATE servisne_zaznamy
SET vozidlo_id = (SELECT MIN(id) FROM vozidla)
WHERE vozidlo_id IS NULL;
ALTER TABLE servisne_zaznamy MODIFY COLUMN vozidlo_id INT NOT NULL;
CREATE INDEX IF NOT EXISTS idx_servisne_vozidlo ON servisne_zaznamy (vozidlo_id);

SET @fk_exists = (SELECT COUNT(*) FROM information_schema.TABLE_CONSTRAINTS
    WHERE CONSTRAINT_SCHEMA = DATABASE() AND TABLE_NAME = 'servisne_zaznamy'
    AND CONSTRAINT_NAME = 'fk_servisne_vozidlo' AND CONSTRAINT_TYPE = 'FOREIGN KEY');
SET @sql = IF(@fk_exists = 0,
    'ALTER TABLE servisne_zaznamy ADD CONSTRAINT fk_servisne_vozidlo FOREIGN KEY (vozidlo_id) REFERENCES vozidla(id) ON DELETE RESTRICT ON UPDATE CASCADE',
    'SELECT 1');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
