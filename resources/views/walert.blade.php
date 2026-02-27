{{-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Alertas Personalizado</title>
    
</head>
<body> --}}
  
<!--     <div class="container">

        
        <div class="demo-buttons">
            <button class="demo-button success" onclick="dispatchPhpEvent('showSucesso', {
                title: 'Grade criada com sucesso!', 
                text: 'A grade foi adicionada ao sistema.',
                position: 'center',
                showConfirmButton: true
            })">Sucesso (Centro)</button>
            
            <button class="demo-button success" onclick="dispatchPhpEvent('showSucesso', {
                title: 'Grade criada com sucesso!', 
                text: 'A grade foi adicionada ao sistema.',
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false
            })">Sucesso (Topo-Direita com Timer)</button>
            
            <button class="demo-button error" onclick="dispatchPhpEvent('showErro', {
                title: 'Erro ao criar grade', 
                text: 'Verifique os campos e tente novamente.',
                position: 'bottom'
            })">Erro (Inferior)</button>
            
            <button class="demo-button warning" onclick="dispatchPhpEvent('showAviso', {
                title: 'Atenção! Grade incorreta', 
                text: 'A grade selecionada não é compatível.',
                position: 'left'
            })">Aviso (Esquerda)</button>
        </div>
        
        <h3>Exemplo de uso no PHP (Livewire):</h3>
        <pre><code>public function showSuccessAlert()
{
    $this->dispatch('showSucesso', [
        'title' => 'Grade criada com sucesso!',
        'text' => 'A grade foi adicionada ao sistema.',
        'position' => 'top-end',
        'timer' => 3000,
        'showConfirmButton' => false
    ]);
}</code></pre>
        
        <h3>Exemplo de configuração do listener JavaScript:</h3>
        <pre><code>window.addEventListener('showSucesso', event => {
    let data = event.detail;
    
    meuAlert.sucesso({      
        icon: 'success',
        title: data.title || 'Sucesso',
        text: data.text || '',
        footer: data.footer || '',
        position: data.position || 'center',
        timer: data.timer || null,
        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
        showCancelButton: data.showCancelButton || false,
        confirmButtonText: data.confirmButtonText || 'OK',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#046c4e',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            console.log('Alerta fechado com:', resultado);
        })
    });
});</code></pre>
    </div> -->

