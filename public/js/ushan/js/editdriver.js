document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('editDriverModal');
    const closeModal = document.getElementById('driverCloseModal');
    const box = document.querySelector('.box');
    const openEditModal = document.querySelectorAll('.driver-edit-btn'); // Select all buttons with the class 'driver-edit-btn'

    openEditModal.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const driverName = button.getAttribute('driverName');
            const driverGender = button.getAttribute('driverGender');
            const driverPhone = button.getAttribute('driverPhone');
            const driverEmail = button.getAttribute('driverEmail');
            const id = button.getAttribute('driverId');

            console.log(driverName, driverGender, driverPhone, driverEmail);

            const modalDriverName = modal.querySelector('#driverName');
            const modalDriverGender = modal.querySelector('#driverGender');
            const modalDriverPhone = modal.querySelector('#driverPhone');
            const modalDriverEmail = modal.querySelector('#driverEmail');
            const modalId = modal.querySelector('#driverId');

            modalDriverName.value = driverName;
            modalDriverGender.value = driverGender;
            modalDriverPhone.value = driverPhone;
            modalDriverEmail.value = driverEmail;
            modalId.value = id;

            box.classList.add('blur');
            modal.classList.add('active');
        });
    });

    closeModal.addEventListener('click', () => {
        box.classList.remove('blur');
        modal.classList.remove('active');
        document.querySelector('#driverName').value = '';
        document.querySelector('#driverGender').value = '';
        document.querySelector('#driverPhone').value = '';
        document.querySelector('#driverEmail').value = '';
    });

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.classList.remove("active");
            box.classList.remove("blur");
        }
    };

    document.getElementById("editDriverForm").onsubmit = function (e) {
        modal.classList.remove("active");
        box.classList.remove("blur");
    };
});
