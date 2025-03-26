// État global de l'application
const STATE = {
    cart: [],
    currentCategory: 'all',
    sliderInterval: null,
    sliderActiveIndex: 0,
    wishlist: []
};

// Initialisation générale
document.addEventListener('DOMContentLoaded', () => {
    initLoader();
    initSlider();
    initMobileMenu();
    initProductFilters();
    initCart();
    initNewsletter();
    observeSections();
    loadCategoryImages();
    initStickyHeader();
    initWishlist();
    initQuickView();
});

// 1. Gestion du loader
function initLoader() {
    const loader = document.querySelector('.loader-container');
    
    window.addEventListener('load', () => {
        setTimeout(() => {
            loader.classList.add('hide-loader');
            
            // Supprimer complètement après l'animation
            setTimeout(() => {
                loader.style.display = 'none';
            }, 300); // Correspond à la durée de transition CSS
        }, 2000);
    });
}

// 2. Slider hero
function initSlider() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev-slide');
    const nextBtn = document.querySelector('.next-slide');
    const sliderContainer = document.querySelector('.hero-slider');

    function updateSlider(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        STATE.sliderActiveIndex = index;
    }

    function nextSlide() {
        let newIndex = STATE.sliderActiveIndex + 1;
        if(newIndex >= slides.length) newIndex = 0;
        updateSlider(newIndex);
    }

    function startAutoSlide() {
        clearInterval(STATE.sliderInterval);
        STATE.sliderInterval = setInterval(nextSlide, 5000);
    }

    // Initialiser le premier slide et démarrer le défilement auto
    if (slides.length > 0) {
        updateSlider(0);
        startAutoSlide();
        
        // Arrêter le défilement auto quand l'utilisateur survole le slider
        sliderContainer?.addEventListener('mouseenter', () => clearInterval(STATE.sliderInterval));
        sliderContainer?.addEventListener('mouseleave', startAutoSlide);
    }

    // Contrôles manuels
    prevBtn?.addEventListener('click', () => {
        clearInterval(STATE.sliderInterval);
        let newIndex = STATE.sliderActiveIndex - 1;
        if(newIndex < 0) newIndex = slides.length - 1;
        updateSlider(newIndex);
        startAutoSlide();
    });

    nextBtn?.addEventListener('click', () => {
        clearInterval(STATE.sliderInterval);
        nextSlide();
        startAutoSlide();
    });

    // Points de navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            clearInterval(STATE.sliderInterval);
            updateSlider(index);
            startAutoSlide();
        });
    });
}

// 3. Menu mobile
function initMobileMenu() {
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.category-list');
    const header = document.querySelector('header');

    menuBtn?.addEventListener('click', () => {
        menuBtn.classList.toggle('active');
        navLinks?.classList.toggle('active');
    });
    
    // Fermer le menu en cliquant à l'extérieur
    document.addEventListener('click', (e) => {
        if (header && !header.contains(e.target) && navLinks?.classList.contains('active')) {
            navLinks.classList.remove('active');
            menuBtn?.classList.remove('active');
        }
    });
    
    // Gestion des sous-menus (si présents)
    const categoryItems = document.querySelectorAll('.category-item.has-submenu');
    categoryItems.forEach(item => {
        const submenuToggle = item.querySelector('.submenu-toggle') || item;
        const submenu = item.querySelector('.submenu');
        
        if (submenuToggle && submenu) {
            submenuToggle.addEventListener('click', function(e) {
                // Sur mobile uniquement
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    submenu.classList.toggle('active');
                    submenuToggle.classList.toggle('expanded');
                }
            });
        }
    });
}

// 4. Filtrage des produits
function initProductFilters() {
    const filterButtons = document.querySelectorAll('.tab-btn');
    const products = document.querySelectorAll('.product-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Mise à jour des boutons actifs
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            
            // Filtrage des produits
            const category = button.dataset.category;
            STATE.currentCategory = category;
            
            products.forEach(product => {
                const match = category === 'all' || 
                             product.dataset.category === category;
                
                if (match) {
                    product.style.display = 'block';
                    setTimeout(() => {
                        product.classList.add('fade-in');
                    }, 10);
                } else {
                    product.style.display = 'none';
                    product.classList.remove('fade-in');
                }
            });
        });
    });
}

