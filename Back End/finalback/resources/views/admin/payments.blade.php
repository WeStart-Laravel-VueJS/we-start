@extends('admin.app')

@section('title', 'All Payments')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">All Payments</h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Transaction ID</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>${{ $payment->total }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->transaction_id }}</td>
                            <td>{{ $payment->created_at->format('d-m-Y h:m:s a') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
