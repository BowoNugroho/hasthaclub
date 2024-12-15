<div class="modal" id="tambahProductVariant" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="productVariantForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Produk</label>
                      <select class="form-select" id="product_id" name="product_id">
                          <option value="">- Pilih - </option>
                          @foreach ($product as $val)
                          <option value="{{ $val->id }}">{{ $val->product_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="product_id_error"></span>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Varian Warna</label>
                      <select class="form-select" id="color_id" name="color_id">
                          <option value="">- Pilih - </option>
                          @foreach ($color as $val)
                          <option value="{{ $val->id }}">{{ $val->color_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="color_id_error"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Varian Kapasitas</label>
                      <select class="form-select" id="capacity_id" name="capacity_id">
                          <option value="">- Pilih - </option>
                          @foreach ($capacity as $val)
                          <option value="{{ $val->id }}">{{ $val->capacity_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="capacity_id_error"></span>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Harga Normal</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Normal" />
                        <span class="error text-danger" id="harga_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Harga Diskon</label>
                        <input type="number" class="form-control" id="harga_diskon" name="harga_diskon" placeholder="Harga Diskon" />
                        <span class="error text-danger" id="harga_diskon_error"></span>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" />
                <span class="error text-danger" id="stock_error"></span>
            </div>
              {{-- <div class="mb-3">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control"  id="deskripsi" name="deskripsi" rows="3"  placeholder="deskripsi"></textarea>
                  <span class="error text-danger" id="deskripsi_error"></span>
              </div> --}}
            </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentProduct" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
