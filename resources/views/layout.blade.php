<!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Font Awesome --}}
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" 
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" 
    />
    {{-- Vite --}}
    @vite('resources/css/app.css')
    <title>Laravel Workopia</title>
</head>
<body>
    {{-- Header Component --}}
    <x-header />
    {{-- Main --}}
    <main class="container mx-auto p-4 mt-4">
        {{ $slot }}
    </main>
</body>
</html>