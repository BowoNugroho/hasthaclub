<div class="modal" id="tambahVoucher" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Voucher</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="voucherForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Nama voucher</label>
                <input type="text" class="form-control" id="voucher_name" name="voucher_name" placeholder="voucher" />
                <span class="error text-danger" id="voucher_name_error"></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Voucher</label>
                <input type="text" class="form-control" id="voucher_code" name="voucher_code" onkeyup="cekKodeVoucher()" placeholder="kode" />
                <span class="error text-danger" id="voucher_code_error"></span>
                <span class="error text-success" id="voucher_code_success"></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Potongan harga</label>
                <input type="number" class="form-control" id="potongan_harga" name="potongan_harga" placeholder="potongan" />
                <span class="error text-danger" id="potongan_harga_error"></span>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Toko</label>
                      <select class="form-select" style="width:100% " id="store_id" name="store_id">
                          <option value="">- Pilih - </option>
                          @foreach ($stores as $val)
                          <option value="{{ $val->id }}">{{ $val->store_name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="store_id_error"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Sales To</label>
                      <select class="form-select" id="sales_to_id" name="sales_to_id">
                          <option value="">- Pilih - </option>
                          @foreach ($sales as $val)
                          <option value="{{ $val->id }}">{{ $val->name }}</option>
                          @endforeach 
                      </select>
                    <span class="error text-danger" id="sales_to_id_error"></span>
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
                <span class="spinner-border spinner-border-sm me-2" id="spinnerVoucher" role="status" style="display: none;"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


