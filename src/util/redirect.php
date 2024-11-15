<?php
function reload()
{ ?>
    <script>
        function reload() {
            window.location.reload();
            document.currentScript.remove();
        }

        reload();
    </script>
<?php }

function redirect($path)
{ ?>
    <script>
        function redirect() {
            window.location.href = "<?= $path ?>";
            document.currentScript.remove();
        }

        redirect();
    </script>
<?php } ?>