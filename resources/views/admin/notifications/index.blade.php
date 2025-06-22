@extends('layouts.app-admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Notificações</h1>

            <form action="{{ route('admin.notifications.markAllRead') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Marcar todas como lidas
                </button>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            @forelse($notifications as $notification)
                <div class="border-b border-gray-200 px-6 py-4 flex items-start justify-between
                {{ $notification->is_read ? 'bg-white' : 'bg-blue-50' }}">
                    <div class="flex-1">
                        <p class="font-medium {{ $notification->is_read ? 'text-gray-600' : 'text-gray-900' }}">
                            {{ $notification->message }}
                            @if($notification->form_id)
                                <a href="{{ $notification->type === 'adocao'
                ? route('admin.animals.forms.show', ['type' => 'adocao', 'id' => $notification->form_id])
                : route('admin.animals.forms.show', ['type' => 'apadrinhamento', 'id' => $notification->form_id]) }}"
                                   class="ml-2 text-blue-600 hover:text-blue-900 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            @endif
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $notification->created_at->locale('pt_BR')->diffForHumans() }}
                        </p>
                    </div>

                    <div class="ml-4 flex-shrink-0">
                        <form action="{{ route('admin.notifications.markAsRead', $notification) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-blue-600 hover:text-blue-900">
                                {{ $notification->is_read ? '✔ Lida' : 'Marcar como lida' }}
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="px-6 py-4 text-center text-gray-500">
                    Nenhuma notificação encontrada.
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
    </div>
@endsection
