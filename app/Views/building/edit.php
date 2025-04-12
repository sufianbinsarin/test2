<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Record</title>
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
            width: calc(100% - 16px); /* Account for padding */
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f8f9fa;
            box-sizing: border-box; /* Include padding in width calculation */
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
        <h2>Edit Record</h2>

        <?php if (session()->getFlashdata('error') || validation_list_errors()): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
                <?= validation_list_errors() ?>
            </div>
        <?php endif; ?>

        <form action="/building/store" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="id" value="<?= esc($building['id']) ?>">

            <table class="form-table">
                <tr>
                    <th><label for="customerName">Customer Name:</label></th>
                    <td><input type="text" name="customerName" value="<?= esc($building['customerName']) ?>" required></td>
                </tr>
                <tr>
                    <th><label for="buildingType">Building Type:</label></th>
                    <td>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="buildingType" value="Residential" <?= esc($building['buildingType']) == 'Residential' ? 'checked' : '' ?>>
                                Residential
                            </label>
                            <label>
                                <input type="radio" name="buildingType" value="Commercial" <?= esc($building['buildingType']) == 'Commercial' ? 'checked' : '' ?>>
                                Commercial
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label for="month">Month:</label></th>
                    <td><input type="number" name="month" min="1" max="12" value="<?= esc($building['month']) ?>" required></td>
                </tr>
                <tr>
                    <th><label for="usability">Usability:</label></th>
                    <td><input type="text" name="usability" value="<?= esc($building['usability']) ?>" required></td>
                </tr>
                <tr>
                    <th><label for="state">State:</label></th>
                    <td>
                        <select name="state" required>
                            <option value="Selangor" <?= esc($building['state']) == 'Selangor' ? 'selected' : '' ?>>Selangor</option>
                            <option value="Kuala Lumpur" <?= esc($building['state']) == 'Kuala Lumpur' ? 'selected' : '' ?>>Kuala Lumpur</option>
                            <option value="Penang" <?= esc($building['state']) == 'Penang' ? 'selected' : '' ?>>Penang</option>
                            <option value="Johor" <?= esc($building['state']) == 'Johor' ? 'selected' : '' ?>>Johor</option>
                            <option value="Kedah" <?= esc($building['state']) == 'Kedah' ? 'selected' : '' ?>>Kedah</option>
                            <option value="Negeri Sembilan" <?= esc($building['state']) == 'Negeri Sembilan' ? 'selected' : '' ?>>Negeri Sembilan</option>
                            <option value="Pahang" <?= esc($building['state']) == 'Pahang' ? 'selected' : '' ?>>Pahang</option>
                            <option value="Perak" <?= esc($building['state']) == 'Perak' ? 'selected' : '' ?>>Perak</option>
                            <option value="Perlis" <?= esc($building['state']) == 'Perlis' ? 'selected' : '' ?>>Perlis</option>
                            <option value="Sabah" <?= esc($building['state']) == 'Sabah' ? 'selected' : '' ?>>Sabah</option>
                            <option value="Sarawak" <?= esc($building['state']) == 'Sarawak' ? 'selected' : '' ?>>Sarawak</option>
                            <option value="Terengganu" <?= esc($building['state']) == 'Terengganu' ? 'selected' : '' ?>>Terengganu</option>
                            <option value="Melaka" <?= esc($building['state']) == 'Melaka' ? 'selected' : '' ?>>Melaka</option>
                            <option value="Labuan" <?= esc($building['state']) == 'Labuan' ? 'selected' : '' ?>>Labuan</option>
                            <option value="Putrajaya" <?= esc($building['state']) == 'Putrajaya' ? 'selected' : '' ?>>Putrajaya</option>
                            <option value="Kelantan" <?= esc($building['state']) == 'Kelantan' ? 'selected' : '' ?>>Kelantan</option>
                        </select>
                    </td>
                </tr>
            </table>

            <div class="action-links">
                <a href="/">Back</a>
                <input type="submit" name="submit" value="Update">
            </div>
        </form>
    </div>

    <footer class="footer">
        <p>© 2025 Building Records Management System</p>
        <p class="creator">Created by Sufian</p>
    </footer>
</body>
</html>
