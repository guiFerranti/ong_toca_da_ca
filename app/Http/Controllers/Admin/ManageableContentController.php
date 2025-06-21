<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageableContent;
use Illuminate\Http\Request;

class ManageableContentController extends Controller
{
    public function index()
    {
        $contents = ManageableContent::query()
            ->paginate(10);
        return view('admin.contents.index', compact('contents'));
    }

    public function edit(ManageableContent $content)
    {
        return view('admin.contents.edit', compact('content'));
    }

    public function update(Request $request, ManageableContent $content)
    {
        $rules = [
            'value' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $messages =
            [
                'value.required' => 'Valor obrigatório',
            ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            $filename = 'content_' . $content->key . '.' . $request->file('image')->extension();
            $path = $request->file('image')->storeAs('manageable_contents', $filename, 'public');

            $validated['value'] = $path;
        }

        $content->update($validated);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Conteúdo atualizado com sucesso!');
    }
}
