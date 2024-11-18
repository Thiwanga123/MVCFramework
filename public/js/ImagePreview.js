// References to elements
const uploadImagesContainer = document.getElementById('uploadImagesContainer');
const productImageInput = document.getElementById('productImage');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');

// Open file dialog when the container is clicked
uploadImagesContainer.addEventListener('click', () => {
    productImageInput.click();
});

// Display file previews in small squares next to each other
productImageInput.addEventListener('change', () => {
    Array.from(productImageInput.files).forEach(file => {
        // Create a container for each file preview and its name
        const previewWrapper = document.createElement('div');
        previewWrapper.style.position = 'relative';
        previewWrapper.style.display = 'flex';
        previewWrapper.style.flexDirection = 'column';
        previewWrapper.style.alignItems = 'center';
        previewWrapper.style.margin = '10px';

        // Square container for the image or file icon
        const fileContainer = document.createElement('div');
        fileContainer.style.width = '50px';
        fileContainer.style.height = '50px';
        fileContainer.style.overflow = 'hidden';
        fileContainer.style.border = '1px solid #ddd';
        fileContainer.style.borderRadius = '10px';
        fileContainer.style.backgroundColor = '#f9f9f9';

        if (file.type.startsWith('image/')) {
            // Display image preview
            const reader = new FileReader();
            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover'; // Ensures image fits within square without distortion
                fileContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            // Display generic file icon for non-image files
            const fileIcon = document.createElement('div');
            fileIcon.style.width = '100%';
            fileIcon.style.height = '100%';
            fileIcon.style.display = 'flex';
            fileIcon.style.alignItems = 'center';
            fileIcon.style.justifyContent = 'center';
            fileIcon.style.fontSize = '24px';
            fileIcon.textContent = '📄'; // or any icon you want to represent a file
            fileContainer.appendChild(fileIcon);
        }

        // Display file name below the square
        const fileName = document.createElement('div');
        fileName.style.marginTop = '5px';
        fileName.style.fontSize = '12px';
        fileName.style.width = '60px'; // Adjust to fit below the preview
        fileName.style.textAlign = 'center';
        fileName.style.overflow = 'hidden';
        fileName.style.whiteSpace = 'nowrap';
        fileName.style.textOverflow = 'ellipsis';
        fileName.textContent = file.name;

        // Add close button
        const closeButton = document.createElement('div');
        closeButton.textContent = '✖'; // Unicode symbol for "X"
        closeButton.style.position = 'absolute';
        closeButton.style.top = '-5px';
        closeButton.style.right = '-5px';
        closeButton.style.backgroundColor = '#ff4d4d';
        closeButton.style.color = '#fff';
        closeButton.style.borderRadius = '50%';
        closeButton.style.width = '18px';
        closeButton.style.height = '18px';
        closeButton.style.display = 'flex';
        closeButton.style.alignItems = 'center';
        closeButton.style.justifyContent = 'center';
        closeButton.style.cursor = 'pointer';
        closeButton.style.fontSize = '12px';

        // Handle close button click
        closeButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent triggering other click events
            imagePreviewContainer.removeChild(previewWrapper); // Remove this preview
        });

        // Append the close button, square container, and file name to the wrapper
        previewWrapper.appendChild(fileContainer);
        previewWrapper.appendChild(fileName);
        previewWrapper.appendChild(closeButton);

        // Append the wrapper to the main preview container
        imagePreviewContainer.appendChild(previewWrapper);
    });

});
