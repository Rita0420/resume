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
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
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

    .register-box {
      max-width: 500px;
      margin: 10vh auto;
      padding: 2rem;
      background-color: #fffaf3;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.08);
      border: 1px solid var(--accent-color);
    }

    .register-box h2 {
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

    .btn-success {
      background-color: var(--accent-color);
      border: none;
      font-weight: bold;
    }

    .btn-success:hover {
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
      .register-box {
        margin: 12vh auto;
        padding: 1.5rem;
      }
    }
  </style>
</head>

<body>
<a href="../index.php" class="home-icon"><i class="fa-solid fa-house-chimney"></i></a>
    <div class="register-box">
        <h2 class="text-center mb-4">註冊會員</h2>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">帳號</label>
                <input type="text" class="form-control" id="acc" name="acc" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">密碼</label>
                <input type="password" class="form-control" id="pw" name="pw" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">姓名</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">生日</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>
            <div class="d-grid">
                <button type="button" class="btn btn-success" onclick="reg()">註冊</button>
            </div>
        </form>
    </div>

    <script>
    function reg() {
        let data = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            name: $('#name').val(),
            email: $('#email').val(),
            birthday: $('#birthday').val(),
        }
        console.log(data);
        

        if (data.acc == '' || data.pw == '' || data.name == '' || data.email == '' || data.birthday == '') {
            alert("不可空白");
        } else {
            $.get("../api/chk_acc.php", data, (res) => {
                if (parseInt(res)) {
                    alert("帳號重複")
                } else{
                    $.post("../api/reg.php", data, (res) => {
                        console.log(res);
                        
                        if (parseInt(res)) {
                            alert("註冊成功，歡迎加入");
                            location.href = "../index.php";
                        } else {
                            alert("註冊失敗，請稍後再試");
                        }
                    })
                }
            })

        }
    }
    </script>

</body>

</html>