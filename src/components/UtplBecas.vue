<template>
    <div class="wrapper-becas padding2">
        <div class="layout-1">
            <div>
                <h2 class="rtecenter"><strong>Tipos de</strong> becas</h2>
                <p>A través de nuestro programa de becas ofrecemos una oportunidad a todos nuestros alumnos cuya situación económica no les permite cubrir los gastos universitarios y que se destacan por sus méritos académicos o pertenecen a grupos minoritarios.</p>
                <p><strong>Pueden postular a nuestras becas</strong> todos los alumnos nuevos (primer ciclo) y los alumnos actuales (segundo ciclo en adelante) de grado, tecnologías y posgrado en nuestras dos modalidades de estudio.</p>
            </div>

            <div class="wrapper-desplegables">
                <div class="movil-seleccione">Seleccione las opciones</div>
                <div class="section1 desplegable-opciones">
                    <div class="section">
                        <div
                            class="general"
                            id="item"
                            :class="{ selected: selectedOpt === 'todo' }"
                            @click="setSelectedOpt('todo')"
                        >
                            Todas las Becas
                        </div>
                    </div>
                    <h2>Tipos de Becas</h2>
                    <div class="section">
                        <div
                            class="general"
                            :class="{
                                selected: selectedOpt === areaOpt.selector,
                            }"
                            @click="setSelectedOpt(areaOpt.selector)"
                            v-for="(areaOpt, index) of areaOpts"
                            :key="index"
                            :id="areaOpt.id"
                        >
                            {{ areaOpt.title }}
                        </div>
                    </div>

                    <h2>Oferta por modalidad</h2>
                    <div class="section">
                        <div
                            class="distancia"
                            id="Distancia"
                            :class="{
                                selected:
                                    selectedOpt === 'Abierta y a Distancia',
                            }"
                            @click="setSelectedOpt('Abierta y a Distancia')"
                        >
                            Modalidad Abierta y a Distancia
                        </div>
                        <div
                            class="presencial"
                            id="Presencial"
                            :class="{ selected: selectedOpt === 'Presencial' }"
                            @click="setSelectedOpt('Presencial')"
                        >
                            Modalidad Presencial
                        </div>
                        
                    </div>
                </div>

                <div class="section2 desplegable-contenido">
                    <h2 class="desplegable-title">Becas Grado</h2>
                    <div class="becas-grado">
                        <div
                            :class="[
                                'item',
                                becaGrado['field_tipo_de_beca'],
                                becaGrado['Aplica'][0].replace(
                                    'Modalidad',
                                    ''
                                ),
                            ]"
                            v-for="(becaGrado, index) of becasGrado"
                            :key="index"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt ===
                                        becaGrado['field_tipo_de_beca'].trim() ||
                                    selectedOpt ===
                                        becaGrado['Aplica'][0]
                                            .replace('Modalidad', '')
                                            .trim()
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                            <img
                                v-if="
                                    becaGrado['Aplica'][0] ===
                                    ' Modalidad Abierta y a Distancia'
                                "
                                src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"
                            />
                            <img
                                v-else
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            <img
                                v-if="becaGrado['Aplica'][1]"
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            <div v-html="becaGrado.title"></div>
                        </div>
                    </div>

                    <h2 class="desplegable-title">Becas Posgrado</h2>
                    <div class="becas-posgrado">
                        <div
                            :class="[
                                'item',
                                becaPostGrado['field_tipo_de_beca'],
                                'Presencial Abierta y a Distancia',
                            ]"
                            v-for="(becaPostGrado, index) of becasPostGrado"
                            :key="index"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt ===
                                        becaPostGrado['field_tipo_de_beca'].trim() ||
                                    selectedOpt === 'Presencial' ||
                                    selectedOpt === 'Abierta y a Distancia'
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                            <img
                                src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"
                            />
                            <img
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            
                            <div v-html="becaPostGrado.title"></div>
                        </div>
                    </div>


                    
                    <h2 class="desplegable-title">Tecnologías</h2>
                    <div class="becas-tecnologias">
                        <div
                            :class="[
                                'item',
                                becaTecnologia['field_tipo_de_beca'],
                                'Presencial',
                            ]"
                            v-for="(becaTecnologia, index) of becasTecnologia"
                            :key="index"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt ===
                                        becaTecnologia['field_tipo_de_beca'].trim() ||
                                    selectedOpt === 'Presencial'
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                        
                            <img
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            
                            <div v-html="becaTecnologia.title"></div>
                        </div>
                    </div>


                    



                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
