<!DOCTYPE html>
<html>
<head>
    <?php require __DIR__ . '/partials/head.php'; ?>
</head>
<body>
<section class='fullwidth_container home-page'>
    <article class='content-full'>
        <header class='hero'>
            <h1 class='hero_heading'><a href="<?php echo URL::route('home'); ?>" class="link">AoE Generator</a></h1>
            <p class='hero_descr'>A custom Age of Empires Team and Civilization Generator.</p>
        </header>
        <section class="content-body">
            <div class="container">
                <a href="<?php echo URL::route('teams.create'); ?>" class="btn-info">Create Teams</a>
            </div>
        </section>
    </article>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>
