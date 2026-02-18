<?php
// Poka-Yoke tab content
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">Poka-Yoke (Error Prevention)</h2>
    <p class="mb-6 text-slate-600">
        Error prevention mechanisms built into the <?php echo htmlspecialchars($system['name']); ?> system to ensure data quality and prevent user mistakes.
    </p>

    <div class="mb-6 rounded-lg border-l-4 border-green-500 bg-green-50 p-4">
        <h3 class="mb-2 font-medium text-slate-800">Poka-Yoke Principle</h3>
        <p class="text-slate-600">
            The <?php echo htmlspecialchars($system['name']); ?> system follows the Poka-Yoke principle of designing systems that make it impossible or immediately obvious when errors occur, reducing the cognitive load on users and improving data quality.
        </p>
    </div>

    <div class="mb-6">
        <h3 class="mb-3 text-lg font-medium text-slate-800">Input Validation</h3>
        <ul class="list-inside list-disc space-y-2 text-slate-600">
            <li>Real-time validation of all user inputs</li>
            <li>Format guidance for complex fields (e.g., dates, codes)</li>
            <li>Autocomplete and suggestions for common inputs</li>
            <li>Clear error messages with guidance on how to correct</li>
            <li>Prevention of duplicate entries</li>
        </ul>
    </div>

    <div class="mb-6">
        <h3 class="mb-3 text-lg font-medium text-slate-800">Process Safeguards</h3>
        <ul class="list-inside list-disc space-y-2 text-slate-600">
            <li>Confirmation dialogs for irreversible actions</li>
            <li>Preview of changes before submission</li>
            <li>Automatic saving of drafts to prevent data loss</li>
            <li>Clear distinction between similar actions</li>
            <li>Logical workflow progression that guides users</li>
        </ul>
    </div>

    <div>
        <h3 class="mb-3 text-lg font-medium text-slate-800">Design Considerations</h3>
        <ul class="list-inside list-disc space-y-2 text-slate-600">
            <li>Consistent UI patterns across the system</li>
            <li>Clear visual hierarchy and grouping of related elements</li>
            <li>Distinctive styling for different types of actions</li>
            <li>Progressive disclosure of complex functionality</li>
            <li>Contextual help and guidance throughout the interface</li>
        </ul>
    </div>
</div>
