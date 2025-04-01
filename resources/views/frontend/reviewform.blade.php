
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fff0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 128, 0, 0.3);
            width: 350px;
        }
        h2 {
            text-align: center;
            color: #008000;
        }
        label {
            font-weight: bold;
            color: #008000;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #008000;
            border-radius: 5px;
        }
        .rating {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 20px;
            cursor: pointer;
            color: #ccc;
        }
        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #f4b400;
        }
        button {
            width: 100%;
            background-color: #008000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Your Review</h2>
        <form action="#" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label>Rating:</label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">⭐</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">⭐</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">⭐</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">⭐</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">⭐</label>
            </div>

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
