<template>
    <div class="container">
        <repair-map
            embed
            :locale="locale"
            :mapbox-access-token="mapboxAccessToken">
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
        </repair-map>
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
