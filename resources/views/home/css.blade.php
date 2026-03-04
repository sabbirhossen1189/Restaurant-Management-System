<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>The Velvet Spoon</title>
<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
    rel="stylesheet">
<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Tailwind -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .heading-font {
        font-family: 'Playfair Display', serif;
    }

    .glass-nav {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        transition: background 0.3s, box-shadow 0.3s;
    }

    .scrolled-nav {
        background: rgba(255, 255, 255, 0.97) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    }

    /* Scroll-reveal animations */
    .section-reveal {
        opacity: 0;
        transform: translateY(36px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .section-reveal.revealed {
        opacity: 1;
        transform: translateY(0);
    }

    .section-reveal-left {
        opacity: 0;
        transform: translateX(-36px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .section-reveal-right {
        opacity: 0;
        transform: translateX(36px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .section-reveal-left.revealed,
    .section-reveal-right.revealed {
        opacity: 1;
        transform: translateX(0);
    }
</style>