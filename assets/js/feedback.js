// Feedback Widget JavaScript

let isFeedbackOpen = false;

function toggleFeedbackPanel() {
    isFeedbackOpen = !isFeedbackOpen;
    const panel = document.getElementById('feedback-panel');

    if (isFeedbackOpen) {
        panel.classList.remove('hidden');
    } else {
        panel.classList.add('hidden');
        resetFeedbackForm();
    }
}

function resetFeedbackForm() {
    document.getElementById('feedback-form-element').reset();
    document.getElementById('feedback-success').classList.add('hidden');
    document.getElementById('feedback-form').classList.remove('hidden');
}

function getCurrentSystem(pathname) {
    if (pathname.startsWith('/systems')) {
        const parts = pathname.split('/');
        if (parts.length > 2) {
            return parts[2];
        }
        return 'Systems Overview';
    }

    const firstPathPart = pathname.split('/')[1] || 'home';
    return firstPathPart.charAt(0).toUpperCase() + firstPathPart.slice(1);
}

async function submitFeedback(event) {
    event.preventDefault();

    const submitButton = document.getElementById('feedback-submit');
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'Submitting...';

    const formData = new FormData(event.target);
    const feedbackData = {
        feedback_type: formData.get('feedback_type'),
        feedback_text: formData.get('feedback_text'),
        is_anonymous: formData.get('is_anonymous') === 'on',
        url: window.location.href,
        system: getCurrentSystem(window.location.pathname),
        user_agent: navigator.userAgent,
        screen_size: `${window.innerWidth}x${window.innerHeight}`
    };

    try {
        const response = await fetch('/api/feedback.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(feedbackData)
        });

        if (response.ok) {
            document.getElementById('feedback-form').classList.add('hidden');
            document.getElementById('feedback-success').classList.remove('hidden');

            setTimeout(() => {
                toggleFeedbackPanel();
            }, 3000);
        } else {
            alert('Failed to submit feedback. Please try again.');
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    } catch (error) {
        console.error('Error submitting feedback:', error);
        alert('Failed to submit feedback. Please try again.');
        submitButton.disabled = false;
        submitButton.textContent = originalText;
    }
}
