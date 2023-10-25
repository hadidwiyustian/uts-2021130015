@extends('layouts.template')

@section('title', 'Transaction Details')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0">Transaction Details</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Amount (Rupiah):</div>
                    <div class="col-md-9">{{ number_format($transaction->amount, 2) }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Type:</div>
                    <div class="col-md-9">{{ ucfirst($transaction->type) }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Category:</div>
                    <div class="col-md-9">{{ ucfirst($transaction->category) }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 font-weight-bold">Notes:</div>
                    <div class="col-md-9">{{ $transaction->notes ?? 'N/A' }}</div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-md-3">
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('transactions.index') }}" class="btn btn-secondary btn-block">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
