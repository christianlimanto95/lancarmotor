$(function() {
    get_data();

    $(document).on("click", ".btn-hapus", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            var tr = $(this).closest("tr");
            var nama = tr.find("td").eq(0).html();
            if (confirm("Hapus satuan " + nama + "?")) {
                var id = tr.attr("data-id");
                showLoader();
                thisButton.addClass("disabled");
                ajaxCall(hapus_satuan_url, {satuan_id: id}, function(json) {
                    thisButton.removeClass("disabled");
                    var result = jQuery.parseJSON(json);
                    if (result.status == "success") {
                        get_data();
                        showNotification("Berhasil menghapus satuan " + nama);
                    } else {
                        hideLoader();
                        showNotification("Gagal menghapus satuan " + nama);
                    }
                });
            }
        }
    });

    $(".btn-tambah-satuan").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            $(".error").html("");
            var valid = true;
            var nama_satuan = $(".input-nama-satuan").val().trim();
            var tipe_satuan = $(".input-tipe-satuan").val();
            if (nama_satuan == "") {
                valid = false;
                $(".error-nama-satuan").html("harus diisi");
            }

            if (valid) {
                thisButton.addClass("disabled");
                showLoader();
                ajaxCall(tambah_satuan_url, {satuan_nama: nama_satuan, satuan_type: tipe_satuan}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        $(".input-nama-satuan").val("");
                        setSelectValue($(".select-satuan-type"), "1");
                        get_data();
                        showNotification("Berhasil Tambah Satuan " + nama_satuan);
                    } else {
                        hideLoader();
                        showNotification("Gagal Menambah Satuan " + nama_satuan);
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
            element += "<tr data-id='" + data[i].satuan_id + "'>";
            element += "<td>" + data[i].satuan_nama + "</td>";
            var satuan_type = "";
            switch (data[i].satuan_type) {
                case "1":
                    satuan_type = "Dimensi";
                    break;
                case "2":
                    satuan_type = "Berat";
                    break;
                case "3":
                    satuan_type = "Qty";
                    break;
            }
            element += "<td>" + satuan_type + "</td>";
            element += "<td><a href='" + edit_satuan_url + data[i].satuan_id + "' class='btn btn-update btn-edit'>Edit</a><div class='btn btn-negative btn-hapus'>Hapus</div></td>";
            element += "</tr>";
        }

        $(".table tbody").html(element);
    });
}