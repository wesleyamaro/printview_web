<html>
<head>
    <title>Erro 403</title>
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
        a{
            margin-top: 5px;
            font-size: 38px;
        }
    </style>
</head>
<body>
    <article class="text-center">
        <div class="divtext">
            <h1 >Erro 403: Não autorizado</h1>
            <p>Desculpe, você não tem permissão para acessar esta página.</p>
        </div>
        <div id="divimg">
            <img  src="https://media.istockphoto.com/id/1472612294/vector/error-403-flat-illustration.jpg?s=612x612&w=0&k=20&c=7iFKhtih3ip1_PT6Pj6nlD6qOWNYAtxvVvvdJxVep14=" alt="Ícone de erro">
        </div>
        <div class="divtext">
            <a href="{{ route('novidades') }}" wire:navigate>Voltar</a>
        </div>
    </article>
</body>
</html>