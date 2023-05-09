$(document).ready(function () {
    $(document).delegate("select[name=roleuser]","change",function () {
        parentid = $(this).closest('.modal')[0].id
        console.log(parentid)
        if ($(this).val() == "1") {
            $(`#${parentid} .row:has(> div > input[name=email])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=password])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=nama])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=nis])`).hide("fast");
            $(`#${parentid} .text_nisn`).hide("fast");
            $(`#${parentid} .text_admin`).show("fast");
        } else if ($(this).val() == "2") {
            $(`#${parentid} .row:has(> div > input[name=email])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=password])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=nama])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=nis])`).hide("fast");
            $(`#${parentid} .text_nisn`).hide("fast");
            $(`#${parentid} .text_admin`).show("fast");
        } else if ($(this).val() == "0") {
            $(`#${parentid} .row:has(> div > input[name=email])`).hide("fast");
            $(`#${parentid} .row:has(> div > input[name=password])`).hide("fast");
            $(`#${parentid} .row:has(> div > input[name=nama])`).show("fast");
            $(`#${parentid} .row:has(> div > input[name=nis])`).show("fast");
            $(`#${parentid} .text_nisn`).show("fast");
            $(`#${parentid} .text_admin`).hide("fast");
        }
    });
});
