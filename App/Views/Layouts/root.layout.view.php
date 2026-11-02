<?php
/** @var string $contentHTML */
/** @var \Framework\Support\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoCare</title>
    <link rel="stylesheet" href="<?= $link->asset('css/autocare.css') ?>">
</head>
<body>
<div class="page">
    <header class="header">
        <h1>AutoCare</h1>
        <div class="account"><span>Môj profil</span><span>Odhlásiť sa</span></div>
    </header>
    <nav class="navigation" aria-label="Hlavná navigácia">
        <a href="/?c=Home&a=index">Dashboard</a>
        <a href="/?c=Home&a=detail">Moje vozidlá</a>
        <a href="/?c=Home&a=detail">Servisné záznamy</a>
        <a href="/?c=Home&a=detail">Plán údržby</a>
        <a href="/?c=Home&a=detail">Dokumenty</a>
        <a href="/?c=Home&a=index">Profil</a>
    </nav>
    <main><?= $contentHTML ?></main>
    <footer>AutoCare – správa vozidiel a servisnej histórie</footer>
</div>
</body>
</html>
