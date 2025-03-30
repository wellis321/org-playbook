// Define system type
export interface System {
    id: string;
    name: string;
    description: string;
    primaryUsers: string[];
    keyEntities: string[];
    integrationPoints: string[];
    category: string;
}

// Systems data
export const systems: System[] = [
    {
        id: 'contracts',
        name: 'Contracts Management',
        description:
            'Tracking, creation, renewal, and compliance monitoring of all organisational contracts',
        primaryUsers: ['Legal', 'Procurement', 'Management'],
        keyEntities: ['Contracts', 'Vendors', 'Staff', 'Properties'],
        integrationPoints: ['Finance', 'Asset Management'],
        category: 'Administrative'
    },
    {
        id: 'assets',
        name: 'Assets Management',
        description: 'Tracking, maintenance, and lifecycle management of physical and digital assets',
        primaryUsers: ['Facilities', 'IT', 'Finance'],
        keyEntities: ['Assets', 'Properties', 'Staff'],
        integrationPoints: ['Finance', 'Work Order Management'],
        category: 'Operational'
    },
    {
        id: 'workorders',
        name: 'Work Order Management',
        description:
            'Creation, assignment, tracking, and completion of maintenance and service tasks',
        primaryUsers: ['Facilities', 'Maintenance Staff'],
        keyEntities: ['Work Orders', 'Assets', 'Properties', 'Staff'],
        integrationPoints: ['Asset Management', 'Staff Rota'],
        category: 'Operational'
    },
    {
        id: 'staffidentity',
        name: 'Staff Digital Identity Management',
        description:
            'A comprehensive digital identity system that replaces traditional staff ID cards with secure mobile-based identification. It enables staff to prove their identity and role both internally and externally, access physical and digital resources, and participate in digital workflows that require identity verification. The system transforms mobile phones into intelligent identity tools that interact with the physical environment for access control and attendance tracking.',
        primaryUsers: ['All Staff', 'HR', 'Security'],
        keyEntities: ['Staff Profiles', 'Digital Credentials', 'Access Permissions', 'Authentication Events'],
        integrationPoints: [
            'All Systems',
            'Document Management',
            'Training Management',
            'Facilities Management'
        ],
        category: 'Administrative'
    },
    {
        id: 'policy',
        name: 'Policy Management',
        description:
            'Creation, distribution, acknowledgment, and version control of organisational policies',
        primaryUsers: ['Management', 'HR', 'All Staff'],
        keyEntities: ['Policies', 'Staff', 'Teams'],
        integrationPoints: ['Document Management', 'Training'],
        category: 'Administrative'
    },
    {
        id: 'booking',
        name: 'Booking Management',
        description: 'Reservation and scheduling of rooms, resources, and equipment',
        primaryUsers: ['All Staff'],
        keyEntities: ['Bookings', 'Assets', 'Properties', 'Staff'],
        integrationPoints: ['Staff Rota', 'Asset Management'],
        category: 'Operational'
    },
    {
        id: 'rota',
        name: 'Staff Rota Management',
        description: 'Scheduling, shift planning, time-off management, and coverage analysis',
        primaryUsers: ['Managers', 'HR', 'Staff'],
        keyEntities: ['Rotas', 'Staff', 'Teams', 'Locations'],
        integrationPoints: ['HR Management', 'Payroll'],
        category: 'Operational'
    },
    {
        id: 'medication',
        name: 'Medication Management',
        description:
            'Tracking, administration, and compliance monitoring of medications for supported people',
        primaryUsers: ['Care Staff', 'Medical Staff'],
        keyEntities: ['Medications', 'People Supported', 'Staff'],
        integrationPoints: ['Support Plan Management', 'HR'],
        category: 'Service Delivery'
    },
    {
        id: 'hr',
        name: 'Human Resources Management',
        description: 'Comprehensive employee lifecycle, performance, and development management',
        primaryUsers: ['HR', 'Managers', 'Staff'],
        keyEntities: ['Staff', 'Teams', 'Positions', 'Skills'],
        integrationPoints: ['Payroll', 'Onboarding/Offboarding'],
        category: 'Administrative'
    },
    {
        id: 'payroll',
        name: 'Payroll Management',
        description:
            'Salary processing, tax calculations, benefits administration, and payment tracking',
        primaryUsers: ['Finance', 'HR'],
        keyEntities: ['Staff', 'Payments', 'Tax Rates', 'Benefits'],
        integrationPoints: ['HR Management', 'Finance'],
        category: 'Administrative'
    },
    {
        id: 'identity',
        name: 'Identity Management',
        description:
            'The technical foundation for digital identity across all systems. This infrastructure-level system manages user accounts, authentication methods, system permissions, and access control for all digital resources. While Staff Digital Identity Management focuses on staff identification and physical interactions, Identity Management provides the underlying authentication and authorisation framework that powers all digital systems.',
        primaryUsers: ['IT', 'All Users', 'System Administrators'],
        keyEntities: ['User Accounts', 'Roles', 'Permissions', 'Access Logs', 'Authentication Methods'],
        integrationPoints: ['All Systems', 'HR Management', 'Security Systems', 'Staff Digital Identity'],
        category: 'Infrastructure'
    },
    {
        id: 'onboarding',
        name: 'Onboarding/Offboarding Management',
        description: 'Streamlined processes for joining and leaving the organisation',
        primaryUsers: ['HR', 'IT', 'Managers'],
        keyEntities: ['Staff', 'Assets', 'Accounts', 'Training'],
        integrationPoints: ['HR Management', 'Asset Management'],
        category: 'Administrative'
    },
    {
        id: 'communication',
        name: 'Team Communication Management',
        description: 'Centralised messaging, notifications, and information sharing',
        primaryUsers: ['All Staff'],
        keyEntities: ['Messages', 'Staff', 'Teams', 'Notifications'],
        integrationPoints: ['All Systems'],
        category: 'Collaboration'
    },
    {
        id: 'supportplan',
        name: 'Support Plan Management',
        description: 'Creation and tracking of care plans and support activities',
        primaryUsers: ['Care Staff', 'Managers'],
        keyEntities: ['People Supported', 'Support Plans', 'Activities'],
        integrationPoints: ['Medication Management'],
        category: 'Service Delivery'
    },
    {
        id: 'document',
        name: 'Document Management',
        description: 'Storage, versioning, sharing, and retrieval of organisational documents',
        primaryUsers: ['All Staff'],
        keyEntities: ['Documents', 'Folders', 'Permissions', 'Versions'],
        integrationPoints: ['All Systems'],
        category: 'Infrastructure'
    },
    {
        id: 'property',
        name: 'Property Management',
        description: 'Tracking, maintenance, and utilisation of organisational properties',
        primaryUsers: ['Facilities', 'Management'],
        keyEntities: ['Properties', 'Assets', 'Occupancy'],
        integrationPoints: ['Asset Management', 'Booking'],
        category: 'Operational'
    },
    {
        id: 'team',
        name: 'Group/Team Management',
        description: 'Creation, membership, and permission management for organisational groups',
        primaryUsers: ['HR', 'Managers'],
        keyEntities: ['Teams', 'Staff', 'Permissions', 'Roles'],
        integrationPoints: ['HR Management', 'Identity Management'],
        category: 'Administrative'
    },
    {
        id: 'finance',
        name: 'Finance Management',
        description: 'Budgeting, expense tracking, invoicing, and financial reporting',
        primaryUsers: ['Finance', 'Management'],
        keyEntities: ['Transactions', 'Budgets', 'Accounts', 'Reports'],
        integrationPoints: ['Payroll', 'Contracts', 'Assets'],
        category: 'Administrative'
    },
    {
        id: 'training',
        name: 'Training Management',
        description:
            'Course creation, enrollment, completion tracking, certification, and contextual training delivery through digital environments that connect physical objects to learning resources. Supports xAPI/Tin Can protocol for flexible learning content creation and detailed learning experience tracking across multiple platforms and formats.',
        primaryUsers: ['HR', 'Training Staff', 'All Staff', 'Learning & Development'],
        keyEntities: ['Courses', 'Certifications', 'Staff', 'Skills', 'Learning Objects', 'Digital Environment Tags', 'xAPI Statements', 'Learning Record Store'],
        integrationPoints: ['HR Management', 'Policy Management', 'Staff Digital Identity', 'Document Management', 'Knowledge Management'],
        category: 'Administrative'
    },
    {
        id: 'incident',
        name: 'Incident Management',
        description: 'Reporting, investigation, resolution, and prevention of incidents',
        primaryUsers: ['Safety Officers', 'Managers', 'Staff'],
        keyEntities: ['Incidents', 'Staff', 'Locations', 'Actions'],
        integrationPoints: ['HR Management', 'Support Plans'],
        category: 'Operational'
    },
    {
        id: 'compliance',
        name: 'Compliance Management',
        description: 'Tracking regulatory requirements, audits, and organisational compliance',
        primaryUsers: ['Compliance Officers', 'Management'],
        keyEntities: ['Regulations', 'Audits', 'Evidence', 'Deadlines'],
        integrationPoints: ['Policy Management', 'Document Management'],
        category: 'Administrative'
    },
    {
        id: 'visitor',
        name: 'Visitor Management',
        description: 'Registration, tracking, and security management for visitors',
        primaryUsers: ['Reception', 'Security', 'All Staff'],
        keyEntities: ['Visitors', 'Visits', 'Staff', 'Locations'],
        integrationPoints: ['Property Management', 'Security'],
        category: 'Operational'
    },
    {
        id: 'inventory',
        name: 'Inventory Management',
        description: 'Tracking stock levels, ordering, and distribution of consumable items',
        primaryUsers: ['Procurement', 'Facilities'],
        keyEntities: ['Inventory Items', 'Locations', 'Orders'],
        integrationPoints: ['Asset Management', 'Finance'],
        category: 'Operational'
    },
    {
        id: 'project',
        name: 'Project Management',
        description: 'Planning, tracking, and reporting on organisational projects and initiatives',
        primaryUsers: ['Project Managers', 'Teams'],
        keyEntities: ['Projects', 'Tasks', 'Staff', 'Timelines'],
        integrationPoints: ['Document Management', 'Team Communication'],
        category: 'Collaboration'
    },
    {
        id: 'knowledge',
        name: 'Knowledge Management',
        description: 'Capturing, organising, and sharing organisational knowledge and expertise',
        primaryUsers: ['All Staff'],
        keyEntities: ['Knowledge Articles', 'Categories', 'Authors'],
        integrationPoints: ['Document Management', 'Training'],
        category: 'Collaboration'
    },
    {
        id: 'selfassessment',
        name: 'Self-Assessment Management',
        description: 'Continuous monitoring, evaluation, and improvement of services in line with Care Inspectorate requirements and standards',
        primaryUsers: ['Managers', 'Quality Assurance', 'Care Staff', 'All Staff'],
        keyEntities: ['Quality Indicators', 'Evidence', 'Action Plans', 'Assessments', 'Inspections'],
        integrationPoints: ['Document Management', 'Support Plans', 'Training', 'Compliance', 'Incident Management'],
        category: 'Service Delivery'
    },
    {
        id: 'improvement',
        name: 'Integrated Improvement Intelligence System',
        description: 'AI-powered unified approach to tracking, analysing, and improving organisational performance across departments using KPIs, KPAs, and dynamic reporting',
        primaryUsers: ['Leadership', 'Managers', 'All Staff', 'Board Members'],
        keyEntities: ['KPIs', 'Metrics', 'Improvement Initiatives', 'Reports', 'Dashboards'],
        integrationPoints: ['All Systems', 'Self-Assessment', 'Finance', 'HR', 'Service Delivery'],
        category: 'Strategic'
    },
    {
        id: 'quality',
        name: 'Quality Management',
        description: 'Monitoring, measuring, and improving service and operational quality',
        primaryUsers: ['Quality Officers', 'Management'],
        keyEntities: ['Quality Metrics', 'Assessments', 'Improvements'],
        integrationPoints: ['Incident Management', 'Support Plans'],
        category: 'Service Delivery'
    },
    {
        id: 'feedback',
        name: 'Feedback Management',
        description:
            'A global system for collecting, analysing, and acting on user feedback across all organisational systems. Enables continuous improvement through user-driven suggestions, issue reporting, and automated resolution of simple content issues using AI.',
        primaryUsers: ['All Staff', 'System Administrators', 'Product Owners', 'Continuous Improvement Team'],
        keyEntities: ['Feedback Items', 'Improvement Suggestions', 'Issue Reports', 'User Contexts', 'Resolution Actions', 'AI Corrections'],
        integrationPoints: ['All Systems', 'Identity Management', 'Staff Digital Identity', 'Knowledge Management'],
        category: 'Infrastructure'
    }
];

// Categories
export const categories = [
    'All',
    'Administrative',
    'Operational',
    'Service Delivery',
    'Collaboration',
    'Infrastructure'
];