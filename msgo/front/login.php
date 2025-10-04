<?php include_once "./api/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSGO迷書狗工作室</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <style>
    :root {
      --main-bg: #f6f1eb;
      --accent-color: #bfa88f;
      --secondary-color: #e8dbce;
      --text-dark: #4b3f2f;
      --text-light: #7b6652;
      --highlight: #d9c1a3;
    }

    body {
      background-color: var(--main-bg);
      font-family: 'Segoe UI', 'Noto Sans TC', sans-serif;
      color: var(--text-dark);
    }

    .login-box {
      max-width: 400px;
      margin: 10vh auto;
      padding: 2rem;
      border-radius: 10px;
      background-color: #fffaf3;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      border: 1px solid var(--accent-color);
    }

    .login-box h2 {
      font-weight: bold;
      color: var(--text-dark);
    }

    .form-label {
      color: var(--text-light);
    }

    .form-control {
      border: 1px solid var(--highlight);
      background-color: var(--secondary-color);
      color: var(--text-dark);
    }

    .form-control:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 0.2rem rgba(191, 168, 143, 0.3);
    }

    .btn-primary {
      background-color: var(--accent-color);
      border: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .btn-primary:hover {
      background-color: var(--highlight);
    }

    .home-icon {
      position: absolute;
      top: 3vh;
      left: 3vw;
      font-size: 1.8rem;
      color: var(--accent-color);
    }

    .home-icon:hover {
      color: var(--highlight);
    }
    

    @media (max-width: 576px) {
      .login-box {
        margin: 5vh auto;
        padding: 1.5rem;
      }

    }
  </style>
</head>

<body>
  <a href="../index.php" class="home-icon"><i class="fa-solid fa-house-chimney"></i></a>
<div class="login-box">
  <h2 class="text-center mb-4">使用者登入</h2>
  <form action="../api/login.php" method="post">
    <div class="mb-3">
      <label for="acc" class="form-label">帳號</label>
      <input type="text" class="form-control" id="acc" name="acc" required>
    </div>
    <div class="mb-3">
      <label for="pw" class="form-label">密碼</label>
      <input type="password" class="form-control" id="pw" name="pw" required>
    </div>
    <div class="d-grid">
      <button type="submit" class="btn btn-primary">登入</button>
    </div>
  </form>
</div>
</body>

</html>