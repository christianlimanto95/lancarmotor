<div class="section">
    <div class="section-title">List</div>
    <div class="item-container">
        <table class="table">
            <thead>
                <tr>
                    <td>NAMA</td>
                    <td>GAMBAR</td>
                    <td data-col="action">ACTION</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="section section-insert">
    <div class="section-title">Tambah Brand</div>
    <div class="form-tambah-satuan">
        <div class="form-item">
            <div class="form-label">Nama Brand <span class="error error-nama-brand"></span></div>
            <input type="text" name="brand_name" class="form-input input-nama-brand" maxlength="50" />
        </div>
        <div class="form-item">
            <div class="form-label">Image <span class="error error-image"></span></div>
            <div class="form-right">
                <input type="hidden" name="brand_image" class="image-input" value="" />
                <div class="upload-container">
                    <div class="upload-button">
                        <div class="upload-text">Choose Image</div>
                    </div>
                    <input type="file" class="image-input-upload" name="input-image" accept="image/*" />
                </div>
                <img class="image-preview" />
                <div class="btn btn-negative btn-delete-image">Delete Image</div>
            </div>
        </div>
        <div class="btn btn-tambah-brand">Tambah Brand</div>
    </div>
</div>
<script>
var image_url = "<?php echo base_url("assets/images/brands/brands_"); ?>";
var get_data_url = "<?php echo base_url("admin/brand_get"); ?>";
var tambah_brand_url = "<?php echo base_url("admin/brand_insert"); ?>";
var edit_brand_url = "<?php echo base_url("admin/master_brand_edit/"); ?>";
var hapus_brand_url = "<?php echo base_url("admin/brand_delete"); ?>";
</script>