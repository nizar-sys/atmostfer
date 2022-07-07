<form action="{{route('products.update', $product->id)}}" method="POST" id="formEdit">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-input"
                                    placeholder="Product Name" value="{{ old('name', $product->name) }}" name="name">
                                <div class="d-block invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="price">Product Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price-input"
                                    placeholder="Product Price" value="{{ old('price', $product->price) }}" name="price">
                                <div class="d-block invalid-feedback"></div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="merk_id">Merks</label>
                                <select class="form-control select-custom @error('merk_id') is-invalid @enderror" id="merk-input" name="merk_id">
                                    <option value="" selected>---Merks---</option>
                                    @foreach ($merks as $merk)
                                        <option value="{{ $merk->id }}" @if (old('merk_id', $product->merk_id) == $merk->id) selected @endif>
                                            {{ str()->title($merk->name) }}</option>
                                    @endforeach
                                </select>
                                <div class="d-block invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="description">Product Name</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description-input"
                                    placeholder="Product Description" name="description" cols="30" rows="10">
                                {{ old('description', $product->description) }}
                                </textarea>
                                <script>
                                    CKEDITOR.replace('description-input');
                                </script>
                                <div class="d-block invalid-feedback"></div>
                            </div>
                        </div>
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