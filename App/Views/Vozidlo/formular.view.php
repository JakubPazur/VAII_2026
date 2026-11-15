<p class="breadcrumb">Moje vozidlá / Formulár</p>
<h2><?= $vozidlo->id ? 'Upraviť vozidlo' : 'Pridať vozidlo' ?></h2>
<?php if (!empty($chyba)): ?><p style="color:#b00020"><?= htmlspecialchars($chyba) ?></p><?php endif; ?>
<form method="post" action="?c=Vozidlo&amp;a=ulozit" class="servis-form">
<input type="hidden" name="id" value="<?= (int)$vozidlo->id ?>">
<label>Značka <input type="text" name="znacka" required maxlength="100" value="<?= htmlspecialchars($vozidlo->znacka) ?>"></label>
<label>Model <input type="text" name="model" required maxlength="100" value="<?= htmlspecialchars($vozidlo->model) ?>"></label>
<label>Rok výroby <input type="number" name="rok_vyroby" required min="1900" max="2100" value="<?= (int)$vozidlo->rok_vyroby ?>"></label>
<label>EČV <input type="text" name="ecv" required maxlength="20" value="<?= htmlspecialchars($vozidlo->ecv) ?>"></label>
<button type="submit">Uložiť</button> <a href="?c=Vozidlo&amp;a=index">Zrušiť</a>
</form>
