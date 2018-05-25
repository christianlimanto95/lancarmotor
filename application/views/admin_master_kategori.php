<div class="section">
    <div class="section-title">List</div>
    <div class="item-container">
        <table class="table">
            <thead>
                <tr>
                    <td>NAMA</td>
                    <td data-col="action">ACTION</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="section section-insert">
    <div class="section-title">Tambah Kategori</div>
    <div class="form-tambah-satuan">
        <div class="form-item">
            <div class="form-label">Nama Kategori <span class="error error-nama-kategori"></span></div>
            <input type="text" name="category_name" class="form-input input-nama-kategori" maxlength="50" />
        </div>
        <div class="btn btn-tambah-kategori">Tambah Kategori</div>
    </div>
</div>
<script>
var get_data_url = "<?php echo base_url("admin/category_get"); ?>";
var tambah_kategori_url = "<?php echo base_url("admin/category_insert"); ?>";
var edit_kategori_url = "<?php echo base_url("admin/master_category_edit/"); ?>";
var hapus_kategori_url = "<?php echo base_url("admin/category_delete"); ?>";
</script>