<div>


    <!-- Main Content -->
    <div class="container mt-5 table-container">
        <div class="row mb-4">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0"><i class="bi bi-table me-2"></i> Employee Data</h2>
                    <div>
                        <button class="btn btn-primary me-2"><i class="bi bi-plus-circle me-1"></i> Add New</button>
                        <button class="btn btn-outline-secondary"><i class="bi bi-funnel me-1"></i> Filter</button>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <input type="text" wire:model="nama" placeholder="Nama Barang">
        <input type="number" wire:model="stok" placeholder="Stok">
        <input type="number" wire:model="harga" placeholder="Harga">

        @if($isUpdate)
        <button wire:click="update">Update</button>
        @else
        <button wire:click="store">Tambah</button>
        @endif

        <hr>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                            <tr>
                                <td>{{ $barang['nama'] }}</td>
                                <td>{{ $barang['stok'] }}</td>
                                <td>{{ $barang['harga'] }}</td>
                                <td>
                                    <button wire:click class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></button>
                                    <button wire:click class="btn btn-sm btn-outline-warning me-1"><i class="bi bi-pencil"></i></button>
                                    <button wire:click class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-4">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>