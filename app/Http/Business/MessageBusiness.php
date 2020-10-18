<?php


namespace App\Http\Business;


use App\Models\Message\Message;

class MessageBusiness
{
    public function list() {
        return Message::orderBy('title')->orderBy('created_at')->get();
    }

    public function create(Message $message) {
        $errors = $this->makeValidations($message);
        if ($errors != null && count($errors) > 0) {
            return $errors;
        } else {
            $message->save();
            return [
                "status" => 200,
                "message" => "Recado criado com sucesso!",
                "data" => $message
            ];
        }
    }

    public function delete(int $id) {
        $message = Message::find($id);
        if ($message == null) {
            return [
                "status" => 404,
                "message" => "Registro não encontrado",
            ];
        }
        $message->delete();
        return [
            "status" => 200,
            "message" => "Recado excluído com sucesso!"
        ];
    }

    public function update(Message $message, int $id) {
        $errors = $this->makeValidations($message);
        if ($errors != null && count($errors) > 0) {
            return $errors;
        } else {
            $oldTask = Message::find($id);
            if ($oldTask == null) {
                return [
                    "status" => 404,
                    "message" => "Registro não encontrado",
                ];
            }
            $oldTask->title = $message->title;
            $oldTask->description = $message->description;
            $oldTask->update();
            return [
                "status" => 200,
                "message" => "Recado editado com sucesso!"
            ];
        }
    }

    private function makeValidations(Message $message) {
        if ($message->title == null) {
            return [
                'status' => 422,
                'message' => 'Favor, informe o título do recado!'
            ];
        }
}

}
