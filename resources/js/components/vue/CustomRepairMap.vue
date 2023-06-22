<template>
    <div class="container">
        <ordp-map
            embed
            :locale="locale"
            :mapbox-access-token="mapboxAccessToken">
            <template v-slot:locationTitle="{ location, locationTitle, defaultClass }">
                <a :href="`/${locale}/location/${location?.id}`" :class="defaultClass">
                    <span>{{ location?.name }}</span>
                </a>
            </template>
            <template v-slot:suggestionCta>
                <r-button
                    :href="`/${$i18n.locale}/location/create`"
                    link
                    color="secondary"
                    icon-after="mdiChevronRight"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    {{ $t('create_new_cta') }}
                </r-button>
            </template>
        </ordp-map>
    </div>
</template>

<script>
    export default {
        name: 'CustomRepairMap',
        props: {
            locale: {
                type: String,
                default: () => 'en'
            },
            mapboxAccessToken: {
                type: String,
                default: () => ''
            }
        }
    };
</script>
