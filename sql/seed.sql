-- Seed data for Organisation Playbook

-- Insert categories
INSERT INTO categories (name) VALUES
('Administrative'),
('Operational'),
('Service Delivery'),
('Collaboration'),
('Infrastructure'),
('Strategic')
ON DUPLICATE KEY UPDATE name=name;

-- Insert systems
INSERT INTO systems (id, name, description, category) VALUES
('contracts', 'Contracts Management', 'Tracking, creation, renewal, and compliance monitoring of all organisational contracts', 'Administrative'),
('assets', 'Assets Management', 'Tracking, maintenance, and lifecycle management of physical and digital assets', 'Operational'),
('workorders', 'Work Order Management', 'Creation, assignment, tracking, and completion of maintenance and service tasks', 'Operational'),
('staffidentity', 'Staff Digital Identity Management', 'A comprehensive digital identity system that replaces traditional staff ID cards with secure mobile-based identification. It enables staff to prove their identity and role both internally and externally, access physical and digital resources, and participate in digital workflows that require identity verification. The system transforms mobile phones into intelligent identity tools that interact with the physical environment for access control and attendance tracking.', 'Administrative'),
('policy', 'Policy Management', 'Creation, distribution, acknowledgment, and version control of organisational policies', 'Administrative'),
('booking', 'Booking Management', 'Reservation and scheduling of rooms, resources, and equipment', 'Operational'),
('rota', 'Staff Rota Management', 'Scheduling, shift planning, time-off management, and coverage analysis', 'Operational'),
('medication', 'Medication Management', 'Tracking, administration, and compliance monitoring of medications for supported people', 'Service Delivery'),
('hr', 'Human Resources Management', 'Comprehensive employee lifecycle, performance, and development management', 'Administrative'),
('payroll', 'Payroll Management', 'Salary processing, tax calculations, benefits administration, and payment tracking', 'Administrative'),
('identity', 'Identity Management', 'The technical foundation for digital identity across all systems. This infrastructure-level system manages user accounts, authentication methods, system permissions, and access control for all digital resources. While Staff Digital Identity Management focuses on staff identification and physical interactions, Identity Management provides the underlying authentication and authorisation framework that powers all digital systems.', 'Infrastructure'),
('onboarding', 'Onboarding/Offboarding Management', 'Streamlined processes for joining and leaving the organisation', 'Administrative'),
('communication', 'Team Communication Management', 'Centralised messaging, notifications, and information sharing', 'Collaboration'),
('supportplan', 'Support Plan Management', 'Creation and tracking of care plans and support activities', 'Service Delivery'),
('document', 'Document Management', 'Storage, versioning, sharing, and retrieval of organisational documents', 'Infrastructure'),
('property', 'Property Management', 'Tracking, maintenance, and utilisation of organisational properties', 'Operational'),
('team', 'Group/Team Management', 'Creation, membership, and permission management for organisational groups', 'Administrative'),
('finance', 'Finance Management', 'Budgeting, expense tracking, invoicing, and financial reporting', 'Administrative'),
('training', 'Training Management', 'Course creation, enrollment, completion tracking, certification, and contextual training delivery through digital environments that connect physical objects to learning resources. Supports xAPI/Tin Can protocol for flexible learning content creation and detailed learning experience tracking across multiple platforms and formats.', 'Administrative'),
('incident', 'Incident Management', 'Reporting, investigation, resolution, and prevention of incidents', 'Operational'),
('compliance', 'Compliance Management', 'Tracking regulatory requirements, audits, and organisational compliance', 'Administrative'),
('visitor', 'Visitor Management', 'Registration, tracking, and security management for visitors', 'Operational'),
('inventory', 'Inventory Management', 'Tracking stock levels, ordering, and distribution of consumable items', 'Operational'),
('project', 'Project Management', 'Planning, tracking, and reporting on organisational projects and initiatives', 'Collaboration'),
('knowledge', 'Knowledge Management', 'Capturing, organising, and sharing organisational knowledge and expertise', 'Collaboration'),
('selfassessment', 'Self-Assessment Management', 'Continuous monitoring, evaluation, and improvement of services in line with Care Inspectorate requirements and standards', 'Service Delivery'),
('improvement', 'Integrated Improvement Intelligence System', 'AI-powered unified approach to tracking, analysing, and improving organisational performance across departments using KPIs, KPAs, and dynamic reporting', 'Strategic'),
('quality', 'Quality Management', 'Monitoring, measuring, and improving service and operational quality', 'Service Delivery'),
('feedback', 'Feedback Management', 'A global system for collecting, analysing, and acting on user feedback across all organisational systems. Enables continuous improvement through user-driven suggestions, issue reporting, and automated resolution of simple content issues using AI.', 'Infrastructure')
ON DUPLICATE KEY UPDATE name=VALUES(name), description=VALUES(description), category=VALUES(category);

