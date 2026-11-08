<p class="breadcrumb">Servisné záznamy / Formulár</p>
<h2><?= $zaznam->id ? 'Upraviť servisný záznam' : 'Pridať servisný záznam' ?></h2>
<?php if (!empty($chyba)): ?><p style="color:#b00020"><?= htmlspecialchars($chyba) ?></p><?php endif; ?>
<form method="post" action="?c=Servis&amp;a=ulozit" class="servis-form">
<input type="hidden" name="id" value="<?= (int)$zaznam->id ?>">
<label>Dátum <input type="date" name="datum" required value="<?= htmlspecialchars($zaznam->datum) ?>"></label>
<label>Typ úkonu <input type="text" name="typ_ukonu" required maxlength="150" value="<?= htmlspecialchars($zaznam->typ_ukonu) ?>"></label>
<label>Kilometre <input type="number" name="kilometre" required min="0" value="<?= (int)$zaznam->kilometre ?>"></label>
<label>Cena (€) <input type="number" name="cena" required min="0" step="0.01" value="<?= htmlspecialchars((string)$zaznam->cena) ?>"></label>
<button type="submit">Uložiť</button> <a href="?c=Servis&amp;a=index">Zrušiť</a>
</form>
