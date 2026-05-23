<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Invoice {{ $order->invoice_number }}
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            font-family: DejaVu Sans, sans-serif;
            background: #f8f3f1;
            color: #333;
            padding: 40px;
        }

        .container {

            background: #ffffff;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* HEADER */
        .header {

            background: linear-gradient(135deg,
                    #d94f70,
                    #a44c63);

            color: white;
            padding: 40px;
        }

        .header h1 {

            font-size: 42px;
            margin-bottom: 10px;
        }

        .header p {

            opacity: 0.9;
            font-size: 16px;
        }

        /* BODY */
        .content {

            padding: 40px;
        }

        .info-grid {

            width: 100%;
            margin-bottom: 35px;
        }

        .info-grid td {

            padding: 12px 0;
            vertical-align: top;
        }

        .label {

            color: #777;
            font-size: 14px;
            width: 180px;
        }

        .value {

            font-weight: bold;
            color: #5c2c22;
        }

        /* TABLE */
        table.product-table {

            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        table.product-table thead {

            background: #fff0f4;
        }

        table.product-table th {

            padding: 16px;
            text-align: left;
            color: #a44c63;
            font-size: 14px;
            border-bottom: 2px solid #f3d6de;
        }

        table.product-table td {

            padding: 18px 16px;
            border-bottom: 1px solid #f1f1f1;
            font-size: 14px;
        }

        .product-name {

            font-weight: bold;
            color: #5c2c22;
        }

        /* TOTAL */
        .total-section {

            margin-top: 35px;
            text-align: right;
        }

        .total-box {

            display: inline-block;
            background: #fff0f4;
            padding: 20px 35px;
            border-radius: 20px;
        }

        .total-box h2 {

            color: #d94f70;
            font-size: 32px;
            margin-top: 5px;
        }

        /* FOOTER */
        .footer {

            margin-top: 50px;
            text-align: center;
            color: #888;
            font-size: 13px;
        }

        .status {

            display: inline-block;
            padding: 10px 20px;
            background: #d94f70;
            color: white;
            border-radius: 999px;
            font-size: 13px;
            margin-top: 8px;
        }
    </style>

</head>

<body>

    <div class="container">

        {{-- HEADER --}}
        <div class="header">

            <h1>
                Rofa Cake's
            </h1>

            <p>
                Bukti Transaksi Digital
            </p>

        </div>

        {{-- CONTENT --}}
        <div class="content">

            {{-- INFO --}}
            <table class="info-grid">

                <tr>

                    <td class="label">
                        Invoice
                    </td>

                    <td class="value">
                        {{ $order->invoice_number }}
                    </td>

                </tr>

                <tr>

                    <td class="label">
                        Nama Pelanggan
                    </td>

                    <td class="value">
                        {{ $order->user->name }}
                    </td>

                </tr>

                <tr>

                    <td class="label">
                        Tanggal Transaksi
                    </td>

                    <td class="value">
                        {{ $order->created_at->format('d M Y H:i') }}
                    </td>

                </tr>

                <tr>

                    <td class="label">
                        Status Pesanan
                    </td>

                    <td>

                        <span class="status">

                            {{ strtoupper($order->order_status) }}

                        </span>

                    </td>

                </tr>

            </table>

            {{-- PRODUCT TABLE --}}
            <table class="product-table">

                <thead>

                    <tr>

                        <th>Produk</th>

                        <th>Qty</th>

                        <th>Harga</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($order->items as $item)

                    <tr>

                        <td class="product-name">

                            {{ $item->product->name }}

                        </td>

                        <td>

                            {{ $item->quantity }}

                        </td>

                        <td>

                            Rp {{ number_format($item->price,0,',','.') }}

                        </td>

                        <td>

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            {{-- TOTAL --}}
            <div class="total-section">

                <div class="total-box">

                    <div>
                        Total Pembayaran
                    </div>

                    <h2>

                        Rp {{ number_format($order->total_price,0,',','.') }}

                    </h2>

                </div>

            </div>

            {{-- FOOTER --}}
            <div class="footer">

                Terima kasih telah melakukan pemesanan di
                <strong>Rofa Cake's</strong> 😄

            </div>

        </div>

    </div>

</body>

</html>