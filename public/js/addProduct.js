
document.addEventListener('DOMContentLoaded', () => {
        document.getElementById("returnPolicy").addEventListener("change", function () {
                var fullRefundSection = document.getElementById("fullRefundSection");
                var partialRefundSection = document.getElementById("partialRefundSection");
        
                fullRefundSection.style.display = "none";
                partialRefundSection.style.display = "none";
        
                if (this.value === "fullRefund") {
                    fullRefundSection.style.display = "block";
                } else if (this.value === "partialRefund") {
                    partialRefundSection.style.display = "block";
                } else if (this.value === "bothRefunds") {
                    fullRefundSection.style.display = "block";
                    partialRefundSection.style.display = "block";
                }
            });


});