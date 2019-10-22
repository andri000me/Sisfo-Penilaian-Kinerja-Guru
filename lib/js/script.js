// JavaScript Document
/**
   * @author      : rezky_rere
   * @contact     : rh3zky@gmail.com
   * @description : Request & Configuration
**/
var _baseURL   = window.location.origin+'/';
let _imgLoader = "<img src='" + _baseURL +"lib/images/loader.gif'>";
$(document).ready(function() {
    $('.table-tambah-guru').DataTable();
    $('.table-tambah-sekolah').DataTable();
    $("#images").change(function() {
        var ftype = $('#images')[0].files[0].type; // get file type
        var fsize = $('#images')[0].files[0].size; //get file size
        var match= ["image/jpeg","image/jpg"];
        if(!(ftype==match[0])) {
            $(".informasi").fadeIn(1000);
            $(".informasi").html("<div class='alert alert-danger '> Mohon pilih file gambar. Hanya tipe ekstensi file .jpeg atau .jpg</div>");
            $(".btn-gambar").attr('disabled','disabled');
            $('body,html').animate({
                scrollTop: 0
            });
        }else if(fsize>2097152){
            $(".informasi").fadeIn(1000);
            $(".informasi").html("<div class='alert alert-danger '>Ukuran file yang anda pilih terlalu besar <b>"+formatBytes(fsize,2) +"</b> batas ukuran file gambar maksimum <b>2 MB</b></div>"); 
            $(".btn-gambar").attr('disabled','disabled');
            $('body,html').animate({
                scrollTop: 0
            });
        }else{
            $(".informasi").html('');
            $(".btn-gambar").removeAttr('disabled','disabled');
        }
    });
    $('.colorpicker-default').colorpicker({
        format: 'hex'
    });
    jQuery('#timepicker24').timepicker({
        showMeridian : false
    });
    $('.counter').counterUp({
        delay: 100,
        time: 1200
    });
    $('body').on('focus',".datepickers", function(){
        $(this).datepicker();
    });
    $('#datatable').dataTable();
    $('#datatable-responsive').DataTable();
    jQuery('#date-range').datepicker({
        format: "yyyy-mm-dd",
        toggleActive: true
    });

    $('.tenaga-pendidik').select2({
        maximumSelectionLength: 2,
        tags:true,
        templateSelection: function (tag, container) {
            // here we are finding option element of tag and
            // if it has property 'locked' we will add class 'locked-tag' 
            // to be able to style element in select
            var $option = $('.tenaga-pendidik option[value="' + tag.id + '"]');
            if ($option.attr('locked')) {
                $(container).addClass('locked-tag');
                tag.locked = true;
            }
            return tag.text;
        },
    }).on('change', function () {
        var data = $(".tenaga-pendidik option:selected").text();
        if(data != "Guru Mata Pelajaran"){
            $(".tugas-tambahan").show();
            $(".tmt_tugas_tambahan").attr('required', 'required');
            $(".masa_kerja_tugas_tambahan").attr('required', 'required');
        }else{
            $(".tugas-tambahan").hide();
            $(".tmt_tugas_tambahan").removeAttr('required', 'required');
            $(".masa_kerja_tugas_tambahan").removeAttr('required', 'required');
        }
    }).on("select2:unselecting", function (evt) {
        if (!evt.params.originalEvent) {
            return;
        }
        evt.params.originalEvent.stopPropagation();
    }).on('select2:opening select2:closing', function (event) {
        var $searchfield = $(this).parent().find('.select2-search__field');
        $searchfield.prop('disabled', true);
    }); 
    
    $(".id_legislatif").change(function () {
        var id_legislatif = $('.id_legislatif').val();
        if (id_legislatif !== "") {
            $.ajax({
                type: "POST",
                url: _baseURL + "data-periode/kandidat/",
                data: "id_legislatif=" + id_legislatif,
                dataType: "json",
                success: function (json) {
                    if (json.status == 'success') {
                        $('.nama-kandidat').html(json.value);
                    } else {
                        $('.nama-kandidat').html(json.value);
                    }
                }
            });
        } else {
            $('.nama-kandidat').html('');
        }
    });
    $(".logIn").click(function(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var role     = document.getElementById("role").value;
        var dataForm = $(".formLogin").serialize();
        if(username !== '' && password !== '' && role !== ''){
            $.ajax({
                type    :"POST",
                url     :_baseURL+"auth",
                data    : dataForm + "&auth=isLogin&",
                dataType:"json",
                success : function(json){
                    var status   = json.status;
                    var btn      = $(".logIn");
                    if(status == 'success'){
                        btn.html('Checking.. <i class="fa fa-spinner fa-spin"></i>');
                        btn.attr('disabled', 'disabled');
                        setTimeout(function() {
                            btn.removeClass('btn btn-danger ');
                            btn.addClass('btn btn-success');
                            btn.html("User ada <i class='fa fa-check'></i>");
                            $(".formLogin")[0].reset();
                        }, 1000);
                        setTimeout(function() {
                            btn.removeClass('btn btn-success');
                            btn.addClass('btn btn-primary');
                            btn.html("Mohon Tunggu.. <i class='fa fa-spinner fa-spin'></i>");
                        }, 2000);
                        setTimeout( "window.location.href='"+_baseURL+"./'", 3000 );
                    }else{
                        btn.html('Checking.. <i class="fa  fa-spinner fa-spin"></i>');
                        btn.attr('disabled', 'disabled');
                        setTimeout(function() {
                            btn.removeClass('btn btn-danger ');
                            btn.addClass('btn btn-warning');
                            btn.html('User tidak ada <i class="fa fa-times"></i>');
                            $(".formLogin")[0].reset();
                        }, 1000);
                        setTimeout(function() {
                            btn.removeClass('btn btn-warning');
                            btn.addClass('btn btn-primary');
                            btn.removeAttr('disabled', 'disabled');
                            btn.html('Log In');
                        }, 3000 );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                }
            });
        }
    });
    $(".logOut").click(function(){
            $.ajax({
                type    :"POST",
                url     :_baseURL+"auth",
                data    :"auth=isLogout&",
                dataType:"json",
                success : function(json){
                    var btn      = $(".logOut");
                    if(json.status == 'success'){
                        btn.removeClass('btn btn-danger');
                        btn.addClass('btn btn-default');
                        btn.html('Mohon Tunggu.. <i class="fa  fa-spinner fa-spin"></i>');
                        btn.attr('disabled', 'disabled');
                        setTimeout( "window.location.href='./'", 2000 );
                    }else{
                        btn.removeClass('btn btn-danger');
                        btn.addClass('btn btn-default');
                        btn.html('Logout Failed !');
                        btn.attr('disabled', 'disabled');
                        setTimeout( "window.location.href='./'", 2000 );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                }
            });
    });
    $(".lockscreen").click(function(){
            $.ajax({
                type    :"POST",
                url     :_baseURL+"auth",
                data    :"auth=isLock&",
                dataType:"json",
                success : function(json){
                    var btn      = $(".lockscreen");
                    if(json.status == 'success'){
                        btn.removeClass('btn btn-warning');
                        btn.addClass('btn btn-default');
                        btn.html('Mohon Tunggu.. <i class="fa  fa-spinner fa-spin"></i>');
                        btn.attr('disabled', 'disabled');
                        setTimeout( "window.location.href='./'", 2000 );
                    }else{
                        btn.removeClass('btn btn-warning');
                        btn.addClass('btn btn-default');
                        btn.html('Lockscreen Failed !');
                        btn.attr('disabled', 'disabled');
                        setTimeout( "window.location.href='./'", 2000 );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                }
            });
    });
    $(".btnLock").click(function(){
        var dataForm = $(".formLock").serialize();
        var btn = $(".btnLock");
            $.ajax({
                type    : "POST",
                url     : _baseURL +"auth",
                data    : dataForm +"&auth=isUnlock&",
                dataType: "json",
                success : function(json){
                    if(json.status == 'success'){
                        btn.removeClass('btn btn-red');
                        btn.addClass('btn btn-inverse ');
                        btn.html('Checking.. <i class="fa  fa-spinner fa-spin"></i>');
                        btn.attr('disabled', 'disabled');
                        setTimeout(function() {
                            btn.removeClass('btn btn-inverse ');
                            btn.addClass('btn btn-success');
                            btn.html("Password Cocok <i class='fa fa-check'></i>");
                            $(".formLock")[0].reset();
                        }, 1000);
                        setTimeout(function() {
                            btn.removeClass('btn btn-success');
                            btn.addClass('btn btn-red');
                            btn.html("Mohon Tunggu..");
                        }, 2000);
                        setTimeout( "window.location.href='"+_baseURL+"./'", 3000 );
                    }else{
                        btn.removeClass('btn btn-red');
                        btn.addClass('btn btn-inverse ');
                        btn.html('Checking.. <i class="fa  fa-spinner fa-spin"></i>');
                        btn.attr('disabled', 'disabled');
                        setTimeout(function() {
                            btn.removeClass('btn btn-inverse ');
                            btn.addClass('btn btn-danger');
                            btn.html('Password Salah  <i class="fa fa-times"></i>');
                        }, 1000);
                        setTimeout(function() {
                            btn.removeClass('btn btn-danger');
                            btn.addClass('btn btn-red');
                            btn.removeAttr('disabled', 'disabled');
                            btn.html('Log In');
                        }, 2000 );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                }
            });
        });
    $(".signIn").click(function(){
        $.ajax({
            type    : "POST",
            url     : _baseURL+"auth",
            data    : "auth=isLogout&",
            dataType: "json",
            success : function(json){
                if(json.status == 'success'){
                    window.location.href='./';
                }else{
                    window.location.href='./';
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
            }
        });
    });
    $('.id_kompetensi').select2({
        placeholder: 'Pilih--'
    });
    $('.id_sekolah').select2({
        placeholder: 'Pilih--'
    });
    $('.id_guru').select2({
        placeholder: 'Pilih--',
    });
    $('.id_pengawas').select2({
        placeholder: 'Pilih--',
    });
    $('.id_tugas').select2()
    .on("select2:select", function (e) {
        $('.id_kompetensi').html('');
        if (e.params.data.id != ""){
            $('.id_kompetensi').select2({
                placeholder: 'Pilih--',
                ajax: {
                    url      : _baseURL + "kompetensi/" + e.params.data.id + "/",
                    dataType : 'json',
                    delay    : 250,
                    data     : function (params) {
                        return {
                            search: params.term // search term
                        };
                    },
                    processResults: function (data) { 
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name_,
                                    id: item.id
                                };
                            })
                        };
                    },
                    cache: true,
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                    }
                }
            });
        }else{
            $('.id_kompetensi').html('');
        }
    });
    $('.role').select2({
        placeholder: 'Pilih--', 
    }).on("select2:select", function (e) {
        var data = e.params.data;
        //console.log(datas.text);
        if (data.text == "Guru"){
            $(".field-guru").show();
            $(".id_guru").attr('required','required');
            $(".field-pengawas").hide();
            $(".id_pengawas").removeAttr('required','required');
            $('.id_guru').select2({
                placeholder: 'Pilih--',
                ajax: {
                    url: _baseURL + "dropdown/guru/",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term // search term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name_,
                                    id: item.id
                                };
                            })
                        };
                    },
                    cache: true,
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                    }
                }
            }).on("select2:select", function (e) {
                let str = e.params.data.text; 
                let res = str.split(" - ");
                $(".nama_lengkap").val(res[0]);
            });
        } else if (data.text == "Pengawas"){
            $(".field-pengawas").show();
            $(".id_pengawas").attr('required', 'required');
            $(".field-guru").hide();
            $(".id_guru").removeAttr('required', 'required');
            $('.id_pengawas').select2({
                placeholder: 'Pilih--',
                ajax: {
                    url: _baseURL + "dropdown/pengawas/",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term // search term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name_,
                                    id: item.id
                                };
                            })
                        };
                    },
                    cache: true,
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('Status code: ' + jqXHR.status + ' ' + errorThrown);
                    }
                }
            }).on("select2:select", function (e) {
                let str = e.params.data.text;
                let res = str.split(" - ");
                $(".nama_lengkap").val(res[0]);
            });
        }else{
            $(".field-guru").hide();
            $('.id_guru').html("");
            $(".field-guru").removeAttr('required', 'required');
        }
    });
    $(".id_relawan").change(function () {
        var value = $("option:selected", this).text();
        if (value == 'Pilih--') {
            $(".nama_lengkap").val('');
        } else {
            $(".nama_lengkap").val(value);
        }
    });
    $('.table-sekolah').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-sekolah/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "nama_sekolah",    "sClass"  : "text-left"   }, 
            { "data"    : "no_telp",         "sClass"  : "text-center" },
            { "data"    : "provinsi",        "sClass"  : "text-center" }, 
            { "data"    : "kabupaten",       "sClass"  : "text-center" },
            { "data"    : "kecamatan",       "sClass"  : "text-center" }, 
            { "data"    : "kelurahan",       "sClass"  : "text-center" }, 
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
          "loadingRecords": "Loading.." + _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-tugas').DataTable({
        "ajax": {
            "url": _baseURL + "data-tugas/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "tugas",           "sClass"  : "text-left"   },
            { "data"    : "jenis_tugas",     "sClass"  : "text-left"   },
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
          "loadingRecords": "Loading.." + _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-guru').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-guru/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "nama_sekolah",    "sClass"  : "text-left"   }, 
            { "data"    : "nip",             "sClass"  : "text-center" }, 
            { "data"    : "nama_guru",       "sClass"  : "text-center" },
            { "data"    : "guru_mapel",      "sClass"  : "text-center" }, 
            { "data"    : "level_guru",      "sClass"  : "text-center" }, 
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
          "loadingRecords": "Loading.." + _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-kompetensi').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-kompetensi/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "tugas",           "sClass"  : "text-left"   }, 
            { "data"    : "nama_kompetensi", "sClass"  : "text-left"   },
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
          "loadingRecords": "Loading..",
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-indikator').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-indikator/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "tugas",           "sClass"  : "text-left"   }, 
            { "data"    : "nama_kompetensi", "sClass"  : "text-left"   },
            { "data"    : "nama_indikator",  "sClass"  : "text-left"   },
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
            "loadingRecords": _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-user').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-user/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",             "sClass"  : "text-center" }, 
            { "data"    : "nama",           "sClass"  : "text-left"   },
            { "data"    : "user",           "sClass"  : "text-center" },
            { "data"    : "foto",           "sClass"  : "text-center" },
            { "data"    : "role",           "sClass"  : "text-center" },
            { "data"    : "aksi",           "sClass"  : "text-center" }
        ],
        "language": {
          "loadingRecords": _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-golongan').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-golongan/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "kenaikan_ke",     "sClass"  : "text-left"   }, 
            { "data"    : "akk",             "sClass"  : "text-center" },
            { "data"    : "pd",              "sClass"  : "text-center" },
            { "data"    : "pi",              "sClass"  : "text-center" },
            { "data"    : "ki",              "sClass"  : "text-center" },
            { "data"    : "akp",             "sClass"  : "text-center" },
            { "data"    : "akpbm",           "sClass"  : "text-center" },
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
            "loadingRecords": _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-pengawas').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-pengawas/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },
            { "data"    : "nip",             "sClass"  : "text-center" },  
            { "data"    : "nama",            "sClass"  : "text-left"   },  
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
            "loadingRecords": _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-penilaian-kepsek').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-penilaian-kepsek/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },  
            { "data"    : "sekolah",         "sClass"  : "text-left"   },  
            { "data"    : "nip",             "sClass"  : "text-center" },  
            { "data"    : "nama",            "sClass"  : "text-left"   },    
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
            "loadingRecords": _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    $('.table-penilaian-guru').DataTable({
        "ajax": {
            "url"       : _baseURL + "data-penilaian-guru/get",
            "type"      : "POST",
            "data"      : {"type" : "all"},
        },
        "pageLength"    : 10,
        "order"         : [[ 0, 'asc' ]],
        "columns": [
            { "data"    : "no",              "sClass"  : "text-center" },   
            { "data"    : "nip",             "sClass"  : "text-center" },  
            { "data"    : "nama",            "sClass"  : "text-left"   },    
            { "data"    : "tugas_pokok",     "sClass"  : "text-center" },    
            { "data"    : "tugas_tambahan",  "sClass"  : "text-center" },    
            { "data"    : "aksi",            "sClass"  : "text-center" }
        ],
        "language": {
            "loadingRecords": _imgLoader,
          "emptyTable"    : "Data tidak ada.."
        }
    });
    localStorage.clear();
});

