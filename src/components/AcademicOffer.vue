<template>
    <div class="wrapper-oferta padding2">
        <div class="layout-1">
            <div class="presentacion-oferta-admision">
                <div>
                    <h2 class="rtecenter"><strong>Oferta académica</strong></h2>
                </div>
                <div class="enlaces-admision">
                    <a href="https://utpl.edu.ec/distancia">
                        Admisiones grado Modalidad Abierta y a Distancia
                    </a>
                    <a href="https://utpl.edu.ec/presencial">
                        Admisiones grado Modalidad Presencial
                    </a>
                    <a href="https://tec.utpl.edu.ec">Admisiones tecnologías</a>
                    <a href="https://utpl.edu.ec/maestrias">
                        Admisiones maestrías
                    </a>
                </div>
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
                            Toda la oferta
                        </div>
                    </div>
                    <h2>Oferta por área</h2>
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
                        <div
                            class="linea"
                            id="línea"
                            :class="{ selected: selectedOpt === 'En línea' }"
                            @click="setSelectedOpt('En línea')"
                        >
                            En línea
                        </div>
                    </div>
                </div>

                <div class="section2 desplegable-contenido">
                    <h2 class="desplegable-title">Grado</h2>
                    <div class="grado">
                        <div
                            :class="[
                                'item',
                                career['field_area'],
                                career['field_modalidad_carrera'][0].replace(
                                    'Modalidad',
                                    ''
                                ),
                            ]"
                            v-for="(career, index) of careers"
                            :key="index"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt ===
                                        career['field_area'].trim() ||
                                    selectedOpt ===
                                        career['field_modalidad_carrera'][0]
                                            .replace('Modalidad', '')
                                            .trim()
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                            <img
                                v-if="
                                    career['field_modalidad_carrera'][0] ===
                                    ' Modalidad Abierta y a Distancia'
                                "
                                src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"
                            />
                            <img
                                v-else
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            <img
                                v-if="career['field_modalidad_carrera'][1]"
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            <div v-html="career.title"></div>
                        </div>
                    </div>
                    <h2 class="desplegable-title">Tecnologías</h2>
                    <div class="tecnologias">
                        <div
                            class="item Abierta y a Distancia"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt === 'Abierta y a Distancia'
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                            <img
                                src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"
                            />
                            <a href="https://tec.utpl.edu.ec/comunicacion">
                                Comunicación Estratégica y Marketing Digital</a
                            >
                        </div>
                        <div
                            class="item Abierta y a Distancia"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt === 'Abierta y a Distancia'
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                            <img
                                src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"
                            />
                            <a href="https://tec.utpl.edu.ec/transformacion">
                                Transformación Digital de Empresas</a
                            >
                        </div>
                    </div>
                    <h2 class="desplegable-title">Maestrías</h2>
                    <div class="posgrado">
                        <div
                            :class="[
                                'item',
                                master['field_area'],
                                master['field_modalidad_carrera'].length > 0 &&
                                    master[
                                        'field_modalidad_carrera'
                                    ][0].replace('Modalidad', ''),
                            ]"
                            v-for="(master, index) of masters"
                            :key="index"
                            :style="{
                                display:
                                    selectedOpt === 'todo' ||
                                    selectedOpt ===
                                        master['field_area'].trim() ||
                                    (master['field_modalidad_carrera'].length >
                                        0 &&
                                        selectedOpt ===
                                            master['field_modalidad_carrera'][0]
                                                .replace('Modalidad', '')
                                                .trim())
                                        ? 'flex'
                                        : 'none',
                            }"
                        >
                            <img
                                v-if="
                                    master['field_modalidad_carrera'][0] ===
                                    ' Modalidad Abierta y a Distancia'
                                "
                                src="https://www.utpl.edu.ec/sites/default/files/distancia-icon.png"
                            />

                            <img
                                v-else
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />

                            <img
                                v-if="master['field_modalidad_carrera'][1]"
                                src="https://www.utpl.edu.ec/sites/default/files/presencial-icon.png"
                            />
                            <div v-html="master.title"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
const mastersUrl =
    "https://srv-si-001.utpl.edu.ec/apim/portalweb/maestrias/servicios/carrerasgeneral.json";
const careersUrl =
    "https://srv-si-001.utpl.edu.ec/apim/portalweb/carreras/servicios/carrerasgeneral.json";

export default {
    name: "academic-offer",
    data() {
        return {
            careers: [],
            masters: [],
            areaOpts: [
                {
                    id: "Empresariales",
                    title: "Facultad de Ciencias Económicas y Empresariales",
                    selector: "Facultad de Ciencias Económicas y Empresariales",
                },
                {
                    id: "Salud",
                    title: "Facultad de Ciencias de la Salud",
                    selector: "Facultad Ciencias de la Salud",
                },
                {
                    id: "Arquitectura",
                    title: "Facultad de Ingenierías y Arquitectura",
                    selector: "Facultad de Ingeniería y Arquitectura",
                },
                {
                    id: "Naturales",
                    title: "Facultad de Ciencias Exactas y Naturales",
                    selector: "Facultad de Ciencias Exactas y Naturales",
                },
                {
                    id: "Humanidades",
                    title: "Facultad de Ciencias Sociales, Educación y Humanidades",
                    selector:
                        "Facultad de Ciencias Sociales, Educación y Humanidades",
                },
            ],
            modalityOpts: [],
            selectedOpt: "todo",
        };
    },
    methods: {
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
    },
};
</script>

<style>
@import "../styles/styles-academic-offer-wc.css";
</style>
