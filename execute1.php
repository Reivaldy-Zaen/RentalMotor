<!DOCTYPE html>
<html>
<head>
    <title>Rental Motor</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url(https://www.josrentals.com/wp-content/uploads/2023/08/rental-motor-kuta-bali-josrentals-logo-300x271.jpg);
            
            
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: red;
            box-shadow:0 0 10px rgba(0, 12, 255, 3);
            
        }

        .form-container {
            margin-right: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            
        }

        .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 10px;
        }

        label {
            width: 120px;
            margin-right: 10px;
        }

        input, select {
            flex: 1;
            padding: 5px;
            height: 29px;
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .output-container {
            margin-left: 20px;
            border-left: 1px solid #ccc;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    
   
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="member">Nama:</label>
                    <input type="text" id="member" name="member" required>
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis Motor:</label>
                    <select id="jenis" name="jenis" required>
                        <option value="aerox">Aerox</option>
                        <option value="Vario">Vario</option>
                        <option value="R15">R15</option>
                        <option value="cbr150r">cbr150r</option>
                        <option value="cbr250r">cbr250r</option>
                        <option value="pcx">pcx</option>
                        <option value="klx">klx</option>
                    </select>
                </div>
                <div class="form-group">
                    
                    <label for="waktu">Waktu (hari):</label>
                    <input type="number" id="waktu" name="waktu" required>
                </div>
                <input type="submit" value="Hitung">
            </form>
        </div>
        <div class="output-container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include 'execute.php'; // Make sure to include the class definitions file

                $rental = new rental();
                $rental->member = $_POST['member'];
                $rental->jenis = $_POST['jenis'];
                $rental->waktu = $_POST['waktu'];
                
                // Set the rental prices for each type
                $rental->setharga(200000, 150000, 300000, 400000,700000 ,300000, 250000); // Example prices

                // Display the payment details
                $rental->pembayaran();
            }
            ?>
        </div>
    </div>
</body>
</html>
