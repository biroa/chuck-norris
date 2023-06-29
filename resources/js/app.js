// require('./bootstrap');
import { InertiaApp } from '@inertiajs/inertia-react'
import React from 'react'
import { createRoot } from 'react-dom/client';

const app = document.getElementById('app')
const root = createRoot(app);

root.render(
    <InertiaApp
        initialPage={JSON.parse(app.dataset.page)}
        resolveComponent={name => import(`./Pages/${name}`).then(module => module.default)}
    />
)
