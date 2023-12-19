<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="icon" href="icon-database.ico">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-variant: small-caps;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
        }

        li {
            margin: 0 10px;
        }

        a {
            text-decoration: none;
            padding: 120px 200px;
            border: 1px solid #000;
            border-radius: 50px; /* Rounded Persegi  */
            color: white; /* Warna Font  */
            display: block;
            text-align: center;
            transition: background-color 0.3s, box-shadow 0.3s;
            border: none;
        }

        .table {
            background-color: #CB5B58; /* RED  */
            border-radius: 50px; /* Rounded Persegi  */
        }

        .input {
            background-color: #45a049; /* Green  */
            border-radius: 50px; /* Rounded Persegi  */
        }

        a:hover {
            background-color: #333; /* Ganti background-color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
        }
        

    </style>
</head>
<body>
    <ul>
        <li class="input"><a href="inputBarang.php">input</a></li>
        <li class="table"><a href="dataBarang.php">table</a></li>
    </ul>
</body>
</html>