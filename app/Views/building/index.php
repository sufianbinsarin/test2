<!DOCTYPE html>
<html lang="en">

<head>
    <title>Records</title>
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

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        #buildingTable_wrapper {
            margin: 0 auto;
            width: 1200px;
            padding: 20px;
            flex: 1;
        }
        #buildingTable {
            width: 100%;
        }
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin: 10px 0;
        }
        
        /* Navigation Links Styling */
        .nav-links {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-links a {
            text-decoration: none;
            color: #007bff;
            padding: 8px 16px;
            margin: 0 5px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .nav-links a:hover {
            background-color: #007bff;
            color: white;
        }
        
        /* Action Links Styling */
        .action-links a {
            text-decoration: none;
            padding: 4px 8px;
            margin: 0 2px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .action-links a:first-child {
            color: #28a745;
        }
        .action-links a:nth-child(2) {
            color: #ffc107;
        }
        .action-links a:last-child {
            color: #dc3545;
        }
        .action-links a:hover {
            background-color: #f8f9fa;
            padding: 4px 8px;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Building Records Management System</h1>
    </header>

    <div class="nav-links">
        <a href="/building/create">Create</a>
        <a href="/building/type/Residential">Show By Building Type</a>
        <a href="/building/state/Selangor">Show By State</a>
        <a href="/building/report">Report</a>
    </div>
    <table id="buildingTable" class="display">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Building Type</th>
                <th>Month</th>
                <th>Usability</th>
                <th>State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $building):
            ?>
                <tr>
                    <td><?= esc($building['customerName']); ?></td>
                    <td><?= esc($building['buildingType']); ?></td>
                    <td><?= esc($building['month']); ?></td>
                    <td><?= esc($building['usability']); ?></td>
                    <td><?= esc($building['state']); ?></td>
                    <td class="action-links">
                        <a href="/building/<?= esc($building['id']) ?>">Show</a>
                        <a href="/building/<?= esc($building['id']) ?>/edit">Edit</a>
                        <a href="/building/<?= esc($building['id']) ?>/delete">Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <footer class="footer">
        <p>© 2025 Building Records Management System</p>
        <p class="creator">Created by Sufian</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#buildingTable').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": [0, 2, 4, 5] } // Disable sorting for Customer Name, Month, State, and Action columns
                ]
            });
        });
    </script>
</body>

</html>