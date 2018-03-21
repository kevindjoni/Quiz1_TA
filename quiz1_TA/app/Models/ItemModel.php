<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
  public $timestamps = false;
  protected $table = "items";
  protected $fillable = ['user_id', 'name', 'price', 'stock'];
  protected $guarded = [];
}
