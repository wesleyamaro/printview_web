<div>
    
    <div name="headers" class="mb-2 bg-gray-200 dark:bg-gray-800 shadow">
        <div class="md:w-10/12 mx-auto py-2 px-2 sm:px-6 lg:px-2">
            <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" clip-rule="evenodd"/>
                </svg>
                {{ __('Últimas Novidades') }}
            </h2>
        </div>
    </div>
    

    <!-- Conteúdo Principal -->
    <div class="container mx-auto mt-2 md:mt-5  p-2 md:p-3">


        <!-- Lista de Novidades -->
        <div class="{{-- grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-8 --}}max-h-80v overflow-x-hidden overflow-y-auto soft-scrollbar">
            
            
            <!-- Noticias -->
            {{-- <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md">
                <!-- <div class="bg-white dark:bg-slate-800 p-10  text-center transition-opacity">
                    <h1 class="text-3xl mb-4 text-red-500">Manutenção do Sistema</h1>
                    <p class="mb-4 text-gray-400">Nosso sistema passará por uma manutenção no dia <strong>16/03.</strong> Este processo pode durar até <strong>24 horas</strong> para ser concluído.</p>
                    <p class="text-gray-400">Agradecemos a sua paciência e compreensão.</p>
                </div> -->
            
                
                <div role="status" class="max-w-sm p-4 border border-gray-200 rounded shadow animate-pulse md:p-6 dark:border-gray-700">
                    <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded dark:bg-gray-700">
                        <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                        </svg>
                    </div>
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>                  
                    <span class="sr-only">Loading...</span>
                </div>

            
            </div> --}}
            
            
            <!-- Download App -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md flex flex-col gap-y-3">
                <!-- Mensagem informando que temos aplicativos nas lojas -->
                <span class="text-green-600 dark:text-green-400 leading-relaxed text-center">
                    📲 Baixe o aplicativo PrintView! <br/>
                    Agora ficou ainda mais fácil fazer seus pedidos e acompanhar tudo direto do seu celular ou computador.
                    <br/>
                    Disponível para Android, iOS, MacOs e Windows. <br/><br/> Escolha sua plataforma e faça o download agora!
                </span>
                <!-- Android -->
                <div class="flex justify-center w-full">
                    <a href="https://testflight.apple.com/join/FkGTY16g">
                    <img src="/img/btn_download_ios.png" class="w-40" />
                    </a>
                </div>
                <!-- IOS -->
                <div class="flex justify-center w-full">
                    <a href="https://printview.shop/aplicativos/android/printview-app-release.apk">
                    <img src="/img/btn_download_android.svg" class="w-40" />
                    </a>
                </div>

                <div class="flex justify-center w-full mt">
                    <a href="https://printview.shop/aplicativos/windows/printview_app.zip">
                    <img src="/img/btn_download_windows.png" class="w-40" />
                    </a>
                </div>
            </div>
            
            <!-- Notícia 1 -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md">
                {{-- <h3 class="md:text-xl font-semibold mb-4 text-orange-400">Novo produto lançado.</h3>
                <p class="text-sm dark:text-gray-400">Personalize seus produtos com nossa nova linha de termopatchs. Eles se adaptam a quase todos os materiais.</p>
                <a href="#" class="text-blue-500 mt-4 inline-block">Saiba mais</a> --}}
                
                <div class="flex justify-center mb-10">
                   {{-- <iframe class="rounded-lg shadow-lg" width="560" height="315" src="https://youtu.be/MbzDyGI6OGc" title="Apresentação PrintView" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                    <div class=" m-auto">
                        <h1 class="font-bold text-md text-blue-600 dark:text-white  mb-2">Tutorial de como usar</h1>
                        <video class="min-h-60 md:max-h-50v"  controls>
                        <source src="storage/videos/printview_apresentacao.mp4" type="video/mp4">
                        Seu navegador não suporta esse vídeo.
                        </video>
                    </div>
                </div>

            </div>

            <!-- Notícia 2 -->
            {{--<div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md">
                <h3 class="md:text-xl font-semibold mb-4 text-orange-400">Sorteio de brinde(s).</h3>
                <p class="text-sm dark:text-gray-400">
                    Ainda dá tempo de participar do nosso sorteio! Se você ficar entre os 20 melhores clientes de 2024, 
                    você vai concorrer a um iphone do ano! 📱
                    Não perca essa oportunidade! Faça suas compras até o dia 30 de dezembro de 2024 e torça para ser um dos sortudos! 🍀
                </p>
                <a href="#" class="text-blue-500 mt-4 inline-block">Saiba mais</a>
            </div> --}}

            <!-- Notícia 3 -->
            {{-- <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-md">
                <h3 class="md:text-xl font-semibold mb-4 text-orange-400">Novos produtos adicionados a loja.</h3>
                <p class="text-sm dark:text-gray-400">Venha conferir as novidades que acabaram de chegar na nossa loja. Temos termopatchs de vários modelos, cores e estampas para você personalizar seus produtos. Aproveite!</p>
                <a href="{{ route('mais_vendido') }}"  wire:navigate class="text-blue-500 mt-4 inline-block">Saiba mais</a>
            </div> --}}
        </div>
    </div>


</div>
