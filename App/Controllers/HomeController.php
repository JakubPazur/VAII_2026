<?php
namespace App\Controllers;

use App\Models\ServisnyZaznam;
use App\Models\Vozidlo;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class HomeController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html();
    }

    public function detail(Request $request): Response
    {
        $vozidla = Vozidlo::getAll(null, [], 'id ASC');
        $vozidlo = $vozidla[0] ?? null;
        return $this->html(['vozidlo' => $vozidlo, 'zaznamy' => $vozidlo ? ServisnyZaznam::getAll('vozidlo_id = ?', [$vozidlo->id], 'datum DESC, id DESC') : []]);
    }
}
