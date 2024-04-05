    <div class="receiver-chat-header">
        <div class="post-info">

            <img src="/uploads/assets/user/user_pfp/<?= $profile_info['profile_dp'] ?>" alt="Profile Picture" class="rounded-circle mr-2" width="40" height="40">

            <div class=" mt-2">
                <h6><?= $profile_info['fname'] ?> <?= $profile_info['lname'] ?></h6>
                <p>@<?= $profile_info['username'] ?></p>
            </div>
        </div>
    </div>

    <div class="chat-area">

        <?php foreach ($chats as $C) : ?>
            <div class="message  <?= $C['message_type'] ?>">
                <?= $C['chat'] ?>
                <div class="timestamp"><?= $C['formatted_chat_time'] ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="message-input-container">
        <textarea id="message-input" placeholder="Type your message..."></textarea>
        <button id="send-button" data-receiver-id="<?= $profile_info['user_id'] ?>"><i class="fas fa-paper-plane"></i></button>
    </div>

    <!-- <script>
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');

        messageInput.addEventListener('input', function() {
            if (this.value.trim().length > 0) {
                sendButton.style.display = 'block';
            } else {
                sendButton.style.display = 'none';
            }

            // Auto adjust textarea height
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight > 120 ? 120 : this.scrollHeight) + 'px';
        });
    </script> -->