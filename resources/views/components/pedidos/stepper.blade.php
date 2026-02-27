 <!-- Stepper -->
 <ul class="relative flex flex-row gap-x-2">
    <!-- Item -->
    <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
    <div class="min-w-[28px] min-h-[28px] flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:inline-flex justify-center items-center text-xs align-middle">
        <span class="w-5 h-5 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
            <svg class="w-2.5 h-2.5 text-gray-600 lg:w-4 lg:h-4 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
            </svg>
        </span>
        <span class="ms-2 block text-sm font-medium text-gray-800 dark:text-gray-300">
        Aprovado
        </span>
    </div>
    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
    </li>
    <!-- End Item -->

    
    <!-- Item -->
    @if($status == 'Produção')
    <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
    <div class="min-w-[28px] min-h-[28px] flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:inline-flex justify-center items-center text-xs align-middle">
        <span class="w-5 h-5 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
            <svg class="w-2.5 h-2.5  lg:w-4 lg:h-4 text-blue-500 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 9.376v.786l8 3.925 8-3.925v-.786M1.994 14.191v.786l8 3.925 8-3.925v-.786M10 1.422 2 5.347l8 3.925 8-3.925-8-3.925Z"/>
            </svg>
        </span>
        <span class="ms-2 block text-sm font-medium text-blue-800 dark:text-blue-300">
        Produção
        </span>
    </div>
    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
    </li>
    @endif
    <!-- End Item -->
    

    <!-- Item -->
    @if($status == 'Concluido')

    <!-- Item Producao-->         
    <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
    <div class="min-w-[28px] min-h-[28px] flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:inline-flex justify-center items-center text-xs align-middle">
        <span class="w-5 h-5 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
            <svg class="w-2.5 h-2.5  lg:w-4 lg:h-4 text-blue-500 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 9.376v.786l8 3.925 8-3.925v-.786M1.994 14.191v.786l8 3.925 8-3.925v-.786M10 1.422 2 5.347l8 3.925 8-3.925-8-3.925Z"/>
            </svg>
        </span>
        <span class="ms-2 block text-sm font-medium text-blue-800 dark:text-blue-300">
        Produção
        </span>
    </div>
    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
    </li>                
    <!-- End Item Producao-->

    <!-- Item Concluido-->
    <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group">
    <div class="min-w-[28px] min-h-[28px] flex flex-col gap-y-2 md:gap-y-0 md:flex-row md:inline-flex justify-center items-center text-xs align-middle">
        <span class="w-5 h-5 flex justify-center items-center flex-shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full dark:bg-gray-700 dark:text-white">
            <svg class="w-2.5 h-2.5  lg:w-4 lg:h-4 text-green-600 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.5 10.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm0 0a2.225 2.225 0 0 0-1.666.75H12m3.5-.75a2.225 2.225 0 0 1 1.666.75H19V7m-7 4V3h5l2 4m-7 4H6.166a2.225 2.225 0 0 0-1.666-.75M12 11V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v9h1.834a2.225 2.225 0 0 1 1.666-.75M19 7h-6m-8.5 3.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z"/>
            </svg>
        </span>
        <span class="ms-2 block text-sm font-medium text-green-600 dark:text-green-400">
        Concluído
        </span>
    </div>
    <div class="w-full h-px flex-1 bg-gray-200 group-last:hidden dark:bg-gray-700"></div>
    </li>
    @endif
    <!-- End Item -->
</ul>
<!-- End Stepper -->