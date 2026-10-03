@extends('layouts.admin')

@section('title', 'Kullanıcılar | Admin Paneli')
@section('header', 'Kullanıcı Yönetimi')

@section('content')
<div class="mb-8 flex justify-between items-end">
    <div>
        <h1 class="text-3xl font-display font-bold text-slate-900 tracking-tight">Kullanıcılar</h1>
        <p class="text-slate-500 mt-2 font-light">Sisteme kayıtlı kullanıcıların yetkilerini düzenleyin veya hesapları kaldırın.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold border-b border-slate-200">
                <tr>
                    <th class="px-6 py-4">Kullanıcı Adı</th>
                    <th class="px-6 py-4">E-posta</th>
                    <th class="px-6 py-4">Rol</th>
                    <th class="px-6 py-4">Kayıt Tarihi</th>
                    <th class="px-6 py-4 text-right">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($users as $user)
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4 font-medium text-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold">
                                {{ strtoupper(substr($user->username, 0, 1)) }}
                            </div>
                            {{ $user->username }}
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        @if($user->is_admin)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                Yönetici (Admin)
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 border border-slate-200">
                                Üye
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-slate-400">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.toggleAdmin', $user) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="text-xs font-medium px-3 py-1.5 rounded-lg border transition-colors {{ $user->is_admin ? 'text-slate-600 border-slate-200 hover:bg-slate-100' : 'text-purple-600 border-purple-200 hover:bg-purple-50' }}">
                                    {{ $user->is_admin ? 'Yetkiyi Al' : 'Admin Yap' }}
                                </button>
                            </form>
                            
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-medium px-3 py-1.5 rounded-lg border border-red-200 text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @else
                            <span class="text-xs text-slate-400 italic">Kendiniz (Yetki Değiştirilemez)</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                        <i class="fas fa-users text-4xl mb-3 text-slate-300"></i>
                        <p>Kayıtlı kullanıcı bulunamadı.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="px-6 py-4 border-t border-slate-200">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
