<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Andries
 */

get_header();
?>

	<script>
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
		e.preventDefault();

		document.querySelector(this.getAttribute('href')).scrollIntoView({
			behavior: 'smooth'
		});
		});
	});
	</script>


	<main id="primary" class="site-main">

		<div class="wedding-page-wrapper">
		<!-- Navbar Section	 -->
		<nav class="navbar">
				<div class="wrapper">
				<div class="container">
					<ul>
					<li><a href="#header">Home</a></li>
					<li><a href="#welcome">Welcome</a></li>
					<li><a href="#schedule">Schedule</a></li>
					<li><a href="#venue">Venue</a></li>
					<li><a href="#accommodation">Accommodation</a></li>
					<li><a href="#rsvp">RSVP</a></li>
					</ul>
				</div>
				</div>
			</nav>
			<!-- Header Section -->
			<section id="header">
				<div class="wrapper">
				<div class="container">
					<h1>Dries & Anneke's Amazing Wedding</h1>
					<p>March 16-18, 2025</p>
				</div>
				</div>
			</section>

			<!-- Welcome Message Section -->
			<section id="welcome">
				<div class="wrapper">
				<div class="container">
					<h2>Welcome to Our Wedding!</h2>
					<p>We are thrilled to celebrate our love and commitment with you. Join us for a magical weekend filled with joy, laughter, and unforgettable moments as we say 'I do' surrounded by our dearest family and friends. Thank you for being part of our special day!</p>
				</div>
				</div>
			</section>

			<!-- Schedule of Events Section -->
			<section id="schedule">
				<div class="wrapper">
				<div class="container">
					<h2>Schedule of Events</h2>
					<h3>Friday, March 16</h3>
					<p>Informal welcome braai at the Boma (close to the thatch roof accommodation). Starting time: 5 or 6 PM</p>
					<h3>Saturday, March 17</h3>
					<p>Morning: Free time</p>
					<p>Afternoon: Welcoming drinks at either the Weir or the Ceremony area at the big fallen tree.</p>
					<p>Evening: Reception at the Stone Barn, starting at roughly 5 PM. This will include the main course, speeches, dancing, and dessert.</p>
					<h3>Sunday, March 18</h3>
					<p>No planned activities. Feel free to explore and enjoy what Greyton has to offer.</p>
				</div>
				</div>
			</section>

			<!-- Venue Information Section -->
			<section id="venue">
				<div class="wrapper">
				<div class="container">
					<h2>Venue Information</h2>
					<p>Address: XC35+C4, GPS 34° 02' 31" S, 19° 24' 04.5" E, Helderstroom, 7230</p>
					<img src="path_to_map_image.jpg" alt="Map to Venue">
				</div>
				</div>
			</section>

			<!-- Accommodation Section -->
			<section id="accommodation">
				<div class="wrapper">
				<div class="container">
					<h2>Accommodation</h2>
					<p>We have booked accommodation in advance. Guests will need to pay for their own accommodation. By RSVPing 'Yes,' you consent to this plan. Please send your payment to:</p>
					<ul>
					<li>AG Bester</li>
					<li>First National Bank</li>
					<li>Account Number: 62597120098</li>
					<li>Branch Code: 201511</li>
					</ul>
				</div>
				</div>
			</section>

			<!-- RSVP Section -->
			<section id="rsvp">
				<div class="wrapper">
				<div class="container">
					<h2>RSVP</h2>
					<p>Please fill out the form below to let us know if you can join us.</p>
					<!-- Insert Contact Form 7 or Google Form here -->
					<form action="your_form_handler_url" method="POST">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" required>
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" required>
					<label for="attending">Will you be attending?</label>
					<select id="attending" name="attending" required>
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select>
					<label for="message">Message:</label>
					<textarea id="message" name="message"></textarea>
					<button type="submit">Submit</button>
					</form>
				</div>
				</div>
			</section>
		</div>	

	</main><!-- #main -->

<?php
get_footer();
