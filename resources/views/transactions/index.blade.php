@extends('layouts.template')

@section('title', 'Transaction History')

@section('content')
    <div class="mt-4 p-5 bg-danger text-white rounded">
        <h1>History Transaksi</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-light btn-sm">Tambahkan Transaksi Baru</a>
    </div>

    <div class="row my-5">
        <div class="col-12 px-5">
            <div class="mb-4">
                <strong>Balance: {{ number_format($balance, 2) }} Rupiah</strong>
            </div>
            <div class="mb-4">
                Total Income: {{ number_format($totalIncome, 2) }} Rupiah
            </div>
            <div class="mb-4">
                Total Expense: {{ number_format($totalExpense, 2) }} Rupiah
            </div>
            <div class="mb-4">
                Number of Income Transactions: {{ $incomeCount }}
            </div>
            <div class="mb-4">
                Number of Expense Transactions: {{ $expenseCount }}
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-12 px-5">
            <h3>Transaction List</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Amount (Rupiah)</th>
                        <th>Notes</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td><a href="{{ route('transactions.show', $transaction) }}">{{ $transaction->created_at }}</a>
                            </td>
                            <td>{{ $transaction->type }}</td>
                            <td>{{ $transaction->category }}</td>
                            <td>{{ number_format($transaction->amount, 2) }}</td>
                            <td>{{ $transaction->notes }}</td>
                            <td>
                                <a href="{{ route('transactions.edit', $transaction) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                    class="d-inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
