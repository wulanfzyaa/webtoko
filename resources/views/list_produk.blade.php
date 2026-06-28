<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="ml-10 mt-20 mr-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Daftar Produk</h1>
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white text-sm">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">No</th>
                    <th class="px-6 py-3 text-left">Nama Produk</th>
                    <th class="px-6 py-3 text-left">Deskripsi Produk</th>
                    <th class="px-6 py-3 text-left">Harga Produk</th>
                    <th class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nama as $index => $item)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50">
                    <td class="px-6 py-3 text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-6 py-3 font-medium text-gray-800">{{ $item }}</td>
                    <td class="px-6 py-3 text-gray-600">{{ $desc[$index] }}</td>
                    <td class="px-6 py-3 text-green-600 font-semibold">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('produk.edit', $ids[$index]) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded mr-2">
                            Edit
                        </a>
                        <form action="{{ route('produk.delete', $ids[$index]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete {{ $item }}?')"
                                class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div><h1>Input Produk</h1></div>
    <form method="POST" action="{{ route('produk.simpan') }}">
        @csrf
        <table class="table">
            <tr>
                <td>Nama:</td>
                <td colspan="3"><input type="text" class="form-control" id="nama" name="nama"></td>
            </tr>
            <tr>
                <td>Deskripsi:</td>
                <td colspan="3"><textarea class="form-control" id="deskripsi" name="deskripsi"></textarea></td>
            </tr>
            <tr>
                <td>Harga:</td>
                <td><input type="number" class="form-control" id="harga" name="harga"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

</body>
</html>