-- Insert primary users for each system
INSERT INTO system_primary_users (system_id, user_type) VALUES
('contracts', 'Legal'), ('contracts', 'Procurement'), ('contracts', 'Management'),
('assets', 'Facilities'), ('assets', 'IT'), ('assets', 'Finance'),
('workorders', 'Facilities'), ('workorders', 'Maintenance Staff'),
('staffidentity', 'All Staff'), ('staffidentity', 'HR'), ('staffidentity', 'Security'),
('policy', 'Management'), ('policy', 'HR'), ('policy', 'All Staff'),
('booking', 'All Staff'),
('rota', 'Managers'), ('rota', 'HR'), ('rota', 'Staff'),
('medication', 'Care Staff'), ('medication', 'Medical Staff'),
('hr', 'HR'), ('hr', 'Managers'), ('hr', 'Staff'),
('payroll', 'Finance'), ('payroll', 'HR'),
('identity', 'IT'), ('identity', 'All Users'), ('identity', 'System Administrators'),
('onboarding', 'HR'), ('onboarding', 'IT'), ('onboarding', 'Managers'),
('communication', 'All Staff'),
('supportplan', 'Care Staff'), ('supportplan', 'Managers'),
('document', 'All Staff'),
('property', 'Facilities'), ('property', 'Management'),
('team', 'HR'), ('team', 'Managers'),
('finance', 'Finance'), ('finance', 'Management'),
('training', 'HR'), ('training', 'Training Staff'), ('training', 'All Staff'), ('training', 'Learning & Development'),
('incident', 'Safety Officers'), ('incident', 'Managers'), ('incident', 'Staff'),
('compliance', 'Compliance Officers'), ('compliance', 'Management'),
('visitor', 'Reception'), ('visitor', 'Security'), ('visitor', 'All Staff'),
('inventory', 'Procurement'), ('inventory', 'Facilities'),
('project', 'Project Managers'), ('project', 'Teams'),
('knowledge', 'All Staff'),
('selfassessment', 'Managers'), ('selfassessment', 'Quality Assurance'), ('selfassessment', 'Care Staff'), ('selfassessment', 'All Staff'),
('improvement', 'Leadership'), ('improvement', 'Managers'), ('improvement', 'All Staff'), ('improvement', 'Board Members'),
('quality', 'Quality Officers'), ('quality', 'Management'),
('feedback', 'All Staff'), ('feedback', 'System Administrators'), ('feedback', 'Product Owners'), ('feedback', 'Continuous Improvement Team')
ON DUPLICATE KEY UPDATE user_type=VALUES(user_type);

-- Insert key entities for each system
INSERT INTO system_key_entities (system_id, entity_name) VALUES
('contracts', 'Contracts'), ('contracts', 'Vendors'), ('contracts', 'Staff'), ('contracts', 'Properties'),
('assets', 'Assets'), ('assets', 'Properties'), ('assets', 'Staff'),
('workorders', 'Work Orders'), ('workorders', 'Assets'), ('workorders', 'Properties'), ('workorders', 'Staff'),
('staffidentity', 'Staff Profiles'), ('staffidentity', 'Digital Credentials'), ('staffidentity', 'Access Permissions'), ('staffidentity', 'Authentication Events'),
('policy', 'Policies'), ('policy', 'Staff'), ('policy', 'Teams'),
('booking', 'Bookings'), ('booking', 'Assets'), ('booking', 'Properties'), ('booking', 'Staff'),
('rota', 'Rotas'), ('rota', 'Staff'), ('rota', 'Teams'), ('rota', 'Locations'),
('medication', 'Medications'), ('medication', 'People Supported'), ('medication', 'Staff'),
('hr', 'Staff'), ('hr', 'Teams'), ('hr', 'Positions'), ('hr', 'Skills'),
('payroll', 'Staff'), ('payroll', 'Payments'), ('payroll', 'Tax Rates'), ('payroll', 'Benefits'),
('identity', 'User Accounts'), ('identity', 'Roles'), ('identity', 'Permissions'), ('identity', 'Access Logs'), ('identity', 'Authentication Methods'),
('onboarding', 'Staff'), ('onboarding', 'Assets'), ('onboarding', 'Accounts'), ('onboarding', 'Training'),
('communication', 'Messages'), ('communication', 'Staff'), ('communication', 'Teams'), ('communication', 'Notifications'),
('supportplan', 'People Supported'), ('supportplan', 'Support Plans'), ('supportplan', 'Activities'),
('document', 'Documents'), ('document', 'Folders'), ('document', 'Permissions'), ('document', 'Versions'),
('property', 'Properties'), ('property', 'Assets'), ('property', 'Occupancy'),
('team', 'Teams'), ('team', 'Staff'), ('team', 'Permissions'), ('team', 'Roles'),
('finance', 'Transactions'), ('finance', 'Budgets'), ('finance', 'Accounts'), ('finance', 'Reports'),
('training', 'Courses'), ('training', 'Certifications'), ('training', 'Staff'), ('training', 'Skills'), ('training', 'Learning Objects'), ('training', 'Digital Environment Tags'), ('training', 'xAPI Statements'), ('training', 'Learning Record Store'),
('incident', 'Incidents'), ('incident', 'Staff'), ('incident', 'Locations'), ('incident', 'Actions'),
('compliance', 'Regulations'), ('compliance', 'Audits'), ('compliance', 'Evidence'), ('compliance', 'Deadlines'),
('visitor', 'Visitors'), ('visitor', 'Visits'), ('visitor', 'Staff'), ('visitor', 'Locations'),
('inventory', 'Inventory Items'), ('inventory', 'Locations'), ('inventory', 'Orders'),
('project', 'Projects'), ('project', 'Tasks'), ('project', 'Staff'), ('project', 'Timelines'),
('knowledge', 'Knowledge Articles'), ('knowledge', 'Categories'), ('knowledge', 'Authors'),
('selfassessment', 'Quality Indicators'), ('selfassessment', 'Evidence'), ('selfassessment', 'Action Plans'), ('selfassessment', 'Assessments'), ('selfassessment', 'Inspections'),
('improvement', 'KPIs'), ('improvement', 'Metrics'), ('improvement', 'Improvement Initiatives'), ('improvement', 'Reports'), ('improvement', 'Dashboards'),
('quality', 'Quality Metrics'), ('quality', 'Assessments'), ('quality', 'Improvements'),
('feedback', 'Feedback Items'), ('feedback', 'Improvement Suggestions'), ('feedback', 'Issue Reports'), ('feedback', 'User Contexts'), ('feedback', 'Resolution Actions'), ('feedback', 'AI Corrections')
ON DUPLICATE KEY UPDATE entity_name=VALUES(entity_name);

