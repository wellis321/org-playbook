#!/bin/bash

# Update workflow-preferences.mdc
cat > .cursor/rules/workflow-preferences.mdc << 'EOF'
---
description: How I like to code
globs: "*.svelte,*.ts,*.js,*.css,*.html"
alwaysApply: true
---

# Coding workflow preferences

- Focus on the areas of code relevant to the task.
- Do not touch code that is unrelated to the task.
- Avoid making major changes to the patterns and architectures of how a feature works, after it has shown to work well, unless explicitly instructed.
- Always think about what other methods and areas of code might be affected by code changes.
EOF

# Update coding-preferences.mdc
cat > .cursor/rules/coding-preferences.mdc << 'EOF'
---
description: How we should prefer to code
globs: "*.svelte,*.ts,*.js,*.css,*.html"
alwaysApply: true
---

# Coding preferences

- Always prefer simple solutions.
- Avoid duplication of code whenever possible, which means checking for other areas of the codebase that might already have similar code and functionality.
- You are careful to only make changes that are requested or you are confident are well understood and related to the change being requested.
- When fixing an issue or bug, do not introduce a new pattern or technology without exhausting all options for the existing implimentation. And if you finally do this, make sure to remove the old implimentation afterwards so we don't have duplicate logic.
- Keep the codebase very clean and organised
- Mocking data is only needed for tests, never mock data for dev or production environments.
- Never overwrite my .env file without asking and confirming.
EOF

# Update sveltekit.mdc
cat > .cursor/rules/sveltekit.mdc << 'EOF'
---
description: describes how to use and interact with sveltekit
globs: "*.svelte,*.ts,*.js,src/**"
alwaysApply: false
---

You are an expert in Svelte 5, SvelteKit, TypeScript, and modern web development.

# Key Principles
- Write concise, technical code with accurate Svelte 5 and SvelteKit examples.
- Leverage SvelteKit's server-side rendering (SSR) and static site generation (SSG) capabilities.
- prioritise performance optimization and minimal JavaScript for optimal user experience.
- Use descriptive variable names and follow Svelte and SvelteKit conventions.
- Organize files using SvelteKit's file-based routing system.
- Prioritise using Sveltkit actions whenever the opportunity first arises.

# Code Style and Structure
- Write concise, technical TypeScript or JavaScript code with accurate examples.
- Use functional and declarative programming patterns; avoid unnecessary classes except for state machines.
- Prefer iteration and modularization over code duplication.
- Structure files: component logic, markup, styles, helpers, types.
- Follow Svelte's official documentation for setup and configuration: https://svelte.dev/docs

# Naming Conventions
- Use lowercase with hyphens for component files (e.g., `components/auth-form.svelte`).
- Use PascalCase for component names in imports and usage.
- Use camelCase for variables, functions, and props.

# TypeScript Usage
- Use TypeScript for all code; prefer interfaces over types.
- Avoid enums; use const objects instead.
- Use functional components with TypeScript interfaces for props.
- Enable strict mode in TypeScript for better type safety.

# Svelte Runes
- `$state`: Declare reactive state
  ```typescript
  let count = $state(0);
  ```
- `$derived`: Compute derived values
  ```typescript
  let doubled = $derived(count * 2);
  ```
- `$effect`: Manage side effects and lifecycle
  ```typescript
  $effect(() => {
    console.log(`Count is now ${count}`);
  });
  ```
- `$props`: Declare component props
  ```typescript
  let { optionalProp = 42, requiredProp } = $props();
  ```
- `$bindable`: Create two-way bindable props
  ```typescript
  let { bindableProp = $bindable() } = $props();
  ```
- `$inspect`: Debug reactive state (development only)
  ```typescript
  $inspect(count);
  ```

# UI and Styling
- Use Tailwind CSS for utility-first styling approach.

