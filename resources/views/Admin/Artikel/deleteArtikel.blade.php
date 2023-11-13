<!-- Modal -->
<div class="modal fade" id="delete{{$row->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.delete.artikel')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="artikel" class="form-label" >Artikel</label>
                        <p class="text-center">Yakin Hapus Data <strong style="color: red;">{{$row->title}}</strong>?</p>
                        <input type="hidden" name="id" value="{{ $row->id}}" >
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- End Modal -->