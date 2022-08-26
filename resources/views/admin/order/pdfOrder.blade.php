<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Premio</title>

    <style>
        .styled-table {
            border-collapse: collapse;
            /* margin: 25px 0; */
            margin: auto;
            font-size: 0.9em;
            /* font-family: sans-serif;
             */
            font-family: "Times New Roman", Times, serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        div.title {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
        }
        div.sortCategory {
            font-family: "Times New Roman", Times, serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>Order History</h1>
    </div>
    <div class="sortCategory">
        <p>date - date</p>
    </div>
    <table class="styled-table"> 
        <thead>
            <tr>
                <th>Data and Time</th>
                <th>Description</th>
                <th>Reference No</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </tr>
        </tbody>

    </table>

</body>
</html>