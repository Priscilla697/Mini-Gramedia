<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       $bookCategorys = BookCategory::all();
        return view('admin.book-Categories.index', compact('bookCategorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.book-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        BookCategory::create($validateData);
        return redirect()->route('admin.book-categories.index')->with('success', 'Kategori  berhasil
        ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $bookCategory = BookCategory::findOrFail($id);
        return view('admin.book-categories.edit', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        {
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $bookCategory = BookCategory::findOrFail($id);
    $bookCategory->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.book-categories.index')->with('success',
    'Kategori buku berhasil diperbarui!');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookCategory = BookCategory::findOrFail($id);
        //
        $bookCategory->delete();
        return redirect()->route('admin.book-categories.index')->with('success',
         'Kategori ' . $bookCategory->name. ' berhasil dihapus');
    }
}
