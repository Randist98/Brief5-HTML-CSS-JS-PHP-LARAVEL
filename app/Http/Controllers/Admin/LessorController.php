<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class LessorController extends Controller
{
    public function index(Request $request)
{
    $lessor = $request->input('name');

    $query = User::whereIn('role_id', [3]);
    $lessors = User::when($lessor, function ($query) use ($lessor) {
        $query->where(function ($query) use ($lessor) {
            $query->where('name', 'like', '%' . $lessor . '%')
                ->orWhere('mobile', 'like', '%' . $lessor . '%');
        });
    })->whereIn('role_id', [3])->paginate(3);

    $sort = $request->input('sort');

    if ($sort == 'id') {
        $query->orderBy('id');
    } elseif ($sort == 'name') {
        $query->orderBy('name');
    } elseif ($sort == 'email') {
        $query->orderBy('email');
    }

    $lessores = $query->paginate(3);

    return view('Admin.Lessor.index', compact('lessores'));
}






    public function create()
    {
        return view('Admin.Lessor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $lessor = new User;
        $lessor->name = $request->name;
        $lessor->email = $request->email;
        $lessor->password = Hash::make($request->password);
        $lessor->role_id = 3;
        $lessor->mobile = $request->mobile;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('image', $imageName);
            $lessor->image = $imageName;
        }

        $lessor->save();

        return redirect()->route('lessores.index')->with('success', 'Lessor created successfully.');
    }

    public function edit($id)
    {
        $lessor = User::findOrFail($id);

        return view('Admin.Lessor.edit', compact('lessor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $lessor_user = User::findOrFail($id);
        $lessor = $lessor_user::findOrFail($id);
        $lessor->name = $request->name;
        $lessor->email = $request->email;
        $lessor->password = Hash::make($request->password);
        $lessor->role_id = 3;
        $lessor->mobile = $request->mobile;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('image', $imageName);
            $lessor->image = $imageName;
        }

        $lessor->save();

        return redirect()->route('lessores.index')->with('success', 'Lessor updated successfully.');
    }

    public function destroy($id)
    {
        $lessor = User::findOrFail($id);
        $lessor->delete();

        return redirect()->route('lessores.index')->with('success', 'Lessor deleted successfully.');
    }

}