# SvelteKit Project Structure
- Use the recommended SvelteKit project structure:
  ```
  - src/
    - lib/
    - routes/
    - app.html
  - static/
  - svelte.config.ts
  - vite.config.ts
  ```

# Component Development
- Create .svelte files for Svelte components.
- Implement proper component composition and reusability.
- Use Svelte's props for data passing.
- Leverage Svelte's reactive declarations for local state management.

# Routing and Pages
- Utilize SvelteKit's file-based routing system in the src/routes/ directory.
- Implement dynamic routes using [slug] syntax.
- Use load functions for server-side data fetching and pre-rendering.
- Implement proper error handling with +error.svelte pages.

# Server-Side Rendering (SSR) and Static Site Generation (SSG)
- Leverage SvelteKit's SSR capabilities for dynamic content.
- Implement SSG for static pages using prerender option.
- Use the adapter-auto for automatic deployment configuration.

# Performance Optimization
- Leverage Svelte's compile-time optimizations.
- Use `{#key}` blocks to force re-rendering of components when needed.
- Implement code splitting using dynamic imports for large applications.
- Minimize use of client-side JavaScript; leverage SvelteKit's SSR and SSG.
- Implement proper lazy loading for images and other assets.

# Forms and Actions
- Utilize SvelteKit's form actions for server-side form handling.
- Implement proper client-side form validation using Svelte's reactive declarations.
- Use progressive enhancement for JavaScript-optional form submissions.

# Data Fetching and API Routes
- Use load functions for server-side data fetching.
- Implement proper error handling for data fetching operations.
- Create API routes in the src/routes/api/ directory.
- Implement proper request handling and response formatting in API routes.
- Use SvelteKit's hooks for global API middleware.

# Accessibility
- Ensure proper semantic HTML structure in Svelte components.
- Implement ARIA attributes where necessary.
- Ensure keyboard navigation support for interactive elements.
- Use Svelte's bind:this for managing focus programmatically.

# Key Conventions
1. Embrace Svelte's simplicity and avoid over-engineering solutions.
2. Use SvelteKit for full-stack applications with SSR and API routes.
3. prioritise Web Vitals (LCP, FID, CLS) for performance optimization.
4. Use environment variables for configuration management.
5. Follow Svelte's best practices for component composition and state management.
6. Ensure cross-browser compatibility by testing on multiple platforms.
7. Keep your Svelte and SvelteKit versions up to date.

# Documentation
- Svelte 5 Runes: https://svelte-5-preview.vercel.app/docs/runes
- Svelte Documentation: https://svelte.dev/docs
- SvelteKit Documentation: https://kit.svelte.dev/docs
EOF

# Update playbook-rules.mdc
cat > .cursor/rules/playbook-rules.mdc << 'EOF'
---
description: The rules of the playbook that we'll develop over time
globs: "*.md,*.svelte,*.ts,*.js"
alwaysApply: false
---

# Organisation Playbook

## Introduction

The Organisation Playbook is a guide to structuring an organisation around people and their needs, rather than rigid systems. It aims to create intuitive, efficient workflows where staff do not require extensive training to navigate digital systems. Instead, information and processes should be designed to be natural and accessible.

## Organisation Information Pool

The Organisation Information Pool encompasses all the information that defines an organisation. This includes structured data on:

- **Staff** – HR records, roles, authentication, payroll.
- **People Supported** – Case records, support plans, compliance data.
- **Teams/Groups** – Memberships, hierarchies, permissions, responsibilities.
- **Properties & Assets** – Locations, maintenance records, ownership, usage.

## Rules for Managing Information

To ensure efficiency, security, and usability, the Organisation Information Pool follows these rules:

- **No Duplication** – A single source of truth for all information.
- **Standardisation & Validation** – Consistent formats, enforced at multiple levels (client, API, database).
- **Person-Centric Approach** – Designed for ease of use and improved experiences for staff and stakeholders.
- **Security-First Design** – Data encrypted at rest and in transport, with modern security measures in place.

## Enabling New Workplace Behaviors

