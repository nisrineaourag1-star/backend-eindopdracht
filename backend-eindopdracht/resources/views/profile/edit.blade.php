@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="pt-28 pb-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">

        <div class="mb-8">
            <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-2">Your Account</p>
            <h1 class="text-4xl font-extrabold text-white">Profile Settings</h1>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="mb-6 bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl px-5 py-3 text-sm">
                Profile updated successfully.
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data"
              class="space-y-6 mb-8">
            @csrf @method('patch')

            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 space-y-6">

                <h2 class="text-white font-semibold text-sm uppercase tracking-wide mb-2">Profile Information</h2>

                <div class="flex items-center gap-6">
                    <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}"
                         class="w-20 h-20 rounded-full object-cover border-2 border-gray-700">
                    <div>
                        <label class="block text-gray-400 text-sm font-medium mb-1.5">Profile Photo</label>
                        <input type="file" name="avatar" accept="image/*"
                               class="block text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-500/10 file:text-amber-400 hover:file:bg-amber-500/20 cursor-pointer">
                        <p class="text-gray-600 text-xs mt-1">Max 2 MB — JPEG, PNG, or GIF</p>
                        @error('avatar')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label for="name" class="block text-gray-400 text-sm font-medium mb-1.5">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input id="name" type="text" name="name"
                           value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('name') border-red-500 @enderror">
                    @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="username" class="block text-gray-400 text-sm font-medium mb-1.5">Username</label>
                    <input id="username" type="text" name="username"
                           value="{{ old('username', $user->username) }}" autocomplete="username"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('username') border-red-500 @enderror">
                    @error('username')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="email" class="block text-gray-400 text-sm font-medium mb-1.5">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email', $user->email) }}" required autocomplete="username"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="birthday" class="block text-gray-400 text-sm font-medium mb-1.5">Birthday</label>
                    <input id="birthday" type="date" name="birthday"
                           value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}"
                           max="{{ now()->subDay()->format('Y-m-d') }}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none @error('birthday') border-red-500 @enderror">
                    @error('birthday')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="bio" class="block text-gray-400 text-sm font-medium mb-1.5">Bio</label>
                    <textarea id="bio" name="bio" rows="3" maxlength="1000"
                              class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2.5 text-white text-sm focus:border-amber-500 focus:outline-none resize-none @error('bio') border-red-500 @enderror"
                              placeholder="Tell other People of Tomorrow about yourself…">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <button type="submit"
                    class="bg-amber-500 hover:bg-amber-400 text-black font-bold px-8 py-3
                           rounded-full text-xs uppercase tracking-widest transition-all
                           hover:shadow-lg hover:shadow-amber-500/20">
                Save Changes
            </button>
        </form>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 mb-8">
            <h2 class="text-white font-semibold text-sm uppercase tracking-wide mb-6">Change Password</h2>
            @include('profile.partials.update-password-form')
        </div>

        <div class="bg-gray-900 border border-red-900/30 rounded-2xl p-8">
            <h2 class="text-red-400 font-semibold text-sm uppercase tracking-wide mb-6">Danger Zone</h2>
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</div>

@endsection
