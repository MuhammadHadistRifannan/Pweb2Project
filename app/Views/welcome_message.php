<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StudyJam Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'IBM Plex Mono', monospace;
            background-color: #F9FAFB;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #004B23;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 2rem 1rem;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.7rem 1rem;
            margin-bottom: 0.3rem;
            border-radius: 8px;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #007A3D;
        }
        .main {
            margin-left: 270px;
            padding: 2rem;
        }
        .btn-main {
            background-color: #FFB703;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
        }
        .btn-main:hover {
            background-color: #fb8500;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
