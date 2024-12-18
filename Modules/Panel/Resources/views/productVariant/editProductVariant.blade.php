<div class="modal" id="editProductVariant" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editProductVariantForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Produk</label>
                        <input type="hidden" class="form-control" id="edit_product_variant_id" name="product_variant_id" placeholder="Harga Normal" />
                        <select class="form-select" id="edit_product_id" name="product_id">
                            <option value="">- Pilih - </option>
                            @foreach ($product as $val)
                            <option value="{{ $val->id }}">{{ $val->product_name }}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger" id="edit_product_id_error"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Varian Warna</label>
                                <select class="form-select" id="edit_color_id" name="color_id">
                                    <option value="">- Pilih - </option>
                                    @foreach ($color as $val)
                                    <option value="{{ $val->id }}">{{ $val->color_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error text-danger" id="edit_color_id_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Varian Kapasitas</label>
                                <select class="form-select" id="edit_capacity_id" name="capacity_id">
                                    <option value="">- Pilih - </option>
                                    @foreach ($capacity as $val)
                                    <option value="{{ $val->id }}">{{ $val->capacity_name }}</option>
                                    @endforeach
                                </select>
                                <span class="error text-danger" id="edit_capacity_id_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga Normal</label>
                                <input type="number" class="form-control" id="edit_harga" name="harga" placeholder="Harga Normal" />
                                <span class="error text-danger" id="edit_harga_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Harga Diskon</label>
                                <input type="number" class="form-control" id="edit_harga_diskon" name="harga_diskon" placeholder="Harga Diskon" />
                                <span class="error text-danger" id="edit_harga_diskon_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control" id="edit_stock" name="stock" placeholder="Stock" />
                        <span class="error text-danger" id="edit_stock_error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="image1" class="form-label">Gambar 1</label>
                        <input type="file" class="form-control" id="edit_product_variants_img1" name="product_variants_img1">
                      </div>
                      <div class="mb-3">
                        <label for="image2" class="form-label">Gambar 2</label>
                        <input type="file" class="form-control" id="edit_product_variants_img2" name="product_variants_img2">
                      </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3" placeholder="deskripsi"></textarea>
                        <span class="error text-danger" id="edit_deskripsi_error"></span>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <svg id="editspinnerTextIcon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                          </svg>
                          <span id="editspinnerText">Simpan</span>
                          <span class="spinner-border spinner-border-sm me-2" id="editspinnerProductVariant" role="status" style="display: none;"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>