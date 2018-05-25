$(function() {
    get_data();

    $(document).on("click", ".btn-hapus", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            var tr = $(this).closest("tr");
            var nama = tr.find("td").eq(0).html();
            if (confirm("Hapus brand " + nama + "?")) {
                var id = tr.attr("data-id");
                showLoader();
                thisButton.addClass("disabled");
                ajaxCall(hapus_brand_url, {brand_id: id}, function(json) {
                    thisButton.removeClass("disabled");
                    var result = jQuery.parseJSON(json);
                    if (result.status == "success") {
                        get_data();
                        showNotification("Berhasil menghapus brand " + nama);
                    } else {
                        hideLoader();
                        showNotification("Gagal menghapus brand " + nama);
                    }
                });
            }
        }
    });

    $(".btn-tambah-brand").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            $(".error").html("");
            var valid = true;
            var nama_brand = $(".input-nama-brand").val().trim();
            if (nama_brand == "") {
                valid = false;
                $(".error-nama-brand").html("harus diisi");
            }

            if (valid) {
                thisButton.addClass("disabled");
                showLoader();

                var brand_image = $(".image-input").val();
                ajaxCall(tambah_brand_url, {brand_name: nama_brand, brand_image: brand_image}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        var formRight = $(".section-insert .form-right");
                        deleteImage(formRight);
                        $(".input-nama-brand").val("");
                        get_data();
                        showNotification("Berhasil Tambah Brand " + nama_brand);
                    } else {
                        hideLoader();
                        showNotification("Gagal Menambah Brand " + nama_brand);
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});

function get_data() {
    showLoader();
    ajaxCall(get_data_url, null, function(json) {
        hideLoader();
        var result = jQuery.parseJSON(json);
        var data = result.data;
        var iLength = data.length;
        var element = "";
        for (var i = 0; i < iLength; i++) {
            element += "<tr data-id='" + data[i].brand_id + "'>";
            element += "<td>" + data[i].brand_name + "</td>";
            element += "<td>" + "<img src='" + image_url + data[i].brand_id + "." + data[i].brand_image_extension + "?d=" + strtotime(data[i].modified_date) + "' class='table-image' />" + "</td>";
            element += "<td><a href='" + edit_brand_url + data[i].brand_id + "' class='btn btn-update btn-edit'>Edit</a><div class='btn btn-negative btn-hapus'>Hapus</div></td>";
            element += "</tr>";
        }

        $(".table tbody").html(element);
    });
}