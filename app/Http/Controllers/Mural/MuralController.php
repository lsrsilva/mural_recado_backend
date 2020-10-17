<?php


namespace App\Http\Controllers\Mural;


use App\Http\Business\MuralBusiness;
use App\Http\Controllers\Controller;
use App\Models\Mural\Mural;
use Illuminate\Http\Request;

class MuralController extends Controller
{
    public function index() {
        $business = new MuralBusiness();
        return $business->list();
    }

    public function store(Request $request) {
        $mural = new Mural();
        $business = new MuralBusiness();
        $mural->task = $request->all()['task'];
        return $business->create($mural);
    }

    public function delete(Request $request, int $id) {
        $business = new MuralBusiness();
        return $business->delete($id);
    }

    public function update(Request $request, int $id) {
        $mural = new Mural();
        $business = new MuralBusiness();
        $mural->task = $request->all()['task'];
        return $business->update($mural, $id);
    }
}
