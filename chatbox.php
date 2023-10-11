<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatbox</title>
    <link href="<?= base_url() ?>assets/css/chat.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style_chat.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <!-- <div class="chatbox__image--header">
                        <img src="<?= base_url() ?>assets/img/person/person_3.jpg">
                    </div> -->
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Chat support!</h4>
                        <p class="chatbox__description--header">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div>
                        <div class="messages__item messages__item--visitor">
                            Halo.. Ada yang bisa kami bantu?
                        </div>
                        <div class="messages__item messages__item--operator">
                            Selamat pagi, saya ingin bertanya mengenai pengiriman.
                        </div>
                        .<div class="messages__item messages__item--typing">
                            <span class="messages__dot"></span>
                            <span class="messages__dot"></span>
                            <span class="messages__dot"></span>
                        </div>
                    </div>
                </div>
                <div class="chatbox__footer">
                    <!-- <img src="<?= base_url() ?>assets/img/smile.png"> -->
                    <input type="text" placeholder="Write a message">
                    <p class="chatbox__send--footer">Send</p>
                    <!-- <img src="<?= base_url() ?>assets/img/attachments.png"> -->
                </div>
    </div>
    <div class="chatbox__button">
        <button>I'm a button!</button>
    </div>
</div>
    </div>

</body>
<script type="text/javascript" src="<?= base_url() ?>assets/js/chat.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/app.js"></script>
</html>