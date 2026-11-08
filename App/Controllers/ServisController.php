<?php
namespace App\Controllers;

use App\Models\ServisnyZaznam;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class ServisController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html(['zaznamy' => ServisnyZaznam::getAll(null, [], 'datum DESC, id DESC')]);
    }

    public function pridat(Request $request): Response
    {
        return $this->html(['zaznam' => new ServisnyZaznam()], 'formular');
    }

    public function upravit(Request $request): Response
    {
        $zaznam = ServisnyZaznam::getOne((int)$request->get('id'));
        if (!$zaznam) return $this->redirect('?c=Servis&a=index');
        return $this->html(['zaznam' => $zaznam], 'formular');
    }

    public function ulozit(Request $request): Response
    {
        if (!$request->isPost()) return $this->redirect('?c=Servis&a=index');
        $id = (int)$request->post('id');
        $zaznam = $id > 0 ? ServisnyZaznam::getOne($id) : new ServisnyZaznam();
        if (!$zaznam) return $this->redirect('?c=Servis&a=index');
        $datum = (string)$request->post('datum');
        $typ = trim((string)$request->post('typ_ukonu'));
        $km = filter_var($request->post('kilometre'), FILTER_VALIDATE_INT);
        $cena = filter_var($request->post('cena'), FILTER_VALIDATE_FLOAT);
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $datum) || !$typ || $km === false || $km < 0 || $cena === false || $cena < 0) {
            return $this->html(['zaznam' => $zaznam, 'chyba' => 'Vyplňte všetky polia správne.'], 'formular');
        }
        $zaznam->datum = $datum;
        $zaznam->typ_ukonu = $typ;
        $zaznam->kilometre = $km;
        $zaznam->cena = $cena;
        $zaznam->save();
        return $this->redirect('?c=Servis&a=index');
    }

    public function vymazat(Request $request): Response
    {
        if ($request->isPost()) {
            $zaznam = ServisnyZaznam::getOne((int)$request->post('id'));
            if ($zaznam) $zaznam->delete();
        }
        return $this->redirect('?c=Servis&a=index');
    }
}
