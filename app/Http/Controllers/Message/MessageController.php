<?php


namespace App\Http\Controllers\Message;


use App\Http\Business\MessageBusiness;
use App\Http\Controllers\Controller;
use App\Models\Message\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index() {
        $business = new MessageBusiness();
        return $business->list();
    }

    public function store(Request $request) {
        $message = new Message();
        $business = new MessageBusiness();
        $message->title = $request->all()['title'];
        $message->description = Arr::has($request->all(), 'description') ? $request->all()['description'] : null;
        return $business->create($message);
    }

    public function delete(Request $request, int $id) {
        $business = new MessageBusiness();
        return $business->delete($id);
    }

    public function update(Request $request, int $id) {
        $message = new Message();
        $business = new MessageBusiness();
        $message->title = $request->all()['title'];
        $message->description = Arr::has($request->all(), 'description') ? $request->all()['description'] : null;
        return $business->update($message, $id);
    }

}
