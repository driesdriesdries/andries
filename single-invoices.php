<?php
/**
 * The template for displaying all single posts of type 'invoices'
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Andries
 */

get_header(); ?>

<div class="invoice-container">
    <div class="invoice">
        <div class="header">
            <h2>Invoice</h2>
            <p>Andries Bester</p>
            <p>13 Firdale Avenue</p>
            <p>Gardens</p>
            <p>Cape Town</p>
            <p>Mobile: +27712914643</p>
            <p><a href="www.andriesbester.com">andriesbester.com</a></p>
        </div>
        <div class="details">
            <div class="left">
                <h4>Bill To:</h4>
                <p>SANTS</p>
            </div>
            <div class="right">
                <h4>Invoice Number: 2</h4>
                <p>Invoice Date: February 19, 2024</p>
                <p>Payment Due: March 14, 2024</p>
                <p>Amount Due: R10 000</p>
            </div>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Sants Retainer</td>
                    <td>20</td>
                    <td>R500</td>
                    <td>R10,000</td>
                    </tr>
                    <!-- Additional rows can be added here -->
                    <tr>
                    <td>Sants Retainer</td>
                    <td>20</td>
                    <td>R500</td>
                    <td>R10,000</td>
                    </tr>

                    <tr>
                    <td>Sants Retainer</td>
                    <td>20</td>
                    <td>R500</td>
                    <td>R10,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="total-container">
            <span class="label">Total:</span><span class="amount">R10,000</span>
            <br>
            <span class="label">Amount Due:</span><span class="amount">R10,000</span>
        </div>
        <div class="footer">
            <h4>Notes</h4>
            <p>Account Holder: AG Bester</p>
            <p>Bank: FNB</p>
            <p>Account Number: 912309210930</p>
            <p>Branch Code: 250665</p>
        </div>
    </div>
</div>

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
