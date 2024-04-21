

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Submission</title>
</head>
<body>
    <h1>Feedback Submission</h1>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="rating"> Rating:</label>
        <input type="number" name="rating" id="rating" required><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>