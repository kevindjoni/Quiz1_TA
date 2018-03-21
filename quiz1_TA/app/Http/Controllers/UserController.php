<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Exception;

class UserController extends Controller
{
  protected $users;

  public function __construct(UserModel $users)
  {
    $this -> user = $users;
  }

  public function UserList()
  {
    try
    {
      $users = $this->user->all();
      return $users;
    }
    catch (Exception $ex)
    {
      return response ([
        'msg' => 'Failed'
      ], 400);
    }
  }

  public function CreateUser(Request $request)
  {
    $data = [
      "name"  => $request->name,
      "email"  => $request->email,
      "password"  => md5($request->password)
    ];

    try
    {
        $user = $this->user->create($data);
        return response([
          'msg' => 'Created'
        ], 201);
    }
    catch (Exception $ex)
    {
      return response('Failed', 400);
    }
  }

  public function FindUser($id)
  {
    try
    {
      $user = $this->user->find($id);
      return response([
      'msg' => 'Found'
      ], 200);
      return $user;
    }
    catch (Exception $ex)
    {
      return response([
        'msg' => 'Not Found'
      ], 404);
    }
  }

  public function DeleteUser($id)
  {
    try
    {
      $user = $this->user->find($id);
      $user->delete();
      return response([
        'msg' => 'Deleted'
      ], 200);
    }
    catch (Exception $ex)
    {
      return response([
        'msg' => 'Failed'
      ], 400);
    }
  }

  public function Update(Request $request, $id)
  {
    $user = $this->user->find($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    if($user->password == $request->input('password'))
    {
    }
    else
    {
      $user->password = md5($request->input('password'));
    }

    try
    {
      $user->save();
      return response([
        'msg' => 'Successful'
      ], 200);
    }
    catch (Exception $ex)
    {
      return response([
        'msg' => 'Failed'
      ], 400);
    }
  }

  public function showRelationship()
  {
    try
    {
      $users = $this->user->with('ItemsDetails')->get();
      return $users;
    }
    catch(Exception $ex)
    {
      return response([
        'msg' => 'Failed'
      ], 400);
    }
  }
}
?>
