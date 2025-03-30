import { error } from '@sveltejs/kit';
import type { PageLoad } from './$types';
import { systems } from '../systems-data';

export const prerender = false;

export const load: PageLoad = async ({ params }) => {
    const { slug } = params;

    // Find the system with the matching ID
    const system = systems.find((s: { id: string }) => s.id === slug);

    // If no system is found, return a 404 error
    if (!system) {
        throw error(404, {
            message: 'System not found'
        });
    }

    return {
        system,
        title: `${system.name} | Organisation Systems`,
        description: system.description
    };
};