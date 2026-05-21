@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <div class="relative pt-28 pb-12 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1578946956088-940c3b502864?auto=format&fit=crop&w=1920&q=80"
                 alt="Festival stage lights"
                 class="w-full h-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/70 to-festival-dark"></div>
        </div>
        <div class="relative max-w-2xl mx-auto text-center">
            <p class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-4">Get in Touch</p>
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white mb-4">Contact Us</h1>
            <p class="text-gray-300 text-lg">We would love to hear from you.</p>
        </div>
    </div>

    <div class="px-4 sm:px-6 lg:px-8 pb-24">
        <div class="max-w-2xl mx-auto">

            @if (session('success'))
                <div class="mb-8 flex items-start gap-3 bg-amber-500/10 border border-amber-500/30
                            text-amber-300 rounded-xl px-5 py-4 text-sm">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}"
                  class="bg-gray-900 border border-gray-800 rounded-2xl p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div>
                        <label for="name" class="block text-white text-sm font-medium mb-2">
                            Your Name <span class="text-amber-500">*</span>
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="John Doe"
                               class="w-full bg-gray-800 border text-white placeholder-gray-600
                                      rounded-lg px-4 py-3 text-sm outline-none transition-colors
                                      focus:border-amber-500 focus:ring-1 focus:ring-amber-500/30
                                      {{ $errors->has('name') ? 'border-red-500' : 'border-gray-700' }}">
                        @error('name')
                            <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-white text-sm font-medium mb-2">
                            Email Address <span class="text-amber-500">*</span>
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="you@example.com"
                               class="w-full bg-gray-800 border text-white placeholder-gray-600
                                      rounded-lg px-4 py-3 text-sm outline-none transition-colors
                                      focus:border-amber-500 focus:ring-1 focus:ring-amber-500/30
                                      {{ $errors->has('email') ? 'border-red-500' : 'border-gray-700' }}">
                        @error('email')
                            <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="subject" class="block text-white text-sm font-medium mb-2">
                        Subject <span class="text-amber-500">*</span>
                    </label>
                    <input type="text"
                           id="subject"
                           name="subject"
                           value="{{ old('subject') }}"
                           placeholder="What can we help you with?"
                           class="w-full bg-gray-800 border text-white placeholder-gray-600
                                  rounded-lg px-4 py-3 text-sm outline-none transition-colors
                                  focus:border-amber-500 focus:ring-1 focus:ring-amber-500/30
                                  {{ $errors->has('subject') ? 'border-red-500' : 'border-gray-700' }}">
                    @error('subject')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-white text-sm font-medium mb-2">
                        Message <span class="text-amber-500">*</span>
                    </label>
                    <textarea id="message"
                              name="message"
                              rows="6"
                              placeholder="Write your message here..."
                              class="w-full bg-gray-800 border text-white placeholder-gray-600
                                     rounded-lg px-4 py-3 text-sm outline-none transition-colors resize-none
                                     focus:border-amber-500 focus:ring-1 focus:ring-amber-500/30
                                     {{ $errors->has('message') ? 'border-red-500' : 'border-gray-700' }}">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-amber-500 hover:bg-amber-400 text-black font-bold py-4
                               rounded-full text-xs uppercase tracking-widest transition-all
                               hover:shadow-xl hover:shadow-amber-500/20 hover:-translate-y-0.5">
                    Send Message
                </button>
            </form>

        </div>
    </div>

@endsection
