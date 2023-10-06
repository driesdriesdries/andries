document.addEventListener('DOMContentLoaded', function() {

    const modal = document.querySelector('.modal');
    const modalBody = modal ? modal.querySelector('.body') : null;
    const modalInner = modal ? modal.querySelector('.modal__inner') : null;

    function loadContactContent() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'wp-content/themes/andries/template-parts/contact.php', true);
        xhr.onload = function() {
            if (xhr.status == 200 && modalBody) {
                modalBody.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    function openModal() {
        if (modal && !modal.classList.contains('active')) {
            modal.classList.add('active');
            loadContactContent();
            document.body.style.overflow = 'hidden';  // Prevent scrolling
        }
    }

    function closeModal() {
        if (modal) {
            modal.classList.remove('active');
            if (modalBody) {
                modalBody.innerHTML = '';
            }
            document.body.style.overflow = '';  // Restore scrolling
        }
    }

    document.addEventListener('click', function(event) {
        if (event.target.matches('.contact-button')) {
            openModal();
        } else if (event.target.matches('.close')) {
            closeModal();
        } else if (modal && modalInner && !modalInner.contains(event.target) && !event.target.matches('.contact-button')) {
            closeModal();
        }
    });

});
