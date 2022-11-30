<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>ID Order</td>
            <td>:</td>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <td>Customer</td>
            <td>:</td>
            <td>{{ $order->customer->fullname }}</td>
        </tr>
    </table>
    <br>
    <a href="{{ url('/backend/order/'.$order->id) }}">Klik Disini</a> untuk melihat detail.
</body>
</html>