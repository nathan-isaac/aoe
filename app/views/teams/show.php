<!DOCTYPE html>
<html>
<head>
    <?php require __DIR__ . '/../partials/head.php'; ?>
</head>
<body>
<section class='fullwidth_container'>
    <article class='content-full'>
        <header class='hero'>
            <h1 class='hero_heading'><a href="<?php echo URL::route('home'); ?>" class="link">AoE Generator</a></h1>
            <p class='hero_descr'>A custom Age of Empires Team and Civilization Generator.</p>
        </header>
        <section class='teams'>
            <?php foreach($teams as $teamNum => $players) : ?>
                <section class="team">
                    <h3 class="team_name">Team <?php echo $teamNum + 1; ?></h3>

                    <?php foreach($players as $player) : ?>
                        <div class="player">
                            <div class="player_name"><?php echo $player['player_name']; ?></div>
                            <div class="civ_name"><?php echo $player['player_civ']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php endforeach; ?>
        </section>
    </article>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
