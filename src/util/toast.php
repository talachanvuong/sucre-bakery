<?php
function toast($message)
{ ?>
    <div class="toast-panel">
        <div class="toast-process"></div>
        <p class="toast-message"><?php echo $message; ?></p>
    </div>

    <style>
        .toast-panel {
            width: 25%;
            position: absolute;
            bottom: 20px;
            left: 20px;

            background-color: var(--white-color);
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .toast-process {
            width: 0%;
            height: 6px;
            background-color: var(--brown-color);
            animation: move-bar 5s linear forwards;
        }

        @keyframes move-bar {
            to {
                width: 100%;
            }
        }

        .toast-message {
            font-family: "Roboto";
            font-size: 20px;
            line-height: 28px;
            color: var(--black-color);
            padding: 16px;
        }
    </style>

    <script>
        setTimeout(() => {
            document.getElementsByClassName("toast-panel")[0].remove();
        }, 5000);
    </script>
<?php } ?>