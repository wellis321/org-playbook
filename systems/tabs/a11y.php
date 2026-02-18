<?php
// Accessibility tab content
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">Accessibility Considerations</h2>
    <p class="mb-6 text-slate-600">
        Ensuring the <?php echo htmlspecialchars($system['name']); ?> system is accessible to all users, including those with disabilities.
    </p>

    <div class="mb-6 rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
        <h3 class="mb-2 font-medium text-slate-800">Accessibility Commitment</h3>
        <p class="text-slate-600">
            The <?php echo htmlspecialchars($system['name']); ?> system is designed to meet WCAG 2.1 AA standards, ensuring it is accessible to users with a wide range of abilities and disabilities.
        </p>
    </div>

    <div class="mb-6">
        <h3 class="mb-3 text-lg font-medium text-slate-800">Key Accessibility Features</h3>
        <ul class="list-inside list-disc space-y-2 text-slate-600">
            <li>Keyboard navigation for all interactive elements</li>
            <li>Screen reader compatibility with proper ARIA attributes</li>
            <li>Sufficient color contrast for text and interactive elements</li>
            <li>Resizable text without loss of functionality</li>
            <li>Clear focus indicators for keyboard users</li>
            <li>Alternative text for all non-decorative images</li>
            <li>Logical tab order for form elements</li>
            <li>Error messages that are clearly identified and described</li>
        </ul>
    </div>

    <div>
        <h3 class="mb-3 text-lg font-medium text-slate-800">User Testing</h3>
        <p class="text-slate-600">
            The <?php echo htmlspecialchars($system['name']); ?> system will undergo accessibility testing with users who have various disabilities to ensure it meets their needs and expectations.
        </p>
    </div>
</div>