By implementing these rules, organisations can:

- Transition to paperless operations.
- Enable a mobile workforce with seamless access.
- Provide anywhere, any device access.
- Raise accessibility (A11y) standards for all users.
- Improve software usability to reduce training needs and increase efficiency.

## The Future Vision

### National HR & Recruitment System

A functional programming-based HR and recruitment system could be developed at a national level to provide modular, adaptable tools for organisations across Scotland. This system could be maintained by a dedicated development team, reducing reliance on third-party providers and increasing efficiency across the public and third sectors.

### Form Builder for Organisations

A key tool for organisations is a custom form builder with strict validation and GDPR compliance. Every field must have validation, and some fields may belong to GDPR rule groups with predefined access and retention controls. A form builder would help organisations:

- **Eliminate duplication** – No more scattered Word documents or postal letters.
- **Enforce standardisation** – Forms follow strict validation rules and are stored in a unified format.
- **Enhance compliance** – GDPR rules are embedded at the field and group level.
- **Reduce errors (Poka-Yoke)** – Predefined field types and validation prevent incorrect data entry.
- **Improve efficiency and well-being** – Reduces administrative burden, making information more accessible and usable.

## Recruitment & Onboarding: A Smarter Approach

Many organisations overpay for external recruitment and onboarding tools, leading to high costs and inefficiencies. A national recruitment and onboarding system would significantly reduce costs and improve efficiency by providing a shared, adaptable solution.

### Why This Matters

- **Cost & Time Savings** – A centralised system would reduce licensing costs and streamline onboarding.
- **Seamless Data Flow** – Recruitment data should flow directly into HR without duplication.
- **Flipping the Model** – Instead of organisations adapting to rigid third-party software, the system should serve their needs by providing only essential fields with flexibility for customization.

### Mapping the Candidate Journey

A structured approach to recruitment should follow a clear candidate journey, ensuring transparency and efficiency:

#### Job Discovery & Application

- Candidates browse jobs, receive AI-driven suggestions, and apply with AI-assisted form completion.
- Auto-fill capabilities reduce repetitive entry, making applications quicker and easier.
- Candidates can opt into automatic applications for similar roles.

#### Application Processing

- Applications are reviewed, with AI helping shortlist candidates.
- Candidates receive clear status updates (shortlisted, interview invite, or rejection with feedback).

#### Interview & Selection

- Candidates schedule their own interview slots.
- Interview feedback is logged in the system.
- Successful candidates receive digital job offers, while unsuccessful ones get structured feedback.

#### Onboarding

- HR & IT setup is automated, ensuring smooth transition from candidate to employee.
- System-generated welcome packages, training materials, and first-day details streamline the onboarding experience.

This structured approach ensures 100% compliance in communication, reducing administrative burden while improving candidate experience.

## Implementation: How to Apply This Playbook

Organisations can adopt this playbook in phases:

1. **Quick Wins** – Identify and eliminate duplication, improve data validation, assess accessibility.
2. **Long-Term Strategy** – Plan for standardised workflows, security measures, and integration of modular systems.
3. **Full Implementation** – Build or transition to a structured, secure, and efficient digital infrastructure.

This document is a living resource, evolving as organisations refine their approach to structured, people-first information management.
EOF

# Update the-project.mdc
cat > .cursor/rules/the-project.mdc << 'EOF'
---
description: Overview of the project
globs: "*.md,*.svelte,*.ts,*.js"
alwaysApply: false
---

# Organisation Playbook Project

- Always strictly use English terms over American terms such as organisation instead of organisation

## Project Vision

I'd like to map out a "whole" organisation and the systems, documents, workflows, etc that it needs to function.

I want to create this organisation in a way that it focuses on the people and their needs and the systems and workflows are wrapped around them.

Currently people need to get extensive training to learn how systems and software work rather than the software and systems being intuitive and easy to use. I just want to create a playbook that sets out what an organisation needs. I dont want to do this in one step. I expect us to do this over a long period of time and hopefully in small steps.

