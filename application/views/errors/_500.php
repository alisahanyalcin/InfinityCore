<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{messageTitle}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            line-height: 1.2;
            margin: 0;
        }
        html {
            width: 100%;
            height: 100%;
            color: #888888;
            display: table;
            text-align: center;
            font-family: sans-serif;
        }
        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
        }
        h1, h2 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
        }
        p {
            margin: 0 auto;
        }
    </style>
</head>
<body>
<h1>
    {{statusCode}}
</h1>
<h2>
    {{messageTitle}}
</h2>
<p>
    {{message}}
</p>
</body>
</html>