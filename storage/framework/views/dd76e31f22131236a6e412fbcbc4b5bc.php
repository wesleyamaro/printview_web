<div>
    
    <div name="headers" class="mb-2 bg-gray-200 dark:bg-gray-800 shadow">
        <div class="md:w-10/12 mx-auto py-2 px-2 sm:px-6 lg:px-2">
            <h2 class="flex gap-x-2 font-semibold text-xl text-orange-600 dark:text-orange-500 leading-tight">
                <svg class="w-5 h-5 text-orange-600 dark:text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" clip-rule="evenodd"/>
                </svg>
                <?php echo e(__('Últimas Novidades')); ?>

            </h2>
        </div>
    </div>
    

    <!-- Conteúdo Principal -->
    <div class="container mx-auto mt-2 md:mt-5  p-2 md:p-3">


        <!-- Lista de Novidades -->
        <div class="max-h-80v overflow-x-hidden overflow-y-auto soft-scrollbar">
            
            
            <!-- Noticias -->
            
            
            
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
                
                
                <div class="flex justify-center mb-10">
                   
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
            

            <!-- Notícia 3 -->
            
        </div>
    </div>


</div>
<?php /**PATH /home/u637911780/domains/printview.shop/resources/views/livewire/novidades.blade.php ENDPATH**/ ?>