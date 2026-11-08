<p class="breadcrumb">Moje vozidlá / Servisná história</p>
<section class="history">
<div class="section-title"><h2>Servisné záznamy – Škoda Octavia</h2><a class="action-link" href="?c=Servis&amp;a=pridat">Pridať servisný záznam</a></div>
<div class="table-wrap"><table><thead><tr><th>Dátum</th><th>Typ úkonu</th><th>Kilometre</th><th>Cena</th><th>Akcie</th></tr></thead><tbody>
<?php foreach ($zaznamy as $z): ?>
<tr><td><?= htmlspecialchars($z->datum) ?></td><td><?= htmlspecialchars($z->typ_ukonu) ?></td><td><?= (int)$z->kilometre ?> km</td><td><?= number_format((float)$z->cena, 2, ',', ' ') ?> €</td><td>
<a href="?c=Servis&amp;a=upravit&amp;id=<?= (int)$z->id ?>">Upraviť</a>
<form method="post" action="?c=Servis&amp;a=vymazat" style="display:inline" onsubmit="return confirm('Naozaj vymazať záznam?')"><input type="hidden" name="id" value="<?= (int)$z->id ?>"><button type="submit" class="text-button">Vymazať</button></form>
</td></tr>
<?php endforeach; ?>
<?php if (!$zaznamy): ?><tr><td colspan="5">Zatiaľ žiadne záznamy.</td></tr><?php endif; ?>
</tbody></table></div></section>
<p><a href="?c=Home&amp;a=detail">Späť na detail vozidla</a></p>
