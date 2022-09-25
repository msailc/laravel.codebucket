<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crypto Prices</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Crypto Prices</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Datetime</th>
                    <th>Coin</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crypto_prices as $crypto_price)
                    <tr>
                        <td> {{ $crypto_price->created_at->format('Y-m-d H:i:s') }} </td>
                        <td> ${{ number_format($crypto_price->usd, 2) }} </td>
                        <td> ${{ number_format($crypto_price->eur, 2) }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $crypto_prices->links() }}
    </div>
</body>
</html>
