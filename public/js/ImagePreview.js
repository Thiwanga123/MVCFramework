document.addEventListener('DOMContentLoaded', () => {
    let selectedFiles = []; // Store all selected files

document.getElementById("image").addEventListener("change", function(event) {
    const imageContainer = document.getElementById("image-container");
    const newFiles = Array.from(event.target.files);

    // Merge newly selected files with previously selected files
    selectedFiles = [...selectedFiles, ...newFiles];

    // Allow only up to 6 images
    if (selectedFiles.length > 6) {
        alert("You can only upload up to 6 images.");
        selectedFiles = selectedFiles.slice(0, 6); // Keep only the first 6 images
    }

    renderImages(); // Render updated image list
    event.target.value = ""; // Reset input to allow new selections
});

function renderImages() {
    const imageContainer = document.getElementById("image-container");
    imageContainer.innerHTML = ""; 

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imgWrapper = document.createElement("div");
            imgWrapper.style.position = "relative";
            imgWrapper.style.margin = "5px";

            const removeButton = document.createElement("button");
            removeButton.innerText = "X";
            removeButton.style.position = "absolute";
            removeButton.style.top = "5px";
            removeButton.style.right = "5px";
            removeButton.style.backgroundColor = "red";
            removeButton.style.color = "white";
            removeButton.style.border = "none";
            removeButton.style.borderRadius = "50%";
            removeButton.style.width = "25px";
            removeButton.style.height = "25px";
            removeButton.style.cursor = "pointer";
            removeButton.onclick = function() {
                selectedFiles.splice(index, 1); // Remove file from the array
                renderImages(); // Re-render images
            };

            const imgElement = document.createElement("img");
            imgElement.src = e.target.result;
            imgElement.style.width = "120px";
            imgElement.style.height = "120px";
            imgElement.style.objectFit = "cover";
            imgElement.style.borderRadius = "10px";
            imgElement.style.border = "1px solid #ccc";

            imgWrapper.appendChild(imgElement);
            imgWrapper.appendChild(removeButton);
            imageContainer.appendChild(imgWrapper);
        };

        reader.readAsDataURL(file);
    });
}
});

