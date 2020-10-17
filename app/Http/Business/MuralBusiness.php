<?php


namespace App\Http\Business;


use App\Models\Mural\Mural;

class MuralBusiness
{
    public function list() {
        return Mural::orderBy('created_at')->get();
    }

    public function create(Mural $mural) {
        $mural->save();
        return [
            "status" => 200,
            "message" => "Tarefa criada com sucesso!"
        ];
    }

    public function delete(int $id) {
        $mural = Mural::find($id);
        if ($mural == null) {
            return [
                "status" => 404,
                "message" => "Registro não encontrado",
            ];
        }
        $mural->delete();
        return [
            "status" => 200,
            "message" => "Tarefa excluída com sucesso!"
        ];
    }

    public function update(Mural $mural, int $id) {
        $muralOld = Mural::find($id);
        if ($muralOld == null) {
            return [
                "status" => 404,
                "message" => "Registro não encontrado",
            ];
        }
        $muralOld->task = $mural->task;
        $muralOld->update();
        return [
            "status" => 200,
            "message" => "Tarefa editada com sucesso!"
        ];
    }
}
