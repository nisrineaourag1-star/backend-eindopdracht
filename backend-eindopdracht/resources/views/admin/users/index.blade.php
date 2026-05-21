@extends('layouts.admin')

@section('title', 'Manage Users')
@section('page-title', 'Manage Users')
@section('page-subtitle', 'All registered accounts')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <p class="text-gray-500 text-sm">{{ $users->total() }} user(s) total</p>
        <a href="{{ route('admin.users.create') }}"
           class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-4 py-2 rounded-lg transition-colors">
            + New User
        </a>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="text-left px-6 py-3">User</th>
                    <th class="text-left px-6 py-3">Username</th>
                    <th class="text-left px-6 py-3">Email</th>
                    <th class="text-left px-6 py-3">Role</th>
                    <th class="text-left px-6 py-3">Joined</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b border-gray-800 last:border-0 hover:bg-gray-800/50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}"
                                     class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                                <span class="text-white font-medium">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $user->username ?? '—' }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if ($user->is_admin)
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20">
                                    Admin
                                </span>
                            @else
                                <span class="text-xs px-2 py-0.5 rounded-full font-medium bg-gray-600/20 text-gray-500 border border-gray-600/30">
                                    User
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs whitespace-nowrap">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3 justify-end">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="text-amber-400 hover:text-amber-300 text-xs font-medium transition-colors">Edit</a>
                                @if ($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                          onsubmit="return confirm('Delete user {{ addslashes($user->name) }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500 hover:text-red-400 text-xs font-medium transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-600">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($users->hasPages())
        <div class="mt-6">{{ $users->links() }}</div>
    @endif

@endsection
