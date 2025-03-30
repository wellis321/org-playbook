<script lang="ts">
	import type { System } from '../systems-data';

	export let data: { system: System; title: string; description: string };
	const system = data.system;

	// Tabs for different sections
	const tabs = [
		{ id: 'overview', label: 'Overview' },
		{ id: 'schema', label: 'Data Schema' },
		{ id: 'diagrams', label: 'Diagrams' },
		{ id: 'a11y', label: 'Accessibility' },
		{ id: 'related', label: 'Related Systems' },
		{ id: 'security', label: 'Security & GDPR' },
		{ id: 'poka-yoke', label: 'Poka-Yoke' },
		{ id: 'implementation', label: 'Implementation Steps' }
	];

	let activeTab = 'overview';

	function setActiveTab(tabId: string) {
		activeTab = tabId;
	}

	// Find related systems based on integration points
	const relatedSystems = system.integrationPoints.filter(
		(integration) => integration !== 'All Systems'
	);

	// Special cases for specific systems
	const isStaffDigitalIdentity = system.id === 'staffidentity';
	const isTrainingManagement = system.id === 'training';
	const isIdentityManagement = system.id === 'identity';
	const isFeedbackManagement = system.id === 'feedback';
</script>

<svelte:head>
	<title>{data.title}</title>
	<meta name="description" content={data.description} />
</svelte:head>

