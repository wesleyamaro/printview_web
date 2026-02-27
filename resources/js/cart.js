window.addEventListener('showConfirmPedido', (event) => {
    let data = event.detail;

    window.meuAlert.aviso({
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
                Livewire.dispatch('confirmPedido');
            }
        })
    });
});

window.addEventListener('showConfirmAddImgCart', (event) => {
    let data = event.detail;

    window.meuAlert.aviso({
        icon: 'question',
        title: data.title || 'Aviso',
        text: data.text || '',
        footer: data.footer || 'Suas imagens serão adicionadas ao carrinho!',
        position: data.position || 'center',
        timer: data.timer || null,
        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
        showCancelButton: data.showCancelButton || true,
        confirmButtonText: data.confirmButtonText || 'Sim, adicionar!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#007cf8',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('confirmAddImgCart');
            }
        })
    });
});


//Deletar item do carrinho
window.addEventListener('showDeleteItemCart', (event) => {
    let data = event.detail;

    window.meuAlert.aviso({
        icon: 'question',
        title: data.title || 'Aviso',
        text: data.text || '',
        footer: data.footer || 'Esta ação não poderá ser desfeita!',
        position: data.position || 'center',
        timer: data.timer || null,
        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
        showCancelButton: data.showCancelButton || true,
        confirmButtonText: data.confirmButtonText || 'Sim, remover!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#f00738',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('deleteItemCart');
            }
        })
    });
});

//Deletar item do carrinho
window.addEventListener('showDeleteAllCart', (event) => {
    let data = event.detail;

    window.meuAlert.aviso({
        icon: 'question',
        title: data.title || 'Aviso',
        text: data.text || '',
        footer: data.footer || 'Esta ação não poderá ser desfeita!',
        position: data.position || 'center',
        timer: data.timer || null,
        showConfirmButton: data.showConfirmButton !== undefined ? data.showConfirmButton : true,
        showCancelButton: data.showCancelButton || true,
        confirmButtonText: data.confirmButtonText || 'Sim, remover!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#f00738',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('deleteAllCart');
            }
        })
    });
});