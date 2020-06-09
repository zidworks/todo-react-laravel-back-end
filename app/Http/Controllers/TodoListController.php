<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TodoList;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TodosResource as TodosResource;
//use App\Http\Resources\UsersCollection;


class TodoListController extends Controller
{
    public function index()
    {
        $todo_model = new TodoList();
        $todos = $todo_model->getAllTodos();
        return TodoListResource::collection($todos);
    }
 

    public function AllTitle($user_id)
    {
        $query = DB::table('todo_lists')
            ->where('user_id', '=', $user_id)
            ->select('todo_lists.*')
            ->get();


        foreach ($query as $key => $value) {
            $sql = DB::table('list_items')
            ->where('list_id', '=', $value->id )
            ->select('list_items.*')
            ->get();

            $query[$key]->items	 = $sql;
        
        }

        if(isset($query[0])){
            return response()->json([
                'success' => true,
                'login' =>  $query,
                'message' => $query ? 'Data Found successfully' : 'Error No Data Found',
                ]);
        }else {
            return response()->json([
                'success' => false,
                'login' => $query,
                'message' => 'Error No Data Found',
                ]);

        }

    }
 
    public function AddTitle(Request $request)
    {
        $data = $request->all();
        $query = new TodoList();
        $query->Category_id = $request->Category_id;
        $query->Title = $request->Title;
        $query->user_id = $request->user_id;

        $query->save();

            return response()->json([
                'success' => true,
                'login' =>  $query,
                'message' => $query ? 'user insert successfully' : 'Error Found',
                ]);
    }

       //Update company Note
       public function updateTitle(Request $request, $title_id)
       {
           $status = TodoList::where('id', '=', $title_id);
           $status->Title = $request->Title;
           $status->update($request->all());
   
   
           return response()->json(
               [
                   'success' => true,
                   'note' => 'status update',
                   'message' => $status
                       ? 'status was updated successfully'
                       : 'Error Updating'
               ],
               200
           );
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