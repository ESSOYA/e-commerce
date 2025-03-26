<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VendaVon - Votre destination shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    
</head>
<body>
    <!-- Écran de chargement -->
    <div class="loader-container">
        <div class="loader">
            <svg class="loader-logo" width="100" height="100" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" stroke="#ff6b6b" stroke-width="8" fill="none" />
                <path class="loader-path" d="M50,10 A40,40 0 0,1 90,50" stroke="#4ecdc4" stroke-width="8" fill="none" />
            </svg>
            <p>Chargement...</p>
        </div>
    </div>

    <!-- En-tête -->
    <header>
        <nav class="main-nav">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="#" class="logo">VendaVon</a>
                    
                    <div class="search-bar">
                        <input type="text" placeholder="Rechercher des produits...">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    
                    <div class="nav-icons">
                        <a href="#" class="nav-icon"><i class="fas fa-user"></i><span class="icon-text">Compte</span></a>
                        <a href="#" class="nav-icon"><i class="fas fa-heart"></i><span class="icon-text">Favoris</span></a>
                        <a href="#" class="nav-icon cart-icon"><i class="fas fa-shopping-cart"></i><span class="icon-text">Panier</span>
                            <span class="cart-count">0</span>
                        </a>
                    </div>
                    
                    <button class="mobile-menu-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </nav>
        
        <nav class="category-nav">
            <div class="container">
                <ul class="category-list">
                    <li><a href="#" class="category-item">Électronique</a></li>
                    <li><a href="#" class="category-item">Vêtements</a></li>
                    <li><a href="#" class="category-item">Électroménager</a></li>
                    <li><a href="#" class="category-item">Maison & Déco</a></li>
                    <li><a href="#" class="category-item">Sport</a></li>
                    <li><a href="#" class="category-item">Beauté</a></li>
                    <li><a href="#" class="category-item">Jouets</a></li>
                    <li><a href="#" class="more-categories">Plus <i class="fas fa-chevron-down"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section avec Slider -->
        <section class="hero-slider">
            <div class="slider-container">
                <div class="slide active" style="--slide-bg: #f8e9e2;">
                    <div class="container">
                        <div class="slide-content">
                            <h1 class="slide-title">Découvrez notre nouvelle collection</h1>
                            <p class="slide-description">Des styles uniques qui vous représentent</p>
                            <a href="#" class="btn btn-primary">Découvrir</a>
                        </div>
                        <div class="slide-image">
                            <img src="/api/placeholder/600/400" alt="Nouvelle collection">
                        </div>
                    </div>
                </div>
                <div class="slide" style="--slide-bg: #e2f0f9;">
                    <div class="container">
                        <div class="slide-content">
                            <h1 class="slide-title">Électronique dernier cri</h1>
                            <p class="slide-description">La technologie au service de votre quotidien</p>
                            <a href="#" class="btn btn-primary">Voir les offres</a>
                        </div>
                        <div class="slide-image">
                            <img src="/api/placeholder/600/400" alt="Électronique">
                        </div>
                    </div>
                </div>
                <div class="slide" style="--slide-bg: #e9f5e9;">
                    <div class="container">
                        <div class="slide-content">
                            <h1 class="slide-title">Électroménager innovant</h1>
                            <p class="slide-description">Simplifiez votre vie avec nos appareils</p>
                            <a href="#" class="btn btn-primary">Explorer</a>
                        </div>
                        <div class="slide-image">
                            <img src="/api/placeholder/600/400" alt="Électroménager">
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-controls">
                <button class="slider-btn prev-slide"><i class="fas fa-chevron-left"></i></button>
                <div class="slider-dots">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <button class="slider-btn next-slide"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

        <!-- Section Catégories Populaires -->
        <section class="popular-categories">
            <div class="container">
                <h2 class="section-title">Catégories Populaires</h2>
                <div class="categories-grid">
                    <a href="#" class="category-card">
                        <div class="category-icon"><i class="fas fa-mobile-alt"></i></div>
                        <h3>Smartphones</h3>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon"><i class="fas fa-tshirt"></i></div>
                        <h3>Mode</h3>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon"><i class="fas fa-tv"></i></div>
                        <h3>TV & Audio</h3>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon"><i class="fas fa-blender"></i></div>
                        <h3>Cuisine</h3>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon"><i class="fas fa-laptop"></i></div>
                        <h3>Ordinateurs</h3>
                    </a>
                    <a href="#" class="category-card">
                        <div class="category-icon"><i class="fas fa-couch"></i></div>
                        <h3>Meubles</h3>
                    </a>
                </div>
            </div>
        </section>

        <!-- Section Produits Tendance -->
        <section class="trending-products">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Produits Tendance</h2>
                    <div class="tab-buttons">
                        <button class="tab-btn active" data-category="all">Tous</button>
                        <button class="tab-btn" data-category="electronics">Électronique</button>
                        <button class="tab-btn" data-category="fashion">Mode</button>
                        <button class="tab-btn" data-category="home">Maison</button>
                    </div>
                </div>
                
                <div class="products-grid">
                    <!-- Produit 1 -->
                    <article class="product-card" data-category="electronics">
                        <div class="product-badge">Nouveau</div>
                        <div class="product-image">
                            <img src="/api/placeholder/300/300" alt="Smartphone dernière génération">
                            <div class="product-actions">
                                <button class="product-action-btn wishlist-btn"><i class="fas fa-heart"></i></button>
                                <button class="product-action-btn quickview-btn"><i class="fas fa-eye"></i></button>
                                <button class="product-action-btn add-to-cart-btn"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Smartphone Pro X</h3>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="rating-count">(42)</span>
                            </div>
                            <div class="product-price">
                                <span class="current-price">899 €</span>
                                <span class="old-price">999 €</span>
                            </div>
                        </div>
                    </article>

                    <!-- Produit 2 -->
                    <article class="product-card" data-category="fashion">
                        <div class="product-badge sale">-20%</div>
                        <div class="product-image">
                            <img src="/api/placeholder/300/300" alt="Veste élégante">
                            <div class="product-actions">
                                <button class="product-action-btn wishlist-btn"><i class="fas fa-heart"></i></button>
                                <button class="product-action-btn quickview-btn"><i class="fas fa-eye"></i></button>
                                <button class="product-action-btn add-to-cart-btn"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Veste Urban Style</h3>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="rating-count">(28)</span>
                            </div>
                            <div class="product-price">
                                <span class="current-price">79 €</span>
                                <span class="old-price">99 €</span>
                            </div>
                        </div>
                    </article>

                    <!-- Produit 3 -->
                    <article class="product-card" data-category="home">
                        <div class="product-image">
                            <img src="/api/placeholder/300/300" alt="Machine à café design">
                            <div class="product-actions">
                                <button class="product-action-btn wishlist-btn"><i class="fas fa-heart"></i></button>
                                <button class="product-action-btn quickview-btn"><i class="fas fa-eye"></i></button>
                                <button class="product-action-btn add-to-cart-btn"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Machine à Café Premium</h3>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="rating-count">(56)</span>
                            </div>
                            <div class="product-price">
                                <span class="current-price">249 €</span>
                            </div>
                        </div>
                    </article>

                    <!-- Produit 4 -->
                    <article class="product-card" data-category="electronics">
                        <div class="product-badge bestseller">Bestseller</div>
                        <div class="product-image">
                            <img src="/api/placeholder/300/300" alt="Écouteurs sans fil">
                            <div class="product-actions">
                                <button class="product-action-btn wishlist-btn"><i class="fas fa-heart"></i></button>
                                <button class="product-action-btn quickview-btn"><i class="fas fa-eye"></i></button>
                                <button class="product-action-btn add-to-cart-btn"><i class="fas fa-shopping-cart"></i></button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">Écouteurs SoundPro</h3>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="rating-count">(108)</span>
                            </div>
                            <div class="product-price">
                                <span class="current-price">129 €</span>
                                <span class="old-price">159 €</span>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="load-more">
                    <button class="btn btn-outline">Voir plus de produits</button>
                </div>
            </div>
        </section>

        <!-- Section Offres Spéciales -->
        <section class="special-offers">
            <div class="container">
                <div class="offers-grid">
                    <div class="offer-card large" style="--offer-bg: #f5e6ea;">
                        <div class="offer-content">
                            <h3>Collections d'été</h3>
                            <p>Jusqu'à 40% de réduction</p>
                            <a href="#" class="btn btn-secondary">Voir l'offre</a>
                        </div>
                        <div class="offer-image">
                            <img src="/api/placeholder/400/300" alt="Collections d'été">
                        </div>
                    </div>
                    <div class="offer-card" style="--offer-bg: #e6f0f5;">
                        <div class="offer-content">
                            <h3>Tech Deals</h3>
                            <p>À partir de 199€</p>
                            <a href="#" class="btn btn-secondary small">Shop Now</a>
                        </div>
                        <div class="offer-image small">
                            <img src="/api/placeholder/200/200" alt="Tech deals">
                        </div>
                    </div>
                    <div class="offer-card" style="--offer-bg: #e9f5e6;">
                        <div class="offer-content">
                            <h3>Home & Living</h3>
                            <p>Nouvelles arrivées</p>
                            <a href="#" class="btn btn-secondary small">Explorer</a>
                        </div>
                        <div class="offer-image small">
                            <img src="/api/placeholder/200/200" alt="Home & Living">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Services -->
        <section class="services">
            <div class="container">
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="service-content">
                            <h3>Livraison gratuite</h3>
                            <p>Pour toute commande de plus de 50€</p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-undo"></i>
                        </div>
                        <div class="service-content">
                            <h3>Retours faciles</h3>
                            <p>30 jours pour changer d'avis</p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="service-content">
                            <h3>Paiement sécurisé</h3>
                            <p>Transactions 100% sécurisées</p>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="service-content">
                            <h3>Support 24/7</h3>
                            <p>Une équipe à votre écoute</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="newsletter">
            <div class="container">
                <div class="newsletter-container">
                    <div class="newsletter-content">
                        <h2>Restez informé</h2>
                        <p>Inscrivez-vous à notre newsletter pour recevoir nos offres exclusives et nouveautés.</p>
                    </div>
                    <form class="newsletter-form">
                        <div class="form-group">
                            <input type="email" placeholder="Votre adresse email">
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="newsletter-consent">
                            <label for="newsletter-consent">J'accepte de recevoir des emails promotionnels de LuxeMarket.</label>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="footer-column">
                    <h3 class="footer-title">VendaVon</h3>
                    <p class="footer-description">Votre destination shopping pour trouver les meilleurs produits au meilleur prix.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Catégories</h3>
                    <ul class="footer-links">
                        <li><a href="#">Électronique</a></li>
                        <li><a href="#">Vêtements</a></li>
                        <li><a href="#">Électroménager</a></li>
                        <li><a href="#">Maison & Déco</a></li>
                        <li><a href="#">Sport & Loisirs</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Informations</h3>
                    <ul class="footer-links">
                        <li><a href="#">À propos de nous</a></li>
                        <li><a href="#">Conditions d'utilisation</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Nous contacter</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 class="footer-title">Mon Compte</h3>
                    <ul class="footer-links">
                        <li><a href="#">Mon profil</a></li>
                        <li><a href="#">Mes commandes</a></li>
                        <li><a href="#">Ma liste d'envies</a></li>
                        <li><a href="#">Suivi de commande</a></li>
                        <li><a href="#">Aide</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="copyright">© 2025 VendaVon. Tous droits réservés.</p>
                <div class="payment-methods">
                    <span>Modes de paiement acceptés:</span>
                    <div class="payment-icons">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-amex"></i>
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/accueil.js') }}"></script>
</body>
</html>