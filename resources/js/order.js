//Entregando o pedido
window.addEventListener('showEntregarPedido', (event) => {
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
        confirmButtonText: data.confirmButtonText || 'Sim, entregar!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#007cf8',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('confirmEntregarPedido');
            }
        })
    });
});

//Entregando o pedido parcialmente
window.addEventListener('showEntregaParcialmentePedido', (event) => {
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
        confirmButtonText: data.confirmButtonText || 'Sim, entregar!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#007cf8',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('confirmEntregaParcialmente');
            }
        })
    });
});

//Deletar item do pedido
window.addEventListener('showDeleteItem', (event) => {
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
        confirmButtonText: data.confirmButtonText || 'Sim, deletar!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#f00738',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('deleteItem');
            }
        })
    });
});

//Deletar pedido
window.addEventListener('showDeletePedido', (event) => {
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
        confirmButtonText: data.confirmButtonText || 'Sim, deletar!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#f00738',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('deletePedido');
            }
        })
    });
});

window.addEventListener('showUpdateClientePedido', (event) => {
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
        confirmButtonText: data.confirmButtonText || 'Sim, alterar!',
        cancelButtonText: data.cancelButtonText || 'Cancelar',
        confirmButtonColor: data.confirmButtonColor || '#007cf8',
        cancelButtonColor: data.cancelButtonColor || '#c6a385',
        callback: data.callback || ((resultado) => {
            if (resultado.resultado) {  // Use resultado.resultado em vez de resultado.isConfirmed
                // Se o usuário confirmar, chama o método para excluir o item
                Livewire.dispatch('confirmUpdateClientePedido');
            }
        })
    });
});
