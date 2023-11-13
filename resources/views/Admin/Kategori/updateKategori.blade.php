<!-- {{-- modal --}} -->
<div class="modal fade" id="edit{{ $row->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Data Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Kategori.update', $row->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <input type="text" value="{{$row->kategori_id}}" id="kategori_id" name="kategori_id" class="form-control" required>
                        <input type="hidden" name="id" value="{{$row->id}}" >
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>

    </div>
</div>