<div class="modal" id="editProduct" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editProductForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" id="edit_product_name" name="product_name" placeholder="Nama" />
                <input type="hidden" class="form-control" id="edit_product_id" name="product_id" placeholder="Nama" />
                <span class="error text-danger" id="edit_product_name_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="number" class="form-control" id="edit_harga" name="harga" placeholder="Nama" />
              <span class="error text-danger" id="edit_harga_error"></span>
          </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control"  id="edit_deskripsi" name="deskripsi" rows="3"  placeholder="deskripsi"></textarea>
                <span class="error text-danger" id="edit_deskripsi_error"></span>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                      <select class="form-select" id="edit_brand_id" name="brand_id">
                          <option value="">- Pilih - </option>
                          @foreach ($brand as $val)
                          <option value="{{ $val->id }}">{{ $val->brand_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="edit_brand_id_error"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                      <select class="form-select" id="edit_category_id" name="category_id">
                          <option value="">- Pilih - </option>
                          @foreach ($category as $val)
                          <option value="{{ $val->id }}">{{ $val->category_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="edit_category_id_error"></span>
                </div>
              </div>
            </div>
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
