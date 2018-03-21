<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;

class UserController extends Controller
{
  protected $items;

  public function __construct(UserModel $items)
  {
    $this -> item = $items;
  }

  public function ItemList()
  {
    try
    {
      $items = $this->items->all();
      return $items;
    }
    catch (Exception $ex)
    {
      return response ([
        'msg' => 'Failed'
      ], 400);
    }
  }

  public function InsertItem(Request $request)
  {
    $data = [
      "user_id"  => $request->user_id,
      "name"  => $request->name,
      "price"  => $request->price,
      "stock"  => $request->stock,
    ];

    try
    {
        $items = $this->items->create($data);
        return response([
          'msg' => 'Created'
        ], 201);
    }
    catch (Exception $ex)
    {
      return response('Failed', 400);
    }
  }

  public function FindItem($id)
  {
    try
    {
      $items = $this->items->find($id);
      return response([
      'msg' => 'Found'
      ], 200);
      return $items;
    }
    catch (Exception $ex)
    {
      return response([
        'msg' => 'Not Found'
      ], 404);
    }
  }

  public function DeleteItem($id)
  {
    try
    {
      $items = $this->items->find($id);
      $items->delete();
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
    $items = $this->items->find($id);
    $items->user_id = $request->input('user_id');
    $items->name = $request->input('name');
    $items->price = $request->input('price');
    $items->stock = $request->input('stock');

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
}
?>
