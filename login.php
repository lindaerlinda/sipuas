<?php
require_once "koneksi.php";
require_once "auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($password === $user["password"]) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            echo json_encode(['status' => 'success']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Password salah']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User ndak ada']);
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="assets/img/sipuass.ico" rel="icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container align-items-center justify-content-center d-flex vh-100">
        <div class="row">
            <div>
                <a href="index.php">
                    <img src="assets/img/sipuas.png" alt="SIPUAS logo" class="ratio ratio-1x1 w-25 mb-4">
                </a>
                <h1 class="h1 fw-bold">Login</h1>
                <h3 class="h5 mb-4">SIPUAS RSUD Ajibarang</h3>
                <p class="text-secondary">Silahkan masuk untuk melihat hasil penilaian</p>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST" action="" id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script -->
    <!-- Swal -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#loginForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: window.location.href,
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            window.location.href = 'hasil.php';
                        } else if (response.status === 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: response.message || 'An error occurred during login.'
                            });
                        } else {
                            // Handle unexpected response
                            Swal.fire({
                                icon: 'warning',
                                title: 'Unexpected Response',
                                text: 'The server returned an unexpected response.'
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('AJAX Error:', textStatus, errorThrown);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong with the request!'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>