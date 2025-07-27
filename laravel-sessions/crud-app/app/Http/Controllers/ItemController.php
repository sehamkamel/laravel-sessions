<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreRequest;



class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $items = item::latest()->paginate(5);
          
        return view('items.index', compact('items'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('items.create');

    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(ItemStoreRequest $request)
    {
        item::create($request->validated());
           
        return redirect()->route('items.index')
                         ->with('success', 'item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
         return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemStoreRequest $request, Item $item)
    {
       $item->update($request->validated());
          
        return redirect()->route('items.index')
                        ->with('success', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
         $item->delete();
           
        return redirect()->route('items.index')
                        ->with('success', 'item deleted successfully');
    }
}
