<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,514;1,514&display=swap" rel="stylesheet" />
  <title>Erişiminiz Kısıtlandı.</title>
  <style>
    * {
      font-family: "Roboto", sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    html, body {
      height: 100%;
      background: #fff;
      color: #333;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 1rem;
      text-align: center;
      min-height: 100vh;
    }
    img {
      width: 80px;
      max-width: 20vw;
      height: auto;
      margin-bottom: 1rem;
    }
    p {
      font-size: 1.8rem;
      line-height: 1.4;
    }
     .footer {
      position: fixed;
      bottom: 10px;
      width: 100%;
      text-align: center;
      font-size: 0.85rem;
      color: #aaa;
      user-select: none;
    }
    
    @media (max-width: 400px) {
      p {
        font-size: 1.3rem;
      }
      img {
        width: 60px;
      }
    }
  </style>
</head>
<body>
  <img src="https://cdn-icons-png.flaticon.com/512/7641/7641419.png" alt="Erişim Kısıtlı" />
  <p>Mobil cihaz girişleri kısıtlanmıştır.</p>

   <div class="footer">
    &copy; 2025  | 
  </div>
</body>
</html>
