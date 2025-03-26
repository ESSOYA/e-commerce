
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Livreur - Commandes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/livreur.css') }}">

</head>
<body>
    <div class="header">
        <h1>Tableau de bord Livreur</h1>
    </div>

    <div class="container">
        <div class="status-tabs">
            <div class="status-tab pending active" data-status="pending">
                <i class="fas fa-clock"></i> En attente
            </div>
            <div class="status-tab in-progress" data-status="in-progress">
                <i class="fas fa-truck"></i> En cours
            </div>
            <div class="status-tab delivered" data-status="delivered">
                <i class="fas fa-check-circle"></i> Livrées
            </div>
        </div>

        <!-- Section En attente -->
        <div class="orders-section active" id="pending-orders">
            <div class="orders">
                <div class="order-card">
                    <div class="order-header">
                        <span class="order-number"><i class="fas fa-shopping-bag"></i> Commande #12345</span>
                        <span class="status status-pending">En attente</span>
                    </div>
                    <div class="order-details">
                        <p><i class="fas fa-user"></i> <strong>Client:</strong> Jean Dupont</p>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Adresse:</strong> 123 Rue de Paris, 75001 Paris</p>
                        <p><i class="fas fa-phone"></i> <strong>Téléphone:</strong> 06 12 34 56 78</p>
                        <p><i class="fas fa-box"></i> <strong>Articles:</strong> 3 items</p>
                        <p><i class="fas fa-clock"></i> <strong>Heure de livraison souhaitée:</strong> 14:00 - 15:00</p>
                    </div>
                    <div class="map-view">
                        <i class="fas fa-map fa-2x"></i> Carte de livraison
                    </div>
                    <div class="action-buttons">
                        <button class="accept-btn"><i class="fas fa-check"></i> Accepter la commande</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section En cours -->
        <div class="orders-section" id="in-progress-orders">
            <div class="orders">
                <div class="order-card">
                    <div class="order-header">
                        <span class="order-number"><i class="fas fa-shopping-bag"></i> Commande #12346</span>
                        <span class="status status-in-progress">En cours</span>
                    </div>
                    <div class="order-details">
                        <p><i class="fas fa-user"></i> <strong>Client:</strong> Marie Martin</p>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Adresse:</strong> 456 Avenue des Champs-Élysées, 75008 Paris</p>
                        <p><i class="fas fa-phone"></i> <strong>Téléphone:</strong> 06 98 76 54 32</p>
                        <p><i class="fas fa-box"></i> <strong>Articles:</strong> 2 items</p>
                        <p><i class="fas fa-clock"></i> <strong>Heure de livraison souhaitée:</strong> 15:00 - 16:00</p>
                    </div>
                    <div class="map-view">
                        <i class="fas fa-map fa-2x"></i> Carte de livraison
                    </div>
                    <div class="action-buttons">
                        <button class="complete-btn"><i class="fas fa-check-circle"></i> Marquer comme livré</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Livrées -->
        <div class="orders-section" id="delivered-orders">
            <div class="orders">
                <div class="order-card">
                    <div class="order-header">
                        <span class="order-number"><i class="fas fa-shopping-bag"></i> Commande #12347</span>
                        <span class="status status-delivered">Livré</span>
                    </div>
                    <div class="order-details">
                        <p><i class="fas fa-user"></i> <strong>Client:</strong> Pierre Durand</p>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Adresse:</strong> 789 Boulevard Saint-Germain, 75007 Paris</p>
                        <p><i class="fas fa-phone"></i> <strong>Téléphone:</strong> 06 11 22 33 44</p>
                        <p><i class="fas fa-box"></i> <strong>Articles:</strong> 1 item</p>
                        <p><i class="fas fa-clock"></i> <strong>Heure de livraison:</strong> Livré à 13:45</p>
                    </div>
                    <div class="map-view">
                        <i class="fas fa-map fa-2x"></i> Carte de livraison
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/livreur.js') }}"></script>
</body>
</html>