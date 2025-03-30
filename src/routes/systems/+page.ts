import type { PageLoad } from './$types';

export const load: PageLoad = async () => {
    return {
        title: 'Organisation Systems',
        description: 'Explore the systems that can be built upon the Organisation Information Pool architecture.'
    };
};