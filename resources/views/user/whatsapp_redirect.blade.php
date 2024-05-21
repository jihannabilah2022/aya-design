<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect to WhatsApp</title>
</head>
<body>
    <script type="text/javascript">
        // Membuka tautan WhatsApp di tab baru
        window.open("{{ $whatsappLink }}", "_blank");

        // Navigasi kembali ke tab asal (tab aplikasi web)
        window.location.href = "{{ route('home') }}";
    </script>
</body>
</html>
