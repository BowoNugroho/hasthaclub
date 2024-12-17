<div class="modal" id="tambahProductCheckout" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="producCheckoutForm">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Product</label>
                      <select class="form-select" style="width:100% " id="product_variant_id" name="product_variant_id">
                          <option value="">- Pilih - </option>
                          @foreach ($products as $val)
                          <option value="{{ $val->id }}">{{ $val->product_name }} {{ $val->capacity_name }} {{ $val->color_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="product_variant_id_error"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Status</label>
                      <select class="form-select" id="status" name="status">
                          <option value="">- Pilih - </option>
                          <option value="1">Aktif</option>
                          <option value="0">Non Aktif</option>
                      </select>
                    <span class="error text-danger" id="status_error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto">
                <svg id="spinnerTextIcon" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>
                <span id="spinnerText">Simpan</span>
                <span class="spinner-border spinner-border-sm me-2" id="spinnerCheckout" role="status" style="display: none;"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


