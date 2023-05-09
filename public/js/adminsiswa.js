$(document).ready(function () {
    $(".btn_mutasi").click(function () {
        $("#mutasi_nis").val($(this).attr("data-nis"));
        $("#mutasi_name").val($(this).attr("data-name"));
        $("#mutasi_siswaid").val($(this).attr("data-id"));
        $("#mutasi_nisn").val($(this).attr("data-nisn"));
    });
});

$(document).ready(function () {
    $(".btn_edit").click(function () {
        $("#pelajaran_name").val($(this).attr("data-name"));
        $("#edit_pelajaranid").val($(this).attr("data-id"));
    });
});

