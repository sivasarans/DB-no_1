<?php
// DETAILS OF THIS FILE IN MY WEBSITE BACKEND PATH IS /home/aourzcom/public_html/wp-content/themes/woodmart/sample_process_form.php
// Include WordPress configuration
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = sanitize_text_field($_POST['name']);
    $gender = sanitize_text_field($_POST['gender']);

    // Insert data into the database
    global $wpdb;
    $table_name = 'user_details';
    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'gender' => $gender,
        ),
        array('%s', '%s')
    );

    // Check for errors
    if ($result === false) {
        echo $wpdb->last_error;
    } else {
        // Output JavaScript for displaying the success message and redirecting
        echo '
            <script>
                // Show success message
                alert("Data added successfully. Please wait...");

                // Redirect to the specified page after 4 seconds
                setTimeout(function() {
                    window.location.href = "https://www.aourz.com/database/";
                }, 1000);
            </script>
        ';
        exit;
    }
}
?>
