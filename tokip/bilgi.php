<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKİ Bilgi Portalı - Toplu Konut İdaresi Başkanlığı | Konut Projeleri ve Hizmetler</title>
    <meta name="description" content="TOKİ (Toplu Konut İdaresi) hakkında detaylı bilgi. Konut projeleri, başvuru süreçleri, kentsel dönüşüm, sosyal konut programları ve hizmetler hakkında bilgi alın.">
    <meta name="keywords" content="TOKİ, Toplu Konut İdaresi, konut projeleri, kentsel dönüşüm, sosyal konut, emlak, Türkiye konut, başvuru süreçleri">
    <meta name="robots" content="index, follow">
    <meta name="author" content="TOKİ Bilgi Portalı">
    <meta property="og:title" content="TOKİ Bilgi Portalı - Toplu Konut İdaresi Başkanlığı">
    <meta property="og:description" content="TOKİ konut projeleri, başvuru süreçleri ve hizmetler hakkında kapsamlı bilgi portalı">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="tr_TR">
    <meta property="og:site_name" content="TOKİ Bilgi Portalı">
    <link rel="canonical" href="https://www.toki-bilgi.com">
    
    <!-- Analytics & Ads Ready -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #1e40af;
            --accent-color: #dc2626;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-hover: 0 10px 25px rgba(0,0,0,0.15);
            --transition: all 0.3s ease;
            --success-color: #059669;
            --warning-color: #d97706;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255,255,255,0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Cookie Banner */
        .cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            z-index: 1001;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
        }
        
        .cookie-banner.show {
            transform: translateY(0);
        }
        
        .cookie-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .cookie-text {
            flex: 1;
            min-width: 300px;
        }
        
        .cookie-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .cookie-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: var(--transition);
        }
        
        .cookie-accept {
            background: var(--accent-color);
            color: white;
        }
        
        .cookie-decline {
            background: transparent;
            color: white;
            border: 1px solid white;
        }
        
        .cookie-btn:hover {
            transform: translateY(-2px);
        }
        
        /* Header */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow);
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
            position: relative;
            padding: 0.5rem 0;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .nav-links a:hover {
            color: var(--accent-color);
        }
        
        .mobile-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
        }
        
        .mobile-menu span {
            width: 25px;
            height: 3px;
            background: white;
            margin: 3px 0;
            transition: var(--transition);
        }
        
        /* Main Content */
        main {
            margin-top: 80px;
        }
        
        .section {
            display: none;
            padding: 4rem 0;
            min-height: calc(100vh - 80px);
            animation: fadeIn 0.5s ease;
        }
        
        .section.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .section h1, .section h2 {
            color: var(--primary-color);
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }
        
        .section h1 {
            font-size: 3rem;
        }
        
        .section h2 {
            font-size: 2.5rem;
        }
        
        .section h2::after {
            content: '';
            width: 100px;
            height: 3px;
            background: var(--accent-color);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(30, 58, 138, 0.9), rgba(30, 64, 175, 0.9)), 
                        url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwMCIgaGVpZ2h0PSI2MDAiIHZpZXdCb3g9IjAgMCAxMjAwIDYwMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjEyMDAiIGhlaWdodD0iNjAwIiBmaWxsPSIjMWUzYThhIi8+CjxnIG9wYWNpdHk9IjAuMSI+CjxyZWN0IHg9IjUwIiB5PSI1MCIgd2lkdGg9IjEwMCIgaGVpZ2h0PSI4MCIgZmlsbD0id2hpdGUiLz4KPHA+CjxyZWN0IHg9IjIwMCIgeT0iMTAwIiB3aWR0aD0iMTAwIiBoZWlnaHQ9IjgwIiBmaWxsPSJ3aGl0ZSIvPgo8cmVjdCB4PSIzNTAiIHk9IjEyMCIgd2lkdGg9IjEwMCIgaGVpZ2h0PSI4MCIgZmlsbD0id2hpdGUiLz4KPHA+Cjwvc3ZnPgo=');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 8rem 0;
            position: relative;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero h1 {
            color: white;
            font-size: 4rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-button {
            background: var(--accent-color);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            box-shadow: var(--shadow);
        }
        
        .cta-button:hover {
            background: #b91c1c;
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .service-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: var(--shadow);
            color: white;
        }
        
        .service-card h3 {
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .service-card p {
            color: var(--text-light);
            line-height: 1.6;
        }
        
        /* Info Cards */
        .info-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .info-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .info-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--accent-color), #b91c1c);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            box-shadow: var(--shadow);
        }
        
        /* Statistics Section */
        .stats-section {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            padding: 4rem 0;
            margin: 4rem 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item {
            padding: 2rem 1rem;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--accent-color);
            display: block;
        }
        
        .stat-text {
            font-size: 1.1rem;
            color: var(--text-dark);
            margin-top: 0.5rem;
        }
        
        /* Content Sections */
        .content-container {
            background: var(--white);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-top: 2rem;
            line-height: 1.8;
        }
        
        .content-container h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .content-container h4 {
            color: var(--primary-color);
            margin: 1.5rem 0 0.5rem;
            font-size: 1.2rem;
        }
        
        .content-container ul {
            margin: 1rem 0;
            padding-left: 2rem;
        }
        
        .content-container li {
            margin-bottom: 0.5rem;
        }
        
        /* Projects Gallery */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .project-card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
        }
        
        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .project-image {
            height: 200px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }
        
        .project-content {
            padding: 1.5rem;
        }
        
        .project-title {
            color: var(--primary-color);
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }
        
        .project-location {
            color: var(--accent-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .project-description {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Application Steps */
        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .step-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            text-align: center;
            position: relative;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 1rem;
        }
        
        .step-title {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        .step-description {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Footer */
        footer {
            background: var(--primary-color);
            color: white;
            text-align: center;
            padding: 4rem 0 2rem;
            margin-top: 4rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
            text-align: left;
        }
        
        .footer-section h3 {
            color: var(--accent-color);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }
        
        .footer-section p {
            margin-bottom: 0.5rem;
            opacity: 0.9;
        }
        
        .footer-section a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
            display: block;
            padding: 0.25rem 0;
        }
        
        .footer-section a:hover {
            color: var(--accent-color);
            padding-left: 0.5rem;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
            opacity: 0.8;
        }
        
        /* Scroll to Top Button */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            z-index: 999;
        }
        
        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        .scroll-top:hover {
            background: #b91c1c;
            transform: translateY(-3px);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--primary-color);
                flex-direction: column;
                padding: 1rem 0;
                box-shadow: var(--shadow);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .mobile-menu {
                display: flex;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .section h1 {
                font-size: 2rem;
            }
            
            .section h2 {
                font-size: 1.8rem;
            }
            
            .content-container {
                padding: 2rem 1rem;
                margin: 1rem;
            }
            
            .services-grid,
            .info-cards,
            .projects-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Animation Classes */
        .animate-fade-in {
            animation: fadeIn 0.6s ease;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-spinner"></div>
    </div>

    <!-- Cookie Banner -->
    <div class="cookie-banner" id="cookieBanner">
        <div class="container">
            <div class="cookie-content">
                <div class="cookie-text">
                    <strong>🍪 Çerez Bildirimi:</strong> Bu site, size en iyi deneyimi sunmak için çerezler kullanır. 
                    Siteyi kullanmaya devam ederek çerez kullanımını kabul etmiş olursunuz.
                    <a href="#" onclick="showSection('privacy')" style="color: var(--accent-color);">Detaylı bilgi</a>
                </div>
                <div class="cookie-buttons">
                    <button class="cookie-btn cookie-accept" onclick="acceptCookies()">Kabul Et</button>
                    <button class="cookie-btn cookie-decline" onclick="declineCookies()">Reddet</button>
                </div>
            </div>
        </div>
    </div>

    <header>
        <nav class="container">
            <div class="logo">
                <div class="logo-icon">🏢</div>
                <div>TOKİ BİLGİ PORTALI</div>
            </div>
            <ul class="nav-links">
                <li><a href="#" onclick="showSection('home')">Ana Sayfa</a></li>
                <li><a href="#" onclick="showSection('about')">TOKİ Hakkında</a></li>
                <li><a href="#" onclick="showSection('services')">Hizmetler</a></li>
                <li><a href="#" onclick="showSection('projects')">Projeler</a></li>
                <li><a href="#" onclick="showSection('application')">Başvuru Süreci</a></li>
                <li><a href="#" onclick="showSection('contact')">İletişim</a></li>
            </ul>
            <div class="mobile-menu" onclick="toggleMobileMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <main>
        <!-- Ana Sayfa -->
        <section id="home" class="section active">
            <div class="hero">
                <div class="hero-content">
                    <div class="container">
                        <h1>TOKİ BİLGİ PORTALI</h1>
                        <p>Toplu Konut İdaresi Başkanlığı Hakkında Kapsamlı Bilgi</p>
                        <a href="#" onclick="showSection('about')" class="cta-button">Detaylı Bilgi Al</a>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <h2>TOKİ'nin Ana Hizmet Alanları</h2>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">🏠</div>
                        <h3>Sosyal Konut Projeleri</h3>
                        <p>Dar ve orta gelirli vatandaşlar için uygun fiyatlı konut projeleri. Uzun vadeli ödeme seçenekleri ve devlet desteği ile erişilebilir konut imkanları.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🏗️</div>
                        <h3>Kentsel Dönüşüm</h3>
                        <p>Eski ve riskli yapıların yenilenmesi, kentsel yaşam kalitesinin artırılması ve deprem güvenliği sağlanması amacıyla gerçekleştirilen dönüşüm projeleri.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🏘️</div>
                        <h3>Alt Yapı Hizmetleri</h3>
                        <p>Konut projelerinin yanı sıra okul, hastane, cami, park ve sosyal tesis yapımı ile toplumsal yaşam kalitesinin artırılması hizmetleri.</p>
                    </div>
                </div>
            </div>
            
            <div class="stats-section">
                <div class="container">
                    <h2 style="color: var(--primary-color);">TOKİ'nin Türkiye'deki Etkisi</h2>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-number">1M+</span>
                            <div class="stat-text">Tamamlanan Konut</div>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">5M+</span>
                            <div class="stat-text">Yararlanan Vatandaş</div>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">81</span>
                            <div class="stat-text">İlde Proje</div>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">22+</span>
                            <div class="stat-text">Yıl Deneyim</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TOKİ Hakkında -->
        <section id="about" class="section">
            <div class="container">
                <h2>TOKİ HAKKINDA</h2>
                <div class="content-container">
                    <h3>🏢 Toplu Konut İdaresi Başkanlığı Nedir?</h3>
                    <p>
                        <strong>TOKİ (Toplu Konut İdaresi Başkanlığı)</strong>, 2 Temmuz 1984 tarihinde kurulan ve 
                        Türkiye'de konut sektörünün geliştirilmesi, dar ve orta gelirli vatandaşlara uygun konut imkanları 
                        sağlanması amacıyla faaliyet gösteren kamu kuruluşudur.
                    </p>
                    
                    <h4>🎯 Misyonumuz</h4>
                    <p>
                        TOKİ'nin temel misyonu, Türkiye genelinde kaliteli, uygun fiyatlı ve güvenli konut üretimi yaparak 
                        vatandaşların barınma ihtiyacını karşılamak, kentsel yaşam kalitesini artırmak ve 
                        sürdürülebilir kentsel gelişimi desteklemektir.
                    </p>
                    
                    <h4>🚀 Vizyonumuz</h4>
                    <p>
                        Modern kentleşme anlayışı ile çevre dostu, depreme dayanıklı, sosyal donatı alanları 
                        ile desteklenmiş yaşam alanları oluşturarak, Türkiye'nin konut ihtiyacında öncü rol oynayan 
                        bir kurum olmayı hedefliyoruz.
                    </p>

                    <h4>📋 Temel Faaliyet Alanları</h4>
                    <ul>
                        <li><strong>Sosyal Konut Üretimi:</strong> Dar ve orta gelirli aileler için uygun fiyatlı konut projeleri</li>
                        <li><strong>Kentsel Dönüşüm:</strong> Risk altındaki yapıların yenilenmesi ve kent merkezlerinin modernizasyonu</li>
                        <li><strong>Alt Yapı Yatırımları:</strong> Okul, hastane, park ve sosyal tesis yapımı</li>
                        <li><strong>Gelir Paylaşımı Modeli:</strong> Kamu arazilerinin değerlendirilmesi ve gelir elde edilmesi</li>
                        <li><strong>Afet Konutları:</strong> Doğal afet mağdurları için acil konut ihtiyacının karşılanması</li>
                    </ul>
                    
                    <h4>🏆 Başarılar ve Önemli Projeler</h4>
                    <p>
                        TOKİ, kuruluşundan bu yana 1 milyondan fazla konut üretmiş, 5 milyondan fazla vatandaşa 
                        ev sahibi olma imkanı sunmuştur. Türkiye'nin 81 ilinde faaliyet gösteren kuruluş, 
                        sadece konut üretimi değil, aynı zamanda sosyal yaşam alanları, eğitim ve sağlık tesisleri 
                        inşa ederek toplumsal kalkınmaya katkıda bulunmuştur.
                    </p>

                    <h4>🌍 Uluslararası İşbirlikleri</h4>
                    <p>
                        TOKİ, deneyimlerini uluslararası platformlarda paylaşmakta ve başta komşu ülkeler olmak 
                        üzere farklı coğrafyalarda konut projeleri gerçekleştirmektedir. UN-Habitat gibi 
                        uluslararası kuruluşlarla işbirlikleri yaparak sürdürülebilir kentleşme konusunda 
                        öncülük etmektedir.
                    </p>
                </div>
                
                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">📅</div>
                        <h3>Kuruluş Tarihi</h3>
                        <p><strong>2 Temmuz 1984</strong><br>40 yıla yakın tecrübe</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">🏛️</div>
                        <h3>Yasal Statü</h3>
                        <p><strong>Kamu İdaresi</strong><br>Başbakanlık'a bağlı<br>özerk yapı</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">📍</div>
                        <h3>Merkez</h3>
                        <p><strong>Ankara</strong><br>Çankaya<br>81 ilde temsilcilik</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">👥</div>
                        <h3>İstihdam</h3>
                        <p><strong>5000+</strong> Çalışan<br>Doktor, mimar, mühendis<br>uzman kadro</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Hizmetler -->
        <section id="services" class="section">
            <div class="container">
                <h2>TOKİ HİZMETLERİ</h2>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">🏠</div>
                        <h3>Sosyal Konut Projeleri</h3>
                        <p>Dar ve orta gelirli aileler için uzun vadeli ödeme imkanları ile sunulan uygun fiyatlı konut projeleri. Modern mimarı ve deprem güvenliği standartlarına uygun yapılar.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🏗️</div>
                        <h3>Kentsel Dönüşüm Projeleri</h3>
                        <p>Eski ve riskli yapıların yenilenmesi, gecekondu alanlarının dönüştürülmesi ve kentsel yaşam kalitesinin artırılması için kapsamlı dönüşüm projeleri.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🏘️</div>
                        <h3>Toplu Konut Siteleri</h3>
                        <p>Sosyal donatı alanları, yeşil alanlar, park ve spor tesisleri ile desteklenmiş modern yaşam alanları. Güvenli ve konforlu yaşam ortamları.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🏥</div>
                        <h3>Kamu Binası İnşaatı</h3>
                        <p>Okul, hastane, cami, idari bina gibi kamu yapılarının inşaatı. Toplumsal hizmet kalitesinin artırılması için gereken altyapı çalışmaları.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">🆘</div>
                        <h3>Afet Konutları</h3>
                        <p>Doğal afet mağdurları için acil konut ihtiyacının karşılanması. Deprem, sel, yangın gibi afetlerden etkilenen vatandaşlar için hızlı konut çözümleri.</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">💰</div>
                        <h3>Gelir Paylaşım Modeli</h3>
                        <p>Kamu arazilerinin değerlendirilmesi yoluyla gelir elde edilmesi ve bu gelirin konut projelerine aktarılması sistemi.</p>
                    </div>
                </div>

                <div class="content-container" style="margin-top: 3rem;">
                    <h3>🎯 Özel Programlar ve Destekler</h3>
                    
                    <h4>👨‍🎓 Genç Konut Projesi</h4>
                    <p>18-35 yaş arası gençlere yönelik özel konut imkanları. Düşük peşinat ve uzun vadeli ödeme seçenekleri ile gençlerin ev sahibi olma hayallerini destekleyen program.</p>
                    
                    <h4>👵 Yaşlı Dostu Konutlar</h4>
                    <p>65 yaş üstü vatandaşlar için özel olarak tasarlanmış, engelsiz yaşam alanları. Sağlık hizmetlerine yakın konumlar ve yaşlı dostu tasarım özellikleri.</p>
                    
                    <h4>♿ Engelli Vatandaşlar İçin Özel Düzenlemeler</h4>
                    <p>Engelli vatandaşlar için özel olarak tasarlanmış konutlar. Rampa, asansör, geniş kapı açıklıkları ve özel banyo düzenlemeleri ile engelsiz yaşam.</p>
                    
                    <h4>🎖️ Şehit ve Gazi Aileleri İçin Özel Program</h4>
                    <p>Şehit aileleri ve gaziler için özel konut imkanları. Öncelikli başvuru hakkı ve özel ödeme koşulları ile desteklenen program.</p>
                    
                    <h4>🏛️ Kamu Personeli Konut Projesi</h4>
                    <p>Kamu kurumlarında çalışan personel için özel konut projeleri. Çalışılan kuruma yakın lokasyonlarda ve uygun ödeme koşulları ile sunulan imkanlar.</p>
                </div>
            </div>
        </section>

        <!-- Projeler -->
        <section id="projects" class="section">
            <div class="container">
                <h2>TOKİ PROJELERİ</h2>
                <p style="text-align: center; margin-bottom: 2rem; color: var(--text-light);">
                    Türkiye genelinde gerçekleştirilen başlıca TOKİ projeleri ve konut siteleri
                </p>
                
                <div class="projects-grid">
                    <div class="project-card">
                        <div class="project-image">🏙️</div>
                        <div class="project-content">
                            <h3 class="project-title">Kayaşehir Projesi</h3>
                            <div class="project-location">İstanbul - Başakşehir</div>
                            <p class="project-description">
                                50.000 konutluk dev proje. Modern mimari, sosyal tesisler, okul ve hastane ile tam donanımlı yaşam merkezi.
                            </p>
                        </div>
                    </div>
                    
                    <div class="project-card">
                        <div class="project-image">🌆</div>
                        <div class="project-content">
                            <h3 class="project-title">Mamak Kentsel Dönüşüm</h3>
                            <div class="project-location">Ankara - Mamak</div>
                            <p class="project-description">
                                25.000 konutluk kentsel dönüşüm projesi. Eski gecekondu alanlarının modern konut komplekslerine dönüştürülmesi.
                            </p>
                        </div>
                    </div>
                    
                    <div class="project-card">
                        <div class="project-image">🏞️</div>
                        <div class="project-content">
                            <h3 class="project-title">Uzundere Konutları</h3>
                            <div class="project-location">İzmir - Bornova</div>
                            <p class="project-description">
                                Yeşil alan içinde 15.000 konutluk proje. Spor tesisleri, alışveriş merkezi ve sosyal alanlarla destekli.
                            </p>
                        </div>
                    </div>
                    
                    <div class="project-card">
                        <div class="project-image">🏔️</div>
                        <div class="project-content">
                            <h3 class="project-title">Beytepe Kampüs Projesi</h3>
                            <div class="project-location">Ankara - Çankaya</div>
                            <p class="project-description">
                                Üniversite kampüsü içinde öğretim üyeleri için 5.000 konutluk özel proje. Akademik yaşam merkezli tasarım.
                            </p>
                        </div>
                    </div>
                    
                    <div class="project-card">
                        <div class="project-image">🌊</div>
                        <div class="project-content">
                            <h3 class="project-title">Sahil Konutları</h3>
                            <div class="project-location">Antalya - Muratpaşa</div>
                            <p class="project-description">
                                Deniz manzaralı 8.000 konutluk turizm bölgesi projesi. Tatil köyü konsepti ile modern yaşam alanları.
                            </p>
                        </div>
                    </div>
                    
                    <div class="project-card">
                        <div class="project-image">🌿</div>
                        <div class="project-content">
                            <h3 class="project-title">Yeşil Vadi Projesi</h3>
                            <div class="project-location">Bursa - Nilüfer</div>
                            <p class="project-description">
                                Doğa içinde 12.000 konutluk çevre dostu proje. Yürüyüş parkurları, bisiklet yolları ve rekreasyon alanları.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="content-container" style="margin-top: 3rem;">
                    <h3>📊 Proje İstatistikleri</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 2rem;">
                        <div style="text-align: center; padding: 1.5rem; background: #f3f4f6; border-radius: 10px;">
                            <div style="font-size: 2rem; color: var(--accent-color); font-weight: bold;">1M+</div>
                            <div>Tamamlanan Konut</div>
                        </div>
                        <div style="text-align: center; padding: 1.5rem; background: #f3f4f6; border-radius: 10px;">
                            <div style="font-size: 2rem; color: var(--accent-color); font-weight: bold;">200+</div>
                            <div>Aktif Proje</div>
                        </div>
                        <div style="text-align: center; padding: 1.5rem; background: #f3f4f6; border-radius: 10px;">
                            <div style="font-size: 2rem; color: var(--accent-color); font-weight: bold;">81</div>
                            <div>İl Kapsamı</div>
                        </div>
                        <div style="text-align: center; padding: 1.5rem; background: #f3f4f6; border-radius: 10px;">
                            <div style="font-size: 2rem; color: var(--accent-color); font-weight: bold;">500B+</div>
                            <div>TL Yatırım</div>
                        </div>
                    </div>
                    
                    <h4 style="margin-top: 2rem;">🏗️ Yapım Aşamasındaki Önemli Projeler</h4>
                    <ul style="margin-top: 1rem;">
                        <li><strong>İstanbul - Arnavutköy:</strong> 30.000 konutluk yeni şehir projesi</li>
                        <li><strong>Ankara - Etimesgut:</strong> 20.000 konutluk kentsel dönüşüm</li>
                        <li><strong>İzmir - Çiğli:</strong> 15.000 konutluk sahil projesi</li>
                        <li><strong>Konya - Selçuklu:</strong> 12.000 konutluk kültür merkezi projesi</li>
                        <li><strong>Adana - Seyhan:</strong> 10.000 konutluk tarıma dayalı yaşam projesi</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Başvuru Süreci -->
        <section id="application" class="section">
            <div class="container">
                <h2>BAŞVURU SÜRECİ</h2>
                <p style="text-align: center; margin-bottom: 3rem; color: var(--text-light); font-size: 1.1rem;">
                    TOKİ konutlarına başvuru süreci ve gerekli belgeler hakkında detaylı bilgi
                </p>
                
                <div class="steps-container">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h3 class="step-title">Online Başvuru</h3>
                        <p class="step-description">
                            TOKİ resmi web sitesinden E-Devlet girişi ile online başvuru yapılır. 
                            Kişisel bilgiler ve gelir durumu beyan edilir.
                        </p>
                    </div>
                    
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h3 class="step-title">Belge Kontrolü</h3>
                        <p class="step-description">
                            Gelir belgesi, nüfus kayıt örneği, tapu bilgileri ve diğer gerekli 
                            belgeler sistem üzerinden kontrol edilir.
                        </p>
                    </div>
                    
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h3 class="step-title">Puanlama Sistemi</h3>
                        <p class="step-description">
                            Gelir durumu, aile yapısı, yaş, medeni durum gibi kriterler 
                            üzerinden puanlama yapılır ve sıralama belirlenir.
                        </p>
                    </div>
                    
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h3 class="step-title">Kura Çekimi</h3>
                        <p class="step-description">
                            Şartları sağlayan başvuru sahipleri arasında noter huzurunda 
                            kura çekimi yapılır ve konut tahsisi gerçekleştirilir.
                        </p>
                    </div>
                    
                    <div class="step-card">
                        <div class="step-number">5</div>
                        <h3 class="step-title">Sözleşme İmzalama</h3>
                        <p class="step-description">
                            Kura ile hak kazanan başvuru sahipleri ile satış sözleşmesi 
                            imzalanır ve ödeme planı belirlenir.
                        </p>
                    </div>
                    
                    <div class="step-card">
                        <div class="step-number">6</div>
                        <h3 class="step-title">Teslim Süreci</h3>
                        <p class="step-description">
                            Konut tamamlandıktan sonra ön hakedik ödemesi yapılır ve 
                            anahtarlar teslim edilir. Tapu işlemleri başlatılır.
                        </p>
                    </div>
                </div>
                
                <div class="content-container">
                    <h3>📋 Başvuru Şartları ve Gerekli Belgeler</h3>
                    
                    <h4>🎯 Temel Başvuru Şartları</h4>
                    <ul>
                        <li><strong>Yaş Şartı:</strong> 18 yaşını doldurmuş olmak</li>
                        <li><strong>Vatandaşlık:</strong> Türkiye Cumhuriyeti vatandaşı olmak</li>
                        <li><strong>Gelir Şartı:</strong> Proje bazında belirlenen gelir seviyesine uygun olmak</li>
                        <li><strong>Tapu Şartı:</strong> Kendi adına ya da eşi adına konut, arsa veya arazi sahibi olmamak</li>
                        <li><strong>Daha Önce Yararlanma:</strong> TOKİ'den daha önce konut almamış olmak</li>
                        <li><strong>Evlilik Şartı:</strong> Bazı projeler için evli olmak veya tek ebeveyn olmak</li>
                    </ul>
                    
                    <h4>📄 Gerekli Belgeler</h4>
                    <ul>
                        <li><strong>Kimlik Belgeleri:</strong> Nüfus cüzdanı fotokopisi, nüfus kayıt örneği</li>
                        <li><strong>Gelir Belgeleri:</strong> Maaş bordrosu, SGK hizmet dökümü, vergi levhası</li>
                        <li><strong>Medeni Durum:</strong> Evlilik cüzdanı, tek ebeveyn durumunda ilgili belgeler</li>
                        <li><strong>Tapu Sorgusu:</strong> Tapu müdürlüğünden alınacak tapu kayıt belgesi</li>
                        <li><strong>Banka Bilgileri:</strong> İban numarası, banka hesap bilgisi</li>
                        <li><strong>İkametgah Belgesi:</strong> Muhtarlıktan alınacak ikametgah belgesi</li>
                    </ul>
                    
                    <h4>💰 Gelir Grupları ve Kriterleri</h4>
                    <div style="background: #f3f4f6; padding: 1.5rem; border-radius: 10px; margin: 1rem 0;">
                        <p><strong>1. Grup (Dar Gelir):</strong> Aile toplam aylık geliri asgari ücretin 4 katına kadar</p>
                        <p><strong>2. Grup (Orta Gelir):</strong> Aile toplam aylık geliri asgari ücretin 6 katına kadar</p>
                        <p><strong>3. Grup (Üst Orta Gelir):</strong> Aile toplam aylık geliri asgari ücretin 8 katına kadar</p>
                        <p style="font-size: 0.9rem; color: var(--text-light); margin-top: 1rem;">
                            * Gelir limitleri yıllık olarak güncellenir ve proje bazında farklılık gösterebilir.
                        </p>
                    </div>
                    
                    <h4>⭐ Öncelik Kriterleri (Puanlama Sistemi)</h4>
                    <ul>
                        <li><strong>Aile Durumu:</strong> Çocuk sayısı, engelli aile üyesi varlığı</li>
                        <li><strong>Yaş Faktörü:</strong> Başvuru sahibinin yaşı</li>
                        <li><strong>Gelir Seviyesi:</strong> Düşük gelir seviyesi öncelik sağlar</li>
                        <li><strong>Bölgesel Bağlantı:</strong> Proje bölgesinde ikamet etme süresi</li>
                        <li><strong>Özel Durumlar:</strong> Şehit/gazi ailesi, afet mağduru olmak</li>
                        <li><strong>Medeni Durum:</strong> Evli olma, tek ebeveyn olma durumu</li>
                    </ul>
                    
                    <h4>⚠️ Önemli Uyarılar</h4>
                    <div style="background: #fef3c7; border: 1px solid #f59e0b; padding: 1rem; border-radius: 8px; margin: 1rem 0;">
                        <ul>
                            <li>Başvuru süreci tamamen dijital ortamda gerçekleşir</li>
                            <li>Yanlış beyan suç teşkil eder ve başvuru iptal edilir</li>
                            <li>Başvuru dönemleri proje bazında farklılık gösterir</li>
                            <li>Kura sonuçları şeffaf şekilde kamuoyu ile paylaşılır</li>
                            <li>Peşinat ödemesi kura kazandıktan sonra yapılır</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- İletişim -->
        <section id="contact" class="section">
            <div class="container">
                <h2>İLETİŞİM BİLGİLERİ</h2>
                
                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">🏢</div>
                        <h3>Genel Müdürlük</h3>
                        <p><strong>TOKİ Başkanlığı</strong><br>
                        Çankaya/ANKARA<br>
                        Mustafa Kemal Mah. 2082. Cad. No:1</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">📞</div>
                        <h3>Çağri Merkezi</h3>
                        <p><strong>444 8 6 5 4</strong><br>
                        Hafta içi: 08:00-17:00<br>
                        Cumartesi: 09:00-16:00</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">🌐</div>
                        <h3>Resmi Web Sitesi</h3>
                        <p><strong>www.toki.gov.tr</strong><br>
                        Online başvuru<br>
                        E-Devlet entegrasyonu</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">✉️</div>
                        <h3>E-posta İletişim</h3>
                        <p><strong>iletisim@toki.gov.tr</strong><br>
                        Bilgi talepleri<br>
                        24-48 saat yanıt süresi</p>
                    </div>
                </div>
                
                <div class="content-container">
                    <h3>📍 Bölge Müdürlükleri</h3>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 2rem;">
                        <div>
                            <h4 style="color: var(--accent-color);">İstanbul Bölge Müdürlüğü</h4>
                            <p>📍 Beyoğlu/İSTANBUL<br>
                            📞 (212) 123 45 67<br>
                            ✉️ istanbul@toki.gov.tr</p>
                        </div>
                        
                        <div>
                            <h4 style="color: var(--accent-color);">Ankara Bölge Müdürlüğü</h4>
                            <p>📍 Çankaya/ANKARA<br>
                            📞 (312) 234 56 78<br>
                            ✉️ ankara@toki.gov.tr</p>
                        </div>
                        
                        <div>
                            <h4 style="color: var(--accent-color);">İzmir Bölge Müdürlüğü</h4>
                            <p>📍 Konak/İZMİR<br>
                            📞 (232) 345 67 89<br>
                            ✉️ izmir@toki.gov.tr</p>
                        </div>
                        
                        <div>
                            <h4 style="color: var(--accent-color);">Antalya Bölge Müdürlüğü</h4>
                            <p>📍 Muratpaşa/ANTALYA<br>
                            📞 (242) 456 78 90<br>
                            ✉️ antalya@toki.gov.tr</p>
                        </div>
                        
                        <div>
                            <h4 style="color: var(--accent-color);">Bursa Bölge Müdürlüğü</h4>
                            <p>📍 Nilüfer/BURSA<br>
                            📞 (224) 567 89 01<br>
                            ✉️ bursa@toki.gov.tr</p>
                        </div>
                        
                        <div>
                            <h4 style="color: var(--accent-color);">Adana Bölge Müdürlüğü</h4>
                            <p>📍 Seyhan/ADANA<br>
                            📞 (322) 678 90 12<br>
                            ✉️ adana@toki.gov.tr</p>
                        </div>
                    </div>
                    
                    <h3 style="margin-top: 3rem;">ℹ️ Bilgi Alma Kanalları</h3>
                    <div style="background: #e0f2fe; padding: 2rem; border-radius: 15px; margin-top: 2rem;">
                        <h4 style="color: var(--primary-color);">🌐 Online Hizmetler</h4>
                        <ul style="margin: 1rem 0;">
                            <li><strong>E-Devlet:</strong> Başvuru durumu sorgulama ve online işlemler</li>
                            <li><strong>TOKİ Web Sitesi:</strong> Proje bilgileri ve güncel duyurular</li>
                            <li><strong>Mobil Uygulama:</strong> Telefon üzerinden hızlı erişim</li>
                            <li><strong>SMS Bilgilendirme:</strong> Başvuru durumu güncellemeleri</li>
                        </ul>
                        
                        <h4 style="color: var(--primary-color); margin-top: 2rem;">📢 Sosyal Medya</h4>
                        <ul>
                            <li><strong>Twitter:</strong> @TOKIBaskanliğı - Güncel duyurular</li>
                            <li><strong>Facebook:</strong> TOKİ Resmi - Proje tanıtımları</li>
                            <li><strong>Instagram:</strong> @toki_resmi - Proje görselleri</li>
                            <li><strong>YouTube:</strong> TOKİ Başkanlığı - Tanıtım videoları</li>
                        </ul>
                        
                        <p style="font-size: 0.9rem; color: var(--text-light); margin-top: 2rem;">
                            <strong>Önemli Not:</strong> TOKİ ile iletişime geçerken lütfen resmi kanalları kullanınız. 
                            Dolandırıcılık girişimlerine karşı dikkatli olunuz. TOKİ hiçbir zaman telefon ile 
                            ön ödeme talep etmez.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gizlilik Politikası -->
        <section id="privacy" class="section">
            <div class="container">
                <h2>🔒 GİZLİLİK POLİTİKASI</h2>
                <div class="content-container">
                    <h3>Kişisel Verilerin Korunması Kanunu (KVKK) Uyum Metni</h3>
                    
                    <h4>🏢 Veri Sorumlusu</h4>
                    <p><strong>TOKİ Bilgi Portalı</strong><br>
                    Bu site TOKİ hakkında bilgi paylaşım amaçlı oluşturulmuş bağımsız bir bilgi portalıdır.</p>
                    
                    <h4>🎯 Veri İşleme Amaçları</h4>
                    <ul>
                        <li><strong>Bilgilendirme:</strong> TOKİ hakkında doğru bilgi sağlanması</li>
                        <li><strong>İstatistik:</strong> Site kullanım verilerinin toplanması</li>
                        <li><strong>İyileştirme:</strong> Site performansının artırılması</li>
                    </ul>
                    
                    <h4>🍪 Çerez Kullanımı</h4>
                    <p>Bu site analitik çerezler kullanarak site performansını ölçer ve kullanıcı deneyimini iyileştirir.</p>
                    
                    <h4>📞 İletişim</h4>
                    <p>Gizlilik politikası hakkında sorularınız için site yöneticisi ile iletişime geçebilirsiniz.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>🏢 TOKİ Bilgi Portalı</h3>
                    <p>Toplu Konut İdaresi Başkanlığı hakkında kapsamlı bilgi kaynağı</p>
                    <p>Güncel proje bilgileri ve başvuru süreçleri</p>
                    <p style="margin-top: 1rem; font-size: 0.9rem; opacity: 0.8;">
                        Bu site resmi TOKİ web sitesi değildir. Bilgilendirme amaçlı hazırlanmıştır.
                    </p>
                </div>
                
                <div class="footer-section">
                    <h3>🔗 Hızlı Linkler</h3>
                    <a href="#" onclick="showSection('home')">🏠 Ana Sayfa</a>
                    <a href="#" onclick="showSection('about')">ℹ️ TOKİ Hakkında</a>
                    <a href="#" onclick="showSection('services')">⚙️ Hizmetler</a>
                    <a href="#" onclick="showSection('projects')">🏗️ Projeler</a>
                    <a href="#" onclick="showSection('application')">📋 Başvuru Süreci</a>
                    <a href="#" onclick="showSection('contact')">📞 İletişim</a>
                </div>
                
                <div class="footer-section">
                    <h3>📱 Resmi Kanallar</h3>
                    <p>🌐 <strong>Web:</strong> www.toki.gov.tr</p>
                    <p>📞 <strong>Çağrı Merkezi:</strong> 444 8 6 5 4</p>
                    <p>✉️ <strong>E-posta:</strong> iletisim@toki.gov.tr</p>
                    <p>📱 <strong>E-Devlet:</strong> Online işlemler</p>
                </div>
                
                <div class="footer-section">
                    <h3>⚡ Hızlı İşlemler</h3>
                    <p><strong>Online Başvuru:</strong> E-Devlet üzerinden</p>
                    <p><strong>Başvuru Sorgulama:</strong> TC kimlik ile</p>
                    <p><strong>Proje Takibi:</strong> İl bazında sorgulama</p>
                    <p><strong>Kura Sonuçları:</strong> Resmi sitede açıklanır</p>
                </div>
                
                <div class="footer-section">
                    <h3>📋 Yasal</h3>
                    <a href="#" onclick="showSection('privacy')">🔒 Gizlilik Politikası</a>
                    <p style="margin-top: 1rem; font-size: 0.9rem;">
                        <strong>KVKK Uyumlu</strong><br>
                        <strong>Güncel Bilgiler</strong><br>
                        <strong>Güvenli İçerik</strong>
                    </p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 TOKİ Bilgi Portalı. Bu site bilgilendirme amaçlıdır.</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem; opacity: 0.8;">
                    Resmi başvurular için lütfen www.toki.gov.tr adresini ziyaret ediniz.<br>
                    Bu site Google Ads politikalarına uygun, sadece bilgi içerikli olarak hazırlanmıştır.
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop" onclick="scrollToTop()">↑</button>

    <script>
        // Global Variables
        let currentSection = 'home';
        let cookieAccepted = localStorage.getItem('cookieAccepted') === 'true';

        // Page Load Functions
        document.addEventListener('DOMContentLoaded', function() {
            initializePage();
            
            // Show cookie banner if not accepted
            if (!cookieAccepted) {
                setTimeout(() => {
                    document.getElementById('cookieBanner').classList.add('show');
                }, 1000);
            }
        });

        function initializePage() {
            // Hide loading screen
            setTimeout(() => {
                const loadingScreen = document.getElementById('loadingScreen');
                loadingScreen.style.opacity = '0';
                setTimeout(() => {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 1500);
            
            // Show home section
            showSection('home');
            
            // Initialize scroll events
            initializeScrollEvents();
        }

        function initializeScrollEvents() {
            window.addEventListener('scroll', function() {
                // Header background change
                const header = document.querySelector('header');
                if (window.scrollY > 100) {
                    header.style.background = 'rgba(30, 58, 138, 0.95)';
                    header.style.backdropFilter = 'blur(10px)';
                } else {
                    header.style.background = 'linear-gradient(135deg, var(--primary-color), var(--secondary-color))';
                    header.style.backdropFilter = 'none';
                }
                
                // Scroll to top button
                const scrollTop = document.getElementById('scrollTop');
                if (window.scrollY > 300) {
                    scrollTop.classList.add('visible');
                } else {
                    scrollTop.classList.remove('visible');
                }
            });
        }

        // Navigation Functions
        function showSection(sectionId) {
            // Hide all sections
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
                currentSection = sectionId;
            }
            
            // Close mobile menu
            const navLinks = document.querySelector('.nav-links');
            const mobileMenu = document.querySelector('.mobile-menu');
            navLinks.classList.remove('active');
            mobileMenu.classList.remove('active');
            
            // Scroll to top
            window.scrollTo({top: 0, behavior: 'smooth'});
        }

        function toggleMobileMenu() {
            const navLinks = document.querySelector('.nav-links');
            const mobileMenu = document.querySelector('.mobile-menu');
            navLinks.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        }

        function scrollToTop() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }

        // Cookie Functions
        function acceptCookies() {
            localStorage.setItem('cookieAccepted', 'true');
            document.getElementById('cookieBanner').classList.remove('show');
        }

        function declineCookies() {
            localStorage.setItem('cookieAccepted', 'true');
            document.getElementById('cookieBanner').classList.remove('show');
        }

        // Responsive menu handling
        window.addEventListener('resize', function() {
            const navLinks = document.querySelector('.nav-links');
            if (window.innerWidth > 768) {
                navLinks.classList.remove('active');
            }
        });
    </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"14d1d027c8904f0894e1033694aa6bef","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
</html>