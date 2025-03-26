
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
    <script src="{{ asset('js/notification.js') }}"></script>

</head>
<body>
    <div class="container">
        <header>
            <h1>Notifications</h1>
            <button class="action-btn" onclick="markAllRead()">
                <i class="fas fa-check-double"></i> Tout marquer comme lu
            </button>
        </header>

        <div class="filter-buttons">
            <button class="filter-btn active" onclick="filterNotifications('all')">Toutes</button>
            <button class="filter-btn" onclick="filterNotifications('unread')">Non lues</button>
            <button class="filter-btn" onclick="filterNotifications('read')">Lues</button>
        </div>

        <div id="notifications">
            <div class="notification-card unread" id="notif-1">
                <div class="notification-header">
                    <span class="sender">Service Client</span>
                    <span class="date">27 Jan 2024 - 14:30</span>
                </div>
                <div class="subject">Confirmation de votre commande #12345</div>
                <div class="message">
                    Votre commande a été confirmée et est en cours de préparation. Nous vous tiendrons informé de son expédition.
                </div>
                <div class="notification-actions">
                    <button class="action-btn read-toggle" onclick="toggleRead(this)" title="Marquer comme lu/non lu">
                        <i class="fas fa-envelope"></i>
                    </button>
                    <button class="action-btn delete" onclick="deleteNotification(this)" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>

            <div class="notification-card" id="notif-2">
                <div class="notification-header">
                    <span class="sender">Service Expédition</span>
                    <span class="date">26 Jan 2024 - 09:15</span>
                </div>
                <div class="subject">Expédition de votre colis</div>
                <div class="message">
                    Votre colis a été expédié ! Vous pouvez suivre sa progression avec le numéro de suivi : TR123456789FR
                </div>
                <div class="notification-actions">
                    <button class="action-btn read-toggle" onclick="toggleRead(this)" title="Marquer comme lu/non lu">
                        <i class="fas fa-envelope-open"></i>
                    </button>
                    <button class="action-btn delete" onclick="deleteNotification(this)" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>