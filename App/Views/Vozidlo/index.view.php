<p class="breadcrumb">AutoCare / Moje vozidlá</p>
<section class="history">
<div class="section-title"><h2>Moje vozidlá</h2><a class="action-link" href="?c=Vozidlo&amp;a=pridat">Pridať vozidlo</a></div>
<div class="table-wrap"><table><thead><tr><th>Značka</th><th>Model</th><th>Rok výroby</th><th>EČV</th><th>Akcie</th></tr></thead><tbody>
<?php foreach ($vozidla as $v): ?>
<tr><td><?= htmlspecialchars($v->znacka) ?></td><td><?= htmlspecialchars($v->model) ?></td><td><?= (int)$v->rok_vyroby ?></td><td><?= htmlspecialchars($v->ecv) ?></td><td>
<a href="?c=Vozidlo&amp;a=upravit&amp;id=<?= (int)$v->id ?>">Upraviť</a>
<form method="post" action="?c=Vozidlo&amp;a=vymazat" style="display:inline" onsubmit="return confirm('Naozaj vymazať vozidlo? Vozidlo so servisnými záznamami nemožno vymazať.')"><input type="hidden" name="id" value="<?= (int)$v->id ?>"><button type="submit" class="text-button">Vymazať</button></form>
</td></tr>
<?php endforeach; ?>
<?php if (!$vozidla): ?><tr><td colspan="5">Zatiaľ žiadne vozidlá.</td></tr><?php endif; ?>
</tbody></table></div>
<p>Vozidlo s priradenými servisnými záznamami nie je možné vymazať. Najprv vymažte alebo presuňte jeho záznamy.</p>
</section>
