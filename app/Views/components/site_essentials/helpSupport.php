<div class="help-container">
    <h2>Help & Support</h2>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer('q1')">What is the "Habit" feature?</div>
        <div class="faq-answer" id="q1">The "Habit" feature is a tool to help users develop positive habits by tracking their progress over time. You can set daily, weekly, or monthly goals for activities like exercising, reading, or meditation. As you continue to perform these habits, the app will provide feedback and insights to help you stay motivated and accountable.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer('q2')">What is the "Act of Kindness" feature?</div>
        <div class="faq-answer" id="q2">The "Act of Kindness" feature allows users to share their acts of kindness with the community. You can post stories, photos, or videos of your acts of kindness, whether it's helping a neighbor, volunteering at a local charity, or simply spreading positivity. This feature aims to inspire others and foster a culture of kindness and compassion.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer('q3')">How can I post stories?</div>
        <div class="faq-answer" id="q3">To post stories, go to the "Stories" section of the app and click on the "Post Story" button. Then, choose the type of content you want to share (text, photo, or video) and write a brief description of your story. You can also add relevant tags or locations to make your story more discoverable. Once you're satisfied with your post, click "Submit" to share it with the community.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer('q4')">How do I create a habit?</div>
        <div class="faq-answer" id="q4">To create a habit, go to the "Habit" section of the app and click on the "Add New Habit" button. Then, choose the activity you want to turn into a habit (e.g., exercise, reading, journaling) and set your desired frequency (daily, weekly, or monthly). You can also customize reminders and notifications to help you stay on track. Once you've configured your habit, the app will start tracking your progress automatically.</div>
    </div>
    <div class="faq-item">
        <div class="faq-question" onclick="toggleAnswer('q5')">How can I contact support?</div>
        <div class="faq-answer" id="q5">If you have any questions, concerns, or feedback, you can reach out to our support team by sending an email to support@example.com. We strive to provide timely assistance and resolve any issues you may encounter. Alternatively, you can also visit our help center for FAQs, tutorials, and troubleshooting guides.</div>
    </div>

    <div class="footer">
        <a href="mailto:jitsuthar2003@gmail.com" class="contact-info"><i class="fas fa-envelope"></i> jitsuthar2003@gmail.com</a>
    </div>
</div>

<script>
    function toggleAnswer(id) {
        var answer = document.getElementById(id);
        if (answer.style.display === "none") {
            answer.style.display = "block";
        } else {
            answer.style.display = "none";
        }
    }
</script>