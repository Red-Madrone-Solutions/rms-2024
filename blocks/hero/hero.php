<?php
$heading = get_field('heading');
if ( empty($heading) ) {
    $heading = 'Your heading here.';
}
$description = get_field('description');
$bullets_text = get_field('bullets');
$rich_content = get_field('rich_content');
?>
<div class="py-layer">
    <h1 
        class="text-5xl font-medium tracking-tight text-neutral-950 dark:text-neutral-200 [text-wrap:balance] sm:text-7xl"
    ><?php echo $heading; ?></h1>
    <?php if ( !empty($description) ) : ?>
        <p 
            class="mt-6 text-2xl text-neutral-800 dark:text-neutral-300 [text-wrap:balance]"
        ><?php echo $description; ?></p>
    <?php endif; ?>
    <?php if ( !empty($bullets_text)) : $bullets = explode("\n", $bullets_text); ?>
        <ul class="mt-6 text-2xl sm:text-3xl text-neutral-800 dark:text-neutral-300 space-y-4 sm:space-y-2">
            <?php foreach ($bullets as $bullet) : ?>
                <li class="flex space-x-4"><?php echo $bullet; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if ( !empty($rich_content) ) : ?>
        <div
            class="mt-6 text-3xl text-neutral-800 dark:text-neutral-300 text-balance"
        ><?php echo $rich_content; ?></div>
    <?php endif; ?>
</div>
