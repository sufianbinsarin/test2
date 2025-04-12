<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reports</title>
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
            padding: 0 20px;
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
            padding: 0 20px;
        }
        .footer .creator {
            font-style: italic;
            margin-top: 10px;
            padding: 0 20px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            text-align: center;
        }
        .container {
            max-width: 1200px;
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
        .form-controls {
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        select, button {
            padding: 8px 16px;
            margin: 0 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f8f9fa;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        select:hover, button:hover {
            border-color: #007bff;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
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
        #buildingTable_wrapper {
            margin: 0 auto;
            width: 100%;
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
    </style>
</head>

<body>
    <header class="header">
        <h1>Building Records Management System</h1>
    </header>

    <div class="container">
        <h2>Reports</h2>

        <div class="form-controls">
            Month:&nbsp;
            <select name="month" id="month">
                <option value="0" selected>All</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>&nbsp;&nbsp;&nbsp;
            Building Type: &nbsp;
            <select name="buildingType" id="buildingType">
                <option value="" selected>All</option>
                <option value="Residential">Residential</option>
                <option value="Commercial">Commercial</option>
            </select>&nbsp;&nbsp;&nbsp;
            <button type="button" onclick="generateReport()">Generate Report</button>
        </div>

        <table id="buildingTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Building Type</th>
                    <th>Month</th>
                    <th>Usability (kWh)</th>
                    <th>Bill (RM)</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        
        <div class="nav-links">
            <a href="/">Back</a>
        </div>
    </div>

    <footer class="footer">
        <p>© 2025 Building Records Management System</p>
        <p class="creator">Created by Sufian</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            var csrfName = '<?= csrf_token() ?>';
            var csrfHash = '<?= csrf_hash() ?>';

            $('#buildingTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {         
                    url: '<?= site_url('building/ajaxDatatable') ?>',
                    type: 'POST',
                    data: function(d) {
                        d[csrfName] = csrfHash;
                        d.month = $('#month').val();
                        d.buildingType = $('#buildingType').val();
                    }
                },
                columns: [
                    { 
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    { data: 'customerName' },
                    { data: 'buildingType' },
                    { data: 'month' },
                    { data: 'usability' },
                    { data: 'bill' }
                ]
            });
        });

        function generateReport() {
            $('#buildingTable').DataTable().ajax.reload();
        }
    </script>
</body>

</html>