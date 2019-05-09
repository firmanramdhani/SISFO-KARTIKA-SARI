<html>
<head>
    <style>
        table{
            border: 1px solid #000000;
            margin: auto;
        }
    </style>
</head>
<body>
    <img src="<?php echo base_url() ?>assets/images/logo.jpg" alt="logo" height="100"">
    <p>Kartika Sari</p>
    <p>Jl. Buah Batu no. 165<br>Bandung, Kode Pos : 15411</p>
    <p>(+62) 888-1234</p>
    <table border='1' text-align='center'>
        <thead>
            <th>Nama Pelanggan</th>
            <th>Pesanan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
            <th>Invoice</th>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $pesanan->nama_pelanggan; ?></td>
                <td><?php echo $pesanan->nama_roti; ?></td>
                <td><?php echo "Rp. " , $pesanan->harga; ?></td>
                <td><?php echo $pesanan->jumlah; ?></td>
                <td><?php echo "Rp. " , $pesanan->harga*$pesanan->jumlah; ?></td>
                <td><?php echo $pesanan->tanggal; ?></td>
                <td><?php echo $pesanan->invoice; ?></td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top: 500px;" align="center">Terima kasih telah berbelanja di Kartika Sari.</p>
    <script>
        window.print();
    </script>
</body>
</html>