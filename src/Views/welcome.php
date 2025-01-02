<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolt Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-yellow: #FFD700;
            --dark-yellow: #B8860B;
        }

        body {
            background: #000;
            color: #fff;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background:
                radial-gradient(circle at 0% 0%, transparent 50%, rgba(255, 215, 0, 0.1) 100%),
                radial-gradient(circle at 100% 100%, transparent 50%, rgba(184, 134, 11, 0.1) 100%);
            animation: gradientFlow 15s ease infinite;
        }

        .animated-lines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 100px,
                rgba(255, 215, 0, 0.03) 100px,
                rgba(255, 215, 0, 0.03) 200px
            );
            animation: lineMove 20s linear infinite;
        }

        @keyframes gradientFlow {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.5) rotate(180deg); }
        }

        @keyframes lineMove {
            0% { transform: translateX(-50%) translateY(-50%); }
            100% { transform: translateX(50%) translateY(50%); }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            border: 1px solid rgba(255, 215, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 215, 0, 0.1),
                transparent
            );
            transition: 0.5s;
        }

        .glass-card:hover::before {
            left: 100%;
        }

        .glass-card:hover {
            border-color: var(--primary-yellow);
            transform: translateY(-5px);
        }

        .hero-section {
            padding: 100px 0;
            position: relative;
            z-index: 1;
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.8);
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
        }

        .gradient-text {
            background: linear-gradient(45deg, var(--primary-yellow), var(--dark-yellow));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .btn-primary {
            background: var(--primary-yellow);
            border: none;
            color: #000;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--dark-yellow);
            transform: translateY(-2px);
            color: #000;
        }

        .btn-outline-light {
            border-color: var(--primary-yellow);
            color: var(--primary-yellow);
        }

        .btn-outline-light:hover {
            background: var(--primary-yellow);
            border-color: var(--primary-yellow);
            color: #000;
        }

        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        h3, h4 {
            color: var(--primary-yellow);
        }

        .navbar-brand, .nav-link {
            color: var(--primary-yellow) !important;
        }

        .nav-link:hover {
            color: var(--dark-yellow) !important;
        }

        .author-card {
            background: rgba(0, 0, 0, 0.3);
        }

        .author-image-wrapper {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }

        .author-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-yellow);
        }

        .image-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: radial-gradient(circle at 50% 50%, var(--primary-yellow) 0%, transparent 70%);
            opacity: 0.2;
            filter: blur(10px);
            animation: glowPulse 3s infinite;
        }

        @keyframes glowPulse {
            0%, 100% { transform: scale(1); opacity: 0.2; }
            50% { transform: scale(1.1); opacity: 0.3; }
        }

        .social-links {
            margin-top: 1rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 215, 0, 0.1);
            color: var(--primary-yellow);
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary-yellow);
            color: #000;
            transform: translateY(-3px);
        }

        .stats-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: bold;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .features-grid {
            position: relative;
        }

        .feature-box {
            padding: 2rem;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .feature-icon-wrapper {
            margin-bottom: 1.5rem;
        }

        .terminal-icon, .lightning-icon {
            font-size: 2rem;
            color: var(--primary-yellow);
        }

        .terminal-preview {
            margin-top: 1rem;
            background: rgba(0, 0, 0, 0.3);
            padding: 1rem;
            border-radius: 4px;
        }

        .terminal-line {
            font-family: monospace;
        }

        .loading-bars {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .bar {
            height: 4px;
            border-radius: 2px;
            animation: loadingAnimation 1.5s ease-in-out infinite;
        }

        .bar-1 { width: 60%; background: #3498db; animation-delay: 0s; }
        .bar-2 { width: 40%; background: #2ecc71; animation-delay: 0.2s; }
        .bar-3 { width: 20%; background: #e74c3c; animation-delay: 0.4s; }

        @keyframes loadingAnimation {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .tech-stack {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .tech-icon {
            padding: 0.5rem;
            border-radius: 4px;
            font-family: monospace;
            font-size: 0.9rem;
        }

        .html { background: rgba(229, 77, 38, 0.2); color: #e54d26; }
        .js { background: rgba(247, 223, 30, 0.2); color: #f7df1e; }
        .ts { background: rgba(49, 120, 198, 0.2); color: #3178c6; }
        .css { background: rgba(33, 150, 243, 0.2); color: #2196f3; }

        .glow-icon {
            position: relative;
        }

        .glow-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: var(--primary-yellow);
            border-radius: 50%;
            filter: blur(20px);
            opacity: 0.2;
            animation: glowPulse 2s infinite;
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <div class="animated-lines"></div>

    <div class="gradient-bg"></div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">⚡ Bolt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#docs">Documentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="#github">GitHub</a></li>
                    <li class="nav-item"><a class="nav-link" href="#community">Community</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper">
        <section class="hero-section">
            <div class="container text-center">
                <h1 class="display-3 fw-bold mb-4 gradient-text">The Modern PHP Framework</h1>
                <p class="lead mb-4">Build blazing fast web applications with Bolt's elegant MVC architecture</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-primary btn-lg">Get Started</a>
                    <a href="#" class="btn btn-outline-light btn-lg">View on GitHub</a>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="glass-card p-4 h-100">
                            <div class="feature-icon">🚀</div>
                            <h3>Lightning Fast</h3>
                            <p>Optimized performance with minimal overhead for maximum speed and efficiency.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card p-4 h-100">
                            <div class="feature-icon">⚡</div>
                            <h3>Modern Architecture</h3>
                            <p>Built with modern PHP practices and a clean MVC structure for maintainable code.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="glass-card p-4 h-100">
                            <div class="feature-icon">🛠️</div>
                            <h3>Developer Friendly</h3>
                            <p>Intuitive APIs and comprehensive documentation to help you build faster.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="glass-card p-4">
                            <h4>Documentation</h4>
                            <p>Comprehensive guides and API documentation to help you get started with Bolt Framework.</p>
                            <a href="#" class="btn btn-outline-light">Read Docs →</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="glass-card p-4">
                            <h4>Community</h4>
                            <p>Join our growing community of developers building amazing applications with Bolt.</p>
                            <a href="#" class="btn btn-outline-light">Join Discord →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <div class="glass-card p-5 author-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3 text-center">
                            <div class="author-image-wrapper">
                                <img src="/assets/img/author.png" alt="Author" class="author-image">
                                <div class="image-glow"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="gradient-text mb-3">M Usama Khizar</h3>
                            <p class="mb-4">Senior Software Architect & Creator of Bolt Framework. Passionate about building tools that make developers' lives easier. 5+ years of experience in PHP development and system architecture.</p>
                            <div class="d-flex gap-3 social-links">
                                <a href="#" class="social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                </a>
                                <a href="#" class="social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                </a>
                                <a href="#" class="social-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="stats-wrapper">
                                <div class="stat-item">
                                    <span class="stat-number gradient-text">500K+</span>
                                    <span class="stat-label">Downloads</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number gradient-text">15K+</span>
                                    <span class="stat-label">GitHub Stars</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

                <section class="py-5 features-grid">
            <div class="container">
                <h2 class="text-center gradient-text mb-5">Redefining Developer Experience</h2>
                <p class="text-center text-muted mb-5">Bolt makes web development simple again</p>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="feature-box glass-card">
                            <div class="feature-icon-wrapper">
                                <span class="terminal-icon">⌘</span>
                            </div>
                            <h4>Instant Server Start</h4>
                            <p>On-demand file serving without bundling requirements</p>
                            <div class="terminal-preview">
                                <div class="terminal-line">
                                    <span class="text-success">Ready in 96ms</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="feature-box glass-card">
                            <div class="feature-icon-wrapper">
                                <span class="lightning-icon">⚡</span>
                            </div>
                            <h4>Lightning Fast HMR</h4>
                            <p>Hot Module Replacement that stays fast regardless of app size</p>
                            <div class="terminal-preview">
                                <div class="loading-bars">
                                    <div class="bar bar-1"></div>
                                    <div class="bar bar-2"></div>
                                    <div class="bar bar-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="feature-box glass-card">
                            <div class="tech-stack">
                                <div class="tech-icon html">HTML</div>
                                <div class="tech-icon js">JS</div>
                                <div class="tech-icon ts">TS</div>
                                <div class="tech-icon css">CSS</div>
                            </div>
                            <h4>Rich Features</h4>
                            <p>Out-of-the-box support for TypeScript, JSX, CSS and more</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="feature-box glass-card">
                            <div class="feature-icon-wrapper">
                                <div class="glow-icon">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
                                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="var(--primary-yellow)" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                            <h4>Optimized Build</h4>
                            <p>Pre-configured build setup with multi-page and library mode support</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
