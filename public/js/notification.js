// Initialize envelope icons on page load
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.notification-card').forEach(card => {
        const icon = card.querySelector('.read-toggle i');
        if (card.classList.contains('unread')) {
            icon.classList.remove('fa-envelope-open');
            icon.classList.add('fa-envelope');
        } else {
            icon.classList.remove('fa-envelope');
            icon.classList.add('fa-envelope-open');
        }
    });
});

function toggleRead(button) {
    const card = button.closest('.notification-card');
    card.classList.toggle('unread');
    const icon = button.querySelector('i');
    if (card.classList.contains('unread')) {
        icon.classList.remove('fa-envelope-open');
        icon.classList.add('fa-envelope');
    } else {
        icon.classList.remove('fa-envelope');
        icon.classList.add('fa-envelope-open');
    }
    // Reapply current filter after toggling read status
    const activeFilter = document.querySelector('.filter-btn.active').textContent.toLowerCase();
    filterNotifications(activeFilter === 'toutes' ? 'all' : activeFilter === 'non lues' ? 'unread' : 'read');
}

function deleteNotification(button) {
    const card = button.closest('.notification-card');
    card.classList.add('removing');
    setTimeout(() => {
        card.remove();
        if (document.querySelectorAll('.notification-card').length === 0) {
            document.getElementById('notifications').innerHTML = 
                '<div style="text-align: center; color: #7f8c8d; padding: 20px;">Aucune notification</div>';
        }
    }, 300);
}

function markAllRead() {
    document.querySelectorAll('.notification-card').forEach(card => {
        card.classList.remove('unread');
        const icon = card.querySelector('.read-toggle i');
        icon.classList.remove('fa-envelope');
        icon.classList.add('fa-envelope-open');
    });
}

function filterNotifications(filter) {
    // Update active button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    event.target.classList.add('active');

    // Filter notifications
    const notifications = document.querySelectorAll('.notification-card');
    notifications.forEach(notification => {
        switch(filter) {
            case 'all':
                notification.classList.remove('hidden');
                break;
            case 'unread':
                if (notification.classList.contains('unread')) {
                    notification.classList.remove('hidden');
                } else {
                    notification.classList.add('hidden');
                }
                break;
            case 'read':
                if (!notification.classList.contains('unread')) {
                    notification.classList.remove('hidden');
                } else {
                    notification.classList.add('hidden');
                }
                break;
        }
    });

    // Show message if no notifications in current filter
    const visibleNotifications = document.querySelectorAll('.notification-card:not(.hidden)').length;
    if (visibleNotifications === 0) {
        const message = filter === 'unread' ? 'Aucune notification non lue' : 
                      filter === 'read' ? 'Aucune notification lue' : 
                      'Aucune notification';
                      
        const existingMessage = document.querySelector('.no-notifications-message');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        const noNotificationsMessage = document.createElement('div');
        noNotificationsMessage.className = 'no-notifications-message';
        noNotificationsMessage.style.textAlign = 'center';
        noNotificationsMessage.style.color = '#7f8c8d';
        noNotificationsMessage.style.padding = '20px';
        noNotificationsMessage.textContent = message;
        
        document.getElementById('notifications').appendChild(noNotificationsMessage);
    } else {
        const existingMessage = document.querySelector('.no-notifications-message');
        if (existingMessage) {
            existingMessage.remove();
        }
    }
}

// Format date function
function formatDate(date) {
    return new Intl.DateTimeFormat('fr-FR', {
        day: 'numeric',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    }).format(date);
}
