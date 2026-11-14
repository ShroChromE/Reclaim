document.addEventListener('DOMContentLoaded', () => {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const imagePlaceholder = document.getElementById('image-placeholder');

    if (!imageInput || !imagePreview || !imagePlaceholder) {
        return;
    }

    const MAX_SIZE = 2 * 1024 * 1024; // 2 MB, matches StoreItemRequest

    const resetPreview = () => {
        imagePreview.classList.add('hidden');
        imagePreview.removeAttribute('src');
        imagePlaceholder.classList.remove('hidden');
    };

    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];

        if (!file) {
            resetPreview();
            return;
        }

        if (file.size > MAX_SIZE) {
            alert('Ukuran foto maksimal 2 MB.');
            imageInput.value = '';
            resetPreview();
            return;
        }

        imagePreview.src = URL.createObjectURL(file);
        imagePreview.classList.remove('hidden');
        imagePlaceholder.classList.add('hidden');
    });
});