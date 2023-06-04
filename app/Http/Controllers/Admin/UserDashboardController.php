<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::whereIn('role_id', [2]);

        $sort = $request->input('sort');

        if ($sort == 'id') {
            $query->orderBy('id')->paginate(3);
        } elseif ($sort == 'name') {
            $query->orderBy('name')->paginate(3);
        } elseif ($sort == 'email') {
            $query->orderBy('email')->paginate(3);
        }

        $users = $query->paginate(5);

        return view('Admin.userdashboard.index', compact('users'));
    }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('Admin.userdashboard.index', compact('users'));
    //     $name = request('name');
    //     $users = User::when($name, function ($query, $name) {
    //         return $query->where('name', 'like', "%$name%");
    //     })->orderBy(request('sort'))->paginate(10);

    //     return view('Admin.users.index', compact('users'));

    //     // return view('Lessor.admin.userdashboard', compact('users'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.UserDashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'mobile' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add any necessary image validation rules
    ]);
    $validatedData['role_id'] = 2;
    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $validatedData['image'] = $imageName;
    }

    // Create a new user with the validated data
    $user = User::create($validatedData);

    // Optionally, you can add any additional logic here (e.g., sending email notifications, etc.)

    // Redirect the user or show a success message
    return redirect()->route('userdashboard.index')->with('success', 'User created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('Admin.userdashboard.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('Admin.userdashboard.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->image = $request->input('image');



        $user->save();

        return redirect()->route('userdashboard.index', $user->id)
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // تحديث التعليقات المرتبطة لإزالة الارتباط بالمستخدم قبل الحذف
        Comment::where('user_id', $id)->update(['user_id' => null]);
    
        // حذف المستخدم بعد تحديث التعليقات
        $user = User::find($id);
        $user->delete();
    
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
    

    //    public function showProfile()
    //  {
    //      // Your code logic here to fetch the user profile data

    //     return view('Admin.layout.app-profile'); // Assuming you have a "profile.blade.php" view file
    // }

    }
