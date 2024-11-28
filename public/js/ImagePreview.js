document.getElementById("productImage").addEventListener("change", (event) => {
    const fileCount = event.target.files.length; // Get the number of selected files
    document.getElementById("imageCount").textContent = `${fileCount} image(s) selected`;
});

// Optional: Show file picker when clicking the SVG icon
document.getElementById("uploadImagesIcon").addEventListener("click", () => {
    document.getElementById("productImage").click();
});

