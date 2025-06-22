<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageableContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $isQRCode = str_contains($content->key, 'qr_code') || str_contains($content->key, 'qrcode');

        $rules = [
            'value' => $isQRCode ? 'nullable' : 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $messages = [
            'value.required' => 'Valor obrigatório',
        ];

        $validated = $request->validate($rules, $messages);

        if ($request->hasFile('image')) {
            if (!$isQRCode) {
                return back()->withErrors(['image' => 'Upload de imagem só permitido para QR Codes']);
            }

            if ($content->value && Storage::disk('public')->exists($content->value)) {
                Storage::disk('public')->delete($content->value);
            }

            $filename = 'content_' . $content->key . '.' . $request->file('image')->guessExtension();
            $path = $request->file('image')->storeAs('manageable_contents', $filename, 'public');

            $validated['value'] = $path;
        }

        $content->update($validated);

        return redirect()->route('admin.contents.index')
            ->with('success', 'Conteúdo atualizado com sucesso!');
    }
}
