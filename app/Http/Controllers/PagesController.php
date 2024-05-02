<?php

namespace App\Http\Controllers;

use App\Mail\ServiceFormMail;
use App\Models\Artwall;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Mail;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('pages.home');
    }

    public function SingleProduct($id)
    {
        $product = Product::findorFail($id);
        $related_products = Product::latest()->get();

        return view('pages.singleproduct', compact('product', 'related_products'));
    }

    public function SingleActivity($id)
    {
        $activity = Artwall::findorFail($id);

        return view('pages.singleactivity', compact('activity'));
    }

    public function AddToCart()
    {
        //      $allprinting = Printing::latest()->get();
        return view('pages.addtocart');
    }

    public function AddProductToCart($id)
    {

        $product = Product::findOrFail($id);
        $cart = request()->session()->get('addtocart', []);

        $quantity = request()->get('quantity');
        if (isset($cart[$id])) {
            $quantity += $cart[$id]['quantity'];
        }

        $cart[$id] = [
            'name' => $product->name,
            'image' => $product->image,
            'price' => $product->price,
            'quantity' => $quantity,
        ];
        request()->session()->put('addtocart', $cart);

        return view('pages.addtocart')->with('success', 'Product add to cart successfully');

    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function filter(Request $request)
    {
        $categories = Category::latest()->get();
        $filteredProducts = QueryBuilder::for(Product::class)
            ->allowedFilters('artist_id', 'name', 'size', 'price', 'height', 'width', 'in_stock')
            ->allowedIncludes('artist', 'category');

        if ($request->filled('size')) {
            $filteredProducts->where('size', $request->input('size'));
        }

        if ($request->filled('category_ids')) {
            $filteredProducts->whereIn('category_id', $request->input('category_ids'));
        }

        if ($request->filled('artist_id')) {
            $filteredProducts->where('artist_id', $request->input('artist_id'));
        }

        if ($request->filled('in_stock' === 'on')) {
            $filteredProducts->where('quantity' >= 1);
        }

        if ($request->filled('max_height' || 'min_height')) {
            $filteredProducts->whereBetween('height', ['min_height', 'max_height']);
        }
        if ($request->filled('max_width' || 'min_width')) {
            $filteredProducts->whereBetween('width', ['min_width', 'max_width']);
        }

        $filteredProducts = $filteredProducts->paginate(8);

        return view('pages.artworks', compact('filteredProducts', 'categories'));
    }

    public function instore()
    {
        return view('pages.instore');
    }
    public function Store_Post(Request $request)
    {
        Store::create([
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'comments' => $request->comments,
        ]);

        Store::create($request->all());
        Mail::to('zahrapanahi7576@gmail.com')->send(new ServiceFormMail($request));

        return redirect()->back()

            ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }


    public function activities()
    {
        $activities_products = Product::latest()->take(8)->get();
        $all_exhibitions = Artwall::latest()->take(3)->get();
        $all_6_exhibitions = Artwall::latest()->take(6)->get();

        return view('pages.activities', compact('activities_products', 'all_exhibitions', 'all_6_exhibitions'));
    }

    public function framing()
    {
        return view('pages.framing');
    }

    public function wandh()
    {
        return view('pages.wandh');
    }

    public function framingsingle()
    {
        return view('pages.framingsingle');
    }

    public function Printing()
    {
        return view('pages.printing');
    }

    public function Blog()
    {
        return view('pages.blog');
    }

    public function ArtFairs()
    {
        return view('pages.artfairs');
    }

    public function FestivalEvent()
    {
        return view('pages.festival-event');
    }

    public function Exhibition()
    {
        return view('pages.exhibition');
    }
}
