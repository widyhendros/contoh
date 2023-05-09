$(document).ready(function () {
    var tinggal = $("#tinggalbersama").val();
    if (tinggal == "") {
        $("#div_wali").hide("fast");
        $("#div_orangtua").hide("fast");
    } else if (tinggal == "orang tua") {
        $("#div_orangtua").show("fast");
        $("#div_wali").hide("fast");
    } else if (tinggal == "wali") {
        $("#div_orangtua").show("fast");
        $("#div_wali").show("fast");
    }

    $("#tinggalbersama").on("change", function () {
        if (this.value == "orang tua") {
            $("#div_wali").hide("fast");
            $("#div_orangtua").show("fast");
        } else if (this.value == "wali") {
            $("#div_orangtua").show("fast");
            $("#div_wali").show("fast");
        } else {
            $("#div_orangtua").show("fast");
            $("#div_wali").hide("fast");
        }
    });
});


$('#keadaanbapak').on('change',function () {
    var keadaanbapak = $(this).val();
    console.log(keadaanbapak)
    if (keadaanbapak == "meninggal") {
        $("#profesibapak").val("tidak bekerja");
        $("#penghasilanbapak").val("Tidak Berpenghasilan");
        $("#jalanbpk").val("-");
        $("#rtbpk").val(0);
        $("#rwbpk").val(0);
        $("#kelurahanbpk").val("-");
        $("#kecamatanbpk").val("-");
        $("#kotabpk").val("-");
        $("#posbpk").val(0);
        $("#telprumahbpk").val(0);
        $("#nohpbpk").val(0);
    } else{
        $("#profesibapak").val("");
        $("#penghasilanbapak").val("");
        $("#jalanbpk").val("");
        $("#rtbpk").val("");
        $("#rwbpk").val("");
        $("#kelurahanbpk").val("");
        $("#kecamatanbpk").val("");
        $("#kotabpk").val("");
        $("#posbpk").val("");
        $("#telprumahbpk").val("");
        $("#nohpbpk").val("");
    }
});

$('#keadaanibu').on('change',function () {
    var keadaanibu = $(this).val();
    console.log(keadaanibu)
    if (keadaanibu == "meninggal") {
        $("#profesiibu").val("tidak bekerja");
        $("#penghasilanibu").val("Tidak Berpenghasilan");
        $("#jalanibu").val("-");
        $("#rtibu").val(0);
        $("#rwibu").val(0);
        $("#kelurahanibu").val("-");
        $("#kecamatanibu").val("-");
        $("#kotaibu").val("-");
        $("#posibu").val(0);
        $("#telprumahibu").val("-");
        $("#nohpibu").val(0);
    } else{
        $("#profesiibu").val("");
        $("#penghasilanibu").val("");
        $("#jalanibu").val("");
        $("#rtibu").val("");
        $("#rwibu").val("");
        $("#kelurahanibu").val("");
        $("#kecamatanibu").val("");
        $("#kotaibu").val("");
        $("#posibu").val("");
        $("#telprumahibu").val("");
        $("#nohpibu").val("");
    }
});

$('#profesibapak').on('change',function () {
    var profesibapak = $(this).val();
    console.log(profesibapak)
    if (profesibapak == "tidak bekerja") {
        $("#penghasilanbapak").val("Tidak Berpenghasilan");
    } else{
        $("#penghasilanbapak").val("");
    }
});

$('#profesiibu').on('change',function () {
    var profesiibu = $(this).val();
    console.log(profesiibu)
    if (profesiibu == "tidak bekerja") {
        $("#penghasilanibu").val("Tidak Berpenghasilan");
    } else{
        $("#penghasilanibu").val("");
    }
});

window.copyalamatbpk = function () {
    $("#jalanbpk").val($("#jalan").val());
    $("#rtbpk").val($("#rt").val());
    $("#rwbpk").val($("#rw").val());
    $("#kelurahanbpk").val($("#kelurahan").val());
    $("#kecamatanbpk").val($("#kecamatan").val());
    $("#posbpk").val($("#kodepos").val());
    $("#kotabpk").val($("#kota").val());
};

window.copyalamatibu = function () {
    $("#jalanibu").val($("#jalan").val());
    $("#rtibu").val($("#rt").val());
    $("#rwibu").val($("#rw").val());
    $("#kelurahanibu").val($("#kelurahan").val());
    $("#kecamatanibu").val($("#kecamatan").val());
    $("#posibu").val($("#kodepos").val());
    $("#kotaibu").val($("#kota").val());

};

