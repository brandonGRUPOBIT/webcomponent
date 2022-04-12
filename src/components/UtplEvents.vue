<template>
    <div class="wrapper-items">
        <h2>Eventos</h2>
        <div
            class="section-items hide-scroll"
            id="carousel-events"
            ref="carousel-events"
        >
            <div
                v-for="(event, index) of events"
                :key="index"
                class="item"
                style=""
            >
                <div class="body-item">
                    <p
                        class="date"
                        v-for="(date, index) of event.field_date"
                        :key="index"
                        v-html="date"
                    ></p>
                    <h4>
                        {{ htmlEncode(event.title) }}
                    </h4>
                </div>
                <div
                    class="enlace-item"
                    v-html="event.view_node"
                    ref="enlace_item"
                    @mouseover="onMouseOver(index)"
                    @mouseleave="onMouseLeave(index)"
                ></div>
            </div>
        </div>

        <div class="navigation-items">
            <div class="left-items" @click="goToLeft()">&lt;</div>
            <div class="right-items" @click="goToRight()">&gt;</div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

const eventsUrl =
    "https://srv-si-001.utpl.edu.ec/apim/portalweb/eventos-misiones/eventos.json";

export default {
    name: "utpl-events",
    data() {
        return { events: [] };
    },
    methods: {
        getEvents() {
            axios
                .get(eventsUrl, {
                    headers: {
                        apikey: "eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJVVFBMLkVEVS5FQ1wvYWNjYXJkZW5hczRAY2FyYm9uLnN1cGVyIiwiYXBwbGljYXRpb24iOnsib3duZXIiOiJVVFBMLkVEVS5FQ1wvYWNjYXJkZW5hczQiLCJ0aWVyUXVvdGFUeXBlIjpudWxsLCJ0aWVyIjoiVW5saW1pdGVkIiwibmFtZSI6IlBvcnRhbGVzV2ViIiwiaWQiOjY2MSwidXVpZCI6ImE3NjY3NDJiLTgxMzktNGZlZC1hNGI4LTEzNTA3NGM5YWZjYSJ9LCJpc3MiOiJodHRwczpcL1wvc3J2LXNpLTAwMS51dHBsLmVkdS5lYzo0NDNcL29hdXRoMlwvdG9rZW4iLCJ0aWVySW5mbyI6eyJVbmxpbWl0ZWQiOnsidGllclF1b3RhVHlwZSI6InJlcXVlc3RDb3VudCIsImdyYXBoUUxNYXhDb21wbGV4aXR5IjowLCJncmFwaFFMTWF4RGVwdGgiOjAsInN0b3BPblF1b3RhUmVhY2giOnRydWUsInNwaWtlQXJyZXN0TGltaXQiOjAsInNwaWtlQXJyZXN0VW5pdCI6bnVsbH19LCJrZXl0eXBlIjoiUFJPRFVDVElPTiIsInBlcm1pdHRlZFJlZmVyZXIiOiIiLCJzdWJzY3JpYmVkQVBJcyI6W3sic3Vic2NyaWJlclRlbmFudERvbWFpbiI6ImNhcmJvbi5zdXBlciIsIm5hbWUiOiJQb3J0YWxBcGkiLCJjb250ZXh0IjoiXC9hcGltXC9wb3J0YWx3ZWIiLCJwdWJsaXNoZXIiOiJVVFBMLkVEVS5FQ1wvanNjYWxkZXJvbiIsInZlcnNpb24iOiIxLjAuMCIsInN1YnNjcmlwdGlvblRpZXIiOiJVbmxpbWl0ZWQifV0sInBlcm1pdHRlZElQIjoiIiwiaWF0IjoxNjM5NTg5NzA0LCJqdGkiOiJjYzQ2ODAyMC1jYTA5LTRjOWQtOTMwOS04MDc4MWQzYmZhN2EifQ==.t0nRR_GTmo6_zlG-vX6kPnU4C9ZynIDewYJ9p_1Y_xdnxMLvRZq6QeHSmErY3p0oXRtxyUk1fGK2a3qOGAYGc58DGQcOOyLDS0yG1E4DB0s4JpEBd-15VOc2Ny362IuqFjazNZ5fA8yMqr-IDm9R_1rWGKjiY9TmqU9V-bQ3yxAyoEmCsl1GlcZzbXmfwM0z8N3mD0ZPtpZ8_Rcuw3r71nxr-nRm622qqudMhhPyuz5RSkfprLnfuibTa2_Br4PsMjkE4KimrbHQ_IBACQ8p850o6Wh_sCUMTTtecHM70-Fnk3J1tSMZ9NwYS0T3KYUcAIAcojlB0esdU5Tbnusqww==",
                    },
                })
                .then((response) => (this.events = response.data));
        },
        goToLeft() {
            const tamanio = this.$refs["carousel-events"].offsetWidth;
            const leftPos = this.$refs["carousel-events"].scrollLeft;
            this.$refs["carousel-events"].scroll({
                left: leftPos - tamanio,
                behavior: "smooth",
            });
        },
        goToRight() {
            const tamanio = this.$refs["carousel-events"].offsetWidth;
            const leftPos = this.$refs["carousel-events"].scrollLeft;
            this.$refs["carousel-events"].scroll({
                left: leftPos + tamanio,
                behavior: "smooth",
            });
        },

        onMouseOver(index) {
            const tagRef = this.$refs["enlace_item"][index].childNodes[0];
            tagRef.setAttribute("class", "selected");
        },
        onMouseLeave(index) {
            const tagRef = this.$refs["enlace_item"][index].childNodes[0];
            tagRef.removeAttribute("class", "selected");
        },
        htmlEncode(str){
              var modifiedString = str.replaceAll("quot","\"");
              modifiedString = modifiedString.replaceAll("&\";","\"");
              return modifiedString;    
            },
    },
    mounted() {
        this.getEvents();
    },
};
</script>

<style>
@import "../styles/menustyles.css";
@import "../styles/styles.css";
@import "../styles/styles-events-wc.css";
</style>
