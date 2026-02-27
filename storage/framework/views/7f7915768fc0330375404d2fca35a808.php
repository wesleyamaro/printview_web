

 <!DOCTYPE html>
<html>
<head>
    <title>Erro 404</title>
    <style>
        body {
            text-align: center;
            padding: 150px;
        }
        h1 {
            font-size: 50px;
        }
        body {
            font: 20px Helvetica, sans-serif;
            color: #333;
        }
        article {
            display: block;
            text-align: left;
            width: 650px;
            margin: 0 auto;
        }
        a {
            color: #dc8100;
            text-decoration: none;
        }
        a:hover {
            color: #333;
            text-decoration: none;
        }
        img{
            width: 350px;
            margin: auto;
        }
        #divimg{
            display: flex;
        }
        .divtext{
            text-align: center;
        }
    </style>
</head>
<body>
    <article>
        <div class="divtext">
            <h1>Erro 404: Página não encontrada</h1>
            <p>Desculpe, a página que você está procurando não existe.</p>
        </div>
        
        <div id="divimg">          
            <img src="https://thumbs.dreamstime.com/b/error-concept-white-background-sign-logo-icon-error-concept-simple-vector-icon-123196424.jpg"" alt="Ícone de erro">
        </div>

        <div class="divtext">
            <a href="<?php echo e(route('novidades')); ?>" wire:navigate>Voltar</a>
        </div>
    </article>
</body>
</html>
<?php /**PATH C:\laragon\www\PrintView2\resources\views/errors/404.blade.php ENDPATH**/ ?>