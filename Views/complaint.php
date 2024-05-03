<!DOCTYPE html>
<html>
<head>
  <title>Complaint Form</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">    </head>
  
  <style>
    /* Basic form styling */
    body {
      font-family: Arial, sans-serif;
    }

    form {
      width: 500px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input, textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <h1>Complaint Form</h1>

  <form action="Views/addReclamation.php" method="post">
    <div class="form-group">
      <label for="complaintId">Complaint ID:</label>
      <input type="number" id="complaintId" name="complaintId" required>
    </div>

    <div class="form-group">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" required>
    </div>

    <div class="form-group">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" required>
    </div>

    <div class="form-group">
      <label for="complaintContent">Complaint Content:</label>
      <textarea id="complaintContent" name="complaintContent" rows="5" required></textarea>
    </div>

    <div class="form-group">
      <label for="complaintDate">Complaint Date:</label>
      <input type="date" id="complaintDate" name="complaintDate" required>
    </div>

    <button type="submit">Submit Complaint</button>
  </form>

</body>
</html>
