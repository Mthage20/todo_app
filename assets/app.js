import { registerSvelteControllerComponents } from '@symfony/ux-svelte';
import './bootstrap.js';
import './styles/app.css';

// Register Svelte controller components
registerSvelteControllerComponents(
    require.context('./svelte/controllers', true, /\.svelte$/)
);
