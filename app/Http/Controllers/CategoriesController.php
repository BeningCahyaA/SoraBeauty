<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Store a newly created category.
     */
    public function store(StoreCategoriesRequest $request)
    {
        // simpan file gambar (selalu ada karena sudah divalidasi)
        $path = $request->file('image')
            ->store('categories', 'public');     // ex: categories/abc.jpg

        Categories::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'image'       => $path,                         // simpan path relatif
            'description' => $request->description,
        ]);

        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Update an existing category.
     */
    public function update(UpdateCategoriesRequest $request, Categories $category)
    {
        $data = [
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
        ];

        // jika user meng‑upload gambar baru
        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // upload gambar baru
            $data['image'] = $request->file('image')
                ->store('categories', 'public');
        }

        $category->update($data);

        return back()->with('success', 'Kategori berhasil diperbarui');
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'image'       => $this->isMethod('post')
                ? 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
                : 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
