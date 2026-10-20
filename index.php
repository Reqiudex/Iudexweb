<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/Mikuiudex.png">
    <title>Iudex Web Oficial</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-color: #000000;
            --text-color: #ffffff;
            --accent-color: #ff7f00;
            --card-bg: rgba(0, 0, 0, 0.8);
            --border-color: rgba(255, 127, 0, 0.3);
        }

        .light-theme {
            --bg-color: #ffffff;
            --text-color: #000000;
            --accent-color: #ff7f00;
            --card-bg: rgba(255, 255, 255, 0.9);
            --border-color: rgba(255, 127, 0, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Theme Toggle */
        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 50px;
            padding: 10px 15px;
            cursor: pointer;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            box-shadow: 0 0 20px var(--accent-color);
        }

        .theme-toggle i {
            color: var(--accent-color);
            font-size: 20px;
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--bg-color) 0%, #1a1a1a 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .loading-screen.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loading-logo {
            width: 120px;
            height: 120px;
            background: url('images/CherryTechSinFondo.png') center/contain no-repeat;
            border-radius: 20px;
            animation: loadingPulse 2s ease-in-out infinite;
            margin-bottom: 30px;
            box-shadow: 0 0 50px rgba(255, 127, 0, 0.8);
        }

        .loading-text {
            color: var(--accent-color);
            font-size: 1.5rem;
            font-weight: 700;
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
        }

        @keyframes loadingPulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 50px rgba(255, 127, 0, 0.8);
            }

            50% {
                transform: scale(1.1);
                box-shadow: 0 0 80px rgba(255, 127, 0, 1);
            }
        }

        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }

        .video-background iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 130vw;
            height: 130vh;
            transform: translate(-50%, -50%) scale(1.3);
            object-fit: cover;
        }

        /* Overlay */
        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(3px);
            z-index: -1;
        }

        /* Floating Profile */
        .floating-profile {
            position: fixed;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--accent-color) 0%, #ff9500 100%);
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.8);
            z-index: 999;
            overflow: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .floating-profile.visible {
            opacity: 1;
        }

        .floating-profile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        /* Header Section */
        .header-section {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 40px;
            background: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 2px solid var(--border-color);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.2);
        }

        .floating-square {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--accent-color) 0%, #ff9500 100%);
            border-radius: 20px;
            animation: float 3s ease-in-out infinite;
            box-shadow: 0 0 50px rgba(255, 127, 0, 0.8);
            flex-shrink: 0;
            position: relative;
            overflow: hidden;
        }

        .floating-square img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .description {
            flex: 1;
        }

        .description h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--accent-color);
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
            font-weight: 700;
        }

        .description p {
            color: var(--text-color);
            line-height: 1.6;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Buttons Section */
        .buttons-section {
            margin-bottom: 40px;
        }

        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 20px;
            padding: 20px 0;
            justify-items: center;
            max-width: 100%;
        }

        .social-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 140px;
            height: 140px;
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 20px;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
            animation: buttonFloat 4s ease-in-out infinite;
            box-shadow: 0 0 20px rgba(255, 127, 0, 0.3);
        }

        .social-button:nth-child(even) {
            animation-delay: -2s;
        }

        @keyframes buttonFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-5px) rotate(1deg);
            }

            75% {
                transform: translateY(5px) rotate(-1deg);
            }
        }

        .social-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 127, 0, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .social-button:hover::before {
            opacity: 1;
            animation: neonSweep 1s ease-in-out;
        }

        @keyframes neonSweep {
            0% {
                transform: translateX(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) rotate(45deg);
            }
        }

        .social-button:hover {
            transform: translateY(-10px) scale(1.05);
            border-color: var(--accent-color);
            box-shadow: 0 0 50px rgba(255, 127, 0, 0.8);
            background: var(--card-bg);
        }

        .social-button i {
            font-size: 32px;
            color: var(--accent-color);
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
            filter: drop-shadow(0 0 10px rgba(255, 127, 0, 0.5));
        }

        .social-button span {
            font-weight: 600;
            font-size: 0.9rem;
            text-shadow: 0 0 10px rgba(255, 127, 0, 0.5);
            text-align: center;
            padding: 0 5px;
        }

        /* Schedule Table */
        .schedule-section {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 2px solid var(--border-color);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.2);
            margin-bottom: 40px;
        }

        .schedule-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
            font-weight: 700;
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
            text-align: center;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .schedule-table th,
        .schedule-table td {
            padding: 15px 10px;
            text-align: center;
            border: 2px solid var(--border-color);
            background: var(--card-bg);
            color: var(--text-color);
        }

        .schedule-table th {
            background: rgba(255, 127, 0, 0.2);
            color: var(--accent-color);
            font-weight: 700;
            text-shadow: 0 0 10px rgba(255, 127, 0, 0.8);
        }

        .schedule-table tr:hover td {
            background: rgba(255, 127, 0, 0.1);
            box-shadow: 0 0 20px rgba(255, 127, 0, 0.3);
        }

        .today-row td {
            background: rgba(255, 127, 0, 0.15) !important;
            color: var(--accent-color);
            font-weight: 600;
        }

        /* Clock Section */
        .clock-section {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(15px);
            border: 2px solid var(--border-color);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.2);
            margin-bottom: 40px;
        }

        .clock-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
            font-weight: 700;
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
        }

        .current-time {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Courier New', monospace;
            color: var(--text-color);
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
        }

        .stream-info {
            background: rgba(255, 127, 0, 0.1);
            padding: 20px;
            border-radius: 15px;
            border: 2px solid rgba(255, 127, 0, 0.4);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.3);
        }

        .stream-status {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--accent-color);
            font-weight: 600;
            text-shadow: 0 0 15px rgba(255, 127, 0, 0.8);
        }

        .countdown {
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Courier New', monospace;
            color: var(--text-color);
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }

        .live-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            background: #ff0000;
            border-radius: 50%;
            animation: pulse 2s infinite;
            margin-right: 8px;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
        }

        .sleeping-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            background: #4169E1;
            border-radius: 50%;
            animation: sleepPulse 3s infinite;
            margin-right: 8px;
            box-shadow: 0 0 10px rgba(65, 105, 225, 0.8);
        }

        @keyframes pulse {
            0% {
                opacity: 1;
                box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
            }

            50% {
                opacity: 0.3;
                box-shadow: 0 0 20px rgba(255, 0, 0, 1);
            }

            100% {
                opacity: 1;
                box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
            }
        }

        @keyframes sleepPulse {
            0% {
                opacity: 1;
                box-shadow: 0 0 10px rgba(65, 105, 225, 0.8);
            }

            50% {
                opacity: 0.3;
                box-shadow: 0 0 20px rgba(65, 105, 225, 1);
            }

            100% {
                opacity: 1;
                box-shadow: 0 0 10px rgba(65, 105, 225, 0.8);
            }
        }

        /* Gallery Section */
        .gallery-section {
            margin-bottom: 40px;
            background: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 2px solid var(--border-color);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.2);
            overflow: hidden;
        }

        .gallery-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
            font-weight: 700;
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
            text-align: center;
        }

        .gallery-container {
            display: flex;
            animation: scrollGallery 20s linear infinite;
            gap: 20px;
        }

        .gallery-item {
            flex-shrink: 0;
            width: 200px;
            height: 150px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(255, 127, 0, 0.3);
            position: relative;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-placeholder {
            background: linear-gradient(45deg, var(--accent-color), #ff9500);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 20px;
        }

        @keyframes scrollGallery {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Video Recomendado Section */
        .video-section {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 300px;
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 20px;
            padding: 20px;
            backdrop-filter: blur(15px);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.2);
            z-index: 998;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .video-section.visible {
            opacity: 1;
        }

        .video-title {
            color: var(--accent-color);
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }

        .video-player {
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .video-player iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-description {
            font-size: 0.9rem;
            margin-bottom: 15px;
            color: var(--text-color);
            text-align: center;
        }

        .video-link {
            display: block;
            background: #FF0000;
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .video-link:hover {
            background: #CC0000;
            transform: scale(1.05);
        }

        .video-link.tiktok {
            background: #000000;
        }

        .video-link.tiktok:hover {
            background: #333333;
        }

        /* Recomendaciones Section */
        .recommendations-section {
            background: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            border: 2px solid var(--border-color);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.2);
            margin-bottom: 40px;
        }

        .recommendations-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
            font-weight: 700;
            text-shadow: 0 0 20px rgba(255, 127, 0, 0.8);
            text-align: center;
        }

        .recommendations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }

        .creator-card {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .creator-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(255, 127, 0, 0.5);
            border-color: var(--accent-color);
        }

        .creator-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 10px;
            border: 3px solid var(--accent-color);
        }

        .creator-name {
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--accent-color);
        }

        .creator-handle {
            font-size: 0.8rem;
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .creator-link {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .creator-link:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 127, 0, 0.5);
        }

        /* Donation Modal */
        .donation-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .donation-modal.active {
            opacity: 1;
            visibility: visible;
        }

        .donation-content {
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 20px;
            padding: 30px;
            max-width: 90%;
            max-height: 90%;
            position: relative;
            transform: scale(0);
            transition: transform 0.3s ease;
        }

        .donation-modal.active .donation-content {
            transform: scale(1);
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            color: var(--accent-color);
            font-size: 24px;
            cursor: pointer;
        }

        .qr-image {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
        }

        /* Footer */
        .footer {
            background: var(--card-bg);
            padding: 40px 20px;
            border-top: 2px solid var(--border-color);
            backdrop-filter: blur(15px);
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            align-items: center;
        }

        .footer-section h3 {
            color: var(--accent-color);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .footer-btn {
            display: block;
            background: var(--card-bg);
            border: 2px solid var(--border-color);
            color: var(--text-color);
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            text-align: center;
        }

        .footer-btn:hover {
            border-color: var(--accent-color);
            box-shadow: 0 0 20px rgba(255, 127, 0, 0.5);
            transform: translateY(-2px);
        }

        .donation-btn {
            background: linear-gradient(45deg, var(--accent-color), #ff9500);
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 15px 30px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .donation-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(255, 127, 0, 0.8);
        }

        .company-logo {
            width: 80px;
            height: 80px;
            background: url('images/Cherry Tech.png') center/contain no-repeat;
            border-radius: 10px;
            justify-self: center;
        }

        /* Surprise Button */
        .surprise-btn {
            position: fixed;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: bold;
            z-index: 1001;
            animation: surpriseBounce 2s infinite;
            box-shadow: 0 0 20px rgba(255, 107, 107, 0.5);
            transition: all 0.3s ease;
        }

        .surprise-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 0 30px rgba(255, 107, 107, 0.8);
        }

        @keyframes surpriseBounce {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Click Effects */
        .click-effect {
            position: fixed;
            width: 10px;
            height: 10px;
            background: radial-gradient(circle, var(--accent-color) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            animation: clickExplosion 0.6s ease-out forwards;
            z-index: 1000;
        }

        @keyframes clickExplosion {
            0% {
                transform: scale(0);
                opacity: 1;
            }

            100% {
                transform: scale(20);
                opacity: 0;
            }
        }

        .click-particle {
            position: fixed;
            width: 4px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 50%;
            pointer-events: none;
            animation: particleFloat 1s ease-out forwards;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(255, 127, 0, 0.8);
        }

        @keyframes particleFloat {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0) translateY(-50px);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .floating-square {
                width: 100px;
                height: 100px;
            }

            .description h1 {
                font-size: 1.8rem;
            }

            .buttons-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                gap: 15px;
            }

            .social-button {
                width: 120px;
                height: 120px;
            }

            .social-button i {
                font-size: 28px;
            }

            .current-time {
                font-size: 2rem;
            }

            .countdown {
                font-size: 1.5rem;
            }

            .container {
                padding: 15px;
            }

            .schedule-table th,
            .schedule-table td {
                padding: 10px 5px;
                font-size: 0.9rem;
            }

            .video-section {
                position: static;
                width: 100%;
                transform: none;
                margin-bottom: 20px;
                opacity: 1;
            }

            .floating-profile {
                display: none;
            }

            .recommendations-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .buttons-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .social-button {
                width: 100px;
                height: 100px;
            }

            .social-button i {
                font-size: 24px;
            }

            .social-button span {
                font-size: 0.8rem;
            }

            .schedule-table th,
            .schedule-table td {
                padding: 8px 3px;
                font-size: 0.8rem;
            }

            .recommendations-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-logo"></div>
        <div class="loading-text">Bienvenido...</div>
    </div>

    <!-- Theme Toggle -->
    <div class="theme-toggle" id="themeToggle">
        <i class="bi bi-sun-fill" id="themeIcon"></i>
    </div>

    <!-- Floating Profile -->
    <div class="floating-profile" id="floatingProfile">
        <img src="images/avatar.jpeg" alt="Perfil">
    </div>

    <!-- Surprise Button -->
    <button class="surprise-btn" id="surpriseBtn">🎉 Botón Sorpresa</button>

    <!-- Video Background -->
    <div class="video-background">
        <iframe
            src="https://www.youtube.com/embed/0EWcxtOAJE4?autoplay=1&mute=1&loop=1&playlist=0EWcxtOAJE4&controls=0&showinfo=0&rel=0&modestbranding=1"
            frameborder="0"
            allow="autoplay; encrypted-media"
            allowfullscreen>
        </iframe>
    </div>

    <!-- Video Overlay -->
    <div class="video-overlay"></div>

    <!-- Video Recomendado Section -->
    <div class="video-section" id="videoSection">
        <div class="video-title">🎬 Video Recomendado</div>
        <div class="video-player" id="videoPlayer">
            <!-- El iframe se insertará dinámicamente aquí -->
        </div>
        <div class="video-description" id="videoDescription">Cargando recomendación...</div>
        <a href="#" class="video-link" id="videoLink" target="_blank">Ver en YouTube</a>
    </div>

    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="floating-square">
                <img src="images/avatar.jpeg" alt="Perfil">
            </div>
            <div class="description">
                <h1>Iudex/Reqiudex</h1>
                <p>Que tal? Soy Iudex, con i latina, por si no sabían, esta es mi web y mi espacio seguro, aqui pueden ver mis otras redes y cuanto falta para el próximo directo, mmm, pues, a parte de streamer por que me dio la gana, soy estudiante de ingeniería y hago mis propios programas, por ejemplo esta página hecha con codigo puro y mi propio sevidor web en casa.</p>
            </div>
        </div>

        <!-- Buttons Section -->
        <div class="buttons-section">
            <div class="buttons-grid">
                <a href="https://www.twitch.tv/reqiudex" class="social-button" target="_blank">
                    <i class="bi bi-twitch"></i>
                    <span>Twitch</span>
                </a>
                <a href="https://kick.com/reqiudex" class="social-button" target="_blank">
                    <i class="bi bi-controller"></i>
                    <span>Kick</span>
                </a>
                <a href="https://www.youtube.com/channel/UC8AAKJc_2ZCkMQA9QwqXpig" class="social-button" target="_blank">
                    <i class="bi bi-youtube"></i>
                    <span>YouTube</span>
                </a>
                <a href="https://discord.gg/xwCzNw7set" class="social-button" target="_blank">
                    <i class="bi bi-discord"></i>
                    <span>Discord</span>
                </a>
                <a href="https://chat.whatsapp.com/CnbgpXwskoTD0s612dJrvs" class="social-button" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
                <a href="https://x.com/ReqIudex" class="social-button" target="_blank">
                    <i class="bi bi-twitter-x"></i>
                    <span>Twitter</span>
                </a>
                <a href="https://tiktok.me/group/ZMHsuGnSEGA48-SkpbY/" class="social-button" target="_blank">
                    <i class="bi bi-people-fill"></i>
                    <span>Grupo TikTok</span>
                </a>
                <a href="https://www.tiktok.com/@reqiudex" class="social-button" target="_blank">
                    <i class="bi bi-tiktok"></i>
                    <span>TikTok</span>
                </a>
                <a href="#games" class="social-button">
                    <i class="bi bi-joystick"></i>
                    <span>Juegos Piraña</span>
                </a>
            </div>
        </div>

        <!-- Schedule Section -->
        <div class="schedule-section">
            <div class="schedule-title">📅 Programa de la Semana</div>
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Tema del Stream</th>
                    </tr>
                </thead>
                <tbody id="scheduleBody">
                    <tr>
                        <td>Lunes</td>
                        <td>🟫 Minecraft</td>
                    </tr>
                    <tr>
                        <td>Martes</td>
                        <td>🟦 Roblox</td>
                    </tr>
                    <tr>
                        <td>Miércoles</td>
                        <td>🎮 Juego a Elección del Público</td>
                    </tr>
                    <tr>
                        <td>Jueves</td>
                        <td>💻 Programando</td>
                    </tr>
                    <tr>
                        <td>Viernes</td>
                        <td>⚔️ Juego Competitivo</td>
                    </tr>
                    <tr>
                        <td>Sábado</td>
                        <td>🤝 Colaboración o Evento Live</td>
                    </tr>
                    <tr>
                        <td>Domingo</td>
                        <td>🤝 Watafak</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Clock Section -->
        <div class="clock-section">
            <div class="clock-title">🇧🇴 Hora de Bolivia (GMT-4)</div>
            <div class="current-time" id="currentTime">--:--:--</div>
            <div class="stream-info">
                <div class="stream-status" id="streamStatus">
                    <span class="live-indicator"></span>
                    Próximo directo a las 21:00
                </div>
                <div class="countdown" id="countdown">--:--:--</div>
            </div>
        </div>

        <!-- Recomendaciones Section -->
        <div class="recommendations-section">
            <div class="recommendations-title">🌟 Canales de mis Amigos</div>
            <div class="recommendations-grid" id="recommendationsGrid">
                <!-- Las tarjetas de creadores se insertarán dinámicamente aquí -->
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="gallery-section">
            <div class="gallery-title">🎨 Galería de Fanarts y Saludos</div>
            <div class="gallery-container" id="galleryContainer">
                <div class="gallery-item">
                    <div class="gallery-placeholder">
                        <div>
                            <i class="bi bi-image" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <div>Fanart #1</div>
                            <div style="font-size: 0.8rem;">Próximamente...</div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-placeholder">
                        <div>
                            <i class="bi bi-heart-fill" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <div>Saludo #1</div>
                            <div style="font-size: 0.8rem;">Próximamente...</div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-placeholder">
                        <div>
                            <i class="bi bi-palette-fill" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <div>Arte #1</div>
                            <div style="font-size: 0.8rem;">Próximamente...</div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-placeholder">
                        <div>
                            <i class="bi bi-camera-fill" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <div>Momento #1</div>
                            <div style="font-size: 0.8rem;">Próximamente...</div>
                        </div>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-placeholder">
                        <div>
                            <i class="bi bi-star-fill" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <div>Especial #1</div>
                            <div style="font-size: 0.8rem;">Próximamente...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Donation Modal -->
    <div class="donation-modal" id="donationModal">
        <div class="donation-content">
            <button class="close-btn" onclick="closeDonationModal()">&times;</button>
            <div style="text-align: center;">
                <h2 style="color: var(--accent-color); margin-bottom: 20px;">💰 Donaciones</h2>
                <p style="margin-bottom: 20px; color: var(--text-color);">¡Gracias por apoyar el contenido!</p>
                <img src="images/QR.jpeg" alt="QR de Donaciones" class="qr-image">
                <p style="margin-top: 15px; font-size: 0.9rem; opacity: 0.8;">Escanea el código QR para donar</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>💝 Donaciones</h3>
                <button class="donation-btn" onclick="openDonationModal()">
                    <i class="bi bi-heart-fill" style="margin-right: 10px;"></i>
                    Apóyame
                </button>
            </div>

            <div class="footer-section">
                <h3>🤝 Colaboraciones</h3>
                <a href="https://wa.me/59170314442?text=Hola%20Iudex,%20me%20gustaría%20colaborar%20contigo..." class="footer-btn" target="_blank">
                    <i class="bi bi-briefcase"></i> Colaboraciones
                </a>
                <a href="https://wa.me/59170314442?text=Hola%20Iudex,%20tengo%20una%20sugerencia%20para%20ti..." class="footer-btn" target="_blank">
                    <i class="bi bi-lightbulb"></i> Sugerencias
                </a>
            </div>

            <div class="footer-section">
                <h3>📞 Contacto</h3>
                <a href="https://wa.me/78194737" class="footer-btn" target="_blank">
                    <i class="bi bi-envelope"></i> Contacto Rápido
                </a>
                <a href="https://wa.me/78194737?text=Buenas%20tardes,%20necesito%20un%20servicio%20de%20desarrollo%20web" class="footer-btn" target="_blank">
                    <i class="bi bi-code-slash"></i> Desarrollador
                </a>
            </div>

            <div class="footer-section">
                <div class="company-logo" title="Desarrollado por CherryTech"></div>
                <p style="text-align: center; margin-top: 10px; font-size: 0.8rem; opacity: 0.7;">
                    © 2025 Iudex - Desarrollado con ❤️ para toda la comunidad.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentTheme = 'dark';

        // Loading Screen
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loadingScreen').classList.add('hidden');
            }, 2000);
        });

        // Theme Toggle
        document.getElementById('themeToggle').addEventListener('click', function() {
            const body = document.body;
            const icon = document.getElementById('themeIcon');

            if (currentTheme === 'dark') {
                body.classList.add('light-theme');
                icon.className = 'bi bi-moon-fill';
                currentTheme = 'light';
            } else {
                body.classList.remove('light-theme');
                icon.className = 'bi bi-sun-fill';
                currentTheme = 'dark';
            }
        });

        // Floating Profile on Scroll
        window.addEventListener('scroll', function() {
            const floatingProfile = document.getElementById('floatingProfile');
            const videoSection = document.getElementById('videoSection');
            const scrollY = window.scrollY;

            if (scrollY > 200) {
                floatingProfile.classList.add('visible');
                if (window.innerWidth > 768) {
                    videoSection.classList.add('visible');
                }
            } else {
                floatingProfile.classList.remove('visible');
                if (window.innerWidth > 768) {
                    videoSection.classList.remove('visible');
                }
            }
        });

        // Surprise Button Random Position
        function positionSurpriseButton() {
            const btn = document.getElementById('surpriseBtn');
            const maxX = window.innerWidth - btn.offsetWidth - 20;
            const maxY = window.innerHeight - btn.offsetHeight - 20;

            const randomX = Math.floor(Math.random() * maxX) + 10;
            const randomY = Math.floor(Math.random() * maxY) + 10;

            btn.style.left = randomX + 'px';
            btn.style.top = randomY + 'px';
        }

        // Initialize surprise button position
        setTimeout(positionSurpriseButton, 3000);

        // Reposition surprise button periodically
        setInterval(positionSurpriseButton, 15000);

        // Surprise Button Click
        document.getElementById('surpriseBtn').addEventListener('click', function() {
            window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=RDdQw4w9WgXcQ&start_radio=1', '_blank');
        });

        // Donation Modal Functions
        function openDonationModal() {
            document.getElementById('donationModal').classList.add('active');
        }

        function closeDonationModal() {
            document.getElementById('donationModal').classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('donationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDonationModal();
            }
        });

        // Click Effects
        document.addEventListener('click', function(e) {
            createClickEffect(e.clientX, e.clientY);
            createParticles(e.clientX, e.clientY);
        });

        function createClickEffect(x, y) {
            const effect = document.createElement('div');
            effect.className = 'click-effect';
            effect.style.left = (x - 5) + 'px';
            effect.style.top = (y - 5) + 'px';
            document.body.appendChild(effect);

            setTimeout(() => {
                effect.remove();
            }, 600);
        }

        function createParticles(x, y) {
            for (let i = 0; i < 6; i++) {
                const particle = document.createElement('div');
                particle.className = 'click-particle';

                const randomX = (Math.random() - 0.5) * 100;
                const randomY = (Math.random() - 0.5) * 100;

                particle.style.left = (x + randomX) + 'px';
                particle.style.top = (y + randomY) + 'px';

                document.body.appendChild(particle);

                setTimeout(() => {
                    particle.remove();
                }, 1000);
            }
        }

        // Highlight current day in schedule
        function highlightCurrentDay() {
            const days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            const currentDay = new Date().getDay();
            const rows = document.querySelectorAll('#scheduleBody tr');

            rows.forEach((row, index) => {
                row.classList.remove('today-row');
                if (index === (currentDay === 0 ? 6 : currentDay - 1)) {
                    row.classList.add('today-row');
                }
            });
        }

        // Clock Functions with stream status logic
        function updateClock() {
            const now = new Date();
            const boliviaTime = new Date(now.getTime() - (4 * 60 * 60 * 1000) + (now.getTimezoneOffset() * 60 * 1000));

            const timeString = boliviaTime.toLocaleTimeString('es-BO', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            document.getElementById('currentTime').textContent = timeString;

            const hours = boliviaTime.getHours();
            const minutes = boliviaTime.getMinutes();
            const statusElement = document.getElementById('streamStatus');
            const countdownElement = document.getElementById('countdown');

            // Stream status logic
            if (hours >= 21 && hours < 22) {
                // EN VIVO (9 PM - 10 PM)
                statusElement.innerHTML = '<span class="live-indicator"></span>🔴 EN VIVO';
                countdownElement.textContent = 'Streaming ahora!';
            } else if (hours >= 22 && hours < 24) {
                // Posiblemente durmiendo (10 PM - 12 AM)
                statusElement.innerHTML = '<span class="live-indicator"></span>Próximo directo a las 21:00';

                const targetTime = new Date(boliviaTime);
                targetTime.setDate(targetTime.getDate() + 1);
                targetTime.setHours(21, 0, 0, 0);

                const timeDiff = targetTime - boliviaTime;
                const hoursLeft = Math.floor(timeDiff / (1000 * 60 * 60));
                const minutesLeft = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                const secondsLeft = Math.floor((timeDiff % (1000 * 60)) / 1000);

                const countdownString = `${hoursLeft.toString().padStart(2, '0')}:${minutesLeft.toString().padStart(2, '0')}:${secondsLeft.toString().padStart(2, '0')}`;
                countdownElement.textContent = countdownString;
            } else if (hours >= 0 && hours < 7) {
                // Posiblemente durmiendo (12 AM - 7 AM)
                statusElement.innerHTML = '<span class="sleeping-indicator"></span>😴 Posiblemente durmiendo';

                const targetTime = new Date(boliviaTime);
                if (hours < 7) {
                    targetTime.setHours(21, 0, 0, 0);
                } else {
                    targetTime.setDate(targetTime.getDate() + 1);
                    targetTime.setHours(21, 0, 0, 0);
                }

                const timeDiff = targetTime - boliviaTime;
                const hoursLeft = Math.floor(timeDiff / (1000 * 60 * 60));
                const minutesLeft = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                const secondsLeft = Math.floor((timeDiff % (1000 * 60)) / 1000);

                const countdownString = `${hoursLeft.toString().padStart(2, '0')}:${minutesLeft.toString().padStart(2, '0')}:${secondsLeft.toString().padStart(2, '0')}`;
                countdownElement.textContent = countdownString;
            } else {
                // Normal countdown to 21:00
                const targetTime = new Date(boliviaTime);
                targetTime.setHours(21, 0, 0, 0);

                if (boliviaTime >= targetTime) {
                    targetTime.setDate(targetTime.getDate() + 1);
                }

                const timeDiff = targetTime - boliviaTime;
                const hoursLeft = Math.floor(timeDiff / (1000 * 60 * 60));
                const minutesLeft = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                const secondsLeft = Math.floor((timeDiff % (1000 * 60)) / 1000);

                const countdownString = `${hoursLeft.toString().padStart(2, '0')}:${minutesLeft.toString().padStart(2, '0')}:${secondsLeft.toString().padStart(2, '0')}`;
                countdownElement.textContent = countdownString;

                if (hoursLeft === 0 && minutesLeft <= 30) {
                    statusElement.innerHTML = '<span class="live-indicator"></span>¡El directo está a punto de empezar!';
                } else if (hoursLeft === 0 && minutesLeft <= 60) {
                    statusElement.innerHTML = '<span class="live-indicator"></span>Directo en menos de 1 hora o tal vez más tarde xd';
                } else {
                    statusElement.innerHTML = '<span class="live-indicator"></span>Próximo directo a las 21:00 o a las 22:00';
                }
            }
        }

        // Video Recommendations
        const videoRecommendations = [{
                type: 'youtube',
                id: 'dQw4w9WgXcQ',
                title: 'Video recomendado del día',
                description: 'Un video que no te puedes perder'
            },
            {
                type: 'youtube',
                id: 'nhgEuhL0jxI&',
                title: 'Contenido especial',
                description: 'Algo que te va a gustar'
            },
            {
                type: 'tiktok',
                id: '7532191350863727928',
                title: 'Trending en TikTok',
                description: 'Lo que está sonando ahora'
            },
            {
                type: 'youtube',
                id: 'DLzxrzFCyOs',
                title: 'Tutorial interesante',
                description: 'Aprende algo nuevo hoy'
            },
            {
                type: 'tiktok',
                id: '7528020359656869127',
                title: 'Reto viral',
                description: '¿Te atreves a intentarlo?'
            }
        ];

        function loadRandomVideo() {
            const randomVideo = videoRecommendations[Math.floor(Math.random() * videoRecommendations.length)];
            const videoPlayer = document.getElementById('videoPlayer');
            const videoDescription = document.getElementById('videoDescription');
            const videoLink = document.getElementById('videoLink');

            videoDescription.textContent = randomVideo.description;

            if (randomVideo.type === 'youtube') {
                videoPlayer.innerHTML = `<iframe src="https://www.youtube.com/embed/${randomVideo.id}?autoplay=0&modestbranding=1&rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                videoLink.href = `https://youtu.be/${randomVideo.id}`;
                videoLink.textContent = 'Ver en YouTube';
                videoLink.className = 'video-link';
            } else {
                videoPlayer.innerHTML = `<iframe src="https://www.tiktok.com/embed/v2/${randomVideo.id}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                videoLink.href = `https://www.tiktok.com/@i/video/${randomVideo.id}`;
                videoLink.textContent = 'Ver en TikTok';
                videoLink.className = 'video-link tiktok';
            }
        }

        // Creadores recomendados
        const recommendedCreators = [{
                name: "AndyVT",
                handle: "@andixp413",
                avatar: "https://p16-sign-sg.tiktokcdn.com/tos-alisg-avt-0068/9ee9ea55338ba95b4620f95833ee13bc~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=14579&refresh_token=c3d80062&x-expires=1755367200&x-signature=snqv8GneERtpY%2FrwwJ36LpuWpns%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=maliva",
                link: "https://www.tiktok.com/@andixp413"
            },
            {
                name: "Jhedrockmc",
                handle: "@jhedrockmc",
                avatar: "https://p16-sign-va.tiktokcdn.com/tos-maliva-avt-0068/9904661fd41ece147ebdc16c00528dd0~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=14579&refresh_token=9c9badb0&x-expires=1755367200&x-signature=oERBuwsJ5Z5yxAmPJPxt1Rg6jbc%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=maliva",
                link: "https://www.tiktok.com/@jhedrockmc"
            },
            {
                name: "Lilith XP",
                handle: "@lilithxp_08",
                avatar: "https://p16-sign-va.tiktokcdn.com/tos-maliva-avt-0068/65cfab669f13fcad4e19ad875eed1fec~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=14579&refresh_token=90dbbfa9&x-expires=1755367200&x-signature=pomUVgvIbKwNMgpv8Lahs3Kfx30%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=maliva",
                link: "https://www.tiktok.com/@lilithxp_08"
            },
            {
                name: "AdrianX",
                handle: "@adrianxx.xx",
                avatar: "https://p16-sign-va.tiktokcdn.com/tos-maliva-avt-0068/163ef5ec90f1a8485e62ad2aa3d5592d~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=14579&refresh_token=6a304887&x-expires=1755367200&x-signature=0AiToPNb%2Fl4DO5DVp544hZhR2k0%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=maliva",
                link: "https://www.tiktok.com/@adrianxx.xx"
            },
            {
                name: "Hirai 👻",
                handle: "@hirai.dite",
                avatar: "https://p16-sign-va.tiktokcdn.com/tos-maliva-avt-0068/04106f9c4411b9c283fa15ac746fbf10~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=14579&refresh_token=9fbdfce5&x-expires=1755367200&x-signature=%2FVy0XTod6XlsRfsDM4w5wXnKag4%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=maliva",
                link: "https://www.tiktok.com/@hirai.dite"
            },
            {
                name: "𝘽𝙤𝙡𝙡𝙞𝙩𝙤",
                handle: "@boshito_",
                avatar: "https://p16-sign-va.tiktokcdn.com/tos-maliva-avt-0068/ff1f61187559003cb38be206042f1147~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=14579&refresh_token=748a57c0&x-expires=1755381600&x-signature=EyEU4pRMYnFE75RH3sPDh7%2Bc3Ok%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=maliva",
                link: "https://www.tiktok.com/@boshito_"
            }
        ];

        function loadRecommendedCreators() {
            const grid = document.getElementById('recommendationsGrid');
            grid.innerHTML = '';

            recommendedCreators.forEach(creator => {
                const card = document.createElement('div');
                card.className = 'creator-card';
                card.innerHTML = `
                    <img src="${creator.avatar}" alt="${creator.name}" class="creator-avatar">
                    <div class="creator-name">${creator.name}</div>
                    <div class="creator-handle">${creator.handle}</div>
                    <a href="${creator.link}" class="creator-link" target="_blank">Seguir</a>
                `;
                grid.appendChild(card);
            });
        }

        // Initialize everything
        highlightCurrentDay();
        updateClock();
        setInterval(updateClock, 1000);
        setInterval(highlightCurrentDay, 60000); // Update current day every minute
        loadRandomVideo();
        loadRecommendedCreators();

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Alt + D for donations
            if (e.altKey && e.key === 'd') {
                e.preventDefault();
                openDonationModal();
            }

            // Escape to close modal
            if (e.key === 'Escape') {
                closeDonationModal();
            }

            // Alt + T for theme toggle
            if (e.altKey && e.key === 't') {
                e.preventDefault();
                document.getElementById('themeToggle').click();
            }

            // Alt + R for random video
            if (e.altKey && e.key === 'r') {
                e.preventDefault();
                loadRandomVideo();
            }
        });

        // Add dynamic gallery items (you can replace these with real images later)
        function addGalleryItem(imageUrl, title, type = 'image') {
            const container = document.getElementById('galleryContainer');
            const item = document.createElement('div');
            item.className = 'gallery-item';

            if (imageUrl) {
                item.innerHTML = `<img src="${imageUrl}" alt="${title}">`;
            } else {
                item.innerHTML = `
                    <div class="gallery-placeholder">
                        <div>
                            <i class="bi bi-${type === 'fanart' ? 'palette-fill' : 'heart-fill'}" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <div>${title}</div>
                            <div style="font-size: 0.8rem;">Próximamente...</div>
                        </div>
                    </div>
                `;
            }

            container.appendChild(item);
        }

        // Example: Add more gallery items
        setTimeout(() => {
            addGalleryItem(null, 'Fanart #2', 'fanart');
            addGalleryItem(null, 'Saludo #2', 'heart');
            addGalleryItem(null, 'Momento #2', 'camera');
        }, 2000);
    </script>
</body>

</html>