<?php
namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    View\View
};

use App\Models\Item;

class ItemController extends Controller
{
    public function show()
    {
        $result = [];

        foreach (Item::all() as $item) {
            $result[$item->id] = $item->label;
        }

        return view('welcome', [
            'data' => Item::all()
        ]);
    }

    public function delete(Request $request, string $id)
    {
        $id = str_replace('item', '', $id);

        if (($item = Item::find($id))) {
            $item->delete();
        }
        
        return view('welcome', [
            'data' => Item::all()
        ]);
    }
}
