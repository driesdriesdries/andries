document.addEventListener('DOMContentLoaded', function() {
    let scrollPosition = 0;

    // Toggle the modal when clicking a .contact-button element
    document.querySelectorAll('.contact-button').forEach(function(button) {
        button.addEventListener('click', function() {
            const modal = document.querySelector('.modal-window');
            if (!modal.classList.contains('active')) {
                // Store the current scroll position
                scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

                modal.classList.add('active');
                modal.style.display = 'flex';  // Show the modal by setting its display to flex
                // Prevent scrolling when modal is open
                document.body.style.overflow = 'hidden';
                document.documentElement.style.overflow = 'hidden'; // This is for the <html> tag
            }
        });
    });

    // Function to close the modal
    const closeModal = () => {
        const modal = document.querySelector('.modal-window');
        if (modal.classList.contains('active')) {
            modal.classList.remove('active');
            modal.style.display = 'none';  // Hide the modal by setting its display to none
            // Allow scrolling when modal is closed
            document.body.style.overflow = 'auto';
            document.documentElement.style.overflow = 'auto';  // This is for the <html> tag

            // Restore the scroll position
            window.scrollTo(0, scrollPosition);
        }
    }

    // Close the modal when clicking the "X" span
    document.querySelector('.modal-inner__header span').addEventListener('click', closeModal);

    // Close the modal when clicking outside of .modal-inner
    document.querySelector('.modal-window').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
});
