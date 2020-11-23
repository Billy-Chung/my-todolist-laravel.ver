<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Todo;

class HomeController extends Controller
{
    public function todo()
    {

        $todos = Todo::select('todo', 'id', 'done')->get();
        return view('frontend.index', ['todos' => $todos]);
    }


    public function editPost($id)
    {

        if (request('todo') === null) {

            return redirect()->route('home')->with(['flash_message' => '請輸入想要修改的todo內容']);
        }

        $todo = Todo::find($id);
        $todo->todo = request('todo');
        $todo->updated_at = date('Y/m/d H:i:s');
        $todo->save();

        return redirect()->route('home')->with(['flash_message' => '修改todo成功']);
    }



    public function createPost()
    {
        $todo = new Todo;

        if (request('todo') === null) {

            return redirect()->route('home')->with(['flash_message' => '請輸入想要新增的todo內容']);
        }
        $todo->todo = request('todo');
        $todo->done = false;
        $todo->created_at = date('Y/m/d H:i:s');
        $todo->updated_at = date('Y/m/d H:i:s');
        $todo->save();
        return redirect()->route('home')->with(['flash_message' => '新增todo成功']);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('home')->with(['flash_message' => '刪除todo成功']);
    }

    public function complete($id)
    {
        $todo = Todo::find($id);
        if ($todo->done === 1) {
            return redirect()->route('home')->with(['flash_message' => '此項目已完成，請勿重複勾選']);
        }
        $todo->done = true;
        $todo->updated_at = date('Y/m/d H:i:s');
        $todo->save();

        return redirect()->route('home')->with(['flash_message' => '已完成勾選']);
    }
}
