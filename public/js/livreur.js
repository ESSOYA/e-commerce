document.querySelectorAll('.status-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        // Remove active class from all tabs
        document.querySelectorAll('.status-tab').forEach(t => t.classList.remove('active'));
        // Add active class to clicked tab
        this.classList.add('active');

        // Hide all sections
        document.querySelectorAll('.orders-section').forEach(section => {
            section.classList.remove('active');
        });

        // Show selected section
        const status = this.dataset.status;
        const targetSection = document.getElementById(status + '-orders');
        targetSection.classList.add('active');
    });
});

function moveOrderToSection(orderCard, targetSection) {
    const sourceSection = orderCard.parentElement;
    targetSection.querySelector('.orders').appendChild(orderCard);
    
    if (sourceSection.querySelector('.orders').children.length === 0) {
        const noOrdersMsg = document.createElement('div');
        noOrdersMsg.className = 'no-orders';
        noOrdersMsg.innerHTML = '<i class="fas fa-box-open fa-2x"></i><br>Aucune commande dans cette section';
        sourceSection.querySelector('.orders').appendChild(noOrdersMsg);
    }

    // Switch to the appropriate tab
    const targetStatus = targetSection.id.replace('-orders', '');
    document.querySelector(`.status-tab[data-status="${targetStatus}"]`).click();
}

document.querySelectorAll('.accept-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const card = this.closest('.order-card');
        const status = card.querySelector('.status');
        status.classList.remove('status-pending');
        status.classList.add('status-in-progress');
        status.textContent = 'En cours';
        this.innerHTML = '<i class=" fas fa-check-circle"></i> Marquer comme livré';
        this.classList.remove('accept-btn');
        this.classList.add('complete-btn');
        
        moveOrderToSection(card, document.getElementById('in-progress-orders'));
    });
});

document.querySelectorAll('.complete-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const card = this.closest('.order-card');
        const status = card.querySelector('.status');
        status.classList.remove('status-in-progress');
        status.classList.add('status-delivered');
        status.textContent = 'Livré';
        this.remove();
        
        moveOrderToSection(card, document.getElementById('delivered-orders'));
    });
});