-- Insert integration points for each system
INSERT INTO system_integration_points (system_id, integration_name) VALUES
('contracts', 'Finance'), ('contracts', 'Asset Management'),
('assets', 'Finance'), ('assets', 'Work Order Management'),
('workorders', 'Asset Management'), ('workorders', 'Staff Rota'),
('staffidentity', 'All Systems'), ('staffidentity', 'Document Management'), ('staffidentity', 'Training Management'), ('staffidentity', 'Facilities Management'),
('policy', 'Document Management'), ('policy', 'Training'),
('booking', 'Staff Rota'), ('booking', 'Asset Management'),
('rota', 'HR Management'), ('rota', 'Payroll'),
('medication', 'Support Plan Management'), ('medication', 'HR'),
('hr', 'Payroll'), ('hr', 'Onboarding/Offboarding'),
('payroll', 'HR Management'), ('payroll', 'Finance'),
('identity', 'All Systems'), ('identity', 'HR Management'), ('identity', 'Security Systems'), ('identity', 'Staff Digital Identity'),
('onboarding', 'HR Management'), ('onboarding', 'Asset Management'),
('communication', 'All Systems'),
('supportplan', 'Medication Management'),
('document', 'All Systems'),
('property', 'Asset Management'), ('property', 'Booking'),
('team', 'HR Management'), ('team', 'Identity Management'),
('finance', 'Payroll'), ('finance', 'Contracts'), ('finance', 'Assets'),
('training', 'HR Management'), ('training', 'Policy Management'), ('training', 'Staff Digital Identity'), ('training', 'Document Management'), ('training', 'Knowledge Management'),
('incident', 'HR Management'), ('incident', 'Support Plans'),
('compliance', 'Policy Management'), ('compliance', 'Document Management'),
('visitor', 'Property Management'), ('visitor', 'Security'),
('inventory', 'Asset Management'), ('inventory', 'Finance'),
('project', 'Document Management'), ('project', 'Team Communication'),
('knowledge', 'Document Management'), ('knowledge', 'Training'),
('selfassessment', 'Document Management'), ('selfassessment', 'Support Plans'), ('selfassessment', 'Training'), ('selfassessment', 'Compliance'), ('selfassessment', 'Incident Management'),
('improvement', 'All Systems'), ('improvement', 'Self-Assessment'), ('improvement', 'Finance'), ('improvement', 'HR'), ('improvement', 'Service Delivery'),
('quality', 'Incident Management'), ('quality', 'Support Plans'),
('feedback', 'All Systems'), ('feedback', 'Identity Management'), ('feedback', 'Staff Digital Identity'), ('feedback', 'Knowledge Management')
ON DUPLICATE KEY UPDATE integration_name=VALUES(integration_name);

-- Create default admin user (password: admin123 - CHANGE THIS IN PRODUCTION!)
-- Password hash for 'admin123'
INSERT INTO admin_users (username, password_hash) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi')
ON DUPLICATE KEY UPDATE username=VALUES(username);
