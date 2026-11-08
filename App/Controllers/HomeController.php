<?php
namespace App\Controllers;

use App\Models\ServisnyZaznam;
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
        return $this->html(['zaznamy' => ServisnyZaznam::getAll(null, [], 'datum DESC, id DESC')]);
    }
}