// 5. Gestion du panier
function initCart() {
    const cartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartCount = document.querySelector('.cart-count');
    const cartIcon = document.querySelector('.cart-icon');
    const cartDropdown = document.querySelector('.cart-dropdown');
    const cartItems = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');
    const clearCartBtn = document.querySelector('.clear-cart');

    function updateCart() {
        // Mettre à jour le compteur
        if (cartCount) {
            cartCount.textContent = STATE.cart.length;
        }
        
        // Mettre à jour le total
        if (cartTotal) {
            const total = STATE.cart.reduce((sum, item) => sum + parseFloat(item.price.replace('€', '')), 0);
            cartTotal.textContent = `${total.toFixed(2)} €`;
        }
        
        // Mettre à jour les articles dans le dropdown
        if (cartItems) {
            cartItems.innerHTML = '';
            
            if (STATE.cart.length === 0) {
                cartItems.innerHTML = '<p class="empty-cart">Votre panier est vide</p>';
            } else {
                STATE.cart.forEach((item, index) => {
                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item');
                    cartItem.innerHTML = `
                        <img src="${item.image}" alt="${item.title}">
                        <div class="cart-item-details">
                            <h4>${item.title}</h4>
                            <p>${item.price}</p>
                        </div>
                        <button class="remove-item" data-index="${index}">&times;</button>
                    `;
                    cartItems.appendChild(cartItem);
                });
                
                // Event listeners pour les boutons de suppression
                document.querySelectorAll('.remove-item').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const index = parseInt(e.target.getAttribute('data-index'));
                        STATE.cart.splice(index, 1);
                        localStorage.setItem('cart', JSON.stringify(STATE.cart));
                        updateCart();
                    });
                });
            }
        }
        
        // Sauvegarder dans localStorage
        localStorage.setItem('cart', JSON.stringify(STATE.cart));
    }

    // Récupération du panier existant
    const savedCart = localStorage.getItem('cart');
    if(savedCart) STATE.cart = JSON.parse(savedCart);
    updateCart();

    // Ajout au panier
    cartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const productCard = e.target.closest('.product-card');
            const product = {
                id: productCard?.dataset.id || Date.now().toString(),
                title: productCard?.querySelector('.product-title')?.textContent || 
                       productCard?.querySelector('.product-name')?.textContent || 
                       'Produit sans nom',
                price: productCard?.querySelector('.current-price')?.textContent || 
                       productCard?.querySelector('.product-price')?.textContent || 
                       '0 €',
                image: productCard?.querySelector('img')?.src || '/images/placeholder.jpg'
            };

            STATE.cart.push(product);
            updateCart();
            showNotification(`${product.title} ajouté au panier`);
        });
    });
    
    // Toggle panier dropdown
    if (cartIcon && cartDropdown) {
        cartIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            cartDropdown.classList.toggle('active');
        });
        
        document.addEventListener('click', (e) => {
            if (!cartDropdown.contains(e.target) && !cartIcon.contains(e.target)) {
                cartDropdown.classList.remove('active');
            }
        });
    }
    
    // Vider le panier
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', () => {
            STATE.cart = [];
            updateCart();
            showNotification('Panier vidé');
        });
    }
}

// 6. Newsletter
function initNewsletter() {
    const form = document.querySelector('.newsletter-form');
    
    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        const emailInput = form.querySelector('input[type="email"]');
        const consentCheckbox = form.querySelector('input[type="checkbox"]');

        if(consentCheckbox && !consentCheckbox.checked) {
            showNotification('Veuillez accepter les conditions', 'error');
            return;
        }

        if(validateEmail(emailInput.value)) {
            // Simuler une soumission de formulaire
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            submitBtn.disabled = true;
            submitBtn.textContent = 'Envoi en cours...';
            
            // Simuler une requête AJAX
            setTimeout(() => {
                emailInput.value = '';
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                
                showNotification('Merci pour votre inscription!');
                
                // Sauvegarder dans localStorage (pour démo)
                const subscribers = JSON.parse(localStorage.getItem('luxeMarketSubscribers')) || [];
                subscribers.push({
                    email: emailInput.value,
                    date: new Date().toISOString()
                });
                localStorage.setItem('luxeMarketSubscribers', JSON.stringify(subscribers));
                
                form.reset();
            }, 1500);
        } else {
            showNotification('Email invalide', 'error');
        }
    });
}

