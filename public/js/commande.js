function openTab(tabName) {
    const tabContents = document.getElementsByClassName('tab-content');
    const tabButtons = document.getElementsByClassName('tab-button');

    // Animation de sortie
    for (let content of tabContents) {
        if (content.classList.contains('active')) {
            content.style.opacity = '0';
            content.style.transform = 'translateY(20px)';
        }
    }

    setTimeout(() => {
        // Cache tous les contenus des onglets
        for (let content of tabContents) {
            content.classList.remove('active');
        }

        // Désactive tous les boutons
        for (let button of tabButtons) {
            button.classList.remove('active');
        }

        // Affiche le contenu de l'onglet sélectionné
        const selectedTab = document.getElementById(tabName);
        selectedTab.classList.add('active');
        
        // Animation d'entrée
        setTimeout(() => {
            selectedTab.style.opacity = '1';
            selectedTab.style.transform = 'translateY(0)';
        }, 50);

        // Active le bouton correspondant
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(button => {
            if (button.textContent.includes(tabName === 'current' ? 'En cours' : 
                                          tabName === 'delivered' ? 'Livrées' : 'Annulées')) {
                button.classList.add('active');
            }
        });
    }, 300);
}

function cancelOrder(orderId) {
    if (confirm(`Êtes-vous sûr de vouloir annuler la commande #${orderId} ?`)) {
        const orderCard = document.getElementById(`order-${orderId}`);
        const cancelledTab = document.getElementById('cancelled');
        
        // Créer une copie modifiée de la commande pour l'onglet "Annulées"
        const cancelledOrder = orderCard.cloneNode(true);
        
        // Modifier le statut et la date
        const statusElement = cancelledOrder.querySelector('.status');
        statusElement.className = 'status status-cancelled';
        statusElement.innerHTML = '<i class="fas fa-times"></i> Annulé';
        
        const dateElement = cancelledOrder.querySelector('p');
        const today = new Date();
        const formattedDate = today.toLocaleDateString('fr-FR');
        dateElement.innerHTML = `<i class="fas fa-ban"></i> Annulé le: ${formattedDate}`;
        
        // Supprimer le bouton d'annulation
        const cancelButton = cancelledOrder.querySelector('.cancel-button');
        cancelButton.remove();
        
        // Ajouter la raison d'annulation
        const cancelReason = document.createElement('div');
        cancelReason.className = 'cancel-reason';
        cancelReason.innerHTML = '<i class="fas fa-info-circle"></i> Raison: Annulation à la demande du client';
        cancelledOrder.appendChild(cancelReason);
        
        // Ajouter la commande annulée à l'onglet "Annulées"
        cancelledTab.insertBefore(cancelledOrder, cancelledTab.firstChild);
        
        // Supprimer la commande de l'onglet "En cours"
        orderCard.remove();
        
        // Passer à l'onglet "Annulées"
        openTab('cancelled');
    }
}

