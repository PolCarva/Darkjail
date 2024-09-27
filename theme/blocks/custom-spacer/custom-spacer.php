<?php
$space = get_field('space') ?? "60";
$space_mobile = get_field('space_mobile') ?? "40";

$unique_id = "spacer_" . niqid();
?>


<div>
</div>

<style>
    #<?php echo $unique_id; ?> {
        height: <?php echo $space; ?>px;
    }

    @media (max-width: 768px) {
        #<?php echo $unique_id; ?> {
            height: <?php echo $space_mobile; ?>px;
        }
    }
</style>