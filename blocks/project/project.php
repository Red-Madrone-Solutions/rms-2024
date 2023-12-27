<?php

use TailCraft\Theme\Partial\Image;
use TailCraft\Theme\Util\ClassList;

$title = get_field('title');
if ( empty($title) ) {
    $title = 'Your title here.';
}
$description = get_field('description');
$project_type = get_field('project_type');
$url = get_field('url');
$image_id = get_field('image');
$reverse_layout = get_field('reverse_layout');
$media_classes = new ClassList('basis-1/3');
$body_classes = new ClassList('basis-2/3');
$image_classes = new ClassList('border-8 border-gray-100 drop-shadow-lg');
if ( $reverse_layout ) {
    $body_classes->add('sm:order-last');
    $image_classes->add('-rotate-1');
} else {
    $image_classes->add('rotate-1');
}
$image = new Image($image_id, 1, (string) $image_classes);
?>
<div class="mt-8">
    <div class="flex gap-x-8">
        <div <?php $body_classes->render(); ?>>
            <header class="mb-4">
                <h3 
                    class="text-xl font-medium mt-[0.5em] text-balance"
                >
                    <?php if ( !empty($url) ) : ?>
                        <a href="<?php echo esc_url($url); ?>">
                    <?php endif; ?>
                    <?php echo $title; ?>
                    <?php if ( !empty($url) ) : ?>
                        </a>
                    <?php endif; ?>
                </h3>
                <?php if ( $project_type ) : ?>
                    <h4 class="uppercase text-sm font-bold"><?php echo $project_type; ?></h4>
                <?php endif; ?>
            </header>
            <?php if ( !empty($description) ) : ?>
                <p><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
        <div <?php $media_classes->render(); ?>>
            <a href="<?php echo $image->fullUrl(); ?>" target="_blank"><?php $image->render(); ?></a>
        </div>
    </div>
</div>
