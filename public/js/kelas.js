$(document).ready(function () {
    var selected = [];
    $("#bodytable input:checked").each(function () {
        selected.push($(this).attr("data-id"));
    });
    $("#inputidsiswa").val(selected);

    $(".checkboxkelas").on("change", function () {
        var selected2 = [];
        $("#bodytable input:checked").each(function () {
            selected2.push($(this).attr("data-id"));
        });
        $("#inputidsiswa").val(selected2);
    });
});
