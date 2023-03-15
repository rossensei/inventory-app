<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Office;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::orderBy('name')
        //             ->with('office')
        //             ->get();

        // return inertia('items/Index', compact('items'));

        // $items = Item::orderBy('name')
        //         ->with('office')
        //         ->paginate(10);

        return inertia('items/Index', [
            'items' => Item::orderBy('name')
                        ->with('office')
                        ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::orderBy('id')->get();

        return inertia('items/Create', [
            'offices' => $offices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'value' => 'required|numeric',
            'status' => 'required',
            'office_id' => 'required',
        ]);

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'value' => $request->value,
            'status' => $request->status,
            'office_id' => $request->office_id,
        ]);

        return redirect('/items')->with('message', 'Item added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $offices = Office::orderBy('id')->get();

        return inertia('items/Edit', [
            'item' => $item,
            'offices' => $offices
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'value' => 'required',
            'status' => 'required',
            'office_id' => 'required'
        ]);

        $item->update($fields);

        return redirect('/items')->with('message', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
