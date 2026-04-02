<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions &mdash; {{ config('app.name', 'App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gray-50">

    {{-- Navigation --}}
    <nav class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#3f9087;">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                </svg>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="font-semibold text-gray-800 hover:text-gray-600 transition">
                {{ config('app.name', 'App') }}
            </a>
            <span class="text-gray-300">/</span>
            <span class="text-sm font-medium text-gray-500">Admissions</span>
        </div>
        <div class="flex items-center gap-4">
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

    <main class="max-w-7xl mx-auto px-6 py-8">

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-emerald-800 bg-emerald-50 border border-emerald-200">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Admission Enquiries</h1>
            <p class="text-sm text-gray-500 mt-1">Review and manage all admission applications.</p>
        </div>

        {{-- Stats cards --}}
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mb-8">
            @php
                $statCards = [
                    ['label' => 'Total',    'value' => $stats['total'],    'color' => '#3f9087', 'bg' => '#e8f5f4'],
                    ['label' => 'Pending',  'value' => $stats['pending'],  'color' => '#d97706', 'bg' => '#fffbeb'],
                    ['label' => 'Reviewed', 'value' => $stats['reviewed'], 'color' => '#2563eb', 'bg' => '#eff6ff'],
                    ['label' => 'Approved', 'value' => $stats['approved'], 'color' => '#16a34a', 'bg' => '#f0fdf4'],
                    ['label' => 'Rejected', 'value' => $stats['rejected'], 'color' => '#dc2626', 'bg' => '#fef2f2'],
                ];
            @endphp
            @foreach ($statCards as $card)
                <a href="{{ route('admin.admissions.index', $card['label'] !== 'Total' ? ['status' => strtolower($card['label'])] : []) }}"
                   class="rounded-2xl p-4 border transition hover:shadow-md {{ request('status') === strtolower($card['label']) ? 'ring-2' : '' }}"
                   style="background:{{ $card['bg'] }}; border-color:{{ $card['color'] }}22; {{ request('status') === strtolower($card['label']) ? 'ring-color:'.$card['color'].';' : '' }}">
                    <p class="text-2xl font-bold" style="color:{{ $card['color'] }}">{{ $card['value'] }}</p>
                    <p class="text-xs font-medium text-gray-500 mt-1">{{ $card['label'] }}</p>
                </a>
            @endforeach
        </div>

        {{-- Filter tabs --}}
        <div class="flex items-center gap-2 mb-4 flex-wrap">
            @php
                $filters = [
                    ''         => 'All',
                    'pending'  => 'Pending',
                    'reviewed' => 'Reviewed',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ];
            @endphp
            @foreach ($filters as $value => $label)
                <a href="{{ route('admin.admissions.index', $value ? ['status' => $value] : []) }}"
                   class="px-4 py-1.5 rounded-full text-sm font-medium border transition
                          {{ request('status', '') === $value
                              ? 'text-white border-transparent'
                              : 'text-gray-600 bg-white border-gray-200 hover:border-gray-400' }}"
                   @if(request('status', '') === $value) style="background:#3f9087;" @endif>
                    {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            @if ($admissions->isEmpty())
                <div class="py-20 text-center">
                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                    <p class="text-gray-500 text-sm">No admissions found.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-100" style="background:#f8fffe;">
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Student</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Parent</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Program</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Class Type</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Submitted</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="text-left px-5 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($admissions as $admission)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-5 py-4 text-gray-400 font-mono text-xs">{{ $admission->id }}</td>

                                    <td class="px-5 py-4">
                                        <p class="font-medium text-gray-800">{{ $admission->student_name }}</p>
                                        <p class="text-xs text-gray-400 mt-0.5">
                                            {{ ucfirst($admission->student_gender) }}
                                            &middot;
                                            {{ $admission->student_dob->format('d M Y') }}
                                        </p>
                                    </td>

                                    <td class="px-5 py-4">
                                        <p class="text-gray-700">{{ $admission->parent_name }}</p>
                                        <p class="text-xs text-gray-400 mt-0.5">{{ $admission->parent_phone }}</p>
                                        <p class="text-xs text-gray-400">{{ $admission->parent_email }}</p>
                                    </td>

                                    <td class="px-5 py-4 text-gray-700">{{ $admission->program }}</td>

                                    <td class="px-5 py-4">
                                        @php
                                            $classLabels = [
                                                'one_on_one' => 'One-on-One',
                                                'group'      => 'Group',
                                                'online'     => 'Online',
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                            {{ $classLabels[$admission->class_type] ?? $admission->class_type }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-4 text-gray-500 text-xs">
                                        {{ $admission->created_at->format('d M Y') }}<br>
                                        <span class="text-gray-400">{{ $admission->created_at->format('h:i A') }}</span>
                                    </td>

                                    <td class="px-5 py-4">
                                        @php
                                            $statusStyles = [
                                                'pending'  => 'background:#fffbeb; color:#d97706;',
                                                'reviewed' => 'background:#eff6ff; color:#2563eb;',
                                                'approved' => 'background:#f0fdf4; color:#16a34a;',
                                                'rejected' => 'background:#fef2f2; color:#dc2626;',
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold capitalize"
                                              style="{{ $statusStyles[$admission->status] ?? '' }}">
                                            {{ $admission->status }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-4">
                                        <form method="POST"
                                              action="{{ route('admin.admissions.updateStatus', $admission->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="flex items-center gap-2">
                                                <select name="status"
                                                        class="text-xs border border-gray-200 rounded-lg px-2 py-1.5 bg-white text-gray-700 focus:outline-none focus:ring-1"
                                                        style="focus-ring-color:#3f9087;">
                                                    @foreach (['pending', 'reviewed', 'approved', 'rejected'] as $s)
                                                        <option value="{{ $s }}" {{ $admission->status === $s ? 'selected' : '' }}>
                                                            {{ ucfirst($s) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit"
                                                        class="text-xs font-medium px-3 py-1.5 rounded-lg text-white transition"
                                                        style="background:#3f9087;"
                                                        onmouseover="this.style.background='#2d6e67';"
                                                        onmouseout="this.style.background='#3f9087';">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($admissions->hasPages())
                    <div class="px-5 py-4 border-t border-gray-100">
                        {{ $admissions->links() }}
                    </div>
                @endif
            @endif
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            Showing {{ $admissions->firstItem() ?? 0 }}–{{ $admissions->lastItem() ?? 0 }}
            of {{ $admissions->total() }} admission{{ $admissions->total() !== 1 ? 's' : '' }}
        </p>
    </main>

</body>
</html>
