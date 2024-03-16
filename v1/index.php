<?php
// index.php

echo "<h1>API Documentation</h1>";

echo "<h2>Get All Kosts List</h2>";
echo "<p>Endpoint: <code>list.php</code></p>";
echo "<p>Method: <code>GET</code></p>";
echo "<p>Description: Returns a list of all available kosts.</p>";

echo "<h2>Get Booked Kosts by User ID</h2>";
echo "<p>Endpoint: <code>booked.php?user_id={user_id}</code></p>";
echo "<p>Method: <code>GET</code></p>";
echo "<p>Description: Returns a list of kosts booked by the specified user.</p>";

echo "<h2>Search Kosts</h2>";
echo "<p>Endpoint: <code>search.php?query={query}</code></p>";
echo "<p>Method: <code>GET</code></p>";
echo "<p>Description: Searches for kosts based on the specified query.</p>";

echo "<h2>Upload Kost</h2>";
echo "<p>Endpoint: <code>upload.php</code></p>";
echo "<p>Method: <code>POST</code></p>";
echo "<p>Description: Uploads a new kost to the database.</p>";

echo "<h2>Get My Kosts</h2>";
echo "<p>Endpoint: <code>getmykost.php?user_id={user_id}</code></p>";
echo "<p>Method: <code>GET</code></p>";
echo "<p>Description: Returns a list of kosts owned by the specified user (specifically for kost providers).</p>";

echo "<h2>Book Kost</h2>";
echo "<p>Endpoint: <code>book.php</code></p>";
echo "<p>Method: <code>POST</code></p>";
echo "<p>Description: Books a kost for a user.</p>";
echo "<h3>Request Body:</h3>";
echo "<p>Data JSON containing 'user_id' and 'kost_id'.</p>";
echo "<h3>Sample Request:</h3>";
echo "<pre>";
echo htmlentities('
{
    "user_id": 1,
    "kost_id": 1
}
');
echo "</pre>";
echo "<h3>Response:</h3>";
echo "<p>If booking is successful, you will receive a response with status code 200 OK and message 'Booking successfully added'.</p>";
echo "<p>If there is an error or incomplete data, you will receive a response with status code 400 Bad Request and the corresponding error message.</p>";
echo "<p>If the request method is not allowed, you will receive a response with status code 405 Method Not Allowed and the corresponding error message.</p>";
echo "<h3>Sample Response (Success):</h3>";
echo "<pre>";
echo htmlentities('
{
    "message": "Booking successfully added."
}
');
echo "</pre>";
echo "<h3>Sample Response (Failed - Incomplete Data):</h3>";
echo "<pre>";
echo htmlentities('
{
    "message": "Failed to add booking. Incomplete data."
}
');
echo "</pre>";
echo "<h3>Sample Response (Failed - User Already Booked):</h3>";
echo "<pre>";
echo htmlentities('
{
    "message": "Sorry, you have already made a booking. Each user can only make one booking."
}
');
echo "</pre>";
echo "<h3>Sample Response (Failed - Method Not Allowed):</h3>";
echo "<pre>";
echo htmlentities('
{
    "message": "Method request not allowed."
}
');
echo "</pre>";

?>
