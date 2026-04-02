<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &mdash; {{ config('app.name', 'App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gray-50">

    <nav class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#3f9087;">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                </svg>
            </div>
            <span class="font-semibold text-gray-800">{{ config('app.name', 'App') }}</span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.admissions.index') }}"
               class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">
               Admissions
            </a>
            <span class="text-sm text-gray-500">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="text-sm font-medium px-4 py-2 rounded-lg text-white transition"
                        style="background:#3f9087;"
                        onmouseover="this.style.background='#2d6e67';"
                        onmouseout="this.style.background='#3f9087';">
                    Sign Out
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-6 py-16 text-center">
        <div class="w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6"
             style="background:#e8f5f4;">
            <svg class="w-10 h-10" style="color:#3f9087;" fill="none" stroke="currentColor"
                 stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Dashboard</h1>
        <p class="text-gray-500 mb-8">Welcome back, <strong>{{ Auth::user()->name }}</strong>!</p>

        <a href="{{ route('admin.admissions.index') }}"
           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-medium text-sm transition"
           style="background:#3f9087;"
           onmouseover="this.style.background='#2d6e67';"
           onmouseout="this.style.background='#3f9087';">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75a2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25z"/>
            </svg>
            View Admissions
        </a>
    </main>

</body>
</html>
