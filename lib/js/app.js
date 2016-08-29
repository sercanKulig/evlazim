/**
 * Created by Sercan on 23.8.2016.
 */

//accord tab
$( function() {
    $( "#accordion" ).accordion({
        collapsible: true
    });
} );

//checkbox group
$('input[type="checkbox"]').on('change', function() {
    $('input[class="' + this.name + '"]').not(this).prop('checked', false);
});

document.addEventListener("DOMContentLoaded", function() {
    Dropzone.options.addImages ={
        maxFiles:10,
        maxFilesize:2,
        acceptedFiles:'image/*',
        success: function(file, response){
            if(file.status == 'success'){
                handleDropzoneFileUpload.handleSuccess(response);
            }else {
                handleDropzoneFileUpload.handleError(response);
            }
        }
    };
});


document.addEventListener("DOMContentLoaded", function() {
    Dropzone.options.addMainImages ={
        maxFiles:1,
        maxFilesize:2,
        acceptedFiles:'image/*',
        success: function(file, response){
            if(file.status == 'success'){
                handleDropzoneFileUpload.handleSuccess(response);
            }else {
                handleDropzoneFileUpload.handleError(response);
            }
        }
    };
});
var handleDropzoneFileUpload ={
    handleError: function(response){
        console.log(response);
    },

    handleSuccess: function(response){
        var imageList = $('#gallery-images ul');
        var imageSrc = baseUrl + response.file_path;
        $(imageList).append('<li><a href="' + imageSrc + '"><img src"' + imageSrc + '"></a></li>');
    }
};