<div class="bg-gradient-to-b from-slate-50 to-slate-100 py-16">
	<div class="container mx-auto max-w-5xl px-4">
		<!-- Breadcrumb navigation -->
		<div class="mb-8">
			<nav class="flex" aria-label="Breadcrumb">
				<ol class="inline-flex items-center space-x-1 md:space-x-3">
					<li class="inline-flex items-center">
						<a
							href="/"
							class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900"
						>
							<svg
								class="mr-2 h-4 w-4"
								fill="currentColor"
								viewBox="0 0 20 20"
								xmlns="http://www.w3.org/2000/svg"
							>
								<path
									d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
								></path>
							</svg>
							Home
						</a>
					</li>
					<li>
						<div class="flex items-center">
							<svg
								class="h-6 w-6 text-slate-400"
								fill="currentColor"
								viewBox="0 0 20 20"
								xmlns="http://www.w3.org/2000/svg"
							>
								<path
									fill-rule="evenodd"
									d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
									clip-rule="evenodd"
								></path>
							</svg>
							<a href="/systems" class="ml-1 text-sm text-slate-600 hover:text-slate-900 md:ml-2"
								>Systems</a
							>
						</div>
					</li>
					<li aria-current="page">
						<div class="flex items-center">
							<svg
								class="h-6 w-6 text-slate-400"
								fill="currentColor"
								viewBox="0 0 20 20"
								xmlns="http://www.w3.org/2000/svg"
							>
								<path
									fill-rule="evenodd"
									d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
									clip-rule="evenodd"
								></path>
							</svg>
							<span class="ml-1 text-sm font-medium text-slate-500 md:ml-2">{system.name}</span>
						</div>
					</li>
				</ol>
			</nav>
		</div>

		<!-- System header -->
		<header class="mb-8">
			<div class="flex items-center justify-between">
				<h1 class="text-3xl font-bold text-slate-800">{system.name}</h1>
				<span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-700"
					>{system.category}</span
				>
			</div>
			<p class="mt-2 text-lg text-slate-600">{system.description}</p>
		</header>

		<!-- Tab navigation -->
		<div class="mb-6 border-b border-slate-200">
			<ul class="-mb-px flex flex-wrap">
				{#each tabs as tab}
					<li class="mr-2">
						<button
							class={`inline-block rounded-t-lg border-b-2 p-4 ${
								activeTab === tab.id
									? 'border-blue-600 text-blue-600'
									: 'border-transparent hover:border-slate-300 hover:text-slate-600'
							}`}
							on:click={() => setActiveTab(tab.id)}
							aria-current={activeTab === tab.id ? 'page' : undefined}
						>
							{tab.label}
						</button>
					</li>
				{/each}
			</ul>
		</div>

		<!-- Tab content -->
		<div class="mb-12 rounded-xl bg-white p-8 shadow-sm">
			{#if activeTab === 'overview'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">System Overview</h2>

					<div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2">
						<div>
							<h3 class="mb-2 font-medium text-slate-800">Primary Users</h3>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								{#each system.primaryUsers as user}
									<li>{user}</li>
								{/each}
							</ul>
						</div>

						<div>
							<h3 class="mb-2 font-medium text-slate-800">Key Information Entities</h3>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								{#each system.keyEntities as entity}
									<li>{entity}</li>
								{/each}
							</ul>
						</div>
					</div>

					<div class="mb-6">
						<h3 class="mb-2 font-medium text-slate-800">Integration Points</h3>
						<div class="flex flex-wrap gap-2">
							{#each system.integrationPoints as integration}
								<span class="rounded-full bg-blue-100 px-3 py-1 text-sm text-blue-800">
									{integration}
								</span>
							{/each}
						</div>
					</div>

					{#if isStaffDigitalIdentity}
						<div class="mb-6 rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Digital Staff ID System</h3>
							<p class="mb-3 text-slate-600">
								The Staff Digital Identity system replaces traditional physical ID badges with
								secure digital alternatives that can be presented and verified via mobile devices.
								It transforms mobile phones into intelligent identity tools that interact with the
								physical environment.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Features:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									Mobile-based digital staff identification that can be trusted by internal and
									external parties
								</li>
								<li>Real-time photo updates with approval workflows for line management or HR</li>
								<li>Digital signature capabilities for document signing and verification</li>
								<li>Internal security verification features for staff-to-staff identification</li>
								<li>External verification features for banks and other institutions</li>
								<li>Searchable staff directory with filtering by team, area, role, etc.</li>
								<li>Secure QR code generation for quick verification</li>
								<li>
									Offline verification capabilities for use in areas with limited connectivity
								</li>
								<li>NFC/RFID/QR-based access control for buildings and secure areas</li>
								<li>Automated attendance tracking for meetings, training, and events</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Use Cases</h3>
							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Internal Identification</h4>
									<p class="text-sm text-slate-600">
										Staff can quickly verify the identity and role of colleagues across the
										organisation, especially useful in large organisations or when meeting new team
										members.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">External Verification</h4>
									<p class="text-sm text-slate-600">
										Staff can prove their organisational affiliation to external parties like banks,
										partner organisations, or at events with secure, tamper-proof digital
										credentials.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Access Control</h4>
									<p class="text-sm text-slate-600">
										Digital IDs can be used for physical access control to buildings and secure
										areas, replacing traditional key cards with smartphone-based verification.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Document Signing</h4>
									<p class="text-sm text-slate-600">
										Staff can digitally sign documents with legally binding signatures that are
										verified through the organisation's identity system.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Attendance Tracking</h4>
									<p class="text-sm text-slate-600">
										Automatic check-in/check-out for meetings, training sessions, and events,
										eliminating manual attendance sheets and providing accurate records for
										compliance and timesheets.
									</p>
								</div>
							</div>
						</div>

						<div class="mb-6 rounded-lg border-l-4 border-green-500 bg-green-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Smart Access & Attendance</h3>
							<p class="mb-3 text-slate-600">
								The Staff Digital Identity system enables intelligent access control and attendance
								tracking through mobile devices.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Features:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Smart Access Control:</strong> Low-cost NFC/QR readers at entrances verify
									staff identity and purpose, automatically logging entry/exit times
								</li>
								<li>
									<strong>Meeting Room Intelligence:</strong> Automatic attendance recording for meetings,
									with integration to calendar systems
								</li>
								<li>
									<strong>Time and Attendance:</strong> Simplified timesheet management through automatic
									check-in/out tracking
								</li>
								<li>
									<strong>Visitor Management:</strong> Staff can pre-register visitors who receive temporary
									digital credentials
								</li>
								<li>
									<strong>Emergency Mustering:</strong> Quick verification of staff location during emergency
									situations
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Cost and Efficiency Benefits</h3>
							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Simplified Access Control</h4>
									<p class="text-sm text-slate-600">
										Low-cost NFC/QR readers replace expensive access control systems while providing
										more functionality through integration with staff identity and scheduling
										systems.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Administrative Efficiency</h4>
									<p class="text-sm text-slate-600">
										Automated attendance tracking eliminates manual record-keeping, reducing
										administrative overhead and improving data accuracy for compliance and
										reporting.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Reduced Physical Infrastructure</h4>
									<p class="text-sm text-slate-600">
										Leveraging staff mobile devices reduces the need for dedicated hardware like ID
										card printers, physical access control systems, and attendance tracking devices.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Enhanced Security</h4>
									<p class="text-sm text-slate-600">
										Digital IDs are more secure than physical badges, with biometric verification
										options, expiration controls, and the ability to revoke access instantly when
										needed.
									</p>
								</div>
							</div>
						</div>
					{/if}

					{#if isIdentityManagement}
						<div class="mb-6 rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Technical Identity Infrastructure</h3>
							<p class="mb-3 text-slate-600">
								The Identity Management system provides the technical foundation that powers all
								digital identity and access control across the organisation. It is the
								infrastructure-level system that enables the Staff Digital Identity Management
								system to function.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Features:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Authentication Framework:</strong> Centralised authentication services supporting
									multiple methods (passwords, MFA, biometrics, SSO)
								</li>
								<li>
									<strong>authorisation Engine:</strong> Role-based and attribute-based access control
									for all digital resources
								</li>
								<li>
									<strong>Directory Services:</strong> Central user directory integrated with HR systems
									for automatic provisioning/deprovisioning
								</li>
								<li>
									<strong>API Security:</strong> Identity verification for all system-to-system communications
								</li>
								<li>
									<strong>Audit & Compliance:</strong> Comprehensive logging of all authentication and
									authorisation events
								</li>
								<li>
									<strong>Self-Service Portal:</strong> User management of credentials, device registration,
									and access requests
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">
								Relationship with Staff Digital Identity
							</h3>
							<p class="mb-3 text-slate-600">
								While these two systems may seem similar, they serve different purposes and operate
								at different levels:
							</p>

							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Identity Management</h4>
									<ul class="list-inside list-disc space-y-1 text-sm text-slate-600">
										<li>Infrastructure-level system</li>
										<li>Manages technical authentication and authorisation</li>
										<li>Focuses on digital resource access</li>
										<li>Primarily used by IT and system administrators</li>
										<li>Operates "behind the scenes"</li>
									</ul>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Staff Digital Identity</h4>
									<ul class="list-inside list-disc space-y-1 text-sm text-slate-600">
										<li>User-facing application</li>
										<li>Manages staff identification and verification</li>
										<li>Focuses on physical interactions and staff-to-staff verification</li>
										<li>Used directly by all staff</li>
										<li>Visible part of daily operations</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="mb-6 rounded-lg border-l-4 border-green-500 bg-green-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Technical Architecture</h3>
							<p class="mb-3 text-slate-600">
								The Identity Management system serves as the foundation for all digital identity and
								access control.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Components:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Identity Provider (IdP):</strong> Central authentication service supporting
									SAML, OAuth, and OpenID Connect
								</li>
								<li>
									<strong>Directory Service:</strong> LDAP-compatible user and group directory with HR
									system integration
								</li>
								<li>
									<strong>Policy Engine:</strong> Rule-based system for determining access permissions
									based on user attributes, context, and resource sensitivity
								</li>
								<li>
									<strong>Credential Management:</strong> Secure storage and lifecycle management of
									authentication credentials
								</li>
								<li>
									<strong>API Gateway:</strong> Identity-aware API management for secure system-to-system
									communication
								</li>
								<li>
									<strong>Audit System:</strong> Comprehensive logging and alerting for security events
									and compliance reporting
								</li>
							</ul>
						</div>
					{/if}

					{#if isTrainingManagement}
						<div class="mb-6 rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Digital Environments for Training</h3>
							<p class="mb-3 text-slate-600">
								The Training Management system introduces the concept of "Digital Environments"
								where physical objects and spaces are connected to relevant training resources
								through mobile devices.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Features:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Contextual Training:</strong> Equipment and locations tagged with QR codes
									or NFC tags that deliver relevant training content when scanned
								</li>
								<li>
									<strong>Just-in-Time Learning:</strong> Staff can access training exactly when and
									where they need it, such as viewing a video on how to use a fire extinguisher by scanning
									it
								</li>
								<li>
									<strong>Location-Based Training:</strong> Specific training modules automatically presented
									based on a staff member's location
								</li>
								<li>
									<strong>Equipment Onboarding:</strong> New equipment automatically provides usage instructions
									when first accessed by staff
								</li>
								<li>
									<strong>Procedural Guidance:</strong> Step-by-step instructions for complex tasks delivered
									in the physical context where they're performed
								</li>
								<li>
									<strong>Training Verification:</strong> Confirmation that staff have accessed and completed
									required training for specific equipment or procedures
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border-l-4 border-purple-500 bg-purple-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">xAPI/Tin Can Integration</h3>
							<p class="mb-3 text-slate-600">
								The Training Management system leverages the Experience API (xAPI/Tin Can) protocol
								to provide unprecedented flexibility in training content creation and detailed
								tracking of learning experiences.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Capabilities:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Platform Independence:</strong> Track learning experiences across multiple
									platforms, devices, and content formats
								</li>
								<li>
									<strong>Learning Record Store (LRS):</strong> Central repository for all learning activity
									data with detailed analytics capabilities
								</li>
								<li>
									<strong>Granular Activity Tracking:</strong> Record specific interactions with learning
									content beyond simple completion status
								</li>
								<li>
									<strong>Offline Learning:</strong> Cache learning experiences when offline and sync
									when connectivity is restored
								</li>
								<li>
									<strong>Informal Learning:</strong> Capture learning that happens outside traditional
									courses, including on-the-job experiences
								</li>
								<li>
									<strong>Content Portability:</strong> Create content once and deploy it across multiple
									platforms while maintaining tracking capabilities
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">xAPI Statement Examples</h3>
							<p class="mb-3 text-slate-600">
								The xAPI protocol uses "statements" to track learning experiences in the format of
								"Actor-Verb-Object" with additional context.
							</p>

							<div class="overflow-x-auto">
								<table class="min-w-full text-sm">
									<thead class="bg-slate-50">
										<tr>
											<th class="px-4 py-2 text-left font-medium text-slate-700"
												>Learning Activity</th
											>
											<th class="px-4 py-2 text-left font-medium text-slate-700"
												>xAPI Statement Example</th
											>
										</tr>
									</thead>
									<tbody class="divide-y divide-slate-200">
										<tr>
											<td class="px-4 py-2 font-medium text-slate-800"
												>Scanning a fire extinguisher</td
											>
											<td class="px-4 py-2 text-slate-600">
												"John Smith accessed fire safety training via QR code on extinguisher
												#FE-123 in Building A"
											</td>
										</tr>
										<tr>
											<td class="px-4 py-2 font-medium text-slate-800">Completing a video module</td
											>
											<td class="px-4 py-2 text-slate-600">
												"John Smith completed 'Fire Extinguisher Usage' video with 100% viewing
												time"
											</td>
										</tr>
										<tr>
											<td class="px-4 py-2 font-medium text-slate-800">Answering quiz questions</td>
											<td class="px-4 py-2 text-slate-600">
												"John Smith answered 'Which fire extinguisher type is used for electrical
												fires?' correctly"
											</td>
										</tr>
										<tr>
											<td class="px-4 py-2 font-medium text-slate-800">Practical demonstration</td>
											<td class="px-4 py-2 text-slate-600">
												"John Smith demonstrated 'PASS technique' for fire extinguisher use,
												verified by supervisor Jane Doe"
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Use Cases</h3>
							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Safety Equipment Training</h4>
									<p class="text-sm text-slate-600">
										Staff can point their device at safety equipment like fire extinguishers to
										receive immediate, relevant training videos and instructions, reducing the need
										for formal training sessions.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">New Equipment Onboarding</h4>
									<p class="text-sm text-slate-600">
										When new equipment is installed, staff can scan it to access setup guides, usage
										instructions, and maintenance procedures specific to that model.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Location-Specific Procedures</h4>
									<p class="text-sm text-slate-600">
										Areas with special procedures (like secure rooms or hazardous materials storage)
										can provide relevant protocols when staff enter or scan the location.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Emergency Response Training</h4>
									<p class="text-sm text-slate-600">
										Emergency exits, assembly points, and first aid stations can provide relevant
										emergency response training when scanned, ensuring staff know procedures before
										emergencies occur.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Multi-Format Learning</h4>
									<p class="text-sm text-slate-600">
										Create training content in various formats (videos, interactive modules, PDFs,
										simulations) while maintaining consistent tracking and reporting across all
										formats.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Team-Based Learning</h4>
									<p class="text-sm text-slate-600">
										Track collaborative learning activities where teams work together to complete
										training scenarios, with individual contributions recorded for compliance
										purposes.
									</p>
								</div>
							</div>
						</div>

						<div class="mb-6 rounded-lg border-l-4 border-green-500 bg-green-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">
								Benefits of Digital Environment Training
							</h3>
							<p class="mb-3 text-slate-600">
								This approach to training delivery transforms how organisations ensure staff
								competency and compliance.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Benefits:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Reduced Training Costs:</strong> Just-in-time, contextual training delivery
									reduces the need for formal training sessions, saving on trainer costs, venue hire,
									and staff time away from work
								</li>
								<li>
									<strong>Improved Knowledge Retention:</strong> Training delivered in context when needed
									is more likely to be retained than classroom training delivered weeks or months before
									use
								</li>
								<li>
									<strong>Consistent Training Quality:</strong> All staff receive the same high-quality
									training content regardless of when they join or need the training
								</li>
								<li>
									<strong>Automatic Compliance Records:</strong> The system can track who has accessed
									what training and when, creating automatic compliance records
								</li>
								<li>
									<strong>Reduced Training Burden:</strong> Staff don't need to attend multiple training
									sessions or remember everything at once; they can access training as needed
								</li>
								<li>
									<strong>Rapid Updates:</strong> Training content can be updated centrally and immediately
									available to all staff, ensuring procedures are always current
								</li>
								<li>
									<strong>Detailed Learning Analytics:</strong> xAPI provides rich data about how staff
									interact with training content, enabling continuous improvement of materials
								</li>
								<li>
									<strong>Content Flexibility:</strong> Freedom to create training in the most appropriate
									format for each topic without being constrained by LMS limitations
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Technical Architecture</h3>
							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Learning Record Store (LRS)</h4>
									<p class="text-sm text-slate-600">
										Central repository that collects, stores, and retrieves learning records from
										various sources. The LRS implements the xAPI specification for receiving,
										storing, and providing access to learning records.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Content Repositories</h4>
									<p class="text-sm text-slate-600">
										Distributed storage for learning content in various formats, with metadata that
										connects content to physical objects, locations, and learning objectives.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Mobile Learning App</h4>
									<p class="text-sm text-slate-600">
										Native application that enables scanning of QR codes/NFC tags, delivers
										appropriate content, tracks interactions via xAPI, and supports offline learning
										with synchronization.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Analytics Engine</h4>
									<p class="text-sm text-slate-600">
										Processes xAPI statements to generate insights about learning effectiveness,
										content usage patterns, compliance status, and skill development across the
										organisation.
									</p>
								</div>
							</div>
						</div>
					{/if}

					{#if isFeedbackManagement}
						<div class="mb-6 rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Global Feedback System</h3>
							<p class="mb-3 text-slate-600">
								The Feedback Management system provides a consistent way for users to provide
								feedback, report issues, and suggest improvements from any page in any system. It
								creates a culture of continuous improvement by making feedback frictionless and
								ensuring every voice is heard.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Key Features:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>Universal Feedback Widget:</strong> A consistent, unobtrusive feedback button
									available on every page of every system
								</li>
								<li>
									<strong>Contextual Data Collection:</strong> Automatic capture of system, page, user
									context, device, time, and location data
								</li>
								<li>
									<strong>Multiple Feedback Types:</strong> Support for issue reports, improvement suggestions,
									content corrections, and general feedback
								</li>
								<li>
									<strong>Anonymous Option:</strong> Users can choose to submit feedback anonymously
									when appropriate
								</li>
								<li>
									<strong>AI-Powered Content Correction:</strong> Automatic fixing of spelling, grammar,
									and simple content issues
								</li>
								<li>
									<strong>Feedback Lifecycle Management:</strong> Tracking from submission through triage,
									assignment, resolution, and user notification
								</li>
								<li>
									<strong>Continuous Improvement Dashboard:</strong> Analytics and visualisation of feedback
									trends, common issues, and improvement opportunities
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">The Feedback Widget</h3>
							<p class="mb-3 text-slate-600">
								The universal feedback widget appears consistently across all systems, providing a
								frictionless way for users to share their thoughts.
							</p>

							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Widget Design</h4>
									<ul class="list-inside list-disc space-y-1 text-sm text-slate-600">
										<li>Unobtrusive floating button in bottom corner of every page</li>
										<li>Consistent position and appearance across all systems</li>
										<li>Expands to reveal feedback options when clicked</li>
										<li>Accessible design following WCAG guidelines</li>
										<li>Responsive layout that works on all devices</li>
									</ul>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Feedback Categories</h4>
									<ul class="list-inside list-disc space-y-1 text-sm text-slate-600">
										<li><strong>Issue Report:</strong> Something isn't working correctly</li>
										<li>
											<strong>Improvement Idea:</strong> A suggestion to make something better
										</li>
										<li><strong>Content Error:</strong> Spelling, grammar, or factual mistakes</li>
										<li><strong>Compliment:</strong> Recognition of something that works well</li>
										<li><strong>Question:</strong> Request for clarification or help</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="mb-6 rounded-lg border-l-4 border-green-500 bg-green-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Contextual Data Collection</h3>
							<p class="mb-3 text-slate-600">
								The system automatically captures relevant context with each feedback submission,
								making it easier to understand and address the feedback.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Captured Context:</h4>
							<ul class="list-inside list-disc space-y-1 text-slate-600">
								<li>
									<strong>System Context:</strong> System name, page URL, specific feature or component
									being used
								</li>
								<li>
									<strong>User Context:</strong> User ID (unless anonymous), role, department, experience
									level (optional)
								</li>
								<li>
									<strong>Technical Context:</strong> Device type, browser, screen size, connection speed
								</li>
								<li>
									<strong>Temporal Context:</strong> Time, date, user's local time zone
								</li>
								<li>
									<strong>Spatial Context:</strong> Location (if permitted), facility, office
								</li>
								<li>
									<strong>Session Context:</strong> User journey prior to feedback, time spent on page
								</li>
								<li>
									<strong>Screenshot Option:</strong> Users can include an automatic screenshot with
									annotations
								</li>
							</ul>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">AI-Powered Features</h3>
							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Content Correction</h4>
									<p class="text-sm text-slate-600">
										AI automatically identifies and corrects spelling, grammar, and simple content
										errors without human intervention. Changes are logged and can be reviewed by
										content owners.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Feedback Categorisation</h4>
									<p class="text-sm text-slate-600">
										AI analyses feedback text to categorise and route items to the appropriate team,
										prioritise based on impact, and identify duplicate or related issues.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Sentiment Analysis</h4>
									<p class="text-sm text-slate-600">
										AI evaluates the emotional tone of feedback to identify areas causing
										frustration or delight, helping prioritise improvements that will have the
										greatest impact on user satisfaction.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Trend Identification</h4>
									<p class="text-sm text-slate-600">
										AI identifies patterns across feedback items to highlight systemic issues or
										improvement opportunities that might not be apparent when looking at individual
										feedback items.
									</p>
								</div>
							</div>
						</div>

						<div class="mb-6 rounded-lg border-l-4 border-purple-500 bg-purple-50 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Continuous Improvement Workflow</h3>
							<p class="mb-3 text-slate-600">
								The system supports a complete workflow from feedback submission through resolution
								and user notification.
							</p>

							<h4 class="mb-2 font-medium text-slate-700">Workflow Stages:</h4>
							<ol class="list-inside list-decimal space-y-2 text-slate-600">
								<li>
									<strong>Submission:</strong> User submits feedback through the universal widget
								</li>
								<li>
									<strong>Enrichment:</strong> System automatically adds contextual data and AI analysis
								</li>
								<li>
									<strong>Triage:</strong> Feedback is categorised, prioritised, and routed to the appropriate
									team
								</li>
								<li>
									<strong>Resolution Planning:</strong> Team evaluates feedback and determines appropriate
									action
								</li>
								<li>
									<strong>Implementation:</strong> Changes are made based on feedback (or automated for
									simple fixes)
								</li>
								<li>
									<strong>Verification:</strong> Changes are tested to ensure they address the original
									feedback
								</li>
								<li>
									<strong>Notification:</strong> User is informed of the outcome (if not anonymous)
								</li>
								<li>
									<strong>Learning:</strong> Insights are captured to improve future responses and system
									design
								</li>
							</ol>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">Integration with Other Systems</h3>
							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Staff Digital Identity</h4>
									<p class="text-sm text-slate-600">
										Uses the Staff Digital Identity system to authenticate users and provide
										relevant user context while respecting anonymity preferences.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Knowledge Management</h4>
									<p class="text-sm text-slate-600">
										Feedback about documentation or help content is automatically routed to the
										Knowledge Management system for review and updates.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Project Management</h4>
									<p class="text-sm text-slate-600">
										Significant improvement suggestions can be automatically converted into project
										proposals or feature requests in the Project Management system.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Training Management</h4>
									<p class="text-sm text-slate-600">
										Patterns of user confusion or questions can trigger updates to training
										materials or the creation of new contextual training resources.
									</p>
								</div>
							</div>
						</div>

						<div class="mb-6 rounded-lg border border-slate-200 p-4">
							<h3 class="mb-2 font-medium text-slate-800">
								Fostering a Continuous Improvement Culture
							</h3>
							<p class="mb-3 text-slate-600">
								Beyond the technical system, these features help build an organisational culture
								that values feedback and continuous improvement:
							</p>

							<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Recognition System</h4>
									<p class="text-sm text-slate-600">
										Acknowledges and rewards staff who provide valuable feedback or suggestions that
										lead to meaningful improvements.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Transparency Dashboard</h4>
									<p class="text-sm text-slate-600">
										Public dashboard showing feedback statistics, implemented improvements, and
										upcoming changes based on user suggestions.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Feedback Champions</h4>
									<p class="text-sm text-slate-600">
										Designated staff in each department who encourage feedback, help colleagues
										submit effective suggestions, and advocate for improvements.
									</p>
								</div>
								<div class="rounded-lg border border-slate-100 bg-slate-50 p-3">
									<h4 class="mb-1 font-medium text-slate-700">Improvement Showcases</h4>
									<p class="text-sm text-slate-600">
										Regular communications highlighting improvements made based on staff feedback,
										reinforcing the value of participation.
									</p>
								</div>
							</div>
						</div>
					{/if}

					<div class="border-t border-slate-200 pt-6">
						<h3 class="mb-2 font-medium text-slate-800">Development Status</h3>
						<span class="inline-block rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700">
							Idea
						</span>
						<p class="mt-2 text-slate-600">
							This system is currently in the conceptual stage and will be developed according to
							the Organisation Playbook roadmap.
						</p>
					</div>
				</div>
			{:else if activeTab === 'schema'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">Data Schema</h2>
					<p class="mb-6 text-slate-600">
						The following schema represents the core data entities and their relationships within
						the
						{system.name} system.
					</p>

					<div class="mb-6 rounded-lg bg-slate-50 p-6">
						<h3 class="mb-4 text-lg font-medium text-slate-800">Core Entities</h3>

						{#each system.keyEntities as entity}
							<div class="mb-6 rounded border border-slate-200 bg-white p-4 shadow-sm">
								<h4 class="mb-2 font-medium text-slate-800">{entity}</h4>
								<p class="mb-3 text-sm text-slate-600">
									This entity represents a core data structure in the {system.name} system.
								</p>
								<div class="overflow-x-auto">
									<table class="min-w-full text-sm">
										<thead class="bg-slate-50">
											<tr>
												<th class="px-4 py-2 text-left font-medium text-slate-700">Field</th>
												<th class="px-4 py-2 text-left font-medium text-slate-700">Type</th>
												<th class="px-4 py-2 text-left font-medium text-slate-700">Description</th>
												<th class="px-4 py-2 text-left font-medium text-slate-700">Constraints</th>
											</tr>
										</thead>
										<tbody class="divide-y divide-slate-200">
											<tr>
												<td class="px-4 py-2 font-medium text-slate-800">id</td>
												<td class="px-4 py-2 text-slate-600">UUID</td>
												<td class="px-4 py-2 text-slate-600">Unique identifier</td>
												<td class="px-4 py-2 text-slate-600">Primary key, required</td>
											</tr>
											<tr>
												<td class="px-4 py-2 font-medium text-slate-800">name</td>
												<td class="px-4 py-2 text-slate-600">String</td>
												<td class="px-4 py-2 text-slate-600">Name or title</td>
												<td class="px-4 py-2 text-slate-600">Required, max 100 chars</td>
											</tr>
											<tr>
												<td class="px-4 py-2 font-medium text-slate-800">created_at</td>
												<td class="px-4 py-2 text-slate-600">DateTime</td>
												<td class="px-4 py-2 text-slate-600">Creation timestamp</td>
												<td class="px-4 py-2 text-slate-600">Required, auto-generated</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						{/each}
					</div>

					<div class="rounded-lg bg-slate-50 p-6">
						<h3 class="mb-4 text-lg font-medium text-slate-800">Entity Relationships</h3>
						<p class="text-slate-600">
							This diagram shows how the core entities relate to each other within the {system.name}
							system and how they connect to other systems through the Organisation Information Pool.
						</p>
						<div class="mt-4 rounded border border-slate-200 bg-white p-4 text-center">
							<p class="text-slate-500">Entity relationship diagram will be added here</p>
						</div>
					</div>
				</div>
			{:else if activeTab === 'diagrams'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">System Diagrams</h2>
					<p class="mb-6 text-slate-600">
						Visual representations of the {system.name} system architecture, workflows, and user journeys.
					</p>

					<div class="mb-6">
						<h3 class="mb-3 text-lg font-medium text-slate-800">System Architecture</h3>
						<div class="rounded border border-slate-200 bg-white p-4 text-center">
							<p class="text-slate-500">System architecture diagram will be added here</p>
						</div>
					</div>

					<div class="mb-6">
						<h3 class="mb-3 text-lg font-medium text-slate-800">User Workflows</h3>
						<div class="rounded border border-slate-200 bg-white p-4 text-center">
							<p class="text-slate-500">User workflow diagrams will be added here</p>
						</div>
					</div>

					<div>
						<h3 class="mb-3 text-lg font-medium text-slate-800">Integration Points</h3>
						<div class="rounded border border-slate-200 bg-white p-4 text-center">
							<p class="text-slate-500">Integration diagram will be added here</p>
						</div>
					</div>
				</div>
			{:else if activeTab === 'a11y'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">Accessibility Considerations</h2>
					<p class="mb-6 text-slate-600">
						Ensuring the {system.name} system is accessible to all users, including those with disabilities.
					</p>

					<div class="mb-6 rounded-lg border-l-4 border-blue-500 bg-blue-50 p-4">
						<h3 class="mb-2 font-medium text-slate-800">Accessibility Commitment</h3>
						<p class="text-slate-600">
							The {system.name} system is designed to meet WCAG 2.1 AA standards, ensuring it is accessible
							to users with a wide range of abilities and disabilities.
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
							The {system.name} system will undergo accessibility testing with users who have various
							disabilities to ensure it meets their needs and expectations.
						</p>
					</div>
				</div>
			{:else if activeTab === 'related'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">Related Systems</h2>
					<p class="mb-6 text-slate-600">
						The {system.name} system integrates with the following systems within the Organisation Information
						Pool architecture.
					</p>

					<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
						{#each system.integrationPoints as integration}
							<div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm">
								<h3 class="mb-2 font-medium text-slate-800">{integration}</h3>
								<p class="mb-3 text-sm text-slate-600">
									This system shares data and functionality with the {system.name} system.
								</p>
								<a
									href={`/systems/${integration.toLowerCase().replace(/\s+/g, '')}`}
									class="text-sm font-medium text-blue-600 hover:text-blue-800"
								>
									View System Details
								</a>
							</div>
						{/each}
					</div>
				</div>
			{:else if activeTab === 'security'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">Security & GDPR Considerations</h2>
					<p class="mb-6 text-slate-600">
						Security measures and data protection considerations for the {system.name} system.
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
			{:else if activeTab === 'poka-yoke'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">Poka-Yoke (Error Prevention)</h2>
					<p class="mb-6 text-slate-600">
						Error prevention mechanisms built into the {system.name} system to ensure data quality and
						prevent user mistakes.
					</p>

					<div class="mb-6 rounded-lg border-l-4 border-green-500 bg-green-50 p-4">
						<h3 class="mb-2 font-medium text-slate-800">Poka-Yoke Principle</h3>
						<p class="text-slate-600">
							The {system.name} system follows the Poka-Yoke principle of designing systems that make
							it impossible or immediately obvious when errors occur, reducing the cognitive load on
							users and improving data quality.
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
			{:else if activeTab === 'implementation'}
				<div>
					<h2 class="mb-4 text-2xl font-semibold text-slate-800">Implementation Steps</h2>
					<p class="mb-6 text-slate-600">
						A guide to implementing the {system.name} system within your organisation.
					</p>

					<div class="mb-6">
						<h3 class="mb-3 text-lg font-medium text-slate-800">
							Phase 1: Planning & Requirements
						</h3>
						<ol class="list-inside list-decimal space-y-2 text-slate-600">
							<li>Identify key stakeholders and form an implementation team</li>
							<li>Document current processes and pain points</li>
							<li>Define specific requirements and success criteria</li>
							<li>Map data flows and integration points with existing systems</li>
							<li>Develop a project timeline and resource allocation plan</li>
						</ol>
					</div>

					<div class="mb-6">
						<h3 class="mb-3 text-lg font-medium text-slate-800">Phase 2: Design & Development</h3>
						<ol class="list-inside list-decimal space-y-2 text-slate-600">
							<li>Create detailed system architecture and data models</li>
							<li>Design user interfaces with stakeholder input</li>
							<li>Develop core functionality with regular feedback cycles</li>
							<li>Implement integration points with other systems</li>
							<li>Conduct security and accessibility reviews</li>
						</ol>
					</div>

					<div class="mb-6">
						<h3 class="mb-3 text-lg font-medium text-slate-800">Phase 3: Testing & Validation</h3>
						<ol class="list-inside list-decimal space-y-2 text-slate-600">
							<li>Conduct thorough testing of all system components</li>
							<li>Perform user acceptance testing with actual end users</li>
							<li>Test integration points with other systems</li>
							<li>Validate security measures and data protection</li>
							<li>Address and resolve identified issues</li>
						</ol>
					</div>

					<div>
						<h3 class="mb-3 text-lg font-medium text-slate-800">Phase 4: Deployment & Support</h3>
						<ol class="list-inside list-decimal space-y-2 text-slate-600">
							<li>Develop training materials and documentation</li>
							<li>Train system administrators and end users</li>
							<li>Deploy the system with a phased approach if necessary</li>
							<li>Monitor system performance and user feedback</li>
							<li>Provide ongoing support and continuous improvement</li>
						</ol>
					</div>
				</div>
			{/if}
		</div>

		<!-- Back to systems button -->
		<div class="text-center">
			<a
				href="/systems"
				class="inline-flex items-center rounded-lg bg-slate-100 px-5 py-2.5 text-center text-sm font-medium text-slate-700 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300 focus:outline-none"
			>
				<svg
					class="mr-2 -ml-1 h-5 w-5"
					fill="currentColor"
					viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						fill-rule="evenodd"
						d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
						clip-rule="evenodd"
					></path>
				</svg>
				Back to Systems
			</a>
		</div>
	</div>
</div>
