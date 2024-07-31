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
				<div class="events">
					<div class="card">
					<h3>Friday, March 16</h3>
					<h4><strong>Evening</strong></h4>
					<ul>
						<li>Informal welcome braai at the Boma</li>
						<li>Braai / Gourmet Boeries and salad will be served</li>
						<li>Please bring whatever you want to drink, but there will be some beers and drinks availble if you forgot!</li>
						<li>Starting time: 5PM but you are welcome to arrive / attend at your own discretion and availablitiy.</li>
					</ul>
					</div>
					<div class="card">
					<h3>Saturday, March 17</h3>
						<h4><strong>Morning</strong></h4>
						<ul>
							<li>Free time to explore or relax.</li>
							
						</ul>

						<h4><strong>Afternoon</strong></h4>
						<ul>
						<li>Welcoming drinks at the Weir or Ceremony area.</li>
						<li>Photos and hanging out with friends</li>
						</ul>

						<h4><strong>Evening</strong></h4>
						<ul>
						<li>Reception at the Stone Barn, starting at 5 PM.</li>
						<li>Main course and dessert</li>
						<li>Speeches, Dancing and having a good time</li>
						</ul>
				
					</div>
					<div class="card">
					<h3>Sunday, March 18</h3>
					<p>No planned activities.</p>
					<ul>
						<li>Explore Greyton</li>
						<li>Hiking trails</li>
						<li>Quaint shops and cafes</li>
						<li>Relax and unwind</li>
					</ul>
					</div>
				</div>
				</div>
			</div>
			</section>



			<!-- Venue Information Section -->
			<section id="venue">
				<div class="wrapper">
				<div class="container">
					<div class="left">
						<h2>Venue Information</h2>
						<ul>
							<li><a href="https://maps.app.goo.gl/zH2L1iQLcdx8G3tj9">Google Maps</a></li>
							<li><a href="https://www.elandsklooffarmcottages.co.za/">Link to Elandskloof Website</a></li>
							<li><a href="https://www.youtube.com/watch?v=JxJ0uPS6q3M">Elandskloof Aerial Overview Youtube</a></li>
						</ul>
					</div>
					<div class="right">
						<img src="https://www.andriesbester.com/wp-content/uploads/2024/07/WhatsApp-Image-2024-07-25-at-15.19.10.jpeg" alt="Map to Venue">
					</div>
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
					<!-- This will output the content set in the WordPress editor -->
					<?php the_content(); ?>
					</div>
				</div>
			</section>


		</div>	

	</main><!-- #main -->

<?php
get_footer();
