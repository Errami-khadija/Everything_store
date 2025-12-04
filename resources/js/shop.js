    const defaultConfig = {
      background_color: "#f8fafc",
      surface_color: "#ffffff",
      text_color: "#1e293b",
      primary_action_color: "#3b82f6",
      secondary_action_color: "#64748b",
      font_family: "Inter",
      font_size: 16,
      store_name: "Everything Store",
      store_tagline: "Your one-stop shop for everything",
      hero_title: "Welcome to Everything Store",
      hero_subtitle: "Discover amazing products at unbeatable prices",
      hero_button_text: "Shop Now",
      categories_title: "Shop by Category",
      new_products_title: "New Arrivals",
      featured_title: "Featured Products",
      checkout_title: "Complete Your Order",
      delivery_notice: "💵 Cash on Delivery Available",
      footer_about: "Your trusted online marketplace for quality products. We offer cash on delivery for your convenience.",
      copyright_text: "© 2024 Everything Store. All rights reserved."
    };

    let config = { ...defaultConfig };

    async function onConfigChange(newConfig) {
      const customFont = newConfig.font_family || defaultConfig.font_family;
      const baseFontStack = '-apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';
      const fontFamily = `${customFont}, ${baseFontStack}`;
      const baseSize = newConfig.font_size || defaultConfig.font_size;
      
      document.body.style.background = newConfig.background_color || defaultConfig.background_color;
      document.body.style.fontFamily = fontFamily;
      document.body.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const header = document.getElementById('header');
      header.style.background = newConfig.surface_color || defaultConfig.surface_color;
      header.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const navBar = document.getElementById('nav-bar');
      navBar.style.borderColor = newConfig.background_color || defaultConfig.background_color;
      navBar.style.background = newConfig.surface_color || defaultConfig.surface_color;
      
      const navLinks = document.querySelectorAll('.nav-link');
      navLinks.forEach(link => {
        link.style.color = newConfig.text_color || defaultConfig.text_color;
        link.style.fontSize = `${baseSize}px`;
      });
      
      const storeName = document.getElementById('store-name');
      storeName.textContent = newConfig.store_name || defaultConfig.store_name;
      storeName.style.fontFamily = fontFamily;
      storeName.style.fontSize = `${baseSize * 1.875}px`;
      storeName.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const storeTagline = document.getElementById('store-tagline');
      storeTagline.textContent = newConfig.store_tagline || defaultConfig.store_tagline;
      storeTagline.style.fontSize = `${baseSize * 0.875}px`;
      storeTagline.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const heroSection = document.getElementById('hero');
      heroSection.style.background = newConfig.background_color || defaultConfig.background_color;
      
      const heroTitle = document.getElementById('hero-title');
      heroTitle.textContent = newConfig.hero_title || defaultConfig.hero_title;
      heroTitle.style.fontFamily = fontFamily;
      heroTitle.style.fontSize = `${baseSize * 3}px`;
      heroTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const heroSubtitle = document.getElementById('hero-subtitle');
      heroSubtitle.textContent = newConfig.hero_subtitle || defaultConfig.hero_subtitle;
      heroSubtitle.style.fontSize = `${baseSize * 1.25}px`;
      heroSubtitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const heroButton = document.getElementById('hero-button');
      heroButton.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      heroButton.style.color = 'white';
      
      const heroButtonText = document.getElementById('hero-button-text');
      heroButtonText.textContent = newConfig.hero_button_text || defaultConfig.hero_button_text;
      heroButtonText.style.fontSize = `${baseSize * 1.125}px`;
      
      const categoriesTitle = document.getElementById('categories-title');
      categoriesTitle.textContent = newConfig.categories_title || defaultConfig.categories_title;
      categoriesTitle.style.fontFamily = fontFamily;
      categoriesTitle.style.fontSize = `${baseSize * 1.875}px`;
      categoriesTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const newProductsTitle = document.getElementById('new-products-title');
      newProductsTitle.textContent = newConfig.new_products_title || defaultConfig.new_products_title;
      newProductsTitle.style.fontFamily = fontFamily;
      newProductsTitle.style.fontSize = `${baseSize * 1.875}px`;
      newProductsTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const featuredTitle = document.getElementById('featured-title');
      featuredTitle.textContent = newConfig.featured_title || defaultConfig.featured_title;
      featuredTitle.style.fontFamily = fontFamily;
      featuredTitle.style.fontSize = `${baseSize * 1.875}px`;
      featuredTitle.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const cartBtn = document.getElementById('cart-btn');
      cartBtn.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      cartBtn.style.color = 'white';
      
      const cartCount = document.getElementById('cart-count');
      cartCount.style.background = newConfig.secondary_action_color || defaultConfig.secondary_action_color;
      cartCount.style.color = 'white';
      
      const searchInput = document.getElementById('search-input');
      searchInput.style.borderColor = newConfig.secondary_action_color || defaultConfig.secondary_action_color;
      searchInput.style.color = newConfig.text_color || defaultConfig.text_color;
      searchInput.style.fontSize = `${baseSize}px`;
      
      const footer = document.getElementById('footer');
      footer.style.background = newConfig.surface_color || defaultConfig.surface_color;
      footer.style.color = newConfig.text_color || defaultConfig.text_color;
      footer.style.borderColor = newConfig.background_color || defaultConfig.background_color;
      
      const footerStoreName = document.getElementById('footer-store-name');
      footerStoreName.textContent = newConfig.store_name || defaultConfig.store_name;
      footerStoreName.style.fontFamily = fontFamily;
      footerStoreName.style.fontSize = `${baseSize * 1.5}px`;
      footerStoreName.style.color = newConfig.text_color || defaultConfig.text_color;
      
      const footerAbout = document.getElementById('footer-about');
      footerAbout.textContent = newConfig.footer_about || defaultConfig.footer_about;
      footerAbout.style.fontSize = `${baseSize}px`;
      
      const copyrightText = document.getElementById('copyright-text');
      copyrightText.textContent = newConfig.copyright_text || defaultConfig.copyright_text;
      copyrightText.style.fontSize = `${baseSize * 0.875}px`;
      
      // Style all product cards
      const productCards = document.querySelectorAll('.product-card');
      productCards.forEach(card => {
        card.style.background = newConfig.surface_color || defaultConfig.surface_color;
        card.style.color = newConfig.text_color || defaultConfig.text_color;
        
        const cardBg = card.querySelector('div:first-child');
        if (cardBg) {
          cardBg.style.background = newConfig.background_color || defaultConfig.background_color;
        }
      });
      
      // Style all category cards
      const categoryCards = document.querySelectorAll('.category-card');
      categoryCards.forEach(card => {
        card.style.background = newConfig.surface_color || defaultConfig.surface_color;
        card.style.color = newConfig.text_color || defaultConfig.text_color;
      });
      
      // Style featured badges
      const featuredBadges = document.querySelectorAll('#featured .text-xs.font-bold');
      featuredBadges.forEach(badge => {
        badge.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
      });
      
      // Style add to cart buttons
      const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
      addToCartBtns.forEach(btn => {
        btn.style.background = newConfig.primary_action_color || defaultConfig.primary_action_color;
        btn.style.color = 'white';
        btn.style.fontSize = `${baseSize * 0.875}px`;
      });
      
      // Style show more links
      const showMoreLinks = document.querySelectorAll('.show-more-link');
      showMoreLinks.forEach(link => {
        link.style.background = newConfig.secondary_action_color || defaultConfig.secondary_action_color;
        link.style.color = 'white';
        link.style.fontSize = `${baseSize}px`;
      });
    }

    const element = {
      defaultConfig,
      onConfigChange,
      mapToCapabilities: (config) => ({
        recolorables: [
          {
            get: () => config.background_color || defaultConfig.background_color,
            set: (value) => {
              config.background_color = value;
              window.elementSdk.setConfig({ background_color: value });
            }
          },
          {
            get: () => config.surface_color || defaultConfig.surface_color,
            set: (value) => {
              config.surface_color = value;
              window.elementSdk.setConfig({ surface_color: value });
            }
          },
          {
            get: () => config.text_color || defaultConfig.text_color,
            set: (value) => {
              config.text_color = value;
              window.elementSdk.setConfig({ text_color: value });
            }
          },
          {
            get: () => config.primary_action_color || defaultConfig.primary_action_color,
            set: (value) => {
              config.primary_action_color = value;
              window.elementSdk.setConfig({ primary_action_color: value });
            }
          },
          {
            get: () => config.secondary_action_color || defaultConfig.secondary_action_color,
            set: (value) => {
              config.secondary_action_color = value;
              window.elementSdk.setConfig({ secondary_action_color: value });
            }
          }
        ],
        borderables: [],
        fontEditable: {
          get: () => config.font_family || defaultConfig.font_family,
          set: (value) => {
            config.font_family = value;
            window.elementSdk.setConfig({ font_family: value });
          }
        },
        fontSizeable: {
          get: () => config.font_size || defaultConfig.font_size,
          set: (value) => {
            config.font_size = value;
            window.elementSdk.setConfig({ font_size: value });
          }
        }
      }),
      mapToEditPanelValues: (config) => new Map([
        ["store_name", config.store_name || defaultConfig.store_name],
        ["store_tagline", config.store_tagline || defaultConfig.store_tagline],
        ["hero_title", config.hero_title || defaultConfig.hero_title],
        ["hero_subtitle", config.hero_subtitle || defaultConfig.hero_subtitle],
        ["hero_button_text", config.hero_button_text || defaultConfig.hero_button_text],
        ["categories_title", config.categories_title || defaultConfig.categories_title],
        ["new_products_title", config.new_products_title || defaultConfig.new_products_title],
        ["featured_title", config.featured_title || defaultConfig.featured_title],
        ["checkout_title", config.checkout_title || defaultConfig.checkout_title],
        ["delivery_notice", config.delivery_notice || defaultConfig.delivery_notice],
        ["footer_about", config.footer_about || defaultConfig.footer_about],
        ["copyright_text", config.copyright_text || defaultConfig.copyright_text]
      ])
    };

    if (window.elementSdk) {
      window.elementSdk.init(element);
      config = window.elementSdk.config;
    }

    onConfigChange(config);
    
    // Simple hero button functionality
    document.getElementById('hero-button').addEventListener('click', () => {
      document.getElementById('products').scrollIntoView({ behavior: 'smooth' });
    });
(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9a8d155e0041c8e8',t:'MTc2NDg2OTk2OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();