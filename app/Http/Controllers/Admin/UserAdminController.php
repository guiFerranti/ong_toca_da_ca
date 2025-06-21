<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        $users = User::all();

        return view('admin.users.index', compact('admins', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|in:admin,user',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso por outro usuário ou administrador.',

            'password.required' => 'A senha é obrigatória.',
            'password.string' => 'A senha deve ser um texto.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',

            'type.required' => 'O tipo de usuário é obrigatório.',
            'type.in' => 'O tipo de usuário deve ser admin ou user.',
        ]);

        $data = $validated;
        $data['password'] = bcrypt($data['password']);

        if ($validated['type'] === 'admin') {
            Admin::create($data);
        } else {
            User::create($data);
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($type, $id)
    {
        if (!in_array($type, ['admin', 'user'])) {
            abort(404);
        }

        $user = $type === 'admin' ? Admin::findOrFail($id) : User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'type'));
    }

    public function update(Request $request, $type, $id)
    {
        if (!in_array($type, ['admin', 'user'])) {
            abort(404);
        }

        $user = $type === 'admin' ? Admin::findOrFail($id) : User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . ($type === 'admin' ? $id : 'null') . '|unique:users,email,' . ($type === 'user' ? $id : 'null'),
            'password' => 'nullable|string|min:6|confirmed',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',

            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

}