const becasGradoUrl ="https://becas.utpl.edu.ec/servicios/becasgeneral.json";
const becasPostGradoUrl ="https://becas.utpl.edu.ec/servicios/becasposgrado.json";
const becasTecnologiaUrl ="https://becas.utpl.edu.ec/servicios/becastecnologia.json";
const mastersUrl =
    "https://srv-si-001.utpl.edu.ec/apim/portalweb/maestrias/servicios/carrerasgeneral.json";
const careersUrl =
    "https://srv-si-001.utpl.edu.ec/apim/portalweb/carreras/servicios/carrerasgeneral.json";

export default {
    name: "becas-utpl",
    data() {
        return {
            becasGrado: [],
            becasPostGrado: [],
            becasTecnologia: [],
            careers: [],
            masters: [],
            areaOpts: [
                {
                    id: "Apoyo",
                    title: "Becas de Apoyo Económico",
                    selector:
                        "Apoyo Económico",
                },
                {
                    id: "Excelencia",
                    title: "Becas de Excelencia",
                    selector:
                        "Excelencia",
                },
                {
                    id: "Inclusión",
                    title: "Becas de Inclusión",
                    selector: "Inclusión",
                },
                {
                    id: "Estratégica",
                    title: "Becas Estratégica",
                    selector: "Estratégica",
                },

            ],
            modalityOpts: [],
            selectedOpt: "todo",
        };
    },
    methods: {
        
        getBecasGrado() {
            axios
                .get(becasGradoUrl)
                .then((response) => {
                    this.becasGrado = response.data;
                });
        },
        getBecasPostGrado() {
            axios
                .get(becasPostGradoUrl)
                .then((response) => {
                    this.becasPostGrado = response.data;
                });
        },
        getBecasTecnologia() {
            axios
                .get(becasTecnologiaUrl)
                .then((response) => {
                    this.becasTecnologia = response.data;
                });
        },
        getMasters() {
            axios
                .get(mastersUrl, {
                    headers: {
                        apikey: "eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJVVFBMLkVEVS5FQ1wvYWNjYXJkZW5hczRAY2FyYm9uLnN1cGVyIiwiYXBwbGljYXRpb24iOnsib3duZXIiOiJVVFBMLkVEVS5FQ1wvYWNjYXJkZW5hczQiLCJ0aWVyUXVvdGFUeXBlIjpudWxsLCJ0aWVyIjoiVW5saW1pdGVkIiwibmFtZSI6IlBvcnRhbGVzV2ViIiwiaWQiOjY2MSwidXVpZCI6ImE3NjY3NDJiLTgxMzktNGZlZC1hNGI4LTEzNTA3NGM5YWZjYSJ9LCJpc3MiOiJodHRwczpcL1wvc3J2LXNpLTAwMS51dHBsLmVkdS5lYzo0NDNcL29hdXRoMlwvdG9rZW4iLCJ0aWVySW5mbyI6eyJVbmxpbWl0ZWQiOnsidGllclF1b3RhVHlwZSI6InJlcXVlc3RDb3VudCIsImdyYXBoUUxNYXhDb21wbGV4aXR5IjowLCJncmFwaFFMTWF4RGVwdGgiOjAsInN0b3BPblF1b3RhUmVhY2giOnRydWUsInNwaWtlQXJyZXN0TGltaXQiOjAsInNwaWtlQXJyZXN0VW5pdCI6bnVsbH19LCJrZXl0eXBlIjoiUFJPRFVDVElPTiIsInBlcm1pdHRlZFJlZmVyZXIiOiIiLCJzdWJzY3JpYmVkQVBJcyI6W3sic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImNhcmJvbi5zdXBlciIsIm5hbWUiOiJQb3J0YWxBcGkiLCJjb250ZXh0IjoiXC9hcGltXC9wb3J0YWx3ZWIiLCJwdWJsaXNoZXIiOiJVVFBMLkVEVS5FQ1wvanNjYWxkZXJvbiIsInZlcnNpb24iOiIxLjAuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifV0sInBlcm1pdHRlZElQIjoiIiwiaWF0IjoxNjM5NTg5NzA0LCJqdGkiOiJjYzQ2ODAyMC1jYTA5LTRjOWQtOTMwOS04MDc4MWQzYmZhN2EifQ==.t0nRR_GTmo6_zlG-vX6kPnU4C9ZynIDewYJ9p_1Y_xdnxMLvRZq6QeHSmErY3p0oXRtxyUk1fGK2a3qOGAYGc58DGQcOOyLDS0yG1E4DB0s4JpEBd-15VOc2Ny362IuqFjazNZ5fA8yMqr-IDm9R_1rWGKjiY9TmqU9V-bQ3yxAyoEmCsl1GlcZzbXmfwM0z8N3mD0ZPtpZ8_Rcuw3r71nxr-nRm622qqudMhhPyuz5RSkfprLnfuibTa2_Br4PsMjkE4KimrbHQ_IBACQ8p850o6Wh_sCUMTTtecHM70-Fnk3J1tSMZ9NwYS0T3KYUcAIAcojlB0esdU5Tbnusqww==",
                    },
                })
                .then((response) => {
                    this.masters = response.data;
                });
        },
        getCareers() {
            axios
                .get(careersUrl, {
                    headers: {
                        apikey: "eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJVVFBMLkVEVS5FQ1wvYWNjYXJkZW5hczRAY2FyYm9uLnN1cGVyIiwiYXBwbGljYXRpb24iOnsib3duZXIiOiJVVFBMLkVEVS5FQ1wvYWNjYXJkZW5hczQiLCJ0aWVyUXVvdGFUeXBlIjpudWxsLCJ0aWVyIjoiVW5saW1pdGVkIiwibmFtZSI6IlBvcnRhbGVzV2ViIiwiaWQiOjY2MSwidXVpZCI6ImE3NjY3NDJiLTgxMzktNGZlZC1hNGI4LTEzNTA3NGM5YWZjYSJ9LCJpc3MiOiJodHRwczpcL1wvc3J2LXNpLTAwMS51dHBsLmVkdS5lYzo0NDNcL29hdXRoMlwvdG9rZW4iLCJ0aWVySW5mbyI6eyJVbmxpbWl0ZWQiOnsidGllclF1b3RhVHlwZSI6InJlcXVlc3RDb3VudCIsImdyYXBoUUxNYXhDb21wbGV4aXR5IjowLCJncmFwaFFMTWF4RGVwdGgiOjAsInN0b3BPblF1b3RhUmVhY2giOnRydWUsInNwaWtlQXJyZXN0TGltaXQiOjAsInNwaWtlQXJyZXN0VW5pdCI6bnVsbH19LCJrZXl0eXBlIjoiUFJPRFVDVElPTiIsInBlcm1pdHRlZFJlZmVyZXIiOiIiLCJzdWJzY3JpYmVkQVBJcyI6W3sic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImNhcmJvbi5zdXBlciIsIm5hbWUiOiJQb3J0YWxBcGkiLCJjb250ZXh0IjoiXC9hcGltXC9wb3J0YWx3ZWIiLCJwdWJsaXNoZXIiOiJVVFBMLkVEVS5FQ1wvanNjYWxkZXJvbiIsInZlcnNpb24iOiIxLjAuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifV0sInBlcm1pdHRlZElQIjoiIiwiaWF0IjoxNjM5NTg5NzA0LCJqdGkiOiJjYzQ2ODAyMC1jYTA5LTRjOWQtOTMwOS04MDc4MWQzYmZhN2EifQ==.t0nRR_GTmo6_zlG-vX6kPnU4C9ZynIDewYJ9p_1Y_xdnxMLvRZq6QeHSmErY3p0oXRtxyUk1fGK2a3qOGAYGc58DGQcOOyLDS0yG1E4DB0s4JpEBd-15VOc2Ny362IuqFjazNZ5fA8yMqr-IDm9R_1rWGKjiY9TmqU9V-bQ3yxAyoEmCsl1GlcZzbXmfwM0z8N3mD0ZPtpZ8_Rcuw3r71nxr-nRm622qqudMhhPyuz5RSkfprLnfuibTa2_Br4PsMjkE4KimrbHQ_IBACQ8p850o6Wh_sCUMTTtecHM70-Fnk3J1tSMZ9NwYS0T3KYUcAIAcojlB0esdU5Tbnusqww==",
                    },
                })
                .then((response) => {
                    this.careers = response.data;
                });
        },
        setSelectedOpt(option) {
            this.selectedOpt = option;
            console.log(this.selectedOpt);
        },
    },
    mounted() {
        this.getCareers();
        this.getMasters();
        this.getBecasGrado();
        this.getBecasTecnologia();
        this.getBecasPostGrado();
    },
};
</script>

<style>
@import "../styles/menustyles.css";
@import "../styles/styles.css";
@import "../styles/styles-academic-offer-wc.css";
</style>
