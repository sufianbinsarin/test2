<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create New Record</title>
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
        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .form-table th, .form-table td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        .form-table th {
            background-color: #f8f9fa;
            text-align: right;
            width: 30%;
        }
        .form-table td {
            background-color: #fff;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f8f9fa;
            box-sizing: border-box;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .radio-group {
            display: flex;
            gap: 20px;
        }
        .action-links {
            text-align: center;
            margin-top: 20px;
        }
        .action-links a,
        input[type="submit"] {
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
        .action-links a:hover,
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #dc3545;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Building Records Management System</h1>
    </header>

    <div class="container">
        <h2>Create New Record</h2>

        <?php if (session()->getFlashdata('error') || validation_list_errors()): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
                <?= validation_list_errors() ?>
            </div>
        <?php endif; ?>

        <form action="/building/store" method="post">
            <?= csrf_field() ?>
            
            <table class="form-table">
                <tr>
                    <th><label for="customerName">Customer Name:</label></th>
                    <td><input type="text" name="customerName" value="<?= set_value('customerName') ?>"></td>
                </tr>
                <tr>
                    <th><label for="buildingType">Building Type:</label></th>
                    <td>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="buildingType" value="Residential" <?= set_radio('buildingType', 'Residential') ?>> Residential
                            </label>
                            <label>
                                <input type="radio" name="buildingType" value="Commercial" <?= set_radio('buildingType', 'Commercial') ?>> Commercial
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="month">Month:</label></th>
                    <td><input type="number" name="month" min="1" max="12" value="<?= set_value('month') ?>"></td>
                </tr>
                <tr>
                    <th><label for="usability">Usability:</label></th>
                    <td><input type="text" name="usability" value="<?= set_value('usability') ?>"></td>
                </tr>
                <tr>
                    <th><label for="state">State:</label></th>
                    <td>
                        <select name="state">
                            <option value="Selangor" <?= set_select('state', 'Selangor') ?>>Selangor</option>
                            <option value="Kuala Lumpur" <?= set_select('state', 'Kuala Lumpur') ?>>Kuala Lumpur</option>
                            <option value="Penang" <?= set_select('state', 'Penang') ?>>Penang</option>
                            <option value="Johor" <?= set_select('state', 'Johor') ?>>Johor</option>
                            <option value="Kedah" <?= set_select('state', 'Kedah') ?>>Kedah</option>
                            <option value="Negeri Sembilan" <?= set_select('state', 'Negeri Sembilan') ?>>Negeri Sembilan</option>
                            <option value="Pahang" <?= set_select('state', 'Pahang') ?>>Pahang</option>
                            <option value="Perak" <?= set_select('state', 'Perak') ?>>Perak</option>
                            <option value="Perlis" <?= set_select('state', 'Perlis') ?>>Perlis</option>
                            <option value="Sabah" <?= set_select('state', 'Sabah') ?>>Sabah</option>
                            <option value="Sarawak" <?= set_select('state', 'Sarawak') ?>>Sarawak</option>
                            <option value="Terengganu" <?= set_select('state', 'Terengganu') ?>>Terengganu</option>
                            <option value="Melaka" <?= set_select('state', 'Melaka') ?>>Melaka</option>
                            <option value="Labuan" <?= set_select('state', 'Labuan') ?>>Labuan</option>
                            <option value="Putrajaya" <?= set_select('state', 'Putrajaya') ?>>Putrajaya</option>
                            <option value="Kelantan" <?= set_select('state', 'Kelantan') ?>>Kelantan</option>
                        </select>
                    </td>
                </tr>
            </table>

            <div class="action-links">
                <a href="/">Back</a>
                <input type="submit" name="submit" value="Create">
            </div>
        </form>
    </div>

    <footer class="footer">
        <p>© 2025 Building Records Management System</p>
        <p class="creator">Created by Sufian</p>
    </footer>
</body>
</html>
