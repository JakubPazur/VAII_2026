# AutoCare – Digitálna servisná knižka vozidla

Jakub Pazúr

5ZYI31

## Stručný opis projektu
AutoCare je webová aplikácia určená pre majiteľov osobných vozidiel na prehľadnú správu údržby, opráv a nákladov spojených s prevádzkou áut. 

## Role v projekte
- **Návštevník** - registrácia a prihlásenie
- **Registrovaný používateľ** - správa vlastných vozidiel, servisných záznamov, plánu údržby a dokumentov
- **Administrátor** - správa kategórií servisných úkonov a používateľských účtov

## Prípady použitia podľa rolí
### Návštevník
- zobrazí úvodnú stránku
- zaregistruje sa
- prihlási sa

### Registrovaný používateľ
- vytvorí a spravuje svoje vozidlá (CRUD)
- spravuje servisné záznamy a históriu údržby konkrétneho vozidla
- naplánuje budúcu údržbu podľa dátumu alebo kilometrov
- nahrá a zobrazí dokumenty (napr. faktúry) k vozidlu alebo úkonu
- vyhľadáva a filtruje servisné záznamy
- zobrazí prehľad nákladov a upravuje svoj profil

### Administrátor
- spravuje kategórie servisných úkonov
- spravuje používateľské účty

## Plánované entity
### User
Reprezentuje používateľa aplikácie.

Atribúty:
- id
- meno
- email
- heslo
- systémová rola

### Vehicle
Reprezentuje vozidlo používateľa.

Atribúty:
- id
- značka
- model
- rok výroby
- EČV
- VIN
- aktuálny stav kilometrov
- vlastník vozidla

### ServiceType
Kategorizuje typ servisného úkonu (napr. výmena oleja, oprava bŕzd).

Atribúty:
- id
- názov
- popis

### ServiceRecord
Reprezentuje konkrétnu vykonanú opravu alebo údržbu.

Atribúty:
- id
- vozidlo
- typ úkonu
- dátum servisu
- stav kilometrov
- cena
- popis

### MaintenanceReminder
Eviduje plánovanú budúcu údržbu.

Atribúty:
- id
- vozidlo
- typ úkonu
- plánovaný dátum
- plánovaný stav kilometrov
- stav (naplánované / dokončené)

### Document
Reprezentuje nahrané súbory a faktúry.

Atribúty:
- id
- názov súboru
- cesta k súboru
- dátum nahrania
- vozidlo
- servisný záznam

## Vzťahy medzi entitami
- **User - Vehicle:** používateľ môže vlastniť viacero vozidiel, jedno vozidlo má jedného vlastníka - vzťah 1:N
- **Vehicle - ServiceRecord:** jedno vozidlo môže mať viacero servisných záznamov - vzťah 1:N
- **ServiceType - ServiceRecord:** jeden typ úkonu môže byť použitý vo viacerých záznamoch - vzťah 1:N
- **Vehicle - MaintenanceReminder:** jedno vozidlo môže mať viacero naplánovaných úkonov - vzťah 1:N
- **Vehicle - Document:** k jednému vozidlu môže byť priradených viacero dokumentov - vzťah 1:N
- **ServiceRecord - Document:** k jednému servisnému záznamu môže byť priradených viacero dokumentov - vzťah 1:N

## Hlavné stránky aplikácie
### 1. Dashboard
Úvodná stránka po prihlásení. Zobrazuje prehľad vozidiel, blížiacu sa údržbu a celkové náklady.

### 2. Moje vozidlá
Zobrazuje všetky vozidlá používateľa. Umožňuje pridať nové vozidlo.

### 3. Detail vozidla
Zobrazuje technické údaje vozidla, kompletnú servisnú históriu a súvisiace dokumenty.

### 4. Servisné záznamy
Zobrazuje zoznam vykonaných servisných úkonov s možnosťou ich filtrovania a správy.

### 5. Plán údržby
Zobrazuje naplánované a oneskorené úkony údržby.

### 6. Profil používateľa
Slúži na úpravu osobných údajov používateľa.

### 7. Administrácia
Stránka pre administrátora na správu typov servisných úkonov a používateľských účtov.

## Rozdelenie funkcionality
### Základné funkcie
- registrácia, prihlásenie a odhlásenie používateľa
- systémové role Používateľ a Administrátor
- serverová kontrola oprávnení
- CRUD operácie nad vozidlami
- CRUD operácie nad servisnými záznamami
- plánovanie údržby podľa dátumu a stavu kilometrov
- nahrávanie a správa dokumentov (faktúr)
- správa typov servisných úkonov
- vyhľadávanie a filtrovanie servisných záznamov
- AJAX filtrovanie záznamov bez obnovenia stránky
- AJAX pridanie záznamu bez obnovenia stránky
- responzívne používateľské rozhranie
- spustenie cez Docker a ukážkové dáta
- administrácia používateľských účtov

### Rozširujúce funkcie
- grafy a štatistiky nákladov podľa vozidiel a typov úkonov
- upozornenia na blížiacu sa údržbu
- export servisnej histórie do PDF
- výpočet priemerných nákladov na kilometer
- možnosť pridať fotografiu vozidla
- tmavý režim aplikácie