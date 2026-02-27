<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Erro no Servidor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        .glow {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        .broken-server {
            position: relative;
        }
        .broken-server:after {
            content: "";
            position: absolute;
            top: 30%;
            left: 50%;
            width: 100%;
            height: 4px;
            background: #ef4444;
            transform: translateX(-50%) rotate(-5deg);
            box-shadow: 0 0 10px #ef4444;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 min-h-screen flex flex-col items-center justify-center text-white p-4 font-sans">
    <div class="max-w-4xl w-full text-center">
        <div class="floating mb-8">
            <div class="relative inline-block">
                <i class="fas fa-server text-9xl text-red-500 opacity-20 absolute -left-4 -top-4"></i>
                <i class="fas fa-server text-9xl text-red-500 opacity-40 absolute -left-2 -top-2"></i>
                <i class="fas fa-server text-9xl text-red-500 broken-server"></i>
            </div>
            <div class="mt-6">
                <h1 class="text-6xl font-bold mb-2 glow">500</h1>
                <h2 class="text-3xl font-semibold mb-6">Erro Interno do Servidor</h2>
            </div>
        </div>

        <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6 mb-8 backdrop-blur-sm border border-gray-700">
            <p class="text-xl mb-4">Ops! Algo deu errado no nosso servidor.</p>
            <p class="text-gray-300 mb-6">Nossa equipe já foi notificada e estamos trabalhando para resolver o problema. Por favor, tente novamente mais tarde.</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-8">
                <button onclick="window.location.reload()" class="pulse bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-sync-alt"></i> Tentar Novamente
                </button>
                <button onclick="window.location.href='/'" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-home"></i> Página Inicial
                </button>
                <button onclick="window.history.back()" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i> Voltar
                </button>
            </div>
        </div>

        <div class="text-gray-400 text-sm">
            <p>Precisa de ajuda imediata? <a href="mailto:suporte@exemplo.com" class="text-blue-400 hover:text-blue-300">Contate nosso suporte</a></p>
            <p class="mt-2">ID do Erro: <span id="errorId" class="font-mono">ERR-<span id="errorCode">500</span>-<span id="randomId"></span></span></p>
        </div>

        <div class="mt-8 text-gray-500 text-xs">
            <p>© 2025 PrintView. Todos os direitos reservados.</p>
        </div>
    </div>

    <script>
        // Generate a random error ID
        document.addEventListener('DOMContentLoaded', function() {
            const randomId = Math.floor(Math.random() * 1000000).toString().padStart(6, '0');
            document.getElementById('randomId').textContent = randomId;
            
            // Add some console logging for debugging
            console.error(`Erro 500 no Servidor - ID da Requisição: ERR-500-${randomId}`);
            console.error('Stack trace apareceria aqui em um cenário real de erro');
            
            // Optional: Add error reporting
            try {
                // Em uma aplicação real, você enviaria isso para seu serviço de rastreamento de erros
                // reportarErro(randomId);
            } catch (e) {
                console.error('Falha ao reportar erro:', e);
            }
        });
        
        function reportarErro(id) {
            // Isso seria substituído por um relatório de erro real em produção
            console.log(`Simulando relatório de erro para ID: ${id}`);
            return true;
        }
    </script>
</body>
</html><?php /**PATH /home/u637911780/domains/printview.shop/resources/views/errors/500.blade.php ENDPATH**/ ?>