// 7. Observer les sections pour les animations
function observeSections() {
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        document.querySelectorAll('.popular-categories, .trending-products, .special-offers, .services, .newsletter')
               .forEach(section => observer.observe(section));
    } else {
        // Fallback pour les navigateurs qui ne supportent pas IntersectionObserver
        document.querySelectorAll('.popular-categories, .trending-products, .special-offers, .services, .newsletter')
               .forEach(section => section.classList.add('fade-in'));
    }
}

// 8. Chargement des images de catégories
function loadCategoryImages() {
    const categories = document.querySelectorAll('.category-card');
    
    categories.forEach(card => {
        const categoryName = card.querySelector('h3')?.textContent.toLowerCase();
        if(categoryName) {
            const img = card.querySelector('img');
            if(img && !img.src) {
                img.src = `https://source.unsplash.com/random/800x600/?${categoryName}`;
                img.alt = `Image de ${categoryName}`;
                
                // Ajouter un loader et transition
                img.style.opacity = '0';
                img.onload = function() {
                    img.style.opacity = '1';
                };
            }
        }
    });
}

// 9. Header sticky
function initStickyHeader() {
    const header = document.querySelector('header');
    const headerHeight = header ? header.offsetHeight : 0;
    let lastScroll = 0;
    
    if (header) {
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            // Ajouter classe sticky quand scroll > hauteur du header
            if (currentScroll > headerHeight) {
                header.classList.add('sticky');
                
                // Hide on scroll down, show on scroll up
                if (currentScroll > lastScroll && currentScroll > headerHeight * 2) {
                    header.classList.add('hide');
                } else {
                    header.classList.remove('hide');
                }
            } else {
                header.classList.remove('sticky');
            }
            
            lastScroll = currentScroll;
        });
    }
}

// 10. Wishlist / Favoris
function initWishlist() {
    const wishlistBtns = document.querySelectorAll('.add-to-wishlist');
    const wishlistCount = document.querySelector('.wishlist-count');
    
    // Récupérer favoris depuis localStorage
    const savedWishlist = localStorage.getItem('wishlist');
    if(savedWishlist) STATE.wishlist = JSON.parse(savedWishlist);
    
    // Mettre à jour le compteur de favoris
    function updateWishlist() {
        if (wishlistCount) {
            wishlistCount.textContent = STATE.wishlist.length;
        }
        
        // Mettre à jour l'état des boutons
        wishlistBtns.forEach(btn => {
            const productId = btn.closest('.product-card')?.dataset.id;
            if (STATE.wishlist.includes(productId)) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
        
        // Sauvegarder dans localStorage
        localStorage.setItem('wishlist', JSON.stringify(STATE.wishlist));
    }
    
    // Event listener pour les boutons de favoris
    wishlistBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            const productCard = btn.closest('.product-card');
            const productId = productCard?.dataset.id;
            
            if (!productId) return;
            
            // Toggle favoris
            const index = STATE.wishlist.indexOf(productId);
            if (index === -1) {
                STATE.wishlist.push(productId);
                showNotification('Produit ajouté aux favoris');
            } else {
                STATE.wishlist.splice(index, 1);
                showNotification('Produit retiré des favoris');
            }
            
            updateWishlist();
            
            // Animation de confirmation
            const heart = btn.querySelector('i') || btn;
            heart.classList.add('pulse');
            setTimeout(() => {
                heart.classList.remove('pulse');
            }, 500);
        });
    });
    
    // Initialiser l'affichage des favoris
    updateWishlist();
}

