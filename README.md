# API Documentation

## Get All Kosts List
- **Endpoint:** `list.php`
- **Method:** `GET`
- **Description:** Returns a list of all available kosts.

## Get Booked Kosts by User ID
- **Endpoint:** `booked.php?user_id={user_id}`
- **Method:** `GET`
- **Description:** Returns a list of kosts booked by the specified user.

## Search Kosts
- **Endpoint:** `search.php?query={query}`
- **Method:** `GET`
- **Description:** Searches for kosts based on the specified query.

## Upload Kost
- **Endpoint:** `upload.php`
- **Method:** `POST`
- **Description:** Uploads a new kost to the database.

## Book Kost
- **Endpoint:** `book.php`
- **Method:** `POST`
- **Description:** Books a kost for the specified user. Requires 'user_id' and 'kost_id' parameters.

## Get My Kosts
- **Endpoint:** `getmykost.php?user_id={user_id}`
- **Method:** `GET`
- **Description:** Returns a list of kosts owned by the specified user (specifically for kost providers).
