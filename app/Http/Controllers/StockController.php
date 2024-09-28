<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Exception;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Modeles;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Size;
use App\Models\Color;
use App\Models\Certification;


class StockController extends Controller
{
    public function indexlowstock() {
        $data['products'] = Product::where('stock_qty', '<', 10)
                               ->orderBy('id', 'desc')
                               ->paginate(50);
        $data['brands'] = Brand::all();
        $data['brands'] = Brand::all();
        $data['modeles'] = Modeles::all();
        $data['types'] = Type::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        $data['certifications'] = Certification::all();
        return view('backend.stock.lowstock', $data);
    }

    public function createstock() {
        $data['warehouses'] = Warehouse::all();
        $data['products'] = Product::all();
        return view('backend.stock.create', $data);
    }
}
