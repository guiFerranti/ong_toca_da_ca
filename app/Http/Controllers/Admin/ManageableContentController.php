<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageableContent;
use Illuminate\Http\Request;

class ManageableContentController extends Controller
{
    public function index()
    {
        $contents = ManageableContent::all();
        return view('admin.contents.index', compact('contents'));
    }

    public function edit(ManageableContent $content)
    {
        return view('admin.contents.edit', compact('content'));
    }

    public function update(Request $request, ManageableContent $content)
    {
        $validated = $request->validate([
            'value' => 'required',
            'description' => 'nullable|string'
        ]);

        $content->update($validated);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Conteúdo atualizado com sucesso!');
    }
}
