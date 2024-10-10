<?php
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function store(Request $request)
{
$validated = $request->validate([
'first_name' => 'required',
'last_name' => 'required',
'date_of_birth' => 'required|date',
'gender' => 'required',
'email' => 'required|email|unique:users',
'password' => 'required|min:6',
]);

$user = User::create([
'first_name' => $validated['first_name'],
'last_name' => $validated['last_name'],
'date_of_birth' => $validated['date_of_birth'],
'gender' => $validated['gender'],
'email' => $validated['email'],
'password' => Hash::make($validated['password']),
]);

return response()->json($user, 201);
}

public function show($id)
{
return response()->json(User::findOrFail($id), 200);
}

public function index(Request $request)
{
$query = User::query();

if ($request->has('first_name')) {
$query->where('first_name', $request->first_name);
}

if ($request->has('gender')) {
$query->where('gender', $request->gender);
}

if ($request->has('date_of_birth')) {
$query->where('date_of_birth', $request->date_of_birth);
}

return response()->json($query->get(), 200);
}

public function update(Request $request)
{
$user = User::findOrFail($request->id);
$user->update($request->all());
return response()->json($user, 200);
}

public function destroy(Request $request)
{
$user = User::findOrFail($request->id);
$user->timesheets()->delete();
$user->delete();
return response()->json(null, 204);
}
}
