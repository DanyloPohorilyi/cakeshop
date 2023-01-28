<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customers</title>
    @include('templates.header')
</head>
<body>
    @include('templates.adminmenu')
    @if ($customers->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">Login</th>
                <th scope="col">Email</th>
                <th scope="col">Is admin?</th>
                <th scope="col">Orders</th>
            </tr>
        </thead>
        <?php $i = 1; ?>
        @foreach ($customers as $customer)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                <td>{{ $customer->login }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->is_admin ? "Yes" : "No" }}</td>
                <td>0</td>

                <td><a href="{{ URL::route('customer.edit', ['customer' => $customer]) }}"><img src="{{ asset('image/icons/pencil-fill.svg') }}" alt="Edit"></a></td>
            </tr>
            <?php $i++; ?>
        @endforeach
    </table>
    @else
        <p>Empty table!</p>
    @endif
    @include('templates.scripts')
</body>
</html>
