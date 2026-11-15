<?php
namespace App\Models;
use Framework\Core\Model;
class Vozidlo extends Model
{
    protected static ?string $tableName = 'vozidla';
    protected static ?string $primaryKey = 'id';
    protected static ?array $fillable = ['znacka', 'model', 'rok_vyroby', 'ecv'];
    public ?int $id = null;
    public string $znacka = '';
    public string $model = '';
    public int $rok_vyroby = 2020;
    public string $ecv = '';
}
