@extends('layouts.app')

@section('title', 'Dashboard - LeaveFlow')

@section('content')
<div class="space-y-8 animate-fade-in">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Dashboard</h1>
            <p class="text-slate-500 mt-1">Manage your leave requests and balances</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $total = $leaveRequests->count();
            $pending = $leaveRequests->where('status', 'pending')->count();
            $approved = $leaveRequests->where('status', 'approved')->count();
            $rejected = $leaveRequests->where('status', 'rejected')->count();
        @endphp
        <div class="bg-white rounded-xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                 <div>
                    <p class="text-sm text-slate-500 font-medium">Total Requests</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1">{{ $total }}</p>
                </div>
                <div class="bg-brand-50 text-brand-600 p-2.5 rounded-lg">
                    <i data-lucide="file-text" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 font-medium">Pending</p>
                    <p class="text-2xl font-bold text-amber-600 mt-1">{{ $pending }}</p>
                </div>
                <div class="bg-amber-50 text-amber-600 p-2.5 rounded-lg">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 font-medium">Approved</p>
                    <p class="text-2xl font-bold text-emerald-600 mt-1">{{ $approved }}</p>
                </div>
                <div class="bg-emerald-50 text-emerald-600 p-2.5 rounded-lg">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500 font-medium">Rejected</p>
                    <p class="text-2xl font-bold text-red-600 mt-1">{{ $rejected }}</p>
                </div>
                <div class="bg-red-50 text-red-600 p-2.5 rounded-lg">
                    <i data-lucide="x-circle" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Balance Cards -->
    @if($leaveBalances->count() > 0)
    <div>
        <h2 class="text-lg font-bold text-slate-900 mb-3 flex items-center gap-2">
            <i data-lucide="wallet" class="w-5 h-5 text-brand-600"></i>
            My Leave Balances
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($leaveBalances as $balance)
            <div class="bg-white rounded-xl p-5 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium text-slate-600">{{ $balance->leave_type }}</span>
                    <div class="bg-brand-50 text-brand-600 px-2 py-0.5 rounded text-xs font-semibold">
                        {{ $balance->days_remaining }} days
                    </div>
                </div>
                <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-brand-500 h-2.5 rounded-full transition-all" style="width: {{ min(100, ($balance->days_remaining / 21) * 100) }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Apply Leave Form -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-5">
            <i data-lucide="send" class="w-5 h-5 text-brand-600"></i>
            Apply for Leave
        </h2>
            <form method="POST" action="/leave" class="grid md:grid-cols-2 gap-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">First Name</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Surname</label>
                    <input type="text" name="surname" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">ID Number</label>
                    <input type="text" name="id_number" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Leave Type</label>
                    <select name="leave_type" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                        <option value="">Select type</option>
                        <option>Annual Leave</option>
                        <option>Sick Leave</option>
                        <option>Family Responsibility</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Start Date</label>
                    <input type="date" name="start_date" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">End Date</label>
                    <input type="date" name="end_date" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
                <div class="md:col-span-2">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl transition-all shadow-lg shadow-brand-200">
                        <i data-lucide="send" class="w-4 h-4"></i>
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Leave Requests Table -->
    <div class="mt-14">
        <h2 class="text-lg font-bold text-slate-900 mb-3 flex items-center gap-2">
            <i data-lucide="list" class="w-5 h-5 text-brand-600"></i>
            {{ auth()->user()->role === 'manager' ? 'All Leave Requests' : 'My Leave Requests' }}
        </h2>
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider px-6 py-4">Employee</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider px-6 py-4">ID Number</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider px-6 py-4">Type</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider px-6 py-4">Period</th>
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider px-6 py-4">Status</th>
                            @if(auth()->user()->role === 'manager')
                            <th class="text-left text-xs font-semibold text-slate-500 uppercase tracking-wider px-6 py-4">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($leaveRequests as $leave)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-brand-100 text-brand-700 rounded-full flex items-center justify-center font-bold text-xs">
                                        {{ strtoupper(substr($leave->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900">{{ $leave->name }} {{ $leave->surname }}</p>
                                        @if(auth()->user()->role === 'manager' && $leave->user)
                                        <p class="text-xs text-slate-500">{{ $leave->user->email }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-mono">{{ $leave->id_number }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-medium
                                    {{ $leave->leave_type === 'Annual Leave' ? 'bg-blue-50 text-blue-700' : '' }}
                                    {{ $leave->leave_type === 'Sick Leave' ? 'bg-rose-50 text-rose-700' : '' }}
                                    {{ $leave->leave_type === 'Family Responsibility' ? 'bg-violet-50 text-violet-700' : '' }}">
                                    <i data-lucide="{{ $leave->leave_type === 'Annual Leave' ? 'sun' : ($leave->leave_type === 'Sick Leave' ? 'heart-pulse' : 'users') }}" class="w-3 h-3"></i>
                                    {{ $leave->leave_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                {{ \Carbon\Carbon::parse($leave->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($leave->end_date)->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold
                                    {{ $leave->status === 'approved' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                    {{ $leave->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                    {{ $leave->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        {{ $leave->status === 'approved' ? 'bg-emerald-500' : '' }}
                                        {{ $leave->status === 'pending' ? 'bg-amber-500' : '' }}
                                        {{ $leave->status === 'rejected' ? 'bg-red-500' : '' }}"></span>
                                    {{ ucfirst($leave->status) }}
                                </span>
                            </td>
                            @if(auth()->user()->role === 'manager')
                            <td class="px-6 py-4">
                                @if($leave->status === 'pending')
                                <div class="flex items-center gap-2">
                                    <form method="POST" action="/leave/{{ $leave->id }}/status" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-lg transition-colors">
                                            <i data-lucide="check" class="w-3 h-3"></i>
                                            Approve
                                        </button>
                                    </form>
                                    <form method="POST" action="/leave/{{ $leave->id }}/status" class="inline">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 text-xs font-semibold rounded-lg transition-colors">
                                            <i data-lucide="x" class="w-3 h-3"></i>
                                            Reject
                                        </button>
                                    </form>
                                </div>
                                @else
                                <span class="text-xs text-slate-400">No actions</span>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'manager' ? 6 : 5 }}" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="bg-slate-50 p-4 rounded-full mb-3">
                                        <i data-lucide="inbox" class="w-8 h-8 text-slate-300"></i>
                                    </div>
                                    <p class="text-slate-500 font-medium">No leave requests found</p>
                                
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

