document.addEventListener("DOMContentLoaded", function() {
    // Function to handle the intersection
    function handleIntersection(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
                animateElements(entry.target);
            }
        });
    }

    function animateElements(target) {
        let elements = [];
        let delay = 500;

        if (target.classList.contains('education')) {
            elements = target.querySelectorAll('.education__logos__badge');
        } else if (target.classList.contains('services')) {
            elements = target.querySelectorAll('.services__right--service');
        } else if (target.classList.contains('testimonial')) {
            elements = target.querySelectorAll('.testimonial__grid__item');
            delay = 1000;
        }

        elements.forEach((element, index) => {
            setTimeout(() => {
                element.classList.add('visible');
            }, index * delay);
        });
    }

    // Initialize Intersection Observer
    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver(handleIntersection, options);
    const targets = document.querySelectorAll('.fade-in');
    targets.forEach(target => observer.observe(target));
});
