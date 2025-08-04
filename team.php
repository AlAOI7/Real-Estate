<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
?>
<?php include("include/header.php"); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3">الفريق</h1>

</div>
<!-- Page Header Start -->
<style>
    .contact-buttons {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .btn-custom {
        margin: 0 10px;
        padding: 10px 15px;
        color: white;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s;
    }

    .btn-whatsapp {
        background-color: #25D366;
        /* لون واتساب */
    }

    .btn-call {
        background-color: #002fff;
        /* لون الاتصال */
    }

    .btn-custom:hover {
        opacity: 0.9;
        /* تأثير عند التمرير */
    }
</style>

<div class="container">
    <div class="contact-buttons">
        <a href="https://wa.me/+967773748697" target="_blank" title="واتساب" class="btn-custom btn-whatsapp">
            <i class="fab fa-whatsapp"></i> واتساب
        </a>
        <a href="tel:+967773748697" class="btn-custom btn-call" title="اتصال">
            <i class="fas fa-phone"></i> اتصال
        </a>
    </div>
</div>
<br>
<br>
<?php include("include/footer.php"); ?>