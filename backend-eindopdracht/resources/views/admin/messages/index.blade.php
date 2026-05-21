@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')
@section('page-subtitle', 'Incoming messages from the contact form')

@section('content')

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-gray-500 text-xs uppercase tracking-wider">
                    <th class="text-left px-6 py-3">From</th>
                    <th class="text-left px-6 py-3">Subject</th>
                    <th class="text-left px-6 py-3">Received</th>
                    <th class="text-left px-6 py-3">Status</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $msg)
                    <tr class="border-b border-gray-800 last:border-0 hover:bg-gray-800/50 {{ !$msg->is_read ? 'bg-amber-500/5' : '' }}">
                        <td class="px-6 py-4">
                            <p class="text-white font-medium {{ !$msg->is_read ? 'font-semibold' : '' }}">{{ $msg->name }}</p>
                            <p class="text-gray-500 text-xs">{{ $msg->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-300">{{ $msg->subject }}</td>
                        <td class="px-6 py-4 text-gray-500 text-xs whitespace-nowrap">
                            {{ $msg->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-xs px-2 py-0.5 rounded-full font-medium border
                                {{ $msg->is_read
                                   ? 'bg-gray-600/20 text-gray-500 border-gray-600/30'
                                   : 'bg-amber-500/10 text-amber-400 border-amber-500/20' }}">
                                {{ $msg->is_read ? 'Read' : 'Unread' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3 justify-end" x-data="{ open: false }">
                                <button @click="open = !open"
                                        class="text-amber-400 hover:text-amber-300 text-xs font-medium transition-colors">
                                    View
                                </button>
                                @if (!$msg->is_read)
                                    <form method="POST" action="{{ route('admin.messages.read', $msg) }}">
                                        @csrf @method('PATCH')
                                        <button type="submit"
                                                class="text-green-400 hover:text-green-300 text-xs font-medium transition-colors">
                                            Mark Read
                                        </button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}"
                                      onsubmit="return confirm('Delete this message?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-400 text-xs font-medium transition-colors">
                                        Delete
                                    </button>
                                </form>

                                <div x-show="open" x-cloak
                                     class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4"
                                     @click.self="open = false">
                                    <div class="bg-gray-900 border border-gray-700 rounded-2xl p-8 max-w-lg w-full shadow-2xl">
                                        <div class="flex items-start justify-between mb-4">
                                            <div>
                                                <h3 class="text-white font-semibold text-base">{{ $msg->subject }}</h3>
                                                <p class="text-gray-500 text-sm mt-0.5">
                                                    {{ $msg->name }} &lt;{{ $msg->email }}&gt;
                                                </p>
                                            </div>
                                            <button @click="open = false" class="text-gray-600 hover:text-gray-300 ml-4 text-lg leading-none">✕</button>
                                        </div>
                                        <p class="text-gray-300 text-sm whitespace-pre-wrap">{{ $msg->message }}</p>
                                        <p class="text-gray-600 text-xs mt-5">
                                            Received {{ $msg->created_at->format('d M Y \a\t H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-600">No messages yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($messages->hasPages())
        <div class="mt-6">{{ $messages->links() }}</div>
    @endif

@endsection
