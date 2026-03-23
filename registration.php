<?php
  session_start();
?>
<?php
// Database config
$host = 'localhost';
$db = 'bmi';

// Create connection
$conn = new mysqli($host, "root", "", $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Sanitize and fetch inputs
  $fullName = trim($_POST['fullName']);
  $dob = $_POST['dob'];
  $age = intval($_POST['age']);
  $mobileNumber = trim($_POST['mobileNumber']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
 // $confirmPassword = $_POST['confirmPassword'];
  $height = floatval($_POST['height']);
  $weight = floatval($_POST['weight']);
  $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
  $city = trim($_POST['city']);
  $address = trim($_POST['address']);

  // Basic server-side validations
  if (empty($gender)) {
    die("Gender is required.");
  }

  if (!preg_match('/^\d{10}$/', $mobileNumber)) {
    die("Invalid mobile number.");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
  }

  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Prepare SQL statement
  $stmt = $conn->prepare("INSERT INTO registrations 
    (full_name, dob, age, mobile_number, email, password, height, weight, gender, city, address)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
  }

  $stmt->bind_param("ssisssddsss", 
    $fullName, $dob, $age, $mobileNumber, $email, 
    $hashedPassword, $height, $weight, $gender, $city, $address);

  if ($stmt->execute()) {
    echo "✅ Registration successful!";
    header("Location: login.php");
  } else {
    echo "❌ Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>

  <!-- Font Awesome CDN -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --color-bg: #e6f0fa;
      --color-primary: #3b82f6;
      --color-hover: #2563eb;
      --color-input-bg: #f0f8ff;
      --color-border: #cbd5e1;
      --color-dark: #1e3a8a;
      --radius: 10px;
      --transition: 0.3s ease;
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--color-bg);
      padding: 2rem;
      color: var(--color-dark);
      display: flex;
      justify-content: center;
    }

    form {
      background-color: white;
      padding: 2.5rem 2rem;
      border-radius: var(--radius);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
      max-width: 700px;
      width: 100%;
    }

    h1 {
      text-align: center;
      color: var(--color-primary);
      margin-bottom: 1.5rem;
    }

    label {
      font-weight: 600;
      margin: 10px 0 5px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    input,
    textarea {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1.5px solid var(--color-border);
      border-radius: var(--radius);
      background-color: var(--color-input-bg);
      font-size: 1rem;
      margin-bottom: 1rem;
      transition: all var(--transition);
    }

    input:focus,
    textarea:focus {
      outline: none;
      border-color: var(--color-primary);
      box-shadow: 0 0 6px var(--color-primary);
      background-color: white;
    }

    .gender-options {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .mobile-group {
      display: flex;
      gap: 0.5rem;
    }

    .input-small {
      width: 60px;
    }

    button {
      background-color: var(--color-primary);
      color: white;
      padding: 0.8rem 1.5rem;
      font-weight: bold;
      border: none;
      border-radius: var(--radius);
      cursor: pointer;
      transition: background-color var(--transition), transform var(--transition);
      margin-top: 0.5rem;
    }

    button:hover {
      background-color: var(--color-hover);
      transform: scale(1.02);
    }

    .clear-button {
      background-color: #dbeafe;
      color: var(--color-primary);
    }

    .clear-button:hover {
      background-color: #bfdbfe;
      color: white;
    }

    @media (max-width: 600px) {
      .mobile-group {
        flex-direction: column;
      }
    }

    .fa-icon {
      color: var(--color-primary);
    }
    .back-home-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 10px 18px;
      background-color:rgb(43, 115, 143);
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    .back-home-btn:hover {
      background-color:rgb(194, 220, 242);
    }
  </style>
</head>
<body>
  <a href="index.html" class="back-home-btn">🏠Back to Home</a>
  <form id="registrationForm" action="registration.php" method="POST" novalidate>
    <h1><i class="fas fa-user-plus"></i> Registration Form</h1>

    <label for="fullName"><i class="fas fa-user fa-icon"></i> Full Name:</label>
    <input type="text" id="fullName" name="fullName" pattern="^[A-Za-z\s.'-]+$" required />

    <label for="dob"><i class="fas fa-calendar-alt fa-icon"></i> Date of Birth:</label>
    <input type="date" id="dob" name="dob" required />

    <label for="age"><i class="fas fa-hourglass-half fa-icon"></i> Age:</label>
    <input type="text" id="age" name="age" readonly placeholder="Calculated automatically" required />

    <label for="mobileNumber"><i class="fas fa-phone fa-icon"></i> Mobile No.:</label>
    <div class="mobile-group">
      <input type="text" value="+91" readonly class="input-small" tabindex="-1" />
      <input type="text" id="mobileNumber" name="mobileNumber" pattern="^\d{10}$" maxlength="10" required />
    </div>

    <label for="email"><i class="fas fa-envelope fa-icon"></i> Email ID:</label>
    <input type="email" id="email" name="email" required />

    <label for="password"><i class="fas fa-lock fa-icon"></i> Password:</label>
    <input type="password" id="password" name="password" minlength="6" required />

    <label for="confirmPassword"><i class="fas fa-lock fa-icon"></i> Confirm Password:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" required />

    <label for="height"><i class="fas fa-ruler-vertical fa-icon"></i> Height (cm):</label>
    <input type="text" id="height" name="height" pattern="^\d+(\.\d{1,2})?$" required />

    <label for="weight"><i class="fas fa-weight fa-icon"></i> Weight (kg):</label>
    <input type="text" id="weight" name="weight" pattern="^\d+(\.\d{1,2})?$" required />

    <label><i class="fas fa-venus-mars fa-icon"></i> Gender:</label>
    <div class="gender-options">
      <label><input type="radio" name="gender" value="male" required /> Male</label>
      <label><input type="radio" name="gender" value="female" required /> Female</label>
      <label><input type="radio" name="gender" value="others" required /> Others</label>
    </div>

    <label for="city"><i class="fas fa-city fa-icon"></i> City:</label>
    <input type="text" id="city" name="city" required />

    <label for="address"><i class="fas fa-home fa-icon"></i> Address:</label>
    <textarea id="address" name="address" rows="4" required></textarea>

    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
      <button type="submit">Register</button>
      <button type="button" id="clearBtn" class="clear-button">Clear</button>
    </div>
  </form>

  <script>
    // Clear form
    document.getElementById('clearBtn').addEventListener('click', () => {
      document.getElementById('registrationForm').reset();
      document.getElementById('age').value = '';
    });

    // Calculate Age
    document.getElementById('dob').addEventListener('change', function () {
      const dob = new Date(this.value);
      const today = new Date();
      let age = today.getFullYear() - dob.getFullYear();
      const m = today.getMonth() - dob.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
      }
      document.getElementById('age').value = isNaN(age) || age < 0 ? '' : age;
    });

    // Validation
    document.getElementById('registrationForm').addEventListener('submit', function (e) {
      const mobile = document.getElementById('mobileNumber').value.trim();
      const email = document.getElementById('email').value.trim();
      const pwd = document.getElementById('password').value;
      const confirmPwd = document.getElementById('confirmPassword').value;
      const genderChecked = [...document.querySelectorAll('input[name="gender"]')].some(r => r.checked);
      const ageValue = document.getElementById('age').value;

      if (!genderChecked) {
        e.preventDefault();
        alert('Please select a gender.');
        return false;
      }

      if (!ageValue) {
        e.preventDefault();
        alert('Please select a valid Date of Birth to calculate age.');
        return false;
      }

      if (!/^\d{10}$/.test(mobile)) {
        e.preventDefault();
        alert('Please enter a valid 10-digit mobile number.');
        return false;
      }

      if (!/@/.test(email)) {
        e.preventDefault();
        alert('Please enter a valid email address.');
        return false;
      }

      if (pwd !== confirmPwd) {
        e.preventDefault();
        alert('Passwords do not match!');
        return false;
      }

      if (!this.checkValidity()) {
        e.preventDefault();
        alert('Please fill in all required fields correctly.');
        return false;
      }
    });
  </script>
</body>
</html>
