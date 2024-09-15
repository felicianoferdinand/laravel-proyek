<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Supplier List</h3>
                    <hr>
                </div>
                <div class="card border-8 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">PIC NAME</th>
                                    <th scope="col">SUPPLIER NAME</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col" style="width: 20%;">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($suppliers as $supplier )

                                    <tr>
                                        <td class="text-center align-middle">{{ $supplier->supplier->pic_name }}</td>
                                        <td class="text-center align-middle">{{ $supplier->name }}</td>
                                        <td class="text-center align-middle">{{ $supplier->category->category_name }}</td>
                                        <td class="text-center  flex flex-row justify-center align-middle">
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');" method="POST">
                                                <a href="{{ route('products.show', $supplier->supplier_id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('products.edit', $supplier->supplier_id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="alert alert-danger">
                                                Data Supplier belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $suppliers->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'GAGAL',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
