<!DOCTYPE html>
<html lang="en">

<head>
    <title>Record Details</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
    <style>
        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 20px 0;
            margin: 0;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 20px 0;
            margin: 0;
            width: 100%;
            text-align: center;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            position: fixed;
            bottom: 0;
            left: 0;
        }
        .footer p {
            margin: 0;
            font-size: 1.1em;
        }
        .footer .creator {
            font-style: italic;
            margin-top: 10px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .details-table th {
            background-color: #f8f9fa;
            text-align: right;
            width: 30%;
        }
        .details-table td {
            background-color: #fff;
        }
        input[type="input"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f8f9fa;
            box-sizing: border-box;
        }
        .action-links {
            text-align: center;
            margin-top: 20px;
        }
        .action-links a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .action-links a:hover {
            background-color: #0056b3;
        }
        .nav-links {
            text-align: center;
            margin: 20px 0;
        }
        .nav-links a {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .nav-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Building Records Management System</h1>
    </header>

    <div class="container">
        <h2>Record Details</h2>
        
        <table class="details-table">
            <tr>
                <th>Customer Name:</th>
                <td><input type="input" name="customerName" readonly value="<?= esc($building['customerName']) ?>"></td>
            </tr>
            <tr>
                <th>Building Type:</th>
                <td><input type="input" name="buildingType" readonly value="<?= esc($building['buildingType']) ?>"></td>
            </tr>
            <tr>
                <th>Month:</th>
                <td><input type="input" name="month" readonly value="<?= esc($building['month']) ?>"></td>
            </tr>
            <tr>
                <th>Usability:</th>
                <td><input type="input" name="usability" readonly value="<?= esc($building['usability']) ?>"></td>
            </tr>
            <tr>
                <th>State:</th>
                <td><input type="input" name="state" readonly value="<?= esc($building['state']) ?>"></td>
            </tr>
        </table>

        <div class="action-links">
            <a href="/">Back</a>
            <a href="/building/<?= esc($building['id']) ?>/edit">Edit</a>
            <a href="/building/<?= esc($building['id']) ?>/delete">Delete</a>
        </div>
    </div>

    <footer class="footer">
        <p>© 2025 Building Records Management System</p>
        <p class="creator">Created by Sufian</p>
    </footer>
</body>
</html>
