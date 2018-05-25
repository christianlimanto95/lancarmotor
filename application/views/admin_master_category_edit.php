<a href="<?php echo base_url("admin/master_kategori"); ?>" class="btn btn-update btn-back">< Kembali ke Master Kategori</a>
<div class="section section-update">
    <div class="form-tambah-satuan">
        <div class="form-item">
            <div class="form-label">Nama Kategori <span class="error error-nama-kategori"></span></div>
            <input type="text" name="category_name" class="form-input input-nama-kategori" maxlength="10" value="<?php echo $data->category_name; ?>" />
        </div>
        <div class="btn btn-simpan-perubahan">Simpan Perubahan</div>
    </div>
</div>
<script>
var category_id = "<?php echo $data->category_id; ?>";
var do_edit_category_url = "<?php echo base_url("admin/category_update"); ?>";
</script>