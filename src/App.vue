<template>
    <div>
        <academic-offer></academic-offer>
        <utpl-becas></utpl-becas>
        <utpl-news></utpl-news>
        <utpl-events></utpl-events>
    </div>    
</template>

<script>
import AcademicOffer from './components/AcademicOffer.vue'
import UtplNews from './components/UtplNews.vue'
import UtplEvents from './components/UtplEvents.vue'
import UtplBecas from './components/UtplBecas.vue'

export default {
    components: {
        'academic-offer': AcademicOffer,
        'utpl-news': UtplNews,
        'utpl-events': UtplEvents,
        'utpl-becas': UtplBecas
    }
}
</script>