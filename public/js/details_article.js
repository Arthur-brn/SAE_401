document.addEventListener("DOMContentLoaded", function() {
    const textarea = document.getElementById('my_comment');
    const buttonsDiv = document.getElementById('buttons');
    const cancelButton = document.getElementById('cancelButton');

    textarea.addEventListener('focus', function() {
        buttonsDiv.classList.remove('hidden');
    });

    textarea.addEventListener('blur', function() {
        if (!textarea.value.trim()) {
            buttonsDiv.classList.add('hidden');
        }
    });

    cancelButton.addEventListener('click', function() {
        textarea.value = '';
        buttonsDiv.classList.add('hidden');
    });
})
