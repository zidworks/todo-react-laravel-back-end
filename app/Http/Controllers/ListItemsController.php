<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListItems;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ItemsResource as itemsResource;
//use App\Http\Resources\UsersCollection;


class ListItemsController extends Controller
{
    public function index()
    {
        $todo_model = new ListItems();
        $todos = $todo_model->getAllTodos();
        return TodoListResource::collection($todos);
    }


    public function AddList(Request $request)
    {
        $data = $request->all();
        $query = new ListItems();
        $query->list_id = $request->list_id;
        $query->item_content = $request->item_content;

        $query->save();

            return response()->json([
                'success' => true,
                'login' =>  $query,
                'message' => $query ? 'user insert successfully' : 'Error Found',
                ]);
    }

    public function show($id)
    {
        return new TodosResource(TodoList::findOrFail($id));
    }

 
    public function delete($id)
    {
        $user = TodoList::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }


}