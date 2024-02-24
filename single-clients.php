<?php
/**
 * The template for displaying all single posts of type 'clients'
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Andries
 */

global $wpdb;

get_header();

while ( have_posts() ) : the_post();

    $current_client_id = get_the_ID();
?>

    <h1>Client Details</h1>
    <h2><?php the_title(); ?></h2>
    <p>Email Address: <?php the_field('email_address'); ?></p>
    <p>Phone Number: <?php the_field('phone_number'); ?></p>
    <p>Address: <?php the_field('address'); ?></p>
    <p>Client Since: <?php the_field('client_since'); ?></p>

    <h2>Invoices for <?php the_title(); ?></h2>

    <?php 
    $invoice_ids = $wpdb->get_col($wpdb->prepare("
        SELECT post_id
        FROM $wpdb->postmeta
        WHERE meta_key = 'associated_client'
        AND meta_value LIKE %s
    ", '%' . $wpdb->esc_like(':"' . $current_client_id . '";') . '%'));

    $invoices_by_status = [];

    if (!empty($invoice_ids)) {
        foreach ($invoice_ids as $invoice_id) {
            $status = get_post_meta($invoice_id, 'invoice_status', true);
            // Organize invoices by status
            $invoices_by_status[$status][] = $invoice_id;
        }

        // Define colors for each status
        $status_colors = [
            'Draft' => '#808080', // Grey
            'Sent' => '#0000FF', // Blue
            'Viewed' => '#FFD700', // Gold
            'Paid' => '#008000', // Green
            'Overdue' => '#FF4500', // OrangeRed
            'Cancelled' => '#FF0000', // Red
        ];

        // Now display the invoices grouped by status
        foreach ($invoices_by_status as $status => $ids) {
            $status_color = $status_colors[$status] ?? '#000000'; // Default to black if not set
            echo '<h3 style="color: ' . esc_attr($status_color) . ';">' . esc_html($status) . '</h3><ul>';
            foreach ($ids as $id) {
                echo '<li><a href="' . get_permalink($id) . '">' . get_the_title($id) . '</a> - <span style="background-color:' . esc_attr($status_color) . '; color: #ffffff;">' . esc_html($status) . '</span></li>';
            }
            echo '</ul>';
        }
    } else {
        echo '<p>No invoices found for this client.</p>';
    }
?>

<?php endwhile;

get_footer();
?>
