document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tr.clickable-row');
    rows.forEach(function(row) {
        row.addEventListener('click', function() {
            window.location.href = row.getAttribute('data-href');
        });
    });
});