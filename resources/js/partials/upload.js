window.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelector('#patch-file-upload input[type=file]');
    if (fileInput) {
        fileInput.onchange = () => {
            if (fileInput.files.length > 0) {
                const fileName = document.querySelector('#patch-file-upload .file-name');
                fileName.textContent = fileInput.files[0].name;
            }
        }
    }
});
