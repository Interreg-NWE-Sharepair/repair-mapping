import './utils/bootstrap';
import './plugins/iframe-resize';
import Alpine from 'alpinejs';
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm';
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm';

import Vue from 'vue';

import ApolloClient from 'apollo-boost';
import VueApollo from 'vue-apollo';

import RepairComponents from '@statikbe/repair-components';
import RepairMapPlugin from '@statikbe/repair-map';
import CustomRepairComponent from './components/vue/CustomRepairMap.vue';

import ComponentI18n from '@statikbe/repair-components/src/i18n';
import MapI18n from '@statikbe/repair-map/src/i18n';

import VueI18n from 'vue-i18n';

const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    uri: process.env.REPAIR_MAP_GRAPHQL_HTTP || 'https://ordp.datascienceinstitute.ie/',
});

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
});

Vue.use(VueApollo);

Vue.use(VueI18n);

const i18n = new VueI18n({
    locale: 'en',
    messages : {}
});

i18n.setLocaleMessage('de', ComponentI18n.de);
i18n.setLocaleMessage('en', ComponentI18n.en);
i18n.setLocaleMessage('nl', ComponentI18n.nl);
i18n.setLocaleMessage('fr', ComponentI18n.fr);

i18n.mergeLocaleMessage('de', MapI18n.de);
i18n.mergeLocaleMessage('en', MapI18n.en);
i18n.mergeLocaleMessage('nl', MapI18n.nl);
i18n.mergeLocaleMessage('fr', MapI18n.fr);

Vue.use(RepairComponents);
Vue.use(RepairMapPlugin);
Vue.component('CustomRepairMap', CustomRepairComponent);

new Vue({ i18n: i18n, apolloProvider }).$mount('#app');

window.Alpine = Alpine;

Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(NotificationsAlpinePlugin);

Alpine.start();

// Components

import { DatePickerComponent } from './components/datepicker';
new DatePickerComponent();

import { GlideComponent } from './components/glide';
new GlideComponent();

import './components/lazySizes';

import { ModalComponent } from './components/modal';
// new ModalComponent();

import { ImageModalPlugin } from './plugins/modal/image.plugin';
import { VideoModalPlugin } from './plugins/modal/video.plugin';
new ModalComponent({
  plugins: [ImageModalPlugin, VideoModalPlugin],
});

import { PasswordToggleComponent } from './components/passwordToggle';
new PasswordToggleComponent();

import { PullOutComponent } from './components/pullout';
new PullOutComponent();

import { ResponsiveBackgroundComponent } from './components/responsiveBackground';
new ResponsiveBackgroundComponent();
