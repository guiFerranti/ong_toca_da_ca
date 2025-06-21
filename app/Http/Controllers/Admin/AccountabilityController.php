<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountabilityEntry;
use App\Services\ImgurService;
use Illuminate\Http\Request;

class AccountabilityController extends Controller
{
    public function index()
    {
        $entries = AccountabilityEntry::with('user')->latest()->paginate(15);
        return view('admin.accountability.index', compact('entries'));
    }

    public function edit(AccountabilityEntry $accountability)
    {
        return view('admin.accountability.edit', compact('accountability'));
    }

    public function update(Request $request, AccountabilityEntry $accountability, ImgurService $imgurService)
    {
        $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ], ['*.required' => 'Campo obrigatório']);

        try {
            $data = $request->only(['payment_date', 'amount', 'description']);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('temp');
                $response = $imgurService->uploadImage(storage_path('app/' . $imagePath));
                $data['image_url'] = $response['data']['link'];
            }

            $accountability->update($data);

            return redirect()->route('admin.accountability.index')->with('success', 'Registro atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar: ' . $e->getMessage());
        }
    }

    public function store(Request $request, ImgurService $imgurService)
    {
        $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ], ['*.required' => 'Campo obrigatório']);

        try {
            $imagePath = $request->file('image')->store('temp');
            $response = $imgurService->uploadImage(storage_path('app/' . $imagePath));

            $teste = AccountabilityEntry::create([
                'payment_date' => $request->payment_date,
                'amount' => $request->amount,
                'description' => $request->description,
                'image_url' => $response['data']['link'],
                'user_id' => auth()->id(),
                'status' => 'pending'
            ]);

            return redirect()->route('admin.accountability.index')->with('success', 'Registro cadastrado com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->with('error', 'Erro ao cadastrar: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.accountability.create');
    }

    public function destroy(AccountabilityEntry $accountability)
    {
        try {
            $accountability->delete();

            return redirect()
                ->route('admin.accountability.index')
                ->with('success', 'Registro movido para a lixeira com sucesso!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Erro ao excluir registro: ' . $e->getMessage());
        }
    }
}
