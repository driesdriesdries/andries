document.addEventListener("DOMContentLoaded", function() {
	// Function to handle the intersection
	function handleIntersection(entries, observer) {
	  entries.forEach(function(entry) {
		if (entry.isIntersecting) {
		  entry.target.classList.add('visible');
		  observer.unobserve(entry.target);
  
		  // If the faded-in section is the 'education' section, animate the badges
		  if (entry.target.classList.contains('education')) {
			const badges = entry.target.querySelectorAll('.education__logos__badge');
			badges.forEach(function(badge, index) {
			  setTimeout(function() {
				badge.classList.add('visible');
			  }, index * 400);  // 500ms delay between each badge
			});
		  }
		}
	  });
	}
  
	// Initialize Intersection Observer
	const options = {
	  root: null,
	  rootMargin: '0px',
	  threshold: 0.1
	};
  
	const observer = new IntersectionObserver(handleIntersection, options);
  
	// Target elements to observe
	const targets = document.querySelectorAll('.fade-in');
	targets.forEach(function(target) {
	  observer.observe(target);
	});
  });
  