<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adocao;
use App\Models\Apadrinhamento;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'adocao');
        $perPage = 15;

        $forms = $type === 'adocao'
            ? Adocao::statusOrder()->latest()->paginate($perPage)
            : Apadrinhamento::statusOrder()->latest()->paginate($perPage);

        return view('admin.forms.index', compact('forms', 'type'));
    }

    public function show($type, $id)
    {
        $form = $type === 'adocao'
            ? Adocao::findOrFail($id)
            : Apadrinhamento::findOrFail($id);

        $fieldLabels = $form::getFieldLabels();
        $fieldGroups = $form::getFieldGroups();

        return view('admin.forms.show', compact('form', 'type', 'fieldLabels', 'fieldGroups'));
    }
    
    public function updateStatus(Request $request, $type, $id)
    {
        $request->validate(['status' => 'required|in:Não lido,Lido,Concluído']);

        $form = $type === 'adocao'
            ? Adocao::findOrFail($id)
            : Apadrinhamento::findOrFail($id);

        $form->update(['status' => $request->status]);

        return response()->json(['success' => true, 'new_status' => $request->status]);
    }

    public function destroy($type, $id)
    {
        try {
            $form = $type === 'adocao'
                ? Adocao::findOrFail($id)
                : Apadrinhamento::findOrFail($id);

            $form->delete();

            return redirect()
                ->route('admin.animals.forms.index', ['type' => $type])
                ->with('success', 'Formulário movido para a lixeira com sucesso!');
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Erro ao excluir formulário: ' . $e->getMessage());
        }
    }
}
