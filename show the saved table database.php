<?php
global $wpdb;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve values from the form
    $name = sanitize_text_field($_POST['name']);
    $gender = sanitize_text_field($_POST['gender']);

    // Insert data into the user_details table
    $wpdb->insert(
        'user_details',
        array(
            'name' => $name,
            'gender' => $gender,
        ),
        array('%s', '%s')
    );
}

// Query to select data from the user_details table
$query = "SELECT * FROM user_details ORDER BY id DESC";
$results = $wpdb->get_results($query);

// Display the results in a table
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Gender</th><th>Entry Time</th></tr>";

foreach ($results as $row) {
    echo "<tr>";
    echo "<td>" . $row->id . "</td>";
    echo "<td>" . $row->name . "</td>";
    echo "<td>" . $row->gender . "</td>";
    echo "<td>" . $row->entry_time . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
