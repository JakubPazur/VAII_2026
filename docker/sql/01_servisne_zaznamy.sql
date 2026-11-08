CREATE TABLE IF NOT EXISTS servisne_zaznamy (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    datum DATE NOT NULL,
    typ_ukonu VARCHAR(150) NOT NULL,
    kilometre INT NOT NULL,
    cena DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO servisne_zaznamy (datum, typ_ukonu, kilometre, cena)
SELECT '2026-09-12', 'Výmena oleja', 143000, 120.00
WHERE NOT EXISTS (SELECT 1 FROM servisne_zaznamy);
