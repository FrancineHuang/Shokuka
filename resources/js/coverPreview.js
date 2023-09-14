document.addEventListener('DOMContentLoaded', function() {
    const dropzoneFile = document.getElementById('dropzone-file');
    const imagePreview = document.getElementById('imagePreview');
    const uploadSection = document.querySelector('.upload-section');
    const reuploadSection = document.getElementById('reupload-section');
    const reuploadButton = document.getElementById('reupload-button');

    dropzoneFile.addEventListener('change', function() {
        handleFileChange(this, imagePreview);
    });

    reuploadButton.addEventListener('change', function() {
        handleFileChange(this, imagePreview);
    });

    function handleFileChange(inputElement, previewElement) {
        if (inputElement.files && inputElement.files.length > 0) {
            const fileURL = URL.createObjectURL(inputElement.files[0]);
            previewElement.src = fileURL;
            previewElement.style.display = 'block';
            uploadSection.style.display = 'none';
            reuploadSection.style.display = 'block';
        }
    }
});