The playbook will be presented in this SvelteKit app.

The playbook will develop over time and we'll update it in the playbook-rules.mdc

## Why This Matters: The Case for Human-Centered organisations

organisations today face unprecedented challenges in managing information, systems, and people. Our human-centered organisational playbook directly addresses these pain points to create more effective, efficient, and satisfying work environments.

## Current organisational Challenges

### Rising Information Complexity
* **Data explosion**: organisations now manage exponentially more data than even five years ago
* **Format proliferation**: Information exists in structured databases, documents, emails, chats, and specialized applications
* **Integration struggles**: Different systems often speak different languages, requiring complex and brittle integration solutions
* **Versioning nightmares**: Tracking the latest version of critical information becomes increasingly difficult

### Siloed Information Systems
* **Departmental barriers**: Information trapped in department-specific systems and applications
* **Historical legacy**: Decades of accumulated systems that don't communicate effectively
* **Vendor lock-in**: Proprietary technologies that resist integration and sharing
* **Knowledge hoarding**: Information treated as power rather than a shared organisational asset

### Staff Retention and Knowledge Loss
* **Institutional knowledge walks out the door**: When employees leave, critical operational knowledge often leaves with them
* **Training burden**: New staff require extensive training on complex, unintuitive systems
* **Frustration and burnout**: Staff experience "system fatigue" from navigating cumbersome tools
* **Generational expectations**: Newer workers expect intuitive digital experiences comparable to consumer applications

### Lack of Data Standardisation
* **Inconsistent formats**: The same information stored differently across systems
* **Terminology confusion**: Different terms used for the same concepts
* **Quality variations**: Inconsistent validation leading to unreliable data
* **Reporting difficulties**: Inability to generate meaningful insights from fragmented data

### Technology Acceleration
* **Constant upgrades**: Never-ending cycle of system updates and migrations
* **Security challenges**: Growing threats require sophisticated protection measures
* **Cloud transition**: Movement from on-premises to cloud-based systems
* **Automation pressure**: Need to automate routine tasks while maintaining human judgment

### Regulatory Compliance Burden
* **Growing requirements**: Increasing regulations around data privacy and security
* **Cross-jurisdiction complexity**: Different requirements across regions and countries
* **Audit readiness**: Need to demonstrate compliance through documentation and processes
* **User rights**: Requirements to provide access and control to individuals whose data is stored

### User Experience Failures
* **Systems designed for computers, not people**: Interfaces that follow system logic rather than human workflows
* **Training overhead**: Excessive time spent learning how to use poorly designed systems
* **Accessibility gaps**: Systems that exclude users with disabilities
* **Mobile limitations**: Legacy systems that don't work effectively on modern devices

## The Human-Centered Advantage

Our playbook offers a comprehensive approach to addressing these challenges by placing human needs at the center of organisational design:

### For Leaders
* Reduced operational costs through streamlined systems
* Improved decision-making with reliable, accessible information
* Enhanced organisational resilience through better knowledge management
* Higher staff retention by reducing system frustration

### For Staff
* More time spent on meaningful work rather than fighting with systems
* Reduced training requirements through intuitive design
* Greater workplace flexibility through location-independent access
* Improved job satisfaction through tools that support rather than hinder

### For IT Teams
* Simplified system landscape with fewer integration points
* Clearer information architecture that scales with organisational needs
* Reduced support burden from user-friendly systems
* More strategic role in enabling organisational success

### For Customers/Clients/Service Users
* Faster, more accurate service delivery
* Consistent experiences across all touchpoints
* Greater transparency into processes and decisions
* Higher quality outcomes from more effective organisations

By addressing these fundamental challenges with a human-centered approach, organisations can transform from struggling with complexity to thriving through clarity, creating workplaces where both people and technology perform at their best.
EOF

echo "Rules files updated successfully!"
