import './bootstrap';
import './cart';
import './order';

document.addEventListener('livewire:navigated', () => { 
    initFlowbite();
    initTema();
})

document.addEventListener('livewire:navigating', () => {
    initFlowbite();

    initTema();
})


 function initTema() {

    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }

var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

var themeToggleDarkIcon2 = document.getElementById('theme-toggle-dark-icon2');
var themeToggleLightIcon2 = document.getElementById('theme-toggle-light-icon2');

//TEXTO
var themeToggleDarkText = document.getElementById('theme-toggle-dark-text');
var themeToggleLightText = document.getElementById('theme-toggle-light-text');

//TEXTO DO MENU SIDEBAR
var themeToggleDarkText2 = document.getElementById('theme-toggle-dark-text2');
var themeToggleLightText2 = document.getElementById('theme-toggle-light-text2');


// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden'); 
    themeToggleLightIcon2.classList.remove('hidden');
    themeToggleLightText.classList.remove('hidden');

    themeToggleLightText2.classList.remove('hidden'); //TEXTO DO MENU SIDEBAR
} else {
    themeToggleDarkIcon.classList.remove('hidden'); 
    themeToggleDarkIcon2.classList.remove('hidden');
    themeToggleDarkText.classList.remove('hidden');

    themeToggleDarkText2.classList.remove('hidden'); //TEXTO DO MENU SIDEBAR
}

var themeToggleBtn = document.getElementById('theme-toggle');
var themeToggleBtn2 = document.getElementById('theme-toggle2');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    themeToggleDarkText.classList.toggle('hidden');
    themeToggleLightText.classList.toggle('hidden');



    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

        // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    
    });


//PERTENCE AO MENU SIDEBAR
themeToggleBtn2.addEventListener('click', function() {


themeToggleDarkIcon2.classList.toggle('hidden');
themeToggleLightIcon2.classList.toggle('hidden');



    //TEXTO DO MENU SIDEBAR
    themeToggleDarkText2.classList.toggle('hidden');
    themeToggleLightText2.classList.toggle('hidden');

// if set via local storage previously
if (localStorage.getItem('color-theme')) {
    if (localStorage.getItem('color-theme') === 'light') {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    }

// if NOT set via local storage previously
} else {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    }
}

});

}


//NOTIFICACAO SWEET ALERT
window.addEventListener('showConfirmPedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Confirmar pedido?',
        text: data.title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, confirmar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('confirmPedido');
        }
    });
});


/*

// CONFIRMAR PEDIDO
window.addEventListener('showConfirmPedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Pedido',
        text: data.title,
        footer: 'Ao confirmar, o pedido será enviado para nossa fila de produção!',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sim, confirmar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#0c55db',
        customClass: {
            popup: 'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-200', // Classes TailwindCSS
            title: 'font-bold text-lg text-gray-600 dark:text-gray-200',
            icon: 'text-white'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para confirmar o pedido
            Livewire.dispatch('confirmPedido');
        }
    });
});



*/




// Exibe uma mensagem de sucesso
window.addEventListener('success', event => {
    let data = event.detail;

    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: data.title,
        showConfirmButton: false,
        timer: 1500
        })
});


//DELETE PEDIDO
window.addEventListener('showDeletePedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Deletar pedido?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('deletePedido');
        }
    });
});

//DELETE ITEM PEDIDO
window.addEventListener('showDeleteItem', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Deletar item?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar item!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('deleteItem');
        }
    });
});

//ADD IMAGEM UPLOAD AO CART
window.addEventListener('showAddImgcart', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Adicionar?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, adicionar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('addImgCart');
        }
    });
});


//ADD IMAGEM UPLOAD AO CART
window.addEventListener('showDeleteAllCart', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Deletar?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('deleteAllCart');
        }
    });
});


//Confirmacao entregar pedido
window.addEventListener('showEntregarPedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Entregar pedido?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, entregar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('confirmEntregarPedido');
        }
    });
});

//Confirmacao entregar pedido parcialmente
window.addEventListener('showEntregaParcialmentePedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Entregar parcialmente?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, entregar parcialmente!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#6c9923',
        
    })
    .then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('confirmEntregaParcialmente');
        }
    })
});

//CONFIRM DELETE USER
window.addEventListener('showDeleteUser', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Deletar?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('deleteUser');
        }
    });
});


// Exibe uma mensagem de error
window.addEventListener('error', event => {
    let data = event.detail;

    Swal.fire({
        position: 'center',
        icon: 'error',
        title: data.title,
        text: data.description,
        showConfirmButton: false,
        timer: 3000
        })
});

//CONFIRM ALTERAR CLIENTE DO PEDIDO
/*
window.addEventListener('showUpdateClientePedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Atenção!',
        text: data.title,
         footer: 'Esta ação não poderá ser desfeita!', 
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, alterar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('confirmUpdateClientePedido');
        }
    });
});
*/


//CONFIRM DELETAR TERMOPATCH
window.addEventListener('showDeleteTermopatch', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Deletar?',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para excluir o item
            Livewire.dispatch('deleteTermopatch');
        }
    });
});


//CONFIRM ENTREGAR O PEDIDO
window.addEventListener('showEntregarPedido', event => {
    let data = event.detail;

    Swal.fire({
        title: 'Atenção!',
        text: data.title,
        /* footer: 'Esta ação não poderá ser desfeita!', */
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, entregar!',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#FE2E2E',
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, chama o método para entregar o pedido
            Livewire.dispatch('confirmEntregarPedido');
        }
    });
});

document.addEventListener('livewire:initialized', () => {

    Livewire.on('openReportTab', ({ url }) => {
        window.open(url, '_blank');
    });
});

