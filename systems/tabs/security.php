<?php
// Security & GDPR tab content
?>

<div>
    <h2 class="mb-4 text-2xl font-semibold text-slate-800">Security & GDPR Considerations</h2>
    <p class="mb-6 text-slate-600">
        Security measures and data protection considerations for the <?php echo htmlspecialchars($system['name']); ?> system.
    </p>

    <div class="mb-6">
        <h3 class="mb-3 text-lg font-medium text-slate-800">Security Measures</h3>
        <ul class="list-inside list-disc space-y-2 text-slate-600">
            <li>End-to-end encryption for all data in transit</li>
            <li>Encryption at rest for sensitive data</li>
            <li>Role-based access control (RBAC) for all system functions</li>
            <li>Multi-factor authentication for administrative access</li>
            <li>Regular security audits and penetration testing</li>
            <li>Secure API endpoints with proper authentication</li>
            <li>Comprehensive audit logging of all system activities</li>
        </ul>
    </div>

    <div class="mb-6">
        <h3 class="mb-3 text-lg font-medium text-slate-800">GDPR Compliance</h3>
        <ul class="list-inside list-disc space-y-2 text-slate-600">
            <li>Data minimization - only collecting necessary information</li>
            <li>Purpose limitation - clear definition of data usage</li>
            <li>Storage limitation - automatic data retention policies</li>
            <li>Data subject rights management (access, rectification, erasure)</li>
            <li>Privacy by design and default in all system components</li>
            <li>Data protection impact assessments for high-risk processing</li>
            <li>Breach detection and notification procedures</li>
        </ul>
    </div>

    <div>
        <h3 class="mb-3 text-lg font-medium text-slate-800">Potential Security Risks</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium text-slate-700">Risk</th>
                        <th class="px-4 py-2 text-left font-medium text-slate-700">Impact</th>
                        <th class="px-4 py-2 text-left font-medium text-slate-700">Mitigation</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <tr>
                        <td class="px-4 py-2 font-medium text-slate-800">Unauthorized access</td>
                        <td class="px-4 py-2 text-slate-600">High</td>
                        <td class="px-4 py-2 text-slate-600">
                            Strong authentication, role-based access control, audit logging
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-medium text-slate-800">Data leakage</td>
                        <td class="px-4 py-2 text-slate-600">High</td>
                        <td class="px-4 py-2 text-slate-600">
                            Encryption, data loss prevention, access controls
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-medium text-slate-800">API vulnerabilities</td>
                        <td class="px-4 py-2 text-slate-600">Medium</td>
                        <td class="px-4 py-2 text-slate-600">
                            API security testing, input validation, rate limiting
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
