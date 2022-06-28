
<!Dotype HTML>
<html>
<head>
    <title>Card view </title>

    <style>
        .container {
            /* Add shadows to create the "card" effect */
            margin: 0 auto;
            min-width: 850px;
            max-width: 30%;
            padding:  10px 0;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            transition: 0.3s;
            text-align: center;
        }
        .password-container {
            margin-left: auto;
            margin-right: auto;
            width: 45%;
        }

        h3 {
            background: rgb(89, 14, 235);
            padding: 15px;
            text-align: center;
            margin: 0;
            color: #fff;
            border-radius: 4px;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class='card'>
    <div class='container'>
        <h2><b>New Post</b></h2>
        <p>{{ $details['title'] }}</p>
        <div class="password-container">
            <h3>{{ $details['description'] }}</h3>
        </div>
    </div>
</div>
</body>
</html>
