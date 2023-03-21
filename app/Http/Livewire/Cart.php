<?php

namespace App\Http\Livewire;

use App\Mail\BuyMessage;
use App\Models\Pos;
use App\Models\Positem;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Facades\Mail;

class Cart extends Component
{
    public $allProducts;
    public $pendingProducts;

    public function mount()
    {
        $this->fillAllProducts();
        $this->fillPendingProducts();
    }

    public function fillAllProducts()
    {
        $this->allProducts = Product::all();
    }

    public function fillPendingProducts()
    {
        $this->pendingProducts = Pos::where('status', 'pending')->first();
    }

    public function addItem($item)
    {
        $pos = Pos::where('status', 'pending');

        if ($pos->count() == 0) {
            $pos = new Pos();
            $pos->status = 'pending';
            $pos->save();
        }

        $posItem = new Positem();
        $posItem->id_pos = $pos->first()->id;
        $posItem->id_product = $item['id'];
        $posItem->price_actual = $item['price_eur'];
        $posItem->price_actual = $item['price_eur'];
        $posItem->currency_actual = 'eur';
        $posItem->save();
        $this->fillPendingProducts();
    }

    public function removeItem($id_item)
    {
        $pos = Pos::where('status', 'pending')->first();

        foreach ($pos->positem as $item) {
            if ($item->id == $id_item) {
                $item->destroy($id_item);
                $item->save();
            }
        }
        $this->fillPendingProducts();
    }

    public function buy()
    {
        $products = Pos::where('status', 'pending')->first();

        $pos = Pos::where('status', 'pending')->first();
        $pos->status = 'done';
        $pos->save();

        $email['description'] = 'Parabéns, sua compra foi finalizada.';
        $items = '';
        foreach ($products->positem as $item) {
            $items .= "<td>" . $item->product->name . "</td>" .
                "<td>$item->currency_actual</td>" .
                "<td>$item->price_actual</td>";
        }

        $email['itens'] = $items;

        Mail::to('dev@dev.com')->send(new BuyMessage($email));

        $this->fillPendingProducts();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
