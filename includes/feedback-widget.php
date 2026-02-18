<div class="fixed right-4 bottom-4 z-50 flex flex-col items-end" id="feedback-widget">
    <!-- Feedback button -->
    <button
        onclick="toggleFeedbackPanel()"
        class="flex items-center rounded-full bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
        id="feedback-button"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="mr-2 h-5 w-5"
            viewBox="0 0 20 20"
            fill="currentColor"
        >
            <path
                fill-rule="evenodd"
                d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                clip-rule="evenodd"
            />
        </svg>
        Feedback
    </button>

    <!-- Feedback panel -->
    <div id="feedback-panel" class="hidden mt-2 w-80 rounded-lg border border-gray-200 bg-white p-4 shadow-xl">
        <div id="feedback-success" class="hidden text-center">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="mx-auto h-12 w-12 text-green-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
            <h3 class="mt-2 text-lg font-medium text-gray-900">Thank you for your feedback!</h3>
            <p class="mt-1 text-sm text-gray-500">Your input helps us improve our systems.</p>
        </div>

        <div id="feedback-form">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Share your feedback</h3>
                <button
                    onclick="toggleFeedbackPanel()"
                    class="text-gray-400 hover:text-gray-500 focus:outline-none"
                    aria-label="Close"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
            </div>

            <form id="feedback-form-element" onsubmit="submitFeedback(event)">
                <div class="mb-4">
                    <label for="feedback-type" class="mb-1 block text-sm font-medium text-gray-700">Feedback type</label>
                    <select
                        id="feedback-type"
                        name="feedback_type"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                        required
                    >
                        <option value="issue">Report an issue</option>
                        <option value="improvement">Suggest an improvement</option>
                        <option value="content">Report content error</option>
                        <option value="compliment">Share a compliment</option>
                        <option value="question">Ask a question</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="feedback-text" class="mb-1 block text-sm font-medium text-gray-700">Your feedback</label>
                    <textarea
                        id="feedback-text"
                        name="feedback_text"
                        rows="3"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                        placeholder="Please describe your feedback..."
                        required
                    ></textarea>
                </div>

                <div class="mb-4 flex items-center">
                    <input
                        id="anonymous"
                        name="is_anonymous"
                        type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                    />
                    <label for="anonymous" class="ml-2 block text-sm text-gray-700">Submit anonymously</label>
                </div>

                <div class="flex justify-end">
                    <button
                        type="button"
                        onclick="toggleFeedbackPanel()"
                        class="mr-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        id="feedback-submit"
                        class="rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:outline-none"
                    >
                        Submit Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="/assets/js/feedback.js"></script>
