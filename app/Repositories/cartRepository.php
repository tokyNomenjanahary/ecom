<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class cartRepository
{
  public function add(Product $product)
  {
    \Cart::session(Auth::user()->id)->add([
      'id' => $product->id,
      'name' => $product->name,
      'price' => $product->price,
      'quantity' => 1,
      'attributes' => [],
      'associateModel' => $product
    ]);

    return $this->count();
  }

  public function content()
  {
    return \Cart::session(Auth::user()->id)->getContent();
  }

  public function count()
  {
    return $this->content()->sum('quantity');
  }

  public function increase($id)
  {
    \Cart::session(Auth::user()->id)
      ->update($id, [
        'quantity' => +1
      ]);
  }

  public function decrease($id)
  {
    $item = \Cart::session(Auth::user()->id)->get($id);

    if ($item->quantity === 1) {
      $this->remove($id);
      return;
    }

    \Cart::session(Auth::user()->id)
      ->update($id, [
        'quantity' => -1
      ]);
  }

  public function remove($id)
  {
    \Cart::session(Auth::user()->id)->remove($id);
    return;
  }
}
