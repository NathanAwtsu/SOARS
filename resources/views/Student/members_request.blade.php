@extends('navbar.navbar_student')

@section('content')

    <div class="container mt-5" style="padding-top: 30px;">
        <h1 class="mt-4">Members' Requests</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $key => $payment)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $payment->name }}</td>
                            <td>{{ $payment->payer_email }}</td>
                            <td>
                                
                                <button class="btn btn-success">Approve</button>
                                <button class="btn btn-danger">Reject</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
