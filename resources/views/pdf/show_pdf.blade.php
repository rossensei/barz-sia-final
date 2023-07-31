<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #444;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            text-transform: uppercase;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #444;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            text-transform: uppercase;
        }
        p {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
            margin-top: 15px;
            
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        thead {
            background-color: rgb(51, 146, 255)
        }
        th {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Customer Details</h1>
    <p><strong>Customer Name:</strong> {{ $customer->name }}</p>
    <p><strong>Customer Email:</strong> {{ $customer->email }}</p>

    <h2>Customer Order Records</h2>
    <table>
        <thead>
            <tr>
                <th>Order Name</th>
                <th>Order Details</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_name }}</td>
                    <td>{{ $order->order_details }}</td>
                    <td>{{ number_format($order->amount, 2) }}</td>

                    
                </tr>
                
            @endforeach
            <tr>
                <td colspan="2" style="text-align: right; font-weight: bold;">Total:</td>
                <td style="text-align: center; font-weight: bold;">{{ number_format($totalOrdersAmount, 2) }} Php</td>
            </tr>
        </tbody>
    </table>
</body>
</html>