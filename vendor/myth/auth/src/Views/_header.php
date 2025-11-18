<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Login') ?></title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(#0f141c, #234d22);
            font-family: "Courier New", monospace;
        }

        .card {
            background: white;
            width: 420px;
            padding: 40px 50px;
            border-radius: 22px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
            text-align: center;
       
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #1f5f2a;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: .9;
        }

        small {
            color: #555;
        }

        
    </style>
</head>

<body>