// 11. Quick View pour les produits
function initQuickView() {
    const quickViewBtns = document.querySelectorAll('.quick-view-btn');
    const quickViewModal = document.querySelector('.quick-view-modal');
    const closeModalBtn = quickViewModal ? quickViewModal.querySelector('.close-modal') : null;
    
    if (quickViewBtns.length && quickViewModal) {
        // Ouvrir la modal
        quickViewBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const productCard = btn.closest('.product-card');
                const productId = productCard?.dataset.id || '';
                const productName = productCard?.querySelector('.product-title')?.textContent || 
                                   productCard?.querySelector('.product-name')?.textContent || 
                                   'Produit sans nom';
                const productPrice = productCard?.querySelector('.current-price')?.textContent || 
                                    productCard?.querySelector('.product-price')?.textContent || 
                                    '0 €';
                const productImage = productCard?.querySelector('img')?.src || '/images/placeholder.jpg';
                const productDesc = productCard?.dataset.description || 'Description non disponible';
                
                // Remplir la modal avec les détails du produit
                quickViewModal.querySelector('.modal-product-name').textContent = productName;
                quickViewModal.querySelector('.modal-product-price').textContent = productPrice;
                quickViewModal.querySelector('.modal-product-image').setAttribute('src', productImage);
                quickViewModal.querySelector('.modal-product-description').textContent = productDesc;
                
                // Mettre à jour le bouton d'ajout au panier
                const addToCartBtn = quickViewModal.querySelector('.modal-add-to-cart');
                if (addToCartBtn) {
                    addToCartBtn.setAttribute('data-id', productId);
                    
                    // Nettoyer les anciens event listeners
                    const newAddToCartBtn = addToCartBtn.cloneNode(true);
                    addToCartBtn.parentNode.replaceChild(newAddToCartBtn, addToCartBtn);
                    
                    // Ajouter le nouveau event listener
                    newAddToCartBtn.addEventListener('click', () => {
                        const product = {
                            id: productId,
                            title: productName,
                            price: productPrice,
                            image: productImage
                        };
                        
                        STATE.cart.push(product);
                        updateCart();
                        showNotification(`${productName} ajouté au panier`);
                    });
                }
                
                // Afficher la modal
                quickViewModal.classList.add('active');
                document.body.classList.add('modal-open');
            });
        });
        
        // Fermer la modal
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                quickViewModal.classList.remove('active');
                document.body.classList.remove('modal-open');
            });
            
            // Fermer en cliquant à l'extérieur
            quickViewModal.addEventListener('click', (e) => {
                if (e.target === quickViewModal) {
                    quickViewModal.classList.remove('active');
                    document.body.classList.remove('modal-open');
                }
            });
            
            // Fermer avec Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && quickViewModal.classList.contains('active')) {
                    quickViewModal.classList.remove('active');
                    document.body.classList.remove('modal-open');
                }
            });
        }
    }
}

// Fonction pour mettre à jour le panier (utilisée par plusieurs fonctions)
function updateCart() {
    const cartCount = document.querySelector('.cart-count');
    const cartItems = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');
    
    // Mettre à jour le compteur
    if (cartCount) {
        cartCount.textContent = STATE.cart.length;
    }
    
    // Mettre à jour le total
    if (cartTotal) {
        const total = STATE.cart.reduce((sum, item) => {
            const price = typeof item.price === 'string' 
                ? parseFloat(item.price.replace('€', '').replace(',', '.').trim()) 
                : item.price;
            return sum + (isNaN(price) ? 0 : price);
        }, 0);
        cartTotal.textContent = `${total.toFixed(2)} €`;
    }
    
    // Mettre à jour les articles dans le dropdown
    if (cartItems) {
        cartItems.innerHTML = '';
        
        if (STATE.cart.length === 0) {
            cartItems.innerHTML = '<p class="empty-cart">Votre panier est vide</p>';
        } else {
            STATE.cart.forEach((item, index) => {
                const cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <img src="${item.image}" alt="${item.title}">
                    <div class="cart-item-details">
                        <h4>${item.title}</h4>
                        <p>${item.price}</p>
                    </div>
                    <button class="remove-item" data-index="${index}">&times;</button>
                `;
                cartItems.appendChild(cartItem);
            });
            
            // Event listeners pour les boutons de suppression
            document.querySelectorAll('.remove-item').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const index = parseInt(e.target.getAttribute('data-index'));
                    STATE.cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(STATE.cart));
                    updateCart();
                });
            });
        }
    }
    
    // Sauvegarder dans localStorage
    localStorage.setItem('cart', JSON.stringify(STATE.cart));
}

// Fonctions utilitaires
function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animation d'entrée
    setTimeout(() => {
        notification.classList.add('show');
        
        // Animation de sortie après 3 secondes
        setTimeout(() => {
            notification.classList.remove('show');
            
            // Supprimer l'élément après l'animation
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }, 10);
}