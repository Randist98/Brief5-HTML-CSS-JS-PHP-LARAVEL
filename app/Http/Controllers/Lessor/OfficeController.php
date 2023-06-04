<?php

namespace App\Http\Controllers\Lessor;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Image;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input('name'); // استلام قيمة الاسم من الصفحة
        $userId = Auth::id(); // استرداد معرّف المستخدم المسجل في الجلسة
        
        // تنفيذ البحث بناءً على قيمة الاسم المدخلة ومعرّف المستخدم
        $offices = Office::where('user_id', $userId)
                        ->when($name, function ($query) use ($name) {
                            $query->where('name', 'like', "%{$name}%");
                       

                        })
                        ->paginate(3);
        
        return view('Lessor.office.index', compact('offices'));
    }
    
    

    public function create()
    {
        return view('Lessor.office.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'location' => 'required',
            'details' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // تعديل هنا لتطابق الأسماء بشكل صحيح
        ]);
    
        $office = new Office;
        $office->name = $request->name;
        $office->price = $request->price;
        $office->location = $request->location;
        $office->details = $request->details;
        $office->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $cover = $request->file('image');
            $coverName = time().'.'.$cover->getClientOriginalExtension();
            $cover->move('assit-user\images', $coverName);
            $office->image = $coverName;
        }
        
    
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time().'_'.$file->getClientOriginalName();
                $imagePath = 'assit-user\images/'.$imageName; // تحديد المسار الصحيح هنا
                $file->move('assit-user\images', $imageName);
                
                $image = new Image;
                $image->office_id = $office->id;
                $image->image = $imagePath;
                $image->save();
            }
        }


        $office->save();
    
        return redirect()->route('office.index')->with('success', 'Office created successfully.');
    }
    

    public function edit($id)
    {
        $office = Office::findOrFail($id);
        $images = Image::where('office_id', $id)->get();
    
        return view('Lessor.office.edit', compact('office', 'images'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'location' => 'required',
            'details' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $office = Office::findOrFail($id);
        $office->name = $request->name;
        $office->price = $request->price;
        $office->location = $request->location;
        $office->details = $request->details;
        if ($request->hasFile('image')) {
            $cover = $request->file('image');
            $coverName = time().'.'.$cover->getClientOriginalExtension();
            $cover->move('assit-user\images', $coverName);
            $office->image = $coverName;
        }


        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time().'_'.$file->getClientOriginalName();
                $imagePath = 'assit-user\images/'.$imageName; // تحديد المسار الصحيح هنا
                $file->move('assit-user\images', $imageName);
                
                $image = new Image;
                $image->office_id = $office->id;
                $image->image = $imagePath;
                $image->save();
            }
        }
        $office->save();     


       
  
        return redirect()->route('office.index')->with('success', 'Office updated successfully.');
    }

    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->images()->delete();
        $office->delete();

        return redirect()->route('office.index')->with('success', 'Office deleted successfully.');
    }
}

