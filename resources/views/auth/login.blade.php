<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login &mdash; {{ config('app.name', 'App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        :root {
            --brand: #3f9087;
            --brand-dark: #2d6e67;
            --brand-light: #e8f5f4;
        }
    </style>
</head>
<body class="min-h-screen flex" style="background: #f0faf9;">

    {{-- Left panel - branding --}}
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden flex-col justify-between p-12"
         style="background: linear-gradient(145deg, #3f9087 0%, #2d6e67 60%, #1e4d47 100%);">

        {{-- Decorative circles --}}
        <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full opacity-10"
             style="background: #ffffff;"></div>
        <div class="absolute bottom-10 -right-16 w-96 h-96 rounded-full opacity-10"
             style="background: #ffffff;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full opacity-5"
             style="background: #ffffff;"></div>

        {{-- Logo / Brand --}}
        <div class="relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center"
                     style="background: rgba(255,255,255,0.2);">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                </div>
                <span class="text-white font-semibold text-xl tracking-wide">
                    {{ config('app.name', 'App') }}
                </span>
            </div>
        </div>

        {{-- Center content --}}
        <div class="relative z-10 text-center">
            {{-- Illustration / Icon --}}
            <div class="mb-8 flex justify-center">
                <div class="w-32 h-32 rounded-full flex items-center justify-center"
                     style="background: rgba(255,255,255,0.12); border: 2px solid rgba(255,255,255,0.2);">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
            </div>
            <h2 class="text-white text-3xl font-bold mb-4 leading-tight">
                Welcome Back!
            </h2>
            <p class="text-white/70 text-base leading-relaxed max-w-xs mx-auto">
                Sign in to access your dashboard and manage everything in one place.
            </p>
        </div>

        {{-- Bottom features --}}
        <div class="relative z-10 grid grid-cols-3 gap-4">
            @foreach([
                ['icon' => 'M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Secure Access'],
                ['icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z', 'label' => 'Analytics'],
                ['icon' => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z', 'label' => 'User Mgmt'],
            ] as $feature)
                <div class="text-center p-3 rounded-xl" style="background: rgba(255,255,255,0.08);">
                    <svg class="w-5 h-5 text-white/80 mx-auto mb-1.5" fill="none" stroke="currentColor"
                         stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}" />
                    </svg>
                    <span class="text-white/70 text-xs font-medium">{{ $feature['label'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Right panel - login form --}}
    <div class="flex-1 flex items-center justify-center p-6 sm:p-10">
        <div class="w-full max-w-md">

            {{-- Mobile logo --}}
            <div class="lg:hidden flex items-center justify-center gap-3 mb-8">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                     style="background: #3f9087;">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                </div>
                <span class="font-semibold text-xl" style="color: #3f9087;">
                    {{ config('app.name', 'App') }}
                </span>
            </div>

            {{-- Card --}}
            <div class="bg-white rounded-2xl shadow-xl shadow-teal-100 p-8 sm:p-10">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-1">Sign in to your account</h1>
                    <p class="text-gray-500 text-sm">Enter your credentials to continue</p>
                </div>

                {{-- Session / Errors --}}
                @if (session('status'))
                    <div class="mb-5 px-4 py-3 rounded-lg text-sm font-medium text-white"
                         style="background: #3f9087;">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 px-4 py-3 rounded-lg text-sm text-red-700 bg-red-50 border border-red-200">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-red-500" fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                            Email address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4.5 h-4.5 text-gray-400" fill="none" stroke="currentColor"
                                     stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="you@example.com"
                                class="w-full pl-10 pr-4 py-3 rounded-xl border text-sm text-gray-800 placeholder-gray-400
                                       transition focus:outline-none
                                       {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200 bg-gray-50' }}"
                                style="{{ !$errors->has('email') ? 'focus:border-color: #3f9087;' : '' }}"
                                onfocus="this.style.borderColor='#3f9087'; this.style.boxShadow='0 0 0 3px rgba(63,144,135,0.12)'; this.style.background='#fff';"
                                onblur="this.style.borderColor=''; this.style.boxShadow=''; this.style.background='';"
                            >
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4.5 h-4.5 text-gray-400" fill="none" stroke="currentColor"
                                     stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                placeholder="••••••••"
                                class="w-full pl-10 pr-11 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm
                                       text-gray-800 placeholder-gray-400 transition focus:outline-none"
                                onfocus="this.style.borderColor='#3f9087'; this.style.boxShadow='0 0 0 3px rgba(63,144,135,0.12)'; this.style.background='#fff';"
                                onblur="this.style.borderColor=''; this.style.boxShadow=''; this.style.background='';"
                            >
                            {{-- Toggle visibility --}}
                            <button type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600">
                                <svg id="eye-icon" class="w-4.5 h-4.5" fill="none" stroke="currentColor"
                                     stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            class="w-4 h-4 rounded border-gray-300 cursor-pointer"
                            style="accent-color: #3f9087;"
                        >
                        <label for="remember" class="ml-2.5 text-sm text-gray-600 cursor-pointer select-none">
                            Keep me signed in
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full py-3.5 px-4 rounded-xl text-white text-sm font-semibold tracking-wide
                               transition-all duration-200 flex items-center justify-center gap-2 mt-2"
                        style="background: #3f9087;"
                        onmouseover="this.style.background='#2d6e67'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 8px 20px rgba(63,144,135,0.35)';"
                        onmouseout="this.style.background='#3f9087'; this.style.transform=''; this.style.boxShadow='';"
                        onmousedown="this.style.transform='translateY(0)';"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        Sign In
                    </button>
                </form>
            </div>

            {{-- Footer --}}
            <p class="text-center text-xs text-gray-400 mt-6">
                &copy; {{ date('Y') }} {{ config('app.name', 'App') }}. All rights reserved.
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eye-icon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />`;
            } else {
                input.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`;
            }
        }
    </script>
</body>
</html>
