<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UsersResource as UsersResource;
//use App\Http\Resources\UsersCollection;


class UserController extends Controller
{
    public function index()
    {
        $users_model = new Users();
        $users = $users_model->getAllUsers();
        return UsersResource::collection($users);
    }

    public function GetLogin(Request $request)
    {
        $email = $request->input('email');
        $password = md5($request->input('password'));

         $query = DB::table('users')
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->get();
        
        if(isset($query[0])){
            return response()->json([
                'success' => true,
                'login' =>  $query,
                'message' => $query ? 'Login successfully' : 'Error No user Found',
                ]);
        }else {
            return response()->json([
                'success' => false,
                'login' => $query,
                'message' => 'Error No user Found',
                ]);

        }
    }

    
    public function SignUp(Request $request)
    {
        $data = $request->all();
        $query = new Users();
        $query->username = $request->username;
        $query->email = $request->email;
        $query->password = md5($request->password);

        $query->save();

            return response()->json([
                'success' => true,
                'login' =>  $query,
                'message' => $query ? 'user insert successfully' : 'Error Found',
                ]);
    }

    public function show($id)
    {
        return new UsersResource(Users::findOrFail($id));
    }

 
    public function delete($id)
    {
        $user = Users::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }


}