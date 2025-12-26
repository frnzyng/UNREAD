<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ isset($title) ? 'Unread - ' . $title : 'Unread' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50 font-sans">
        <div class="min-h-screen">
            {{ $slot }}
        </div>
    </body>
</html>
