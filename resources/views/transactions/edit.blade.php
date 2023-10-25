@extends('layouts.template')

@section('title', 'Edit Transaction')

@section('content')
    <div class="mt-4 p-5 bg-success text-white rounded">
        <h1>Edit Transaction</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.update', $transaction) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount (Rupiah)</label>
                    <input type="text" class="form-control" id="amount" name="amount"
                        value="{{ old('amount', $transaction->amount) }}" required>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="income"{{ old('type', $transaction->type) == 'income' ? ' selected' : '' }}>Income</option>
                        <option value="expense"{{ old('type', $transaction->type) == 'expense' ? ' selected' : '' }}>Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="uncategorized"{{ old('category', $transaction->category) == 'uncategorized' ? ' selected' : '' }}>Uncategorized</option>
                        <option value="wage"{{ old('category', $transaction->category) == 'wage' ? ' selected' : '' }}>Wage</option>
                        <option value="bonus"{{ old('category', $transaction->category) == 'bonus' ? ' selected' : '' }}>Bonus</option>
                        <option value="gift"{{ old('category', $transaction->category) == 'gift' ? ' selected' : '' }}>Gift</option>
                        <option value="food & drinks"{{ old('category', $transaction->category) == 'food & drinks' ? ' selected' : '' }}>Food & Drinks</option>
                        <option value="shopping"{{ old('category', $transaction->category) == 'shopping' ? ' selected' : '' }}>Shopping</option>
                        <option value="charity"{{ old('category', $transaction->category) == 'charity' ? ' selected' : '' }}>Charity</option>
                        <option value="housing"{{ old('category', $transaction->category) == 'housing' ? ' selected' : '' }}>Housing</option>
                        <option value="insurance"{{ old('category', $transaction->category) == 'insurance' ? ' selected' : '' }}>Insurance</option>
                        <option value="taxes"{{ old('category', $transaction->category) == 'taxes' ? ' selected' : '' }}>Taxes</option>
                        <option value="transportation"{{ old('category', $transaction->category) == 'transportation' ? ' selected' : '' }}>Transportation</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes">{{ old('notes', $transaction->notes) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
