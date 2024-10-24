<?php
function set_toast_message($message)
{
    $_SESSION["toast_message"] = $message;
}

function get_toast_message()
{
    return $_SESSION["toast_message"] ?? null;
}

function unset_toast_message()
{
    unset($_SESSION["toast_message"]);
}

function toast_session()
{
    $toast_message = get_toast_message();
    if (isset($toast_message)) {
        toast($toast_message);
        unset_toast_message();
    }
}

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
            left: -25%;

            background-color: var(--white-color);
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
            animation: move-toast-panel-in 0.4s ease forwards;
        }

        .toast-process {
            width: 0%;
            height: 6px;
            background-color: var(--brown-color);
            animation: move-toast-process 4s linear forwards;
        }

        .toast-message {
            font-family: "Roboto";
            font-size: 20px;
            line-height: 28px;
            color: var(--black-color);
            padding: 16px;
        }

        @keyframes move-toast-panel-in {
            0% {
                left: -25%;
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                left: 20px;
                opacity: 1;
            }
        }

        @keyframes move-toast-panel-out {
            0% {
                left: 20px;
                opacity: 1;
            }

            50% {
                opacity: 1;
            }

            100% {
                left: -25%;
                opacity: 0;
            }
        }

        @keyframes move-toast-process {
            to {
                width: 100%;
            }
        }
    </style>

    <script>
        setTimeout(() => {
            const toastPanel = document.getElementsByClassName("toast-panel")[0];
            toastPanel.style.animation = "move-toast-panel-out 0.4s ease forwards";

            setTimeout(() => {
                toastPanel.remove();
            }, 400);
        }, 4000);
    </script>
<?php } ?>