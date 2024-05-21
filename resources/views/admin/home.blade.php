@extends('layouts.homelayouts')

@section('konten')

<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold text-pink-600 mb-4">Welcome to the Admin Dashboard</h2>
    
    <!-- Cards Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Transactions Card -->
        <div class="bg-pink-500 text-white p-6 rounded-lg flex items-center justify-between">
            <div>
                <p class="text-lg font-bold">Total Transactions</p>
                <p class="text-2xl font-bold">{{ $totalTransactions }}</p>
            </div>
            <i class="fas fa-shopping-cart fa-3x"></i>
        </div>

        <!-- Total Amount Card -->
        <div class="bg-pink-500 text-white p-6 rounded-lg flex items-center justify-between">
            <div>
                <p class="text-lg font-bold">Total Amount</p>
                <p class="text-2xl font-bold">Rp. {{ number_format($totalAmount, 0, ',', '.') }}</p>
            </div>
            <i class="fas fa-dollar-sign fa-3x"></i>
        </div>

        <!-- Total Users Card -->
        <div class="bg-pink-500 text-white p-6 rounded-lg flex items-center justify-between">
            <div>
                <p class="text-lg font-bold">Total Users</p>
                <p class="text-2xl font-bold">{{ $totalUsers }}</p>
            </div>
            <i class="fas fa-users fa-3x"></i>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="mt-8">
        <h3 class="text-2xl font-bold text-gray-700 mb-4">Quick Links</h3>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <li>
                <a href="{{ route('transaksi.index') }}" class="bg-pink-500 text-white py-4 px-6 rounded-lg block text-center hover:bg-pink-600">Manage Transactions</a>
            </li>
            <!-- Add more quick links as needed -->
        </ul>
    </div>
</div>
@endsection