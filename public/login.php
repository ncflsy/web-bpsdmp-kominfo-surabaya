<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/public/css/output.css">
</head>
<body>
    <section class="h-screen flex justify-center">
        <!-- <div>
            <img src="/public/img/kominfo.png" alt="" class="w-[30px]">
            <h1>Kominfo</h1>
        </div> -->
        <div class="flex flex-row items-center w-full border">
            <div class="h-screen w-[70%] flex justify-center items-center flex-col">
                <div class="flex absolute left-5 top-5">
                    <img src="/public/img/kominfo-ori.png" alt="" class="w-[30px]">
                    <h1 class="ms-2 text-lg font-bold">KOMINFO</h1>
                </div>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://lottie.host/b19137dd-8969-49e8-bc46-916ffac02d87/EWKQxdlWCK.json" background="transparent" speed="1" style="width: 500px; height: 500px" loop autoplay direction="1" mode="normal"></lottie-player>
                <h1 class="text-3xl font-bold">Makin Digital, Makin Maju</h1>
                <h5>Website Kementerian Komunikasi dan Informatika.</h5>
            </div>
            <div class="flex flex-col justify-center h-screen bg-blue w-[30%] px-2">
                <h1 class="text-center text-3xl font-bold">WELCOME</h1>
                <h5 class="text-center">Silahkan login untuk masuk ke halaman utama</h5>
                <form action="/public/crud/login_proses.php" method="post" enctype="multipart/form-data">
                    <div class="flex flex-row bg-white px-2 py-2 m-2">
                        <img src="/public/img/login/email.png" alt="" class="w-[25px]">
                        <input type="text" placeholder="Masukan username" class="w-full outline-none ps-2" name="username">
                    </div>
                    <div class="flex flex-row bg-white px-2 py-2 m-2">
                        <img src="/public/img/login/password.png" alt="" class="w-[25px]">
                        <input type="text" placeholder="Masukan password" class="w-full outline-none ps-2" name="password">
                    </div>
                    <button href="/public/index.php" class="px-4 w-[100px] h-[35px] shadow-xl bg-white rounded-lg flex justify-center items-center font-bold mx-auto my-8" type="submit" name="submit">Login</button>
                    <h1 id="login_gagal" class="hidden">Masukkan password dengan benar</h1>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>