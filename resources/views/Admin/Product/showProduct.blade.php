<!-- {{-- modal --}} -->
<div class="modal fade" id="show{{ $row->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Show Data Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Product.store', $row->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Product</label>
                        <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{$row->nama_produk}}" readonly>

                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" value="{{$row->kategori->kategori_id}}" readonly>

                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{$row->deskripsi}}" readonly>


                        <input type="hidden" name="id" value="{{$row->id}}" readonly>

                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>