<form action="{{route('merks.update', $merk->id)}}" method="POST" id="formEdit">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateLabel">Update Merk : {{$merk->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Merk Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-input"
                            placeholder="Merk Name" value="{{ old('name', $merk->name) }}" name="name">
                        <div class="d-block invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>    
</form>