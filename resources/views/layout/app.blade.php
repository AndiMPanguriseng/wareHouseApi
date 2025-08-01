<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Livewire CRUD Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    {{-- Gunakan Flexbox untuk membuat layout dashboard --}}
    <div class="container-fluid">
        <div class="row">

            {{-- Sidebar --}}
            <div class="mb-5" >
                <livewire:component.sidebar />
            </div>

            {{-- Main Content --}}
            <div >
                {{ $slot }}
            </div>

        </div>
    </div>

    @livewireScripts
</body>

</html>