<style>
       
        /* Botões de demonstração */
        .demo-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .demo-button {
            padding: 12px 15px;
            border: none;
            border-radius: 5px;
            background-color: #3085d6;
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .demo-button:hover {
            background-color: #2778c4;
        }

        .demo-button.success {
            background-color: #046c4e;
        }

        .demo-button.success:hover {
            background-color: #035a41;
        }

        .demo-button.error {
            background-color: #e74c3c;
        }

        .demo-button.error:hover {
            background-color: #d62c1a;
        }

        .demo-button.warning {
            background-color: #f39c12;
        }

        .demo-button.question {
            background-color: #007cf8;
        }

        .demo-button.warning:hover {
            background-color: #d8870a;
        }

        /* Código de exemplo */
        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #3085d6;
            overflow-x: auto;
            margin-bottom: 20px;
            font-family: 'Consolas', 'Monaco', monospace;
            font-size: 14px;
            line-height: 1.5;
        }

        code {
            color: #333;
        }

        /* Alert overlay e container */
        /* .custom-alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            
            /* Posicionamento padrão (centro) 
            justify-content: center;
            align-items: center;
        } */

        .custom-alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Ou a cor/opacidade que preferir */
            display: flex;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            /* MODIFICADO: Transição mais rápida e linear para o overlay */
            transition: opacity 0.15s linear, visibility 0s linear 0.15s;
            justify-content: center; /* Mantenha seus posicionamentos */
            align-items: center;
            /* ... suas classes de posição ... */
            justify-content: center;
            align-items: center;
        }



        /* Classes para os diferentes posicionamentos */
        .custom-alert-overlay.position-center {
            justify-content: center;
            align-items: center;
        }

        .custom-alert-overlay.position-top {
            justify-content: center;
            align-items: flex-start;
            padding-top: 20px;
        }

        .custom-alert-overlay.position-bottom {
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 20px;
        }

        .custom-alert-overlay.position-left {
            justify-content: flex-start;
            align-items: center;
            padding-left: 20px;
        }

        .custom-alert-overlay.position-right {
            justify-content: flex-end;
            align-items: center;
            padding-right: 20px;
        }

        .custom-alert-overlay.position-top-end {
            justify-content: flex-end;
            align-items: flex-start;
            padding-top: 20px;
            padding-right: 20px;
        }
        
        .custom-alert-overlay.position-top-start {
            justify-content: flex-start;
            align-items: flex-start;
            padding-top: 20px;
            padding-left: 20px;
        }
        
        .custom-alert-overlay.position-bottom-end {
            justify-content: flex-end;
            align-items: flex-end;
            padding-bottom: 20px;
            padding-right: 20px;
        }
        
        .custom-alert-overlay.position-bottom-start {
            justify-content: flex-start;
            align-items: flex-end;
            padding-bottom: 20px;
            padding-left: 20px;
        }

        /* .custom-alert-overlay.show {
            opacity: 1;
            visibility: visible;
        } */

        .custom-alert-overlay.show {
            opacity: 1;
            visibility: visible;
            /* MODIFICADO: Ajusta o delay da visibilidade para desaparecer */
            transition: opacity 0.15s linear, visibility 0s linear 0s;
        }


        /* Container do alerta */
        /* .custom-alert {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            transform: scale(0.9);
            opacity: 0;
            transition: transform 0.3s, opacity 0.3s;
        } */

        /* Container do alerta */
        .custom-alert {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            /* MODIFICADO: Estado inicial - menor e transparente */
            transform: scale(0.8);
            opacity: 0;
            /* MODIFICADO: Transição com cubic-bezier para efeito 'pop/bounce' */
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.320, 1.275), /* Efeito bounce na escala */
                        opacity 0.2s ease-out; /* Fade-in rápido */
            will-change: transform, opacity; /* Mantém a otimização */
        }

        /* .custom-alert-overlay.show .custom-alert {
            transform: scale(1);
            opacity: 1;
            width: 95%;
        } */
        .custom-alert-overlay.show .custom-alert {
            /* MODIFICADO: Termina na posição Y original e escala completa */
            transform: scale(1);
            opacity: 1;
            width: 95%;
        }

        /* Ícones dos alertas */
        .custom-alert-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
        }

        .custom-alert-icon.success {
            background-color: #a5dc86;
            color: #fff;
        }

        .custom-alert-icon.error {
            background-color: #f27474;
            color: #fff;
        }

        .custom-alert-icon.info {
            background-color: #3fc3ee;
            color: #fff;
        }

        .custom-alert-icon.warning {
            background-color: #f8bb86;
            color: #fff;
        }

        .custom-alert-icon.question {
            background-color: #007cf8;
            color: #fff;
        }

        /* Título do alerta */
        .custom-alert-title {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
        }

        /* Mensagem do alerta */
        .custom-alert-message {
            color: #666;
            font-size: 16px;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        /* Footer do alerta */
        .custom-alert-footer {
            color: #888;
            font-size: 14px;
            margin-top: 15px;
            border-top: 1px solid #eee;
            padding-top: 15px;
            font-style: italic;
        }

        /* Botões */
        .custom-alert-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .custom-alert-button {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s, transform 0.1s;
        }

        .custom-alert-button:active {
            transform: scale(0.97);
        }

        /* Campo de input */
        .custom-alert-input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        /* Barra de progresso para o timer */
        .custom-alert-timer {
            height: 4px;
            background-color: rgba(0, 0, 0, 0.1);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }
        
        .custom-alert-timer-progress {
            height: 100%;
            width: 100%;
            background-color: #3085d6;
            transform-origin: left;
            transform: scaleX(0);
            transition: transform linear;
        }
    </style>

    <!-- Template do Alerta -->
<div id="customAlertOverlay" class="custom-alert-overlay">
        <div class="custom-alert">
            <div id="customAlertIcon" class="custom-alert-icon">
                <span id="customAlertIconContent">✓</span>
            </div>
            <h2 id="customAlertTitle" class="custom-alert-title">Título</h2>
            <p id="customAlertMessage" class="custom-alert-message">Mensagem do alerta</p>
            <div id="customAlertInputContainer" style="display: none;">
                <input type="text" id="customAlertInputField" class="custom-alert-input-field" placeholder="Digite aqui...">
            </div>
            <div id="customAlertButtons" class="custom-alert-buttons">
                <!-- Os botões serão inseridos dinamicamente -->
            </div>
            <div id="customAlertFooter" class="custom-alert-footer" style="display: none;">
                <!-- Footer será inserido dinamicamente se existir -->
            </div>
            <div id="customAlertTimer" class="custom-alert-timer" style="display: none;">
                <div id="customAlertTimerProgress" class="custom-alert-timer-progress"></div>
            </div>
        </div>
    </div>

<script>
         document.addEventListener('livewire:navigated', () => {
        // Classe MeuAlert para gerenciar os alertas personalizados
        class MeuAlert {
            constructor() {
                this.overlay = document.getElementById('customAlertOverlay');
                this.alert = this.overlay.querySelector('.custom-alert');
                this.icon = document.getElementById('customAlertIcon');
                this.iconContent = document.getElementById('customAlertIconContent');
                this.title = document.getElementById('customAlertTitle');
                this.message = document.getElementById('customAlertMessage');
                this.buttonsContainer = document.getElementById('customAlertButtons');
                this.inputContainer = document.getElementById('customAlertInputContainer');
                this.inputField = document.getElementById('customAlertInputField');
                this.footerContainer = document.getElementById('customAlertFooter');
                this.timerContainer = document.getElementById('customAlertTimer');
                this.timerProgress = document.getElementById('customAlertTimerProgress');
                
                // Binding dos métodos
                this.fechar = this.fechar.bind(this);
                this.confirmar = this.confirmar.bind(this);
                this.cancelar = this.cancelar.bind(this);
                this.handleOverlayClick = this.handleOverlayClick.bind(this); // <-- Adiciona binding
                
                // Estado
                this.callback = null;
                this.inputCallback = null;
                this.timerTimeout = null;
                this.currentConfig = null; // <-- Adiciona propriedade para guardar config
                
                // Configurar listeners de eventos
                this.configurarEventListeners();
                this.overlay.addEventListener('click', this.handleOverlayClick); // <-- Adiciona listener
            }

            // Método para lidar com cliques no overlay
            handleOverlayClick(event) {
                // Verifica se o clique foi diretamente no overlay
                // e se o alerta atual NÃO é persistente
                if (event.target === this.overlay) {
                    const isPersistent = this.currentConfig?.isPersistent || false; // Pega o valor ou assume false
                    if (!isPersistent) {
                        this.fechar(false, { reason: 'overlay' }); // Fecha como se fosse cancelado
                    }
                }
            }
            
            // Configurar os event listeners para os diferentes tipos de alertas
            configurarEventListeners() {
                /* window.addEventListener('showSucesso', (event) => {
                    let data = event.detail;
                    
                    this.sucesso({      
                        icon: 'success',
                        title: data.title || 'Sucesso',
                        text: data.text || '',
                        isPersistent: data.isPersistent || false,
                        footer: data.footer || '',
                        position: data.position || 'center',
                        timer: data.timer || null,
                        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
                        showCancelButton: data.showCancelButton || false,
                        confirmButtonText: data.confirmButtonText || 'OK',
                        cancelButtonText: data.cancelButtonText || 'Cancelar',
                        confirmButtonColor: data.confirmButtonColor || '#046c4e',
                        cancelButtonColor: data.cancelButtonColor || '#c6a385',
                        callback: data.callback || ((resultado) => {
                            console.log('Alerta fechado com:', resultado);
                        })
                    });
                }); */
                
                /* window.addEventListener('showErro', (event) => {
                    let data = event.detail;
                    
                    this.erro({      
                        icon: 'error',
                        title: data.title || 'Erro',
                        text: data.text || '',
                        footer: data.footer || '',
                        position: data.position || 'center',
                        timer: data.timer || null,
                        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
                        showCancelButton: data.showCancelButton || false,
                        confirmButtonText: data.confirmButtonText || 'OK',
                        cancelButtonText: data.cancelButtonText || 'Cancelar',
                        confirmButtonColor: data.confirmButtonColor || '#e74c3c',
                        cancelButtonColor: data.cancelButtonColor || '#c6a385',
                        callback: data.callback || ((resultado) => {
                            console.log('Alerta fechado com:', resultado);
                        })
                    });
                }); */
                
                window.addEventListener('showAviso', (event) => {
                    let data = event.detail;
                    
                    this.aviso({      
                        icon: 'warning',
                        title: data.title || 'Aviso',
                        text: data.text || '',
                        footer: data.footer || 'Esta ação não poderá ser desfeita!',
                        position: data.position || 'center',
                        timer: data.timer || null,
                        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
                        showCancelButton: data.showCancelButton || true,
                        confirmButtonText: data.confirmButtonText || 'Sim, remover!',
                        cancelButtonText: data.cancelButtonText || 'Cancelar',
                        confirmButtonColor: data.confirmButtonColor || '#f39c12',
                        cancelButtonColor: data.cancelButtonColor || '#c6a385',
                        callback: data.callback || ((resultado) => {
                            console.log('Alerta fechado com:', resultado);
                        })
                    });
                });
                
                window.addEventListener('showInput', (event) => {
                    let data = event.detail;
                    
                    this.input({      
                        icon: 'info',
                        title: data.title || 'Digite',
                        text: data.text || '',
                        footer: data.footer || '',
                        position: data.position || 'center',
                        timer: data.timer || null,
                        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
                        showCancelButton: data.showCancelButton || true,
                        confirmButtonText: data.confirmButtonText || 'Confirmar',
                        cancelButtonText: data.cancelButtonText || 'Cancelar',
                        confirmButtonColor: data.confirmButtonColor || '#3085d6',
                        cancelButtonColor: data.cancelButtonColor || '#c6a385',
                        callback: data.callback || ((resultado) => {
                            console.log('Alerta fechado com:', resultado);
                        })
                    });
                });


                //Order
                /* window.addEventListener('showConfirmGradePadrao', (event) => {
                    let data = event.detail;
                    
                    this.aviso({      
                        icon: 'question',
                        title: data.title || 'Aviso',
                        text: data.text || '',
                        footer: data.footer || 'Esta ação não poderá ser desfeita!',
                        position: data.position || 'center',
                        timer: data.timer || null,
                        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
                        showCancelButton: data.showCancelButton || true,
                        confirmButtonText: data.confirmButtonText || 'Sim, confirmar!',
                        cancelButtonText: data.cancelButtonText || 'Cancelar',
                        confirmButtonColor: data.confirmButtonColor || '#007cf8',
                        cancelButtonColor: data.cancelButtonColor || '#c6a385',
                        callback: data.callback || ((resultado) => {
                            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                                // Se o usuário confirmar, chama o método para excluir o item
                                Livewire.dispatch('confirmGradePadrao');
                            }
                        })
                    });
                }); */

            }
            
            // Limpar qualquer timer existente
            limparTimer() {
                if (this.timerTimeout) {
                    clearTimeout(this.timerTimeout);
                    this.timerTimeout = null;
                }
                
                this.timerContainer.style.display = 'none';
                this.timerProgress.style.transition = '';
                this.timerProgress.style.transform = 'scaleX(0)';
            }
            
            // Configurar o timer para fechar automaticamente
            configurarTimer(tempo) {
                // Limpar qualquer timer existente
                this.limparTimer();
                
                if (!tempo) return;
                
                // Exibir a barra de progresso
                this.timerContainer.style.display = 'block';
                
                // Animação da barra de progresso
                setTimeout(() => {
                    this.timerProgress.style.transition = `transform ${tempo}ms linear`;
                    this.timerProgress.style.transform = 'scaleX(1)';
                }, 10);
                
                // Configurar o timer para fechar o alerta
                this.timerTimeout = setTimeout(() => {
                    this.fechar(true);
                }, tempo);
            }
            
            // Configurar a posição do alerta
            configurarPosicao(posicao) {
                // Remover todas as classes de posição existentes
                this.overlay.className = 'custom-alert-overlay';
                
                // Adicionar a classe correspondente à posição
                if (posicao) {
                    this.overlay.classList.add(`position-${posicao}`);
                } else {
                    this.overlay.classList.add('position-center');
                }
            }
            
            // Método para mostrar o alerta com configurações flexíveis
            mostrar(config) {
                // Configurar ícone
                this.configurarIcone(config.icon || 'info');
                
                // Configurar posição
                this.configurarPosicao(config.position || 'center');
                
                // Configurar título e mensagem
                this.title.textContent = config.title || '';
                this.message.textContent = config.text || '';
                
                // Configurar footer
                if (config.footer) {
                    this.footerContainer.textContent = config.footer;
                    this.footerContainer.style.display = 'block';
                } else {
                    this.footerContainer.style.display = 'none';
                }
                
                // Configurar campo de input se necessário
                if (config.showInput) {
                    this.inputContainer.style.display = 'block';
                    this.inputField.value = config.inputValue || '';
                    this.inputField.placeholder = config.inputPlaceholder || 'Digite aqui...';
                    setTimeout(() => this.inputField.focus(), 300);
                } else {
                    this.inputContainer.style.display = 'none';
                }
                
                // Configurar botões
                this.limparBotoes();
                
                const showConfirmButton = config.showConfirmButton !== undefined ? config.showConfirmButton : true;
                
                // Botão de confirmação se necessário
                if (showConfirmButton) {
                    const confirmarBtn = document.createElement('button');
                    confirmarBtn.textContent = config.confirmButtonText || 'OK';
                    confirmarBtn.className = 'custom-alert-button';
                    confirmarBtn.style.backgroundColor = config.confirmButtonColor || '#3085d6';
                    confirmarBtn.style.color = 'white';
                    confirmarBtn.addEventListener('click', this.confirmar);
                    this.buttonsContainer.appendChild(confirmarBtn);
                }
                
                // Botão de cancelamento se necessário
                if (config.showCancelButton) {
                    const cancelarBtn = document.createElement('button');
                    cancelarBtn.textContent = config.cancelButtonText || 'Cancelar';
                    cancelarBtn.className = 'custom-alert-button';
                    cancelarBtn.style.backgroundColor = config.cancelButtonColor || '#d33';
                    cancelarBtn.style.color = 'white';
                    cancelarBtn.addEventListener('click', this.cancelar);
                    this.buttonsContainer.appendChild(cancelarBtn);
                }
                
                // Armazenar callback
                this.callback = config.callback;
                this.showInput = config.showInput;
                
                // Mostrar o overlay
                this.overlay.classList.add('show');
                
                // Configurar timer se necessário
                if (config.timer) {
                    this.configurarTimer(config.timer);
                }
                
                // Adicionar evento de fechar com ESC
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') this.fechar(false);
                }, {once: true});
            }
            
            // Configurar o ícone baseado no tipo
            configurarIcone(tipo) {
                this.icon.className = 'custom-alert-icon';
                
                switch(tipo) {
                    case 'success':
                        this.icon.classList.add('success');
                        this.iconContent.textContent = '✓';
                        break;
                    case 'error':
                        this.icon.classList.add('error');
                        this.iconContent.textContent = '✕';
                        break;
                    case 'info':
                        this.icon.classList.add('info');
                        this.iconContent.textContent = 'i';
                        break;
                    case 'warning':
                        this.icon.classList.add('warning');
                        this.iconContent.textContent = '!';
                        break;
                    case 'question':
                        this.icon.classList.add('question');
                        this.iconContent.textContent = '?';
                        break;
                    default:
                        this.icon.classList.add('info');
                        this.iconContent.textContent = 'i';
                }
            }
            
            // Limpar botões existentes
            limparBotoes() {
                this.buttonsContainer.innerHTML = '';
            }
            
            // Método para fechar o alerta
            fechar(resultado, dados = null) {
                this.overlay.classList.remove('show');
                
                // Limpar qualquer timer existente
                this.limparTimer();
                
                // Executar callback se existir
                if (this.callback) {
                    if (this.showInput && resultado) {
                        this.callback({
                            resultado: resultado,
                            valor: this.inputField.value
                        });
                    } else {
                        this.callback({
                            resultado: resultado,
                            ...dados
                        });
                    }
                }
            }
            
            // Método para confirmar
            confirmar() {
                this.fechar(true);
            }
            
            // Método para cancelar
            cancelar() {
                this.fechar(false);
            }
            
            // Métodos para interagir diretamente com a classe
            sucesso(config) {
                this.mostrar({
                    icon: 'success',
                    ...config
                });
            }
            
            erro(config) {
                this.mostrar({
                    icon: 'error',
                    ...config
                });
            }
            
            aviso(config) {
                this.mostrar({
                    icon: 'warning',
                    ...config
                });
            }
            pergunta(config) {
                this.mostrar({
                    icon: 'question',
                    ...config
                });
            }
            
            input(config) {
                this.mostrar({
                    icon: 'info',
                    showInput: true,
                    ...config
                });
            }
        }

        // Criar instância do MeuAlert
        //const meuAlert = new MeuAlert();
        // Criar instância do MeuAlert e torná-la global
        window.meuAlert = new MeuAlert();

        // Função para simular eventos PHP (Livewire)
        function dispatchPhpEvent(eventName, detail) {
            const event = new CustomEvent(eventName, {
                detail: detail
            });
            
            console.log(`[PHP Simulado] Disparando evento: ${eventName}`, detail);
            window.dispatchEvent(event);
        }

        // Função para gerar exemplo de PHP
        function gerarCodigoPhp(eventName, params) {
            let paramsStr = Object.entries(params)
                .map(([key, value]) => `${key}: '${value}'`)
                .join(', ');
                
            return `public function showAlert()
{
    $this->dispatch('${eventName}', ${paramsStr});
}`;
        }
         })
    </script>
