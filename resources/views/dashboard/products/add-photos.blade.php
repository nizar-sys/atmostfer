<form action="{{ route('products.store-photos', $product->id) }}" method="POST" id="formCreate" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalCreateOrUpdateProduct" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateLabel">Add Product Photos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="photos">Product Photos</label>
                        <input type="file" class="form-control dropify-media @error('photos[]') is-invalid @enderror"
                            id="photos" placeholder="Product Photos" name="photos[]" multiple required>

                        @error('photos[]')
                            <div class="d-block invalid-feedback">{{ $message }}</div>
                        @enderror
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


<script>
    $(document).ready(function() {
        $('.dropify-media').dropify({
            messages: {
                default: 'Drag and drop a file here or click',
                replace: 'Drag and drop or click to replace',
                remove: 'Remove',
                error: 'error'
            },
            error: {
                'fileSize': 'The file size is too big (1mb max).'
            }
        });
    });
</script>