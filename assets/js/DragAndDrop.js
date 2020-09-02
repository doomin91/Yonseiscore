$(function() {

    // preventing page from redirecting
    $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        //$("#uploadfile p").text("Drag here");
    });

    $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Drag enter
    $('.upload-area').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        //$("#uploadfile p").text("Drop");
    });

    // Drag over
    $('.upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        //$("#uploadfile p").text("Drop");
    });

    // Drop
    $('.upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        //$("#uploadfile p").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        //console.log(file.length);
        var fd = new FormData();
        for (var i=0; i<file.length; i++){
            //console.log(file[i]);
            fd.append('apply_attach[]', file[i]);
        }

        uploadData(fd);
    });

    // Open file selector on div click
    $("#uploadfile p").click(function(){
        $("#apply_attach").click();
    });

    // file selected
    $("#apply_attach").change(function(){
        var fd = new FormData();
        var ins = document.getElementById("apply_attach").files.length;

        for (var i=0; i<ins; i++){
            console.log(document.getElementById("apply_attach").files[i]);
            fd.append("apply_attach[]", document.getElementById("apply_attach").files[i]);
        }

        uploadData(fd);
    });

    $(document).on("click", ".file_del", function(){
        var file_seq = $(this).data("file_seq");
        var _this = $(this);
        if (confirm("해당 파일을 삭제하시겠습니까?")){
            loading();
            $.ajax({
                type : "POST",
                url : "/Exam/FileDeleteAjax",
                dataType : "JSON",
                data : {
                    "file_seq" : file_seq
                }, success : function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        //console.log(_this.parents("li").eq(0).html());
                        _this.parents("li").eq(0).remove();
                        if ($(".file_list li").length == 0){
                            $(".upload-area p").removeClass("hide");
                        }
                    }
                    loading();
                }, error : function(e){
                    //alert(e.responseText);
                    console.log(e.responseText);
                    loading();
                }
            });
        }
    });
});

// Sending AJAX request and upload file
function uploadData(formdata){
    var apply_number = $("input[name=apply_number]").val();
    //console.log(apply_number);
    formdata.append('apply_number', apply_number);
    //console.log(formdata);
    loading();
    $.ajax({
        type : "POST",
        url: '/Exam/FileUploadAjax',
        dataType : "JSON",
        data : formdata,
        contentType: false,
        processData: false,
        success: function(resultMsg){
            console.log(resultMsg);
            var file_list = resultMsg.file_list;
            $(".upload-area p").addClass("hide");
            //$(".file_list").append("<li>"+$(this).get(0).files[i].name+"</li>");
            $.each(file_list, function(key, element){
                $(".file_list").append("<li>"+element.file_name+"&nbsp;<i class=\"fa fa-times file_del\" data-file_seq=\""+element.file_seq+"\"></i></li>");
            });
            loading();
        },  error: function(e) {
            console.log(e.responseText);
            loading();
          }
    });
}

// Added thumbnail
function addThumbnail(data){
    $("#uploadfile p").remove();
    var len = $("#uploadfile div.thumbnail").length;

    var num = Number(len);
    num = num + 1;

    var name = data.name;
    var size = convertSize(data.size);
    var src = data.src;

    // Creating an thumbnail
    $("#uploadfile").append('<div id="thumbnail_'+num+'" class="thumbnail"></div>');
    $("#thumbnail_"+num).append('<img src="'+src+'" width="100%" height="78%">');
    $("#thumbnail_"+num).append('<span class="size">'+size+'<span>');

}

// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
