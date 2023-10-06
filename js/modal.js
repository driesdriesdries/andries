document.addEventListener('DOMContentLoaded', function() {

    // AJAX function to fetch the content of contact.php and load it into the modal
    function loadContactContent() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'wp-content/themes/andries/template-parts/contact.php', true);
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const modalBody = document.querySelector('.modal .body');
                if (modalBody) {
                    modalBody.innerHTML = this.responseText;
                }
            }
        };
        xhr.send();
    }

    // Handle all click events in one listener
    document.addEventListener('click', function(event) {

        // Open modal when clicking on .contact-button elements
        if (event.target.matches('.contact-button')) {
            const modal = document.querySelector('.modal');
            if (modal && !modal.classList.contains('active')) {
                modal.classList.add('active');
                loadContactContent();  // Fetch and load the content into the modal
            }
        }

        // Close modal and clear its content when clicking on .close
        if (event.target.matches('.close')) {
            const modal = document.querySelector('.modal.active');
            if (modal) {
                modal.classList.remove('active');
                const modalBody = document.querySelector('.modal .body');
                if (modalBody) {
                    modalBody.innerHTML = '';
                }
            }
        }

        // Close modal and clear its content when clicking outside of .modal__inner
        const modalInner = document.querySelector('.modal__inner');
        const modal = document.querySelector('.modal.active');
        if (modal && modalInner && !modalInner.contains(event.target) && event.target !== modalInner && !event.target.matches('.contact-button')) {
            modal.classList.remove('active');
            const modalBody = document.querySelector('.modal .body');
            if (modalBody) {
                modalBody.innerHTML = '';
            }
        }
    });
});