window.copyalamatwali = function () {
    $("#jalanwali").val($("#jalan").val());
    $("#rtwali").val($("#rt").val());
    $("#rwwali").val($("#rw").val());
    $("#kelurahanwali").val($("#kelurahan").val());
    $("#kecamatanwali").val($("#kecamatan").val());
    $("#poswali").val($("#kodepos").val());
    $("#kotawali").val($("#kota").val());

};

$("#tambah_prestasi").click(function () {
    no = $("#no_prestasi").val();
    no++;
    $("#no_prestasi").val(no);
    html =
        `<div id="div_field_prestasi` +
        no +
        `">
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label" >Nama
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nama_prestasi` +
        no +
        `" name="nama_prestasi` +
        no +
        `">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Jenis
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jenis_prestasi` +
        no +
        `" name="jenis_prestasi` +
        no +
        `">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun
                                                        Prestasi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="tahun_prestasi` +
        no +
        `" name="tahun_prestasi` +
        no +
        `">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="inputPassword"
                                                        class="col-sm-2 col-form-label">Penyelenggara</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="penyelenggara` +
        no +
        `" name="penyelenggara` +
        no +
        `">
                                                    </div>
                                                </div>
                                                <br><hr><br>
                                            </div> `;
    $("#div_tambah_field_prestasi").before(html);
});

$("#hapus_prestasi").click(function () {
    no = $("#no_prestasi").val();

    if (no > 1) {
        $("#div_field_prestasi" + no).remove();
        no--;
        $("#no_prestasi").val(no);
    } else {
        $("#nama_prestasi1").val("");
        $("#jenis_prestasi1").val("");
        $("#tahun_prestasi1").val("");
        $("#penyelenggara1").val("");
    }
});

$(document).ready(function () {
    $("#pilminatsatu").val($("#field1").val()).change();
    pilminatsatu();
    $("#pilminatdua").val($("#field3").val()).change();
    $("#linminpilsatu").val($("#field2").val()).change();
    pilminatdua();
    $("#linminpildua").val($("#field4").val()).change();

    $("#pilminatsatu").change(function () {
        pilminatsatu();
    });

    $("#pilminatdua").change(function () {
        pilminatdua();
    });

    function pilminatsatu() {
        $("#linminpilsatu").children().remove();
        $("#pilminatdua").children().remove();
        $("#linminpildua").children().remove();

        if ($("#pilminatsatu").val() == "MIPA") {
            html1 = ` 
                <option value="">[ Pilih ]</option>
                <option value="Geografi">Geografi</option>
                <option value="Sosiologi">Sosiologi</option>
                <option value="Ekonomi">Ekonomi</option>
                `;
            $("#linminpilsatu").prop("disabled", false);
            $("#pilminatdua").prop("disabled", false);
            $("#linminpildua").prop("disabled", true);

            html2 = ` 
                <option value="" selected>[ PILIH ]</option>
                <option value="IPS">IPS</option>
                `;
        } else if ($("#pilminatsatu").val() == "IPS") {
            html1 = ` 
                <option value="">[ Pilih ]</option>
                <option value="Biologi">Biologi</option>
                <option value="Fisika">Fisika</option>
                <option value="Kimia">Kimia</option>
                `;
            $("#linminpilsatu").prop("disabled", false);
            $("#pilminatdua").prop("disabled", false);
            $("#linminpildua").prop("disabled", true);

            html2 = ` 
                <option value="" selected>[ PILIH ]</option>
                <option value="MIPA" >MIPA</option>
                `;
        } else {
            html1 = ``;
            html2 = ``;
            html3 = ``;
            $("#linminpilsatu").prop("disabled", true);
            $("#linminpildua").prop("disabled", true);
            $("#pilminatdua").prop("disabled", true);
            $("#linminpildua").append(html3);
        }

        $("#linminpilsatu").append(html1);
        $("#pilminatdua").append(html2);
    }

    function pilminatdua() {
        $("#linminpildua").children().remove();
        if ($("#pilminatdua").val() == "IPS") {
            html = `
                <option value="">[ Pilih ]</option>
                <option value="Biologi">Biologi</option>
                <option value="Fisika">Fisika</option>
                <option value="Kimia">Kimia</option>
                `;
            $("#linminpildua").prop("disabled", false);
        } else if ($("#pilminatdua").val() == "MIPA") {
            html = `
                <option value="">[ Pilih ]</option>
                <option value="Geografi">Geografi</option>
                <option value="Sosiologi">Sosiologi</option>
                <option value="Ekonomi">Ekonomi</option>
                `;
            $("#linminpildua").prop("disabled", false);
        } else {
            html = ``;
            $("#linminpildua").prop("disabled", true);
        }
        $("#linminpildua").append(html);
    }
});