function _get(value){
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        $('.debug-data').html('Hapus Data: <strong>' + value + ' </strong> ?');
    });
}

function _confirmAkta(value) {
    $('#confirm-akta').on('show.bs.modal', function (e) {
        $(this).find('#form-verifikasi').attr('action', $(e.relatedTarget).data('href'));
        $('.data-get').html(value);
    });
}
function _confirmAsesor(value,act) {
    $('#confirm-asesor').on('show.bs.modal', function (e) {
        $(this).find('.btn-asesor').attr('href', $(e.relatedTarget).data('href'));
        $('.data-get').html(value);
        $('.asesor-value').html(act);
    });
}

function angka(e){
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode==47 || unicode<48 || unicode>57 ){ //if not a number
        return false; //disable key press
        }
    }
}
function formatBytes(a,b){if(0==a)return"0 Bytes";var c=1024,d=b||2,e=["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"],f=Math.floor(Math.log(a)/Math.log(c));return parseFloat((a/Math.pow(c,f)).toFixed(d))+" "+e[f]}
var _0x40ed=['Zm9udC1zaXplOnNtYWxs','Y29sb3I6IzRFOUREOTsgZm9udC1zaXplOmxhcmdl','bG9n','JWNSZXpreSBQLiBCdWRpaGFydG9ubwolY1dlYiBEZXZlbG9wZXIgYW5kIERlc2lnbmVyIAotLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQpGb2xsb3cgbWUgb24gSW5zdGFncmFtICVjQHJlemt5X3JlcmUK','Zm9udC1zaXplOngtbGFyZ2U='];(function(_0x3562b5,_0x22dabc){var _0x54d52d=function(_0x27bd3d){while(--_0x27bd3d){_0x3562b5['push'](_0x3562b5['shift']());}};_0x54d52d(++_0x22dabc);}(_0x40ed,0x89));var _0x3b1f=function(_0x97f8d1,_0x466712){_0x97f8d1=_0x97f8d1-0x0;var _0x5c23e8=_0x40ed[_0x97f8d1];if(_0x3b1f['xOaDtB']===undefined){(function(){var _0x3d3919=function(){var _0x35ed55;try{_0x35ed55=Function('return\x20(function()\x20'+'{}.constructor(\x22return\x20this\x22)(\x20)'+');')();}catch(_0x462ceb){_0x35ed55=window;}return _0x35ed55;};var _0x210ad2=_0x3d3919();var _0x26a316='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';_0x210ad2['atob']||(_0x210ad2['atob']=function(_0x5d772b){var _0x50c6ec=String(_0x5d772b)['replace'](/=+$/,'');for(var _0x59e582=0x0,_0x28fe24,_0x3a3d32,_0x267ab1=0x0,_0x5c6257='';_0x3a3d32=_0x50c6ec['charAt'](_0x267ab1++);~_0x3a3d32&&(_0x28fe24=_0x59e582%0x4?_0x28fe24*0x40+_0x3a3d32:_0x3a3d32,_0x59e582++%0x4)?_0x5c6257+=String['fromCharCode'](0xff&_0x28fe24>>(-0x2*_0x59e582&0x6)):0x0){_0x3a3d32=_0x26a316['indexOf'](_0x3a3d32);}return _0x5c6257;});}());_0x3b1f['UxHiLf']=function(_0x4bf6ef){var _0x11ae64=atob(_0x4bf6ef);var _0x6c9e31=[];for(var _0x823caf=0x0,_0x45b80f=_0x11ae64['length'];_0x823caf<_0x45b80f;_0x823caf++){_0x6c9e31+='%'+('00'+_0x11ae64['charCodeAt'](_0x823caf)['toString'](0x10))['slice'](-0x2);}return decodeURIComponent(_0x6c9e31);};_0x3b1f['GqMTGM']={};_0x3b1f['xOaDtB']=!![];}var _0xa8745b=_0x3b1f['GqMTGM'][_0x97f8d1];if(_0xa8745b===undefined){_0x5c23e8=_0x3b1f['UxHiLf'](_0x5c23e8);_0x3b1f['GqMTGM'][_0x97f8d1]=_0x5c23e8;}else{_0x5c23e8=_0xa8745b;}return _0x5c23e8;};console[_0x3b1f('0x0')](_0x3b1f('0x1'),_0x3b1f('0x2'),_0x3b1f('0x3'),_0x3b1f('0x4'));