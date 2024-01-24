<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve categories from the 'categories' table, ordered by ID and paginated.
        $categories = DB::table('categories')->orderBy('id')->paginate(10);

        // Pass the retrieved categories to the 'category.all' view.
        return view("category.all", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return the view of page add
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // checked the validation
        $validator = Validator::make($request->only(['name', 'description', 'image']), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);

        // checked if the validation is failed
        if ($validator->fails()) {
            // return the message error in the page add
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // get request image to store in file storage
        $image = $request->image;

        // store in file storage
        $image = $image->store('image/category', 'public');

        // insert the data in database
        DB::table('categories')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        // when insert all input filed correct redirect to the main page
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the category from the 'categories' table based on the provided ID.
        $category = DB::table('categories')->where('id', $id)->first();

        // Pass the retrieved category data to the 'category.delete' view.
        return view('category.delete', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the category from the 'categories' table based on the provided ID.
        $category = DB::table('categories')->where('id', $id)->first();

        // Pass the retrieved category data to the 'category.edit' view.
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get the data form the database to update in database
        $category = DB::table('categories')->where('id', $id)->first();

        // checked the image of storage before delete the image
        if (Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        // checked the validation
        $validator = Validator::make($request->only(['name', 'description', 'image']), [
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);

        // Check if validation fails.
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, handle the image upload and database update.
        $image = $request->image;
        $image = $image->store('image/category', 'public');

        // Update the category in the 'categories' table based on the provided ID.
        DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);

        // Redirect to the 'category.index' route after successful update.
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the category from the 'categories' table based on the provided ID.
        $deleted = DB::table('categories')->where('id', $id)->delete();

        // Check if the deletion was successful.
        if ($deleted) {
            // Redirect to the 'category.index' route after successful deletion.
            return redirect()->route('category.index');
        } else {
            // Redirect to the 'category.index' route with an error message if deletion fails.
            return redirect()->route('category.index')->with('error', 'Failed to delete category.');
        }
    }
}