// $(document).ready(function () {
//     var jalur = $("#jalurMasuk").val();
//     if (jalur == "") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").hide("fast");
//     } else if (jalur == "ABK") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").hide("fast");
//     } else if (jalur == "KETM") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").show("fast");
//     } else if (jalur == "Kondisi Tertentu") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").hide("fast");
//     } else if (jalur == "Perpindahan") {
//         $("#berkasijazah").hide("fast");
//         $("#berkaskk").hide("fast");
//         $("#berkasakta").hide("fast");
//         $("#berkaskis").hide("fast");
//     } else if (jalur == "Prestasi Rapor") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").hide("fast");
//     } else if (jalur == "Prestasi Kejuaraan") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").hide("fast");
//     } else if (jalur == "Zonasi") {
//         $("#berkasijazah").show("fast");
//         $("#berkaskk").show("fast");
//         $("#berkasakta").show("fast");
//         $("#berkaskis").hide("fast");
//     }

//     $("#JalurMasuk").on("change", function () {
//         if (this.value == "Perpindahan") {
//             $("#berkasijazah").hide("fast");
//             $("#berkaskk").hide("fast");
//             $("#berkasakta").hide("fast");
//             $("#berkaskis").hide("fast");
//             $("#berkaskip").hide("fast");
//         } else {
//             $("#berkasijazah").show("fast");
//             $("#berkaskk").show("fast");
//             $("#berkasakta").show("fast");
//             $("#berkaskis").hide("fast");
//             $("#berkaskip").hide("fast");
//         }
//     });
// });

// $('#jalurMasuk').on('change',function () {
//     var jalurMasuk = $(this).val();
//     console.log(jalurMasuk)
//     if (jalurMasuk == "KETM") {
//         $("#berkasijazah").show("hide");
       
//     } else{
//         $("#berkasijazah").show("fast");
//     }
// });


$('#jalurMasuk').on('change',function () {
    var jalurMasuk = $(this).val();
    console.log(jalurMasuk)
    if (jalurMasuk == "KETM") {
        $("#berkaskis").show("fast");
        $("#berkaskip").show("fast");
        $("#berkaskks").show("fast");
        $("#berkaspkh").show("fast");
        $("#berkaskbs").show("fast");
        $("#berkasksm").show("fast");
        $("#garis1").show("fast");
        $("#garis2").show("fast");
        $("#garis3").show("fast");
        $("#garis4").show("fast");
        $("#garis5").show("fast");
    } else{
        $("#berkaskis").hide("fast");
        $("#berkaskip").hide("fast");
        $("#berkaskks").hide("fast");
        $("#berkaspkh").hide("fast");
        $("#berkaskbs").hide("fast");
        $("#berkasksm").hide("fast");
        $("#garis1").hide("fast");
        $("#garis2").hide("fast");
        $("#garis3").hide("fast");
        $("#garis4").hide("fast");
        $("#garis5").hide("fast");
    }
});

var jalurmasuk = $('#jalurMasuk').val()
if(jalurmasuk == 'KETM'){
    $("#berkaskis").show("fast");
    $("#berkaskip").show("fast");
    $("#berkaskks").show("fast");
    $("#berkaspkh").show("fast");
    $("#berkaskbs").show("fast");
    $("#berkasksm").show("fast");
    $("#garis1").show("fast");
    $("#garis2").show("fast");
    $("#garis3").show("fast");
    $("#garis4").show("fast");
    $("#garis5").show("fast");
    }else{
    $("#berkaskis").hide("fast");
    $("#berkaskip").hide("fast");
    $("#berkaskks").hide("fast");
    $("#berkaspkh").hide("fast");
    $("#berkaskbs").hide("fast");
    $("#berkasksm").hide("fast");
    $("#garis1").hide("fast");
    $("#garis2").hide("fast");
    $("#garis3").hide("fast");
    $("#garis4").hide("fast");
    $("#garis5").hide("fast");
    }