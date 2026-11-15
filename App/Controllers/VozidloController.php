<?php
namespace App\Controllers;
use App\Models\Vozidlo;
use App\Models\ServisnyZaznam;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
class VozidloController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html(['vozidla' => Vozidlo::getAll(null, [], 'id DESC')]);
    }
    public function pridat(Request $request): Response
    {
        return $this->html(['vozidlo' => new Vozidlo()], 'formular');
    }
    public function upravit(Request $request): Response
    {
        $vozidlo = Vozidlo::getOne((int)$request->get('id'));
        if (!$vozidlo) return $this->redirect('?c=Vozidlo&a=index');
        return $this->html(['vozidlo' => $vozidlo], 'formular');
    }
    public function ulozit(Request $request): Response
    {
        if (!$request->isPost()) return $this->redirect('?c=Vozidlo&a=index');
        $id = (int)$request->post('id');
        $vozidlo = $id > 0 ? Vozidlo::getOne($id) : new Vozidlo();
        if (!$vozidlo) return $this->redirect('?c=Vozidlo&a=index');
        $znacka = trim((string)$request->post('znacka'));
        $model = trim((string)$request->post('model'));
        $rok = filter_var($request->post('rok_vyroby'), FILTER_VALIDATE_INT);
        $ecv = trim((string)$request->post('ecv'));
        if ($znacka === '' || $model === '' || $ecv === '' || $rok === false || $rok < 1900 || $rok > 2100) {
            return $this->html(['vozidlo' => $vozidlo, 'chyba' => 'Vyplňte správne všetky polia.'], 'formular');
        }
        $vozidlo->znacka = $znacka;
        $vozidlo->model = $model;
        $vozidlo->rok_vyroby = $rok;
        $vozidlo->ecv = $ecv;
        $vozidlo->save();
        return $this->redirect('?c=Vozidlo&a=index');
    }
    public function vymazat(Request $request): Response
    {
        if ($request->isPost()) {
            $id = (int)$request->post('id');
            $vozidlo = Vozidlo::getOne($id);
            if ($vozidlo && !ServisnyZaznam::getAll('vozidlo_id = ?', [$id])) $vozidlo->delete();
        }
        return $this->redirect('?c=Vozidlo&a=index');
    }
}
