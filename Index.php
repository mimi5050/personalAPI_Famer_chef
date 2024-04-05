<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Chef</h1>
     <form>
        <label>Enter your business id</label>
        <input id="id" type="number" name="id" placeholder="Enter your business id">
        <button type="button" onclick="fetchData()">Submit</button>
     </form>
    <div id="response"></div>

    <script>
        function fetchData() {
            var id = document.getElementById("id").value;
            fetch('https://photohub-be8962501b72.herokuapp.com/api.php/photoapp/api.php?user=' + id) 
            .then(response => response.json())
            .then(data => {
                // Display data received from the backend in a table
                var tableHtml = '<table>';
                tableHtml += '<tr><th>ProduceID</th><th>Name</th><th>Quantity</th><th>Price</th></tr>';
                data.forEach(item => {
                    tableHtml += '<tr>';
                    tableHtml += '<td>' + item.ProduceID + '</td>';
                    tableHtml += '<td>' + item.Name + '</td>';
                    tableHtml += '<td>' + item.Quantity + '</td>';
                    tableHtml += '<td>' + item.Price + '</td>';
                    tableHtml += '</tr>';
                });
                tableHtml += '</table>';
                document.getElementById('response').innerHTML = tableHtml;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }
    </script>
</body>
</html>
