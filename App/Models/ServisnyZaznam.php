<?php
namespace App\Models;

use Framework\Core\Model;

class ServisnyZaznam extends Model
{
    protected static ?string $tableName = 'servisne_zaznamy';
    protected static ?string $primaryKey = 'id';
    protected static ?array $fillable = ['datum', 'typ_ukonu', 'kilometre', 'cena'];

    public ?int $id = null;
    public string $datum = '';
    public string $typ_ukonu = '';
    public int $kilometre = 0;
    public float $cena = 0;
}
