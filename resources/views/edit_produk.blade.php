<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="ml-10 mt-20 mr-10 max-w-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Produk</h1>

    <form method="POST" action="{{ route('produk.update', $produk->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Nama Produk</label>
            <input type="text" name="nama" value="{{ $produk->nama }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Deskripsi Produk</label>
            <textarea name="deskripsi"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $produk->deskripsi }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1">Harga Produk</label>
            <input type="number" name="harga" value="{{ $produk->harga }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Update
        </button>
        <a href="/listproduk" class="ml-3 text-gray-600 hover:underline">Batal</a>
    </form>
</div>

</body>
</html>