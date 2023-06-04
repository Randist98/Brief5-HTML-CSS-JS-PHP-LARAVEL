<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;

class OfficeadminController extends Controller
{

        public function index(Request $request)
        {
            $sort = $request->input('sort'); // استلام قيمة السورت من الصفحة

            // تنفيذ الفرز واسترجاع البيانات بناءً على قيمة السورت المستلمة
            if ($sort == 'name') {
                $offices = Office::orderBy('name')->paginate(3);
            } elseif ($sort == 'price') {
                $offices = Office::orderBy('price')->paginate(3);
            } elseif ($sort == 'location') {
                $offices = Office::orderBy('location')->paginate(3);
            } else {
                $offices = Office::paginate(3);
            }


            return view('Admin.office.index', compact('offices'));
        }



        public function create()
        {
            return view('Admin.office.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'location' => 'required',
                'details' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $office = new Office;
            $office->name = $request->name;
            $office->price = $request->price;
            $office->location = $request->location;
            $office->details = $request->details;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('image', $imageName);
                $office->image = $imageName;
            }

            $office->save();

            return redirect()->route('offices.index')->with('success', 'Office created successfully.');
        }

        public function edit($id)
        {
            $office = Office::findOrFail($id);

            return view('Admin.office.edit', compact('office'));
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
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('image', $imageName);
                $office->image = $imageName;
            }

            $office->save();

            return redirect()->route('offices.index')->with('success', 'Office updated successfully.');
        }

        public function destroy($id)
        {
            $office = Office::findOrFail($id);
            $office->delete();

            return redirect()->route('offices.index')->with('success', 'Office deleted successfully.');
        }




    }
