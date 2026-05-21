@extends('layouts.admin')

@section('title', 'Edit User')
@section('page-title', 'Edit User')
@section('page-subtitle', $user->name)

@section('content')

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="max-w-2xl space-y-6">
        @csrf @method('PATCH')

        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-1.5">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('name') border-red-500 @enderror">
                    @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-1.5">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}" required
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('username') border-red-500 @enderror">
                    @error('username')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-1.5">New Password <span class="text-gray-600 font-normal">(leave blank to keep)</span></label>
                    <input type="password" name="password" minlength="8"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('password') border-red-500 @enderror">
                    @error('password')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-1.5">Confirm Password</label>
                    <input type="password" name="password_confirmation" minlength="8"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Birthday</label>
                <input type="date" name="birthday"
                       value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}"
                       max="{{ now()->subDay()->format('Y-m-d') }}"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-1.5">Bio</label>
                <textarea name="bio" rows="3" maxlength="1000"
                          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none resize-none">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="hidden" name="is_admin" value="0">
                    <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                           class="rounded border-gray-700 bg-gray-800 text-amber-500 focus:ring-amber-500">
                    <span class="text-sm text-gray-300">Admin privileges</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                    class="bg-amber-500 hover:bg-amber-400 text-black font-semibold text-sm px-6 py-2.5 rounded-lg transition-colors">
                Save Changes
            </button>
            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">
                Cancel
            </a>
        </div>
    </form>

@endsection
