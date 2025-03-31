document.addEventListener("DOMContentLoaded", function () {
    const editButton = document.getElementById("edit");
    const saveButton = document.getElementById("save");
    const inputs = document.querySelectorAll("input, textarea, select");

    const productIdInput = document.querySelector("input#productId");  

    editButton.addEventListener("click", function (e) {
        e.preventDefault();

        inputs.forEach(input => {
            if (input !== productIdInput) {
                input.removeAttribute("readonly");
                input.disabled = false;
            }
        });

        editButton.style.display = "none";
        saveButton.style.display = "inline-block";
    });

    saveButton.addEventListener("click", function (e) {
        e.preventDefault();

        const productId = productIdInput.value;
        const productName = document.querySelector("input#productName").value;
        const productCategory = document.getElementById("productCategoryEdit").value;
        const productRate = document.querySelector("input#productRate").value.replace("$", ""); 
        const stockQuantity = document.getElementById("stockQuantityEdit").value;
        const productDescription = document.querySelector("textarea").value;

        fetch(`${URLROOT}/products/updateProduct`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                product_id: productId, 
                product_name: productName,
                category: productCategory,
                rate: productRate,
                quantity: stockQuantity,
                description: productDescription
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Product updated successfully!");

                inputs.forEach(input => {
                    input.setAttribute("readonly", true);
                    input.disabled = true;
                });

                editButton.style.display = "inline-block";
                saveButton.style.display = "none";
            } else {
                alert("Error updating product. Please try again.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});