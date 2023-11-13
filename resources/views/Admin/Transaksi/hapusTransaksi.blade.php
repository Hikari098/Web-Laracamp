<!-- {{-- modal --}} -->
<div class="modal fade" id="delete{{ $row->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Data Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('index.hapus.transaksi',$row->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                       
                        <p class="text-center">Yakin Mau Hapus <strong style="color: red;">{{$row->nama}}</strong> untuk Bootcamp <strong style="color: red;">{{$row->bootcamp->nama}} </strong></p>

                        <input type="hidden" name="id" value="{{$row->id}}">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </form>
        </div>

    </div>
</div>
