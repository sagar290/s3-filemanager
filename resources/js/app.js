import { createApp, h } from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './shared/Layout'

createInertiaApp({
    resolve: async name => {
        let page =  (await import(`./pages/${name}.vue`)).default;
        page.layout ??= Layout;
        return page
    },
    setup({ el, app, props, plugin }) {
        const VueApp = createApp({
            render: () => h(app, props),
        });
        VueApp
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el);
    },
});


InertiaProgress.init()
