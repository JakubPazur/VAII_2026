<p class="breadcrumb">Moje vozidlá / Detail vozidla</p>
<h2>Škoda Octavia</h2>
<section class="vehicle">
    <h3>Údaje o vozidle</h3>
    <div class="vehicle-grid">
        <div><small>Značka a model</small><strong>Škoda Octavia</strong></div>
        <div><small>Rok výroby</small><strong>2018</strong></div>
        <div><small>EČV</small><strong>CA783BH</strong></div>
        <div><small>VIN</small><strong>XXXXXXXXXXXXXXXXX</strong></div>
        <div><small>Najazdené kilometre</small><strong>145 220 km</strong></div>
        <div><small>Vlastník</small><strong>Jakub</strong></div>
    </div>
</section>
<section class="history">
    <div class="section-title"><h3>Servisná história</h3><a class="action-link" href="?c=Servis&amp;a=pridat">Pridať servisný záznam</a></div>
    <div class="table-wrap"><table>
        <thead><tr><th>Dátum</th><th>Typ úkonu</th><th>Kilometre</th><th>Cena</th><th>Akcie</th></tr></thead>
        <tbody><?php foreach ($zaznamy as $z): ?>
        <tr><td><?= htmlspecialchars($z->datum) ?></td><td><?= htmlspecialchars($z->typ_ukonu) ?></td><td><?= (int)$z->kilometre ?> km</td><td><?= number_format((float)$z->cena, 2, ',', ' ') ?> €</td>
        <td><a href="?c=Servis&amp;a=upravit&amp;id=<?= (int)$z->id ?>">Upraviť</a> |
        <form method="post" action="?c=Servis&amp;a=vymazat" style="display:inline" onsubmit="return confirm('Naozaj vymazať?')"><input type="hidden" name="id" value="<?= (int)$z->id ?>"><button class="text-button" type="submit">Vymazať</button></form></td></tr>
        <?php endforeach; ?>
        <?php if (!$zaznamy): ?><tr><td colspan="5">Zatiaľ žiadne servisné záznamy.</td></tr><?php endif; ?></tbody>
    </table></div>
</section>
<div class="bottom-sections">
    <section><h3>Plán údržby</h3><p>Výmena oleja – plán 155 000 km</p></section>
    <section><h3>Dokumenty</h3><p>Faktúry (3) | <button type="button" class="text-button">Nahrať</button></p></section>
</div>
