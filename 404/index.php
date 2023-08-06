<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>404 not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="https://mp3-2020.com/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://mp3-2020.com/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://mp3-2020.com/favicon-16x16.png">
    <link rel="manifest" href="https://mp3-2020.com/site.webmanifest">
    <link rel="mask-icon" href="https://mp3-2020.com/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />
    <link rel="icon" type="image/x-icon" href="https://mp3-2020.com/favicon.ico">
    <meta name="google-site-verification" content="DeS9jA6W-FwrJdecd_nQLzFMzkxTOLw6H8bFKZkqI-k" />
    <link rel="stylesheet" href="https://mp3-2020.com/css/404.min.css" type="text/css" />
    <style>
        .mgf {
            letter-spacing: 0;
            font-size: 12px;
            color: #777;
            width: 260px;
            text-align: center;
            margin-top: -15px;
        }
    </style>
</head>

<body>
    <h1>404</h1>
    <div>
        <p>><span>ERROR CODE</span>: "<i>HTTP 404 Not Found</i>"</p>
        <p>><span>ERROR DESCRIPTION</span>: "<i>Такая страница не существует либо удалена навсегда</i>"</p>
    </div>
    <script>
        var str = document.getElementsByTagName("div")[0].innerHTML.toString(),
            i = 0;
        document.getElementsByTagName("div")[0].innerHTML = "", setTimeout(function() {
            var e = setInterval(function() {
                i++, document.getElementsByTagName("div")[0].innerHTML = str.slice(0, i) + "|", i == str.length && (clearInterval(e), document.getElementsByTagName("div")[0].innerHTML = str)
            }, 10)
        }, 0);
    </script>
</body>

</html>