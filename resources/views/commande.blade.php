
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Commandes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/commande.css') }}">
    <script src="{{ asset('js/commande.js') }}"></script>

</head>
<body>
    <div class="container">
        <h1>Mes Commandes</h1>

        <div class="tabs">
            <button class="tab-button active" onclick="openTab('current')">
                <i class="fas fa-clock"></i> En cours
            </button>
            <button class="tab-button" onclick="openTab('delivered')">
                <i class="fas fa-check-circle"></i> Livrées
            </button>
            <button class="tab-button" onclick="openTab('cancelled')">
                <i class="fas fa-times-circle"></i> Annulées
            </button>
        </div>

        <div id="current" class="tab-content active">
            <div class="order-card" id="order-12345">
                <div class="order-header">
                    <div>
                        <h3><i class="fas fa-shopping-cart"></i> Commande #12345</h3>
                        <p><i class="far fa-calendar-alt"></i> Date: 15/03/2024</p>
                    </div>
                    <span class="status status-pending">
                        <i class="fas fa-spinner fa-spin"></i> En préparation
                    </span>
                </div>
                <div class="order-items">
                    <div class="order-item">
                        <span><i class="fas fa-mobile-alt"></i> iPhone 15 Pro - 256GB</span>
                        <span>1 299,00 €</span>
                    </div>
                    <div class="order-item">
                        <span><i class="fas fa-shield-alt"></i> Coque de protection</span>
                        <span>29,99 €</span>
                    </div>
                </div>
                <div class="total">Total: 1 328,99 €</div>
                <button class="cancel-button" onclick="cancelOrder('12345')">
                    <i class="fas fa-times"></i> Annuler la commande
                </button>
            </div>
        </div>

        <div id="delivered" class="tab-content">
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <h3><i class="fas fa-shopping-cart"></i> Commande #12340</h3>
                        <p><i class="fas fa-truck"></i> Livré le: 10/03/2024</p>
                    </div>
                    <span class="status status-delivered">
                        <i class="fas fa-check"></i> Livré
                    </span>
                </div>
                <div class="order-items">
                    <div class="order-item">
                        <span><i class="fas fa-laptop"></i> MacBook Air M2</span>
                        <span>1 499,00 €</span>
                    </div>
                </div>
                <div class="total">Total: 1 499,00 €</div>
            </div>
        </div>

        <div id="cancelled" class="tab-content">
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <h3><i class="fas fa-shopping-cart"></i> Commande #12338</h3>
                        <p><i class="fas fa-ban"></i> Annulé le: 05/03/2024</p>
                    </div>
                    <span class="status status-cancelled">
                        <i class="fas fa-times"></i> Annulé
                    </span>
                </div>
                <div class="order-items">
                    <div class="order-item">
                        <span><i class="fas fa-headphones"></i> AirPods Pro 2</span>
                        <span>279,00 €</span>
                    </div>
                </div>
                <div class="total">Total: 279,00 €</div>
                <div class="cancel-reason">
                    <i class="fas fa-info-circle"></i> Raison: Annulation à la demande du client
                </div>
            </div>
        </div>
    </div>

</body>
</html>