<?php
/**
 * The template for displaying all single posts of type 'invoices'
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Andries
 */

get_header(); ?>

<h1>Invoice Details</h1>

<?php while ( have_posts() ) : the_post(); ?>

    <p>Invoice Number: <?php the_field('invoice_number'); ?></p>
    <p>Invoice Date: <?php the_field('invoice_date'); ?></p>
    <p>Due Date: <?php the_field('due_date'); ?></p>
    <p>Invoice Total: <?php the_field('invoice_total'); ?></p>

    <?php 
    $associated_clients = get_field('associated_client');
    if( $associated_clients ):
        // Assuming there's only one client associated
        $client_post = $associated_clients[0];
        if( $client_post ): ?>

            <p>Client Name: <?php echo esc_html( $client_post->post_title ); ?></p>
            <p>Client Email: <?php echo esc_html( get_field('email_address', $client_post->ID) ); ?></p>
            <p>Client Phone: <?php echo esc_html( get_field('phone_number', $client_post->ID) ); ?></p>
            <p>Client Address: <?php echo esc_html( get_field('address', $client_post->ID) ); ?></p>
            
        <?php endif;
    endif; ?>

    <?php // Handle the services_provided repeater field
    if ( have_rows('services_provided') ): ?>
        <ul>
            <?php while ( have_rows('services_provided') ): the_row(); ?>
                <li>
                    <strong>Service:</strong> <?php the_sub_field('service'); ?><br>
                    <strong>Description:</strong> <?php the_sub_field('description'); ?><br>
                    <strong>Cost:</strong> <?php the_sub_field('cost'); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
