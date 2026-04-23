@extends('layouts.admin')

@section('title', 'Admission Enquiries')
@section('subtitle', 'Review and manage all admission applications')

@section('content')

<style>
    /* ── Stat chips ── */
    .stat-row      { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 24px; }
    .stat-chip     { display: flex; align-items: center; gap: 10px; padding: 14px 20px; border-radius: 12px; background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.06); min-width: 130px; border: 1px solid transparent; text-decoration: none; transition: box-shadow .15s, transform .1s; }
    .stat-chip:hover { box-shadow: 0 4px 14px rgba(0,0,0,.1); transform: translateY(-1px); }
    .stat-chip.active { box-shadow: 0 4px 14px rgba(63,144,135,.2); }
    .stat-dot      { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
    .stat-chip-body strong { display: block; font-size: 20px; font-weight: 800; line-height: 1; }
    .stat-chip-body span   { font-size: 11.5px; color: #6b7280; font-weight: 500; margin-top: 2px; display: block; }

    /* ── Filter tabs ── */
    .filter-bar    { display: flex; gap: 6px; flex-wrap: wrap; margin-bottom: 18px; align-items: center; }
    .filter-tab    { padding: 6px 16px; border-radius: 8px; font-size: 13px; font-weight: 500; border: 1px solid #e5e7eb; background: #fff; color: #6b7280; text-decoration: none; transition: all .15s; }
    .filter-tab:hover  { border-color: #3f9087; color: #3f9087; }
    .filter-tab.active { background: #3f9087; border-color: #3f9087; color: #fff; font-weight: 600; }

    /* ── Table card ── */
    .table-card    { background: #fff; border-radius: 14px; box-shadow: 0 1px 4px rgba(0,0,0,.06), 0 4px 16px rgba(0,0,0,.04); overflow: hidden; }
    .table-wrap    { overflow-x: auto; }
    table          { width: 100%; border-collapse: collapse; font-size: 13.5px; }
    thead tr       { background: #f8fffe; border-bottom: 2px solid #f0f2f5; }
    thead th       { padding: 13px 16px; text-align: left; font-size: 11px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: .07em; white-space: nowrap; }
    tbody tr       { border-bottom: 1px solid #f3f4f6; transition: background .1s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: #f9fffe; }
    tbody td       { padding: 14px 16px; vertical-align: middle; }

    /* ── Status badges ── */
    .badge         { display: inline-flex; align-items: center; gap: 5px; padding: 3px 10px; border-radius: 20px; font-size: 11.5px; font-weight: 600; white-space: nowrap; }
    .badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: currentColor; opacity: .7; }
    .badge-pending  { background: #fffbeb; color: #d97706; }
    .badge-reviewed { background: #eff6ff; color: #2563eb; }
    .badge-approved { background: #f0fdf4; color: #16a34a; }
    .badge-rejected { background: #fef2f2; color: #dc2626; }

    /* ── Class type chip ── */
    .type-chip     { display: inline-block; padding: 2px 10px; border-radius: 6px; font-size: 12px; font-weight: 500; background: #f3f4f6; color: #4b5563; }

    /* ── Avatar initials ── */
    .row-avatar    { width: 34px; height: 34px; border-radius: 50%; background: #e8f5f4; color: #3f9087; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; }

    /* ── Status update form ── */
    .status-form   { display: flex; align-items: center; gap: 7px; }
    .status-select { font-size: 12.5px; border: 1px solid #e5e7eb; border-radius: 8px; padding: 6px 10px; background: #fff; color: #374151; outline: none; cursor: pointer; }
    .status-select:focus { border-color: #3f9087; box-shadow: 0 0 0 2px rgba(63,144,135,.15); }
    .status-btn    { padding: 6px 14px; border-radius: 8px; background: #3f9087; color: #fff; border: none; font-size: 12.5px; font-weight: 600; cursor: pointer; transition: background .15s; white-space: nowrap; }
    .status-btn:hover { background: #2d6e67; }

    /* ── Empty state ── */
    .empty-state   { text-align: center; padding: 70px 20px; }
    .empty-state svg { width: 52px; height: 52px; color: #d1d5db; margin: 0 auto 14px; display: block; }
    .empty-state p { color: #9ca3af; font-size: 14px; }

    /* ── Pagination ── */
    .pager         { padding: 14px 20px; border-top: 1px solid #f3f4f6; }
    .pager-info    { text-align: center; font-size: 12px; color: #9ca3af; margin-top: 10px; }
</style>

{{-- Stat chips row --}}
<div class="stat-row">
    @php
        $chips = [
            ['label' => 'Total',    'value' => $stats['total'],    'color' => '#3f9087', 'filter' => null],
            ['label' => 'Pending',  'value' => $stats['pending'],  'color' => '#d97706', 'filter' => 'pending'],
            ['label' => 'Reviewed', 'value' => $stats['reviewed'], 'color' => '#2563eb', 'filter' => 'reviewed'],
            ['label' => 'Approved', 'value' => $stats['approved'], 'color' => '#16a34a', 'filter' => 'approved'],
            ['label' => 'Rejected', 'value' => $stats['rejected'], 'color' => '#dc2626', 'filter' => 'rejected'],
        ];
        $activeStatus = request('status', '');
    @endphp
    @foreach ($chips as $chip)
        @php $isActive = $activeStatus === ($chip['filter'] ?? ''); @endphp
        <a href="{{ route('admin.admissions.index', $chip['filter'] ? ['status' => $chip['filter']] : []) }}"
           class="stat-chip {{ $isActive ? 'active' : '' }}"
           style="{{ $isActive ? 'border-color:'.$chip['color'].';' : '' }}">
            <span class="stat-dot" style="background:{{ $chip['color'] }};"></span>
            <div class="stat-chip-body">
                <strong style="color:{{ $chip['color'] }}">{{ $chip['value'] }}</strong>
                <span>{{ $chip['label'] }}</span>
            </div>
        </a>
    @endforeach
</div>

{{-- Filter tabs --}}
<div class="filter-bar">
    @php
        $tabs = ['' => 'All', 'pending' => 'Pending', 'reviewed' => 'Reviewed', 'approved' => 'Approved', 'rejected' => 'Rejected'];
    @endphp
    @foreach ($tabs as $val => $label)
        <a href="{{ route('admin.admissions.index', $val ? ['status' => $val] : []) }}"
           class="filter-tab {{ $activeStatus === $val ? 'active' : '' }}">
            {{ $label }}
        </a>
    @endforeach
</div>

{{-- Table card --}}
<div class="table-card">
    @if ($admissions->isEmpty())
        <div class="empty-state">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
            </svg>
            <p>No admissions found{{ $activeStatus ? ' for status: '.$activeStatus : '' }}.</p>
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Parent / Contact</th>
                        <th>Program</th>
                        <th>Class Type</th>
                        <th>Submitted</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admissions as $admission)
                        <tr>
                            <td style="color:#9ca3af; font-size:12px; font-family:monospace;">
                                {{ $admission->id }}
                            </td>

                            <td>
                                <div style="display:flex; align-items:center; gap:10px;">
                                    <div class="row-avatar">
                                        {{ strtoupper(substr($admission->student_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight:600; color:#111827;">{{ $admission->student_name }}</div>
                                        <div style="font-size:12px; color:#9ca3af; margin-top:2px;">
                                            {{ ucfirst($admission->student_gender) }}
                                            &middot;
                                            {{ $admission->student_dob->format('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div style="font-weight:500; color:#374151;">{{ $admission->parent_name }}</div>
                                <div style="font-size:12px; color:#6b7280; margin-top:2px;">{{ $admission->parent_phone }}</div>
                                <div style="font-size:12px; color:#9ca3af;">{{ $admission->parent_email }}</div>
                            </td>

                            <td style="color:#374151; font-weight:500;">{{ $admission->program }}</td>

                            <td>
                                @php
                                    $classLabels = ['one_on_one' => 'One-on-One', 'group' => 'Group', 'online' => 'Online'];
                                @endphp
                                <span class="type-chip">
                                    {{ $classLabels[$admission->class_type] ?? $admission->class_type }}
                                </span>
                            </td>

                            <td style="color:#6b7280; font-size:12.5px; white-space:nowrap;">
                                {{ $admission->created_at->format('d M Y') }}
                                <div style="color:#9ca3af; font-size:11.5px; margin-top:2px;">
                                    {{ $admission->created_at->format('h:i A') }}
                                </div>
                            </td>

                            <td>
                                <span class="badge badge-{{ $admission->status }}">
                                    {{ ucfirst($admission->status) }}
                                </span>
                            </td>

                            <td>
                                <form method="POST"
                                      action="{{ route('admin.admissions.updateStatus', $admission->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="status-form">
                                        <select name="status" class="status-select">
                                            @foreach (['pending', 'reviewed', 'approved', 'rejected'] as $s)
                                                <option value="{{ $s }}" {{ $admission->status === $s ? 'selected' : '' }}>
                                                    {{ ucfirst($s) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="status-btn">Save</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($admissions->hasPages())
            <div class="pager">
                {{ $admissions->links() }}
            </div>
        @endif

        <div class="pager-info">
            Showing {{ $admissions->firstItem() }}–{{ $admissions->lastItem() }}
            of {{ $admissions->total() }} {{ Str::plural('enquiry', $admissions->total()) }}
        </div>
    @endif
</div>

@endsection
