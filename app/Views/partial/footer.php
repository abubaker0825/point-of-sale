<?php

use Config\OSPOS;

?>

</div> <!-- end row -->
</div> <!-- end container-fluid -->

<footer class="footer mt-auto py-3 bg-dark text-white-50">
    <div class="container-fluid text-center">
        <small>
            <?= lang('Common.copyrights', [date('Y')]) ?> ·
            <a href="https://opensourcepos.org" target="_blank" class="text-white"><?= lang('Common.website') ?></a> ·
            <?= esc(config('App')->application_version) ?> -
            <a target="_blank"
                href="https://github.com/opensourcepos/opensourcepos/commit/<?= esc(config(OSPOS::class)->commit_sha1) ?>"
                class="text-white-50">
                <?= esc(substr(config(OSPOS::class)->commit_sha1, 0, 6)); ?>
            </a>
        </small>
    </div>
</footer>
</body>

</html>