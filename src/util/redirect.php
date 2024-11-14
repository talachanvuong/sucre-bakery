<?php
function redirect($path)
{ ?>
    <script>
        window.location.href = "<?= $path ?>";
        document.currentScript.remove();
    </script>
<?php